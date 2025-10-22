<?php
// Sidebar bileşeni
if(!isset($user)) {
    // Kullanıcı bilgileri yoksa varsayılan değerler
    $user = [
        'username' => 'User',
        'full_name' => 'User',
        'language' => 'en'
    ];
}

// Aktif sayfa kontrolü
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="assets/img/logo.svg" alt="FST Cost" class="sidebar-logo">
    </div>
    
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="dashboard.php" class="sidebar-menu-link <?php echo $currentPage == 'dashboard' ? 'active' : ''; ?>">
                    <span class="sidebar-menu-icon">🏠</span>
                    <span class="sidebar-menu-text"><?php echo Language::get('dashboard_title'); ?></span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon">📊</span>
                    <span class="sidebar-menu-text"><?php echo Language::get('cost_calculation'); ?></span>
                </a>
                <ul class="sidebar-submenu">
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('new_calculation'); ?></a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('calculation_history'); ?></a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon">📈</span>
                    <span class="sidebar-menu-text"><?php echo Language::get('reports'); ?></span>
                </a>
                <ul class="sidebar-submenu">
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('monthly_reports'); ?></a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('annual_reports'); ?></a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon">👥</span>
                    <span class="sidebar-menu-text"><?php echo Language::get('users'); ?></span>
                </a>
                <ul class="sidebar-submenu">
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('user_list'); ?></a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('add_user'); ?></a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon">⚙️</span>
                    <span class="sidebar-menu-text"><?php echo Language::get('settings'); ?></span>
                </a>
                <ul class="sidebar-submenu">
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('profile'); ?></a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="#" class="sidebar-submenu-link"><?php echo Language::get('system_settings'); ?></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <div class="sidebar-user-info">
            <div class="sidebar-user-avatar" data-name="<?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?>">
                <?php echo strtoupper(substr($user['full_name'] ?: $user['username'], 0, 1)); ?>
            </div>
            <div class="sidebar-user-details">
                <h4><?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?></h4>
                <p><?php echo htmlspecialchars($user['username']); ?></p>
            </div>
        </div>
        <button class="sidebar-logout">
            <?php echo Language::get('logout'); ?>
        </button>
    </div>
</aside>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay"></div>
