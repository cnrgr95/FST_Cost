<?php
// Ortak yardımcı fonksiyonlar
class Utils {
    
    /**
     * Input sanitization ve validation
     */
    public static function sanitizeInput($input, $type = 'string', $maxLength = 255) {
        if (empty($input)) {
            return null;
        }
        
        switch ($type) {
            case 'string':
                $input = trim($input);
                if (strlen($input) > $maxLength) {
                    throw new InvalidArgumentException("Input too long. Maximum length: {$maxLength}");
                }
                return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
                
            case 'int':
                if (!is_numeric($input)) {
                    throw new InvalidArgumentException("Invalid integer input");
                }
                return (int) $input;
                
            case 'email':
                $input = trim($input);
                if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                    throw new InvalidArgumentException("Invalid email format");
                }
                return $input;
                
            case 'username':
                $input = trim($input);
                if (!preg_match('/^[a-zA-Z0-9_]{3,50}$/', $input)) {
                    throw new InvalidArgumentException("Invalid username format");
                }
                return $input;
                
            default:
                return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        }
    }
    
    /**
     * CSRF token oluşturma ve doğrulama
     */
    public static function generateCSRFToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    public static function validateCSRFToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    
    /**
     * Güvenli redirect
     */
    public static function redirect($url, $permanent = false) {
        // Open redirect koruması
        $allowedHosts = [
            $_SERVER['HTTP_HOST'],
            'localhost',
            '127.0.0.1'
        ];
        
        $parsedUrl = parse_url($url);
        
        // Relative URL'ler güvenli
        if (!isset($parsedUrl['host'])) {
            header('Location: ' . $url, true, $permanent ? 301 : 302);
            exit();
        }
        
        // Absolute URL'ler için host kontrolü
        if (in_array($parsedUrl['host'], $allowedHosts)) {
            header('Location: ' . $url, true, $permanent ? 301 : 302);
            exit();
        }
        
        // Güvenli olmayan redirect
        ErrorHandler::log("Blocked unsafe redirect attempt", ['url' => $url]);
        header('Location: /', true, 302);
        exit();
    }
    
    /**
     * Password validation
     */
    public static function validatePassword($password) {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("Password must be at least 8 characters long");
        }
        
        if (!preg_match('/[A-Z]/', $password)) {
            throw new InvalidArgumentException("Password must contain at least one uppercase letter");
        }
        
        if (!preg_match('/[a-z]/', $password)) {
            throw new InvalidArgumentException("Password must contain at least one lowercase letter");
        }
        
        if (!preg_match('/[0-9]/', $password)) {
            throw new InvalidArgumentException("Password must contain at least one number");
        }
        
        return true;
    }
    
    /**
     * File upload validation
     */
    public static function validateFileUpload($file, $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'], $maxSize = 2097152) {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            throw new InvalidArgumentException("No file uploaded");
        }
        
        if ($file['size'] > $maxSize) {
            throw new InvalidArgumentException("File too large. Maximum size: " . ($maxSize / 1024 / 1024) . "MB");
        }
        
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            throw new InvalidArgumentException("Invalid file type. Allowed types: " . implode(', ', $allowedTypes));
        }
        
        // MIME type kontrolü
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        $allowedMimes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        ];
        
        if (!isset($allowedMimes[$fileExtension]) || $mimeType !== $allowedMimes[$fileExtension]) {
            throw new InvalidArgumentException("File MIME type mismatch");
        }
        
        return true;
    }
    
    /**
     * Random string generation
     */
    public static function generateRandomString($length = 32) {
        return bin2hex(random_bytes($length / 2));
    }
    
    /**
     * Time formatting
     */
    public static function formatTime($timestamp, $format = 'Y-m-d H:i:s') {
        return date($format, $timestamp);
    }
    
    /**
     * Array helper functions
     */
    public static function arrayGet($array, $key, $default = null) {
        return isset($array[$key]) ? $array[$key] : $default;
    }
    
    /**
     * JSON response helper
     */
    public static function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
    
    /**
     * Check if request is AJAX
     */
    public static function isAjaxRequest() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    
    /**
     * Get client IP address
     */
    public static function getClientIP() {
        $ipKeys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
        
        foreach ($ipKeys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
}
?>
