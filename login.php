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

// Eğer kullanıcı zaten giriş yapmışsa dashboard'a yönlendir
if(isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// Veritabanını oluştur
try {
    $db = new Database();
    $db->createDatabase();
} catch(Exception $e) {
    die("Veritabanı kurulum hatası: " . $e->getMessage());
}

// Dil ayarları
$selectedLanguage = isset($_POST['language']) ? $_POST['language'] : (isset($_SESSION['language']) ? $_SESSION['language'] : 'en');
Language::setLanguage($selectedLanguage);

// Timeout mesajı kontrolü
$timeoutMessage = '';
if(isset($_GET['timeout'])) {
    $timeoutMessage = Language::get('session_timeout');
}

// Login işlemi
$error = '';
if($_POST && isset($_POST['username']) && isset($_POST['password'])) {
    // CSRF token kontrolü
    if(!Utils::validateCSRFToken($_POST['csrf_token'] ?? '')) {
        $error = Language::get('login_error');
        ErrorHandler::log("Invalid CSRF token", ['ip' => Utils::getClientIP()]);
    } else {
        try {
            $username = Utils::sanitizeInput($_POST['username'], 'username', 50);
            $password = $_POST['password']; // Password sanitize edilmez
            $remember = isset($_POST['remember']);
            
            if(!empty($username) && !empty($password)) {
                try {
                    $conn = $db->getConnection();
                    $stmt = $conn->prepare("SELECT id, username, password, full_name, language FROM users WHERE username = ?");
                    $stmt->execute([$username]);
                    $user = $stmt->fetch();
                    
                    if($user && password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['full_name'] = $user['full_name'];
                        $_SESSION['language'] = $user['language'];
                        
                        // Dil ayarını güncelle
                        if($selectedLanguage != $user['language']) {
                            $updateStmt = $conn->prepare("UPDATE users SET language = ? WHERE id = ?");
                            $updateStmt->execute([$selectedLanguage, $user['id']]);
                            $_SESSION['language'] = $selectedLanguage;
                        }
                        
                        // Beni hatırla seçeneği
                        if($remember) {
                            $token = bin2hex(random_bytes(32));
                            $expires = date('Y-m-d H:i:s', strtotime('+30 days'));
                            
                            $sessionStmt = $conn->prepare("INSERT INTO sessions (user_id, session_token, expires_at) VALUES (?, ?, ?)");
                            $sessionStmt->execute([$user['id'], $token, $expires]);
                            
                            setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/', '', true, true);
                        }
                        
                        Utils::redirect('dashboard.php');
                    } else {
                        $error = Language::get('login_error');
                        ErrorHandler::log("Failed login attempt", ['username' => $username, 'ip' => Utils::getClientIP()]);
                    }
                } catch(Exception $e) {
                    ErrorHandler::log("Login error: " . $e->getMessage());
                    $error = Language::get('login_error');
                }
            }
        } catch(InvalidArgumentException $e) {
            ErrorHandler::log("Invalid input: " . $e->getMessage());
            $error = Language::get('login_error');
        }
    }
}

// Dil değiştirme
if(isset($_POST['change_language'])) {
    // CSRF token kontrolü
    if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        $selectedLanguage = $_POST['language'];
        Language::setLanguage($selectedLanguage);
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $selectedLanguage; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Language::get('login_title'); ?></title>
    <link rel="icon" type="image/svg+xml" href="assets/img/logo.svg">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="logo-container">
                    <img src="assets/img/logo.svg" alt="FST Cost" class="logo">
                </div>
            </div>
            
            <?php if($error): ?>
                <div class="error-message">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if($timeoutMessage): ?>
                <div class="timeout-message">
                    <?php echo $timeoutMessage; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="login-form">
                <input type="hidden" name="csrf_token" value="<?php echo Utils::generateCSRFToken(); ?>">
                
                <div class="form-group">
                    <label for="username"><?php echo Language::get('username'); ?>:</label>
                    <input type="text" id="username" name="username" required 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password"><?php echo Language::get('password'); ?>:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="language"><?php echo Language::get('language'); ?>:</label>
                    <select id="language" name="language" onchange="changeLanguage()">
                        <?php foreach(Language::getAvailableLanguages() as $code => $name): ?>
                            <option value="<?php echo $code; ?>" <?php echo $selectedLanguage == $code ? 'selected' : ''; ?>>
                                <?php echo $name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="remember" name="remember" 
                           <?php echo isset($_POST['remember']) ? 'checked' : ''; ?>>
                    <label for="remember"><?php echo Language::get('remember_me'); ?></label>
                </div>
                
                <button type="submit" class="login-button">
                    <?php echo Language::get('login_button'); ?>
                </button>
            </form>
        </div>
    </div>
    
    <script src="assets/js/login.js"></script>
</body>
</html>
