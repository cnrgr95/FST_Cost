<?php
require_once 'config/session.php';
require_once 'config/database.php';
require_once 'config/language.php';

// Kullanıcı giriş kontrolü
checkSession();

// Dil ayarları
$selectedLanguage = isset($_SESSION['language']) ? $_SESSION['language'] : 'en';
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
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Kullanıcı bilgilerini al
$stmt = $conn->prepare("SELECT username, full_name, language FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="<?php echo $selectedLanguage; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Language::get('dashboard_title'); ?></title>
    <link rel="icon" type="image/svg+xml" href="assets/img/logo.svg">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/includes/topbar.css">
    <link rel="stylesheet" href="assets/css/includes/sidebar.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
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
    <script src="assets/js/includes/topbar.js"></script>
    <script src="assets/js/includes/sidebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>
</html>
