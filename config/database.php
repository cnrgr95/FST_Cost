<?php
// PostgreSQL veritabanı bağlantı ayarları
require_once 'config.php';

class Database {
    private $connection;
    
    public function __construct() {
        // Constructor'da bağlantı kurma, sadece createDatabase çağrıldığında
    }
    
    private function connect() {
        try {
            // Veritabanı bağlantısı
            $dsn = Config::getDatabaseDSN();
            $this->connection = new PDO($dsn, Config::DB_USER, Config::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            ErrorHandler::log("Database connection error: " . $e->getMessage());
            die("Veritabanı bağlantı hatası: " . $e->getMessage());
        }
    }
    
    public function getConnection() {
        if(!$this->connection) {
            $this->connect();
        }
        return $this->connection;
    }
    
    public function createDatabase() {
        try {
            // Önce veritabanı olmadan bağlan
            $dsn = "pgsql:host=" . Config::DB_HOST . ";port=5432";
            $conn = new PDO($dsn, Config::DB_USER, Config::DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Veritabanının var olup olmadığını kontrol et
            $checkDb = $conn->prepare("SELECT 1 FROM pg_database WHERE datname = ?");
            $checkDb->execute([Config::DB_NAME]);
            
            if($checkDb->rowCount() == 0) {
                // Veritabanını oluştur
                $sql = "CREATE DATABASE " . Config::DB_NAME;
                $conn->exec($sql);
            }
            
            // Yeni veritabanına bağlan
            $this->connect();
            
            // Kullanıcı tablosunu oluştur
            $this->createTables();
            
            return true;
        } catch(PDOException $e) {
            ErrorHandler::log("Database creation error: " . $e->getMessage());
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
