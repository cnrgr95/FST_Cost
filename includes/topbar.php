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
        </div>
        
        <div class="topbar-right">
            <div class="topbar-user-info">
                <span class="welcome-text">
                    <?php echo Language::get('welcome'); ?>, 
                    <strong><?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?></strong>
                </span>
                <div class="user-avatar" data-name="<?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?>">
                    <?php echo strtoupper(substr($user['full_name'] ?: $user['username'], 0, 1)); ?>
                </div>
            </div>
            
            <div class="topbar-actions">
                <button class="topbar-menu-toggle" aria-label="Menu">
                    ☰
                </button>
                <a href="?logout=1" class="topbar-btn logout-btn">
                    <?php echo Language::get('logout'); ?>
                </a>
            </div>
        </div>
    </div>
</header>
