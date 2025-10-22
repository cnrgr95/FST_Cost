<?php
// Production konfigürasyon dosyası
class Config {
    
    // Environment settings
    const ENVIRONMENT = 'development'; // 'development' or 'production'
    
    // Database settings
    const DB_HOST = 'localhost';
    const DB_USER = 'postgres';
    const DB_PASS = '123456789';
    const DB_NAME = 'fst_cost';
    
    // Security settings
    const SESSION_TIMEOUT = 7200; // 2 hours in seconds
    const CSRF_TOKEN_LIFETIME = 3600; // 1 hour
    const MAX_LOGIN_ATTEMPTS = 5;
    const LOGIN_LOCKOUT_TIME = 900; // 15 minutes
    
    // File upload settings
    const MAX_FILE_SIZE = 2097152; // 2MB
    const ALLOWED_FILE_TYPES = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    const UPLOAD_PATH = 'uploads/';
    
    // Email settings (if needed)
    const SMTP_HOST = 'localhost';
    const SMTP_PORT = 587;
    const SMTP_USERNAME = '';
    const SMTP_PASSWORD = '';
    const FROM_EMAIL = 'noreply@fstcost.com';
    
    // Logging settings
    const LOG_LEVEL = 'INFO'; // DEBUG, INFO, WARNING, ERROR
    const LOG_FILE = 'logs/application.log';
    const LOG_MAX_SIZE = 10485760; // 10MB
    const LOG_MAX_FILES = 5;
    
    // Cache settings
    const CACHE_ENABLED = true;
    const CACHE_TTL = 3600; // 1 hour
    
    // Rate limiting
    const RATE_LIMIT_ENABLED = true;
    const RATE_LIMIT_REQUESTS = 100; // per minute
    const RATE_LIMIT_WINDOW = 60; // seconds
    
    /**
     * Check if running in production
     */
    public static function isProduction() {
        return self::ENVIRONMENT === 'production';
    }
    
    /**
     * Check if running in development
     */
    public static function isDevelopment() {
        return self::ENVIRONMENT === 'development';
    }
    
    /**
     * Get database DSN
     */
    public static function getDatabaseDSN() {
        return "pgsql:host=" . self::DB_HOST . ";port=5432;dbname=" . self::DB_NAME;
    }
    
    /**
     * Get error reporting level
     */
    public static function getErrorReporting() {
        return self::isProduction() ? 0 : E_ALL;
    }
    
    /**
     * Get display errors setting
     */
    public static function getDisplayErrors() {
        return self::isProduction() ? 0 : 1;
    }
    
    /**
     * Get log errors setting
     */
    public static function getLogErrors() {
        return 1; // Always log errors
    }
    
    /**
     * Get error log file path
     */
    public static function getErrorLogFile() {
        return self::LOG_FILE;
    }
}
?>
