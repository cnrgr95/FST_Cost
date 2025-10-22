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
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-content">
                <div class="logo">
                    <img src="assets/img/logo.svg" alt="FST Cost" class="logo-img">
                    <h1><?php echo Language::get('dashboard_title'); ?></h1>
                </div>
                <div class="user-menu">
                    <span class="welcome-text">
                        <?php echo Language::get('welcome'); ?>, 
                        <strong><?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?></strong>
                    </span>
                    <div class="user-actions">
                        <a href="?logout=1" class="logout-btn">
                            <?php echo Language::get('logout'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="dashboard-main">
            <div class="dashboard-content">
                <div class="welcome-section">
                    <h2><?php echo Language::get('welcome'); ?>!</h2>
                    <p><?php echo Language::get('welcome_message'); ?></p>
                </div>

                <!-- Dashboard Cards -->
                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-icon">📊</div>
                        <div class="card-content">
                            <h3><?php echo Language::get('cost_calculation'); ?></h3>
                            <p><?php echo Language::get('cost_calculation_desc'); ?></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">📈</div>
                        <div class="card-content">
                            <h3><?php echo Language::get('reports'); ?></h3>
                            <p><?php echo Language::get('reports_desc'); ?></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">👥</div>
                        <div class="card-content">
                            <h3><?php echo Language::get('users'); ?></h3>
                            <p><?php echo Language::get('users_desc'); ?></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">⚙️</div>
                        <div class="card-content">
                            <h3><?php echo Language::get('settings'); ?></h3>
                            <p><?php echo Language::get('settings_desc'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="quick-stats">
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label"><?php echo Language::get('total_projects'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label"><?php echo Language::get('active_calculations'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label"><?php echo Language::get('completed'); ?></div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="dashboard-footer">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="#"><?php echo Language::get('help'); ?></a>
                    <a href="#"><?php echo Language::get('about'); ?></a>
                </div>
            </div>
        </footer>
    </div>

    <script src="assets/js/dashboard.js"></script>
</body>
</html>
