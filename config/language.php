<?php
// Çok dilli sistem için dil yönetimi
class Language {
    private static $currentLanguage = 'en';
    private static $translations = [];
    
    public static function setLanguage($lang) {
        self::$currentLanguage = $lang;
        self::loadTranslations();
    }
    
    public static function getCurrentLanguage() {
        return self::$currentLanguage;
    }
    
    private static function loadTranslations() {
        $langFile = "languages/" . self::$currentLanguage . ".json";
        if(file_exists($langFile)) {
            $content = file_get_contents($langFile);
            self::$translations = json_decode($content, true);
        } else {
            // Varsayılan olarak İngilizce yükle
            $defaultFile = "languages/en.json";
            if(file_exists($defaultFile)) {
                $content = file_get_contents($defaultFile);
                self::$translations = json_decode($content, true);
            }
        }
    }
    
    public static function get($key, $default = null) {
        if(isset(self::$translations[$key])) {
            return self::$translations[$key];
        }
        return $default ?: $key;
    }
    
    public static function getAvailableLanguages() {
        return [
            'en' => 'English',
            'tr' => 'Türkçe'
        ];
    }
}
?>
