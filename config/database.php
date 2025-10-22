<?php
// PostgreSQL veritabanı bağlantı ayarları
define('DB_HOST', 'localhost');
define('DB_USER', 'postgres');
define('DB_PASS', '123456789');
define('DB_NAME', 'fst_cost');

class Database {
    private $connection;
    
    public function __construct() {
        // Constructor'da bağlantı kurma, sadece createDatabase çağrıldığında
    }
    
    private function connect() {
        try {
            // Veritabanı bağlantısı
            $dsn = "pgsql:host=" . DB_HOST . ";port=5432;dbname=" . DB_NAME;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Veritabanı bağlantı hatası: " . $e->getMessage());
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function createDatabase() {
        try {
            // Önce veritabanı olmadan bağlan
            $dsn = "pgsql:host=" . DB_HOST . ";port=5432";
            $conn = new PDO($dsn, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Veritabanının var olup olmadığını kontrol et
            $checkDb = $conn->prepare("SELECT 1 FROM pg_database WHERE datname = ?");
            $checkDb->execute([DB_NAME]);
            
            if($checkDb->rowCount() == 0) {
                // Veritabanını oluştur
                $sql = "CREATE DATABASE " . DB_NAME;
                $conn->exec($sql);
            }
            
            // Yeni veritabanına bağlan
            $this->connect();
            
            // Kullanıcı tablosunu oluştur
            $this->createTables();
            
            return true;
        } catch(PDOException $e) {
            die("Veritabanı oluşturma hatası: " . $e->getMessage());
        }
    }
    
    private function createTables() {
        $sql = "
        CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100),
            full_name VARCHAR(100),
            language VARCHAR(10) DEFAULT 'en',
            remember_token VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS sessions (
            id SERIAL PRIMARY KEY,
            user_id INTEGER REFERENCES users(id),
            session_token VARCHAR(255) UNIQUE NOT NULL,
            expires_at TIMESTAMP NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ";
        
        $this->connection->exec($sql);
        
        // Varsayılan admin kullanıcısı oluştur
        $this->createDefaultUser();
    }
    
    private function createDefaultUser() {
        $checkUser = $this->connection->prepare("SELECT id FROM users WHERE username = ?");
        $checkUser->execute(['admin']);
        
        if($checkUser->rowCount() == 0) {
            $password = password_hash('admin123', PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password, full_name, language) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['admin', $password, 'Administrator', 'en']);
        }
    }
}
?>
