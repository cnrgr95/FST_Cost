<?php
// Error handling ve logging sistemi
require_once 'config.php';

class ErrorHandler {
    private static $logFile;
    private static $isProduction;
    
    public static function init($isProduction = null) {
        self::$isProduction = $isProduction ?? Config::isProduction();
        self::$logFile = Config::getErrorLogFile();
        
        // Error reporting ayarları
        error_reporting(Config::getErrorReporting());
        ini_set('display_errors', Config::getDisplayErrors());
        ini_set('log_errors', Config::getLogErrors());
        ini_set('error_log', self::$logFile);
        
        // Custom error handler
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleException']);
        register_shutdown_function([self::class, 'handleShutdown']);
    }
    
    public static function handleError($severity, $message, $file, $line) {
        if (!(error_reporting() & $severity)) {
            return false;
        }
        
        $error = [
            'type' => 'Error',
            'severity' => $severity,
            'message' => $message,
            'file' => $file,
            'line' => $line,
            'timestamp' => date('Y-m-d H:i:s'),
            'url' => $_SERVER['REQUEST_URI'] ?? 'CLI',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
        ];
        
        self::logError($error);
        
        if (!self::$isProduction) {
            echo "<div style='background:#f8d7da;color:#721c24;padding:10px;margin:10px;border:1px solid #f5c6cb;border-radius:4px;'>";
            echo "<strong>Error:</strong> {$message} in <strong>{$file}</strong> on line <strong>{$line}</strong>";
            echo "</div>";
        }
        
        return true;
    }
    
    public static function handleException($exception) {
        $error = [
            'type' => 'Exception',
            'severity' => 'Fatal',
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString(),
            'timestamp' => date('Y-m-d H:i:s'),
            'url' => $_SERVER['REQUEST_URI'] ?? 'CLI',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
        ];
        
        self::logError($error);
        
        if (!self::$isProduction) {
            echo "<div style='background:#f8d7da;color:#721c24;padding:10px;margin:10px;border:1px solid #f5c6cb;border-radius:4px;'>";
            echo "<strong>Exception:</strong> {$exception->getMessage()} in <strong>{$exception->getFile()}</strong> on line <strong>{$exception->getLine()}</strong>";
            echo "<pre style='margin-top:10px;font-size:12px;'>{$exception->getTraceAsString()}</pre>";
            echo "</div>";
        } else {
            // Production'da generic error sayfası göster
            http_response_code(500);
            include 'error_pages/500.php';
        }
    }
    
    public static function handleShutdown() {
        $error = error_get_last();
        if ($error && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE])) {
            self::handleError($error['type'], $error['message'], $error['file'], $error['line']);
        }
    }
    
    private static function logError($error) {
        // Log dizinini oluştur
        $logDir = dirname(self::$logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        $logEntry = json_encode($error) . "\n";
        file_put_contents(self::$logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
    
    public static function log($message, $context = []) {
        $log = [
            'type' => 'Log',
            'message' => $message,
            'context' => $context,
            'timestamp' => date('Y-m-d H:i:s'),
            'url' => $_SERVER['REQUEST_URI'] ?? 'CLI'
        ];
        
        self::logError($log);
    }
}

// Global error_log fonksiyonu
if (!function_exists('error_log')) {
    function error_log($message) {
        ErrorHandler::log($message);
    }
}
?>
