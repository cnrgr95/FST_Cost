<?php
// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Error handling
require_once 'config/config.php';
require_once 'config/error_handler.php';
ErrorHandler::init(); // Config'den environment alır

require_once 'config/utils.php';
require_once 'config/session.php';
require_once 'config/database.php';
require_once 'config/language.php';

// Kullanıcı giriş kontrolü
checkSession();

// Dil ayarları
$selectedLanguage = isset($_SESSION['language']) ? $_SESSION['language'] : 'en';

// Dil değiştirme işlemi
if(isset($_POST['change_language'])) {
    // CSRF token kontrolü
    if(Utils::validateCSRFToken($_POST['csrf_token'] ?? '')) {
        try {
            $newLanguage = Utils::sanitizeInput($_POST['change_language'], 'string', 10);
            if(in_array($newLanguage, array_keys(Language::getAvailableLanguages()))) {
                $_SESSION['language'] = $newLanguage;
                $selectedLanguage = $newLanguage;
                
                // Veritabanında kullanıcının dil tercihini güncelle
                try {
                    $updateStmt = $conn->prepare("UPDATE users SET language = ? WHERE id = ?");
                    $updateStmt->execute([$newLanguage, $_SESSION['user_id']]);
                } catch(Exception $e) {
                    ErrorHandler::log("Language update error: " . $e->getMessage());
                }
                
                // Sayfayı yenile
                Utils::redirect($_SERVER['PHP_SELF']);
            }
        } catch(InvalidArgumentException $e) {
            ErrorHandler::log("Invalid language input: " . $e->getMessage());
        }
    } else {
        ErrorHandler::log("Invalid CSRF token in language change", ['ip' => Utils::getClientIP()]);
    }
}

Language::setLanguage($selectedLanguage);

// Çıkış işlemi
if(isset($_GET['logout'])) {
    logout();
}

// Veritabanı bağlantısı
try {
    $db = new Database();
    $db->createDatabase(); // Veritabanını oluştur ve bağlan
    $conn = $db->getConnection();
} catch(Exception $e) {
    error_log("Dashboard database error: " . $e->getMessage());
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Kullanıcı bilgilerini al
try {
    $stmt = $conn->prepare("SELECT username, full_name, language FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    
    if(!$user) {
        // Kullanıcı bulunamadı, çıkış yap
        logout();
    }
} catch(Exception $e) {
    error_log("User fetch error: " . $e->getMessage());
    logout();
}
?>
<!DOCTYPE html>
<html lang="<?php echo $selectedLanguage; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Language::get('dashboard_title'); ?></title>
    <link rel="icon" type="image/svg+xml" href="assets/img/logo.svg">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/includes/topbar.css">
    <link rel="stylesheet" href="assets/css/includes/sidebar.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <!-- Topbar -->
    <?php include 'includes/topbar.php'; ?>
    
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    
    <!-- Main Content -->
    <main class="main-content">
        <div class="content-wrapper">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <h1><?php echo Language::get('welcome'); ?>!</h1>
                <p><?php echo Language::get('welcome_message'); ?></p>
            </div>
            
            <!-- Dashboard Cards -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-icon">📊</div>
                    <div class="card-content">
                        <h3><?php echo Language::get('cost_calculation'); ?></h3>
                        <p><?php echo Language::get('cost_calculation_desc'); ?></p>
                    </div>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">📈</div>
                    <div class="card-content">
                        <h3><?php echo Language::get('reports'); ?></h3>
                        <p><?php echo Language::get('reports_desc'); ?></p>
                    </div>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">👥</div>
                    <div class="card-content">
                        <h3><?php echo Language::get('users'); ?></h3>
                        <p><?php echo Language::get('users_desc'); ?></p>
                    </div>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">⚙️</div>
                    <div class="card-content">
                        <h3><?php echo Language::get('settings'); ?></h3>
                        <p><?php echo Language::get('settings_desc'); ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="stats-section">
                <h2><?php echo Language::get('quick_stats'); ?></h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">📁</div>
                        <div class="stat-info">
                            <div class="stat-number">0</div>
                            <div class="stat-label"><?php echo Language::get('total_projects'); ?></div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">🔄</div>
                        <div class="stat-info">
                            <div class="stat-number">0</div>
                            <div class="stat-label"><?php echo Language::get('active_calculations'); ?></div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">✅</div>
                        <div class="stat-info">
                            <div class="stat-number">0</div>
                            <div class="stat-label"><?php echo Language::get('completed'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- JavaScript Files -->
    <script src="assets/js/common.js"></script>
    <script src="assets/js/includes/topbar.js"></script>
    <script src="assets/js/includes/sidebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
    
    <!-- Global JavaScript Functions -->
    <script>
        // Global functions moved to separate JS files
        window.changeLanguage = function(lang) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '';
            
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'change_language';
            input.value = lang;
            
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = 'csrf_token';
            csrfInput.value = '<?php echo Utils::generateCSRFToken(); ?>';
            
            form.appendChild(input);
            form.appendChild(csrfInput);
            document.body.appendChild(form);
            form.submit();
        };
        
        window.logout = function() {
            if(confirm('<?php echo Language::get('confirm_logout'); ?>')) {
                window.location.href = '?logout=1';
            }
        };
    </script>
</body>
</html>
