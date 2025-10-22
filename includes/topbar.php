<?php
// Topbar bileşeni
if(!isset($user)) {
    // Kullanıcı bilgileri yoksa varsayılan değerler
    $user = [
        'username' => 'User',
        'full_name' => 'User',
        'language' => 'en'
    ];
}
?>
<!-- Topbar -->
<header class="topbar">
    <div class="topbar-content">
        <div class="topbar-left">
            <button class="topbar-menu-toggle" aria-label="Menu">
                <ion-icon name="menu-outline"></ion-icon>
            </button>
        </div>
        
        <div class="topbar-right">
            <!-- Dil Seçici -->
            <div class="topbar-language">
                <select class="language-selector" onchange="changeLanguage(this.value)">
                    <option value="en" <?php echo $selectedLanguage == 'en' ? 'selected' : ''; ?>>EN</option>
                    <option value="tr" <?php echo $selectedLanguage == 'tr' ? 'selected' : ''; ?>>TR</option>
                </select>
            </div>
            
            <!-- Karanlık/Aydınlık Mod -->
            <button class="topbar-btn theme-toggle" onclick="toggleTheme()" title="<?php echo Language::get('toggle_theme'); ?>">
                <ion-icon name="moon-outline" class="theme-icon"></ion-icon>
            </button>
            
            <!-- Tam Ekran (Sadece Desktop) -->
            <button class="topbar-btn fullscreen-toggle" onclick="toggleFullscreen()" title="<?php echo Language::get('fullscreen'); ?>">
                <ion-icon name="expand-outline"></ion-icon>
            </button>
            
            <!-- Çıkış Yap -->
            <button class="topbar-btn logout-btn" onclick="logout()" title="<?php echo Language::get('logout'); ?>">
                <ion-icon name="log-out-outline"></ion-icon>
            </button>
        </div>
    </div>
</header>
