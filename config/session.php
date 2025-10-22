<?php
// Session kontrolü ve "Beni hatırla" özelliği
session_start();

// Session timeout kontrolü (2 saat = 7200 saniye)
if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 7200)) {
    // Session süresi dolmuş, otomatik çıkış
    session_unset();
    session_destroy();
    setcookie('remember_token', '', time() - 3600, '/');
    header('Location: login.php?timeout=1');
    exit();
}

// Session aktivitesini güncelle
$_SESSION['last_activity'] = time();

// Eğer session yoksa ama cookie varsa, otomatik giriş yap
if(!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    require_once 'config/database.php';
    
    $db = new Database();
    $db->createDatabase(); // Veritabanını oluştur ve bağlan
    $conn = $db->getConnection();
    
    $stmt = $conn->prepare("
        SELECT u.id, u.username, u.full_name, u.language 
        FROM users u 
        JOIN sessions s ON u.id = s.user_id 
        WHERE s.session_token = ? AND s.expires_at > NOW()
    ");
    $stmt->execute([$_COOKIE['remember_token']]);
    $user = $stmt->fetch();
    
    if($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['language'] = $user['language'];
        $_SESSION['last_activity'] = time(); // Aktivite zamanını güncelle
    } else {
        // Geçersiz token, cookie'yi sil
        setcookie('remember_token', '', time() - 3600, '/');
    }
}

// Session kontrolü fonksiyonu
function checkSession() {
    if(!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
}

// Çıkış fonksiyonu
function logout() {
    if(isset($_COOKIE['remember_token'])) {
        require_once 'config/database.php';
        $db = new Database();
        $db->createDatabase(); // Veritabanını oluştur ve bağlan
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("DELETE FROM sessions WHERE session_token = ?");
        $stmt->execute([$_COOKIE['remember_token']]);
        
        setcookie('remember_token', '', time() - 3600, '/');
    }
    
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
