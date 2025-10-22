<?php
/**
 * Sidebar Component - Optimized and Clean
 * 
 * This component renders the main navigation sidebar with:
 * - Responsive design
 * - Accessibility features
 * - Security measures
 * - Performance optimizations
 */

// User data validation and defaults
if(!isset($user) || !is_array($user)) {
    $user = [
        'username' => 'User',
        'full_name' => 'User',
        'language' => 'en'
    ];
}

// Current page detection
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

// Menu configuration
$menuItems = [
    'dashboard' => [
        'url' => 'dashboard.php',
        'icon' => 'home-outline',
        'text' => 'dashboard_title',
        'active' => $currentPage === 'dashboard'
    ],
    'cost_calculation' => [
        'url' => '#',
        'icon' => 'calculator-outline',
        'text' => 'cost_calculation',
        'active' => false
    ],
    'tour_list' => [
        'url' => '#',
        'icon' => 'list-outline',
        'text' => 'tour_list',
        'active' => false
    ],
    'definitions' => [
        'url' => '#',
        'icon' => 'library-outline',
        'text' => 'definitions',
        'active' => false,
        'submenu' => [
            'users' => ['icon' => 'people-outline', 'text' => 'users'],
            'cost' => ['icon' => 'cash-outline', 'text' => 'cost'],
            'tour' => ['icon' => 'airplane-outline', 'text' => 'tour'],
            'currency' => ['icon' => 'card-outline', 'text' => 'currency'],
            'country' => ['icon' => 'flag-outline', 'text' => 'country'],
            'region' => ['icon' => 'location-outline', 'text' => 'region'],
            'department' => ['icon' => 'business-outline', 'text' => 'department'],
            'language_settings' => ['icon' => 'language-outline', 'text' => 'language_settings']
        ]
    ],
    'settings' => [
        'url' => '#',
        'icon' => 'settings-outline',
        'text' => 'settings',
        'active' => false,
        'submenu' => [
            'system_settings' => ['icon' => 'cog-outline', 'text' => 'system_settings'],
            'cash_settings' => ['icon' => 'wallet-outline', 'text' => 'cash_settings']
        ]
    ],
    'support' => [
        'url' => '#',
        'icon' => 'help-circle-outline',
        'text' => 'support',
        'active' => false
    ]
];

// User data sanitization
$userName = htmlspecialchars($user['full_name'] ?: $user['username'], ENT_QUOTES, 'UTF-8');
$userInitial = strtoupper(substr($userName, 0, 1));
?>

<!-- Sidebar -->
<aside class="sidebar" role="navigation" aria-label="<?php echo Language::get('main_navigation'); ?>">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <img src="assets/img/logo.svg" 
             alt="<?php echo Language::get('app_name'); ?>" 
             class="sidebar-logo"
             loading="lazy"
             width="280" 
             height="40">
    </div>
    
    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav" role="navigation" aria-label="<?php echo Language::get('main_navigation'); ?>">
        <ul class="sidebar-menu" role="menubar">
            <?php foreach($menuItems as $key => $item): ?>
                <li class="sidebar-menu-item" role="none">
                    <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>" 
                       class="sidebar-menu-link <?php echo $item['active'] ? 'active' : ''; ?>"
                       role="menuitem"
                       <?php if($item['url'] === '#'): ?>
                       tabindex="0"
                       aria-haspopup="<?php echo isset($item['submenu']) ? 'true' : 'false'; ?>"
                       <?php endif; ?>>
                        <ion-icon name="<?php echo $item['icon']; ?>" 
                                  class="sidebar-menu-icon" 
                                  aria-hidden="true"></ion-icon>
                        <span class="sidebar-menu-text"><?php echo Language::get($item['text']); ?></span>
                        <?php if(isset($item['submenu'])): ?>
                            <ion-icon name="chevron-down-outline" 
                                      class="sidebar-dropdown-icon" 
                                      aria-hidden="true"></ion-icon>
                        <?php endif; ?>
                    </a>
                    
                    <?php if(isset($item['submenu'])): ?>
                        <ul class="sidebar-submenu" role="menu" aria-label="<?php echo Language::get($item['text']); ?>">
                            <?php foreach($item['submenu'] as $subKey => $subItem): ?>
                                <li class="sidebar-submenu-item" role="none">
                                    <a href="#" 
                                       class="sidebar-submenu-link"
                                       role="menuitem"
                                       tabindex="0">
                                        <ion-icon name="<?php echo $subItem['icon']; ?>" 
                                                  class="sidebar-submenu-icon" 
                                                  aria-hidden="true"></ion-icon>
                                        <?php echo Language::get($subItem['text']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    
    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="sidebar-user-info">
            <div class="sidebar-user-avatar" 
                 data-name="<?php echo $userName; ?>"
                 role="img" 
                 aria-label="<?php echo sprintf(Language::get('user_avatar'), $userName); ?>">
                <?php echo $userInitial; ?>
            </div>
            <div class="sidebar-user-details">
                <h4><?php echo $userName; ?></h4>
                <p><?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </div>
</aside>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" 
     role="button" 
     aria-label="<?php echo Language::get('close_sidebar'); ?>"
     tabindex="0"></div>
