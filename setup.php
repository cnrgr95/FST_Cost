<?php
// Veritabanı kurulum test dosyası
echo "<h2>FST Cost - Veritabanı Kurulum Testi</h2>";
echo "<hr>";

try {
    require_once 'config/database.php';
    
    echo "<h3>1. Veritabanı Bağlantısı Test Ediliyor...</h3>";
    
    $db = new Database();
    $result = $db->createDatabase();
    
    if($result) {
        echo "<div style='color: green; font-weight: bold;'>✅ Veritabanı kurulumu başarılı!</div>";
        
        echo "<h3>2. Bağlantı Test Ediliyor...</h3>";
        $conn = $db->getConnection();
        
        if($conn) {
            echo "<div style='color: green; font-weight: bold;'>✅ Veritabanı bağlantısı başarılı!</div>";
            
            echo "<h3>3. Tablolar Kontrol Ediliyor...</h3>";
            
            // Users tablosunu kontrol et
            $stmt = $conn->query("SELECT COUNT(*) as count FROM users");
            $userCount = $stmt->fetch()['count'];
            echo "Users tablosu: {$userCount} kayıt<br>";
            
            // Sessions tablosunu kontrol et
            $stmt = $conn->query("SELECT COUNT(*) as count FROM sessions");
            $sessionCount = $stmt->fetch()['count'];
            echo "Sessions tablosu: {$sessionCount} kayıt<br>";
            
            echo "<h3>4. Admin Kullanıcısı Kontrol Ediliyor...</h3>";
            $stmt = $conn->prepare("SELECT username, full_name, language FROM users WHERE username = ?");
            $stmt->execute(['admin']);
            $admin = $stmt->fetch();
            
            if($admin) {
                echo "<div style='color: green; font-weight: bold;'>✅ Admin kullanıcısı mevcut!</div>";
                echo "Kullanıcı Adı: " . $admin['username'] . "<br>";
                echo "Ad Soyad: " . $admin['full_name'] . "<br>";
                echo "Dil: " . $admin['language'] . "<br>";
            } else {
                echo "<div style='color: red; font-weight: bold;'>❌ Admin kullanıcısı bulunamadı!</div>";
            }
            
            echo "<hr>";
            echo "<h3>🎉 Kurulum Tamamlandı!</h3>";
            echo "<p><strong>Giriş Bilgileri:</strong></p>";
            echo "<ul>";
            echo "<li>Kullanıcı Adı: <code>admin</code></li>";
            echo "<li>Şifre: <code>admin123</code></li>";
            echo "</ul>";
            echo "<p><a href='login.php' style='background: #667eea; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Login Sayfasına Git</a></p>";
            
        } else {
            echo "<div style='color: red; font-weight: bold;'>❌ Veritabanı bağlantısı başarısız!</div>";
        }
    } else {
        echo "<div style='color: red; font-weight: bold;'>❌ Veritabanı kurulumu başarısız!</div>";
    }
    
} catch(Exception $e) {
    echo "<div style='color: red; font-weight: bold;'>❌ Hata: " . $e->getMessage() . "</div>";
    echo "<h3>Olası Çözümler:</h3>";
    echo "<ul>";
    echo "<li>PostgreSQL servisinin çalıştığından emin olun</li>";
    echo "<li>Kullanıcı adı ve şifrenin doğru olduğunu kontrol edin</li>";
    echo "<li>PostgreSQL'in port 5432'de çalıştığını kontrol edin</li>";
    echo "<li>PHP PDO PostgreSQL extension'ının yüklü olduğunu kontrol edin</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<p><small>Bu dosyayı kurulum tamamlandıktan sonra silebilirsiniz.</small></p>";
?>
