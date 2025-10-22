// Common JavaScript utilities for FST Cost application
(function() {
    'use strict';
    
    // Global translation function
    window.getTranslation = function(key) {
        const translations = {
            'en': {
                'confirm_logout': 'Are you sure you want to logout?',
                'session_timeout': 'Your session has expired due to inactivity. Please login again.',
                'cost_calculation_module': 'Cost calculation module will be active soon!',
                'reports_module': 'Reports module will be active soon!',
                'users_module': 'User management module will be active soon!',
                'settings_module': 'Settings module will be active soon!',
                'feature_coming_soon': 'This feature will be available soon!'
            },
            'tr': {
                'confirm_logout': 'Çıkış yapmak istediğinizden emin misiniz?',
                'session_timeout': 'Oturumunuz hareketsizlik nedeniyle sona erdi. Lütfen tekrar giriş yapın.',
                'cost_calculation_module': 'Maliyet hesaplama modülü yakında aktif olacak!',
                'reports_module': 'Raporlar modülü yakında aktif olacak!',
                'users_module': 'Kullanıcı yönetimi modülü yakında aktif olacak!',
                'settings_module': 'Ayarlar modülü yakında aktif olacak!',
                'feature_coming_soon': 'Bu özellik yakında aktif olacak!'
            }
        };
        
        const htmlLang = document.documentElement.lang || 'en';
        return translations[htmlLang] ? translations[htmlLang][key] : key;
    };
    
    // Global notification system
    window.showNotification = function(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        const colors = {
            'info': '#667eea',
            'success': '#28a745',
            'error': '#dc3545',
            'warning': '#ffc107'
        };
        
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: ${colors[type] || colors.info};
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            z-index: 1002;
            font-size: 14px;
            font-weight: 500;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 300px;
        `;
        
        document.body.appendChild(notification);
        
        // Animation
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if(document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    };
    
    // Global sidebar control
    window.sidebarControl = {
        toggle: function() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            if(sidebar) {
                sidebar.classList.toggle('open');
                if(overlay) {
                    overlay.classList.toggle('open');
                }
                document.body.classList.toggle('sidebar-open');
            }
        },
        
        close: function() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            if(sidebar) {
                sidebar.classList.remove('open');
                if(overlay) {
                    overlay.classList.remove('open');
                }
                document.body.classList.remove('sidebar-open');
            }
        },
        
        open: function() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            if(sidebar) {
                sidebar.classList.add('open');
                if(overlay) {
                    overlay.classList.add('open');
                }
                document.body.classList.add('sidebar-open');
            }
        }
    };
    
    // Global keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Escape key - close sidebar and notifications
        if(e.key === 'Escape') {
            window.sidebarControl.close();
            
            // Close notifications
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if(document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            });
        }
        
        // Ctrl + M - toggle sidebar
        if(e.ctrlKey && e.key === 'm') {
            e.preventDefault();
            window.sidebarControl.toggle();
        }
        
        // Ctrl + Q - logout
        if(e.ctrlKey && e.key === 'q') {
            e.preventDefault();
            if(typeof window.logout === 'function') {
                window.logout();
            }
        }
    });
    
    // Global responsive handler
    window.handleResize = function() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        
        if(window.innerWidth > 768) {
            // Desktop - keep sidebar open
            if(sidebar) {
                sidebar.classList.add('open');
            }
            if(overlay) {
                overlay.classList.remove('open');
            }
            document.body.classList.add('sidebar-open');
        } else {
            // Mobile - close sidebar
            if(sidebar) {
                sidebar.classList.remove('open');
            }
            if(overlay) {
                overlay.classList.remove('open');
            }
            document.body.classList.remove('sidebar-open');
        }
    };
    
    // Global theme toggle
    window.toggleTheme = function() {
        const body = document.body;
        const themeIcon = document.querySelector('.theme-icon');
        
        if(body.classList.contains('dark-theme')) {
            body.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light');
            if(themeIcon) {
                themeIcon.setAttribute('name', 'moon-outline');
            }
        } else {
            body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark');
            if(themeIcon) {
                themeIcon.setAttribute('name', 'sunny-outline');
            }
        }
    };
    
    // Global fullscreen toggle
    window.toggleFullscreen = function() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch(err => {
                // Fullscreen error - silently handle
                error_log("Fullscreen error: " + err.message);
            });
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    };
    
    // Initialize theme from localStorage
    function initializeTheme() {
        const savedTheme = localStorage.getItem('theme');
        const themeIcon = document.querySelector('.theme-icon');
        
        if(savedTheme === 'dark') {
            document.body.classList.add('dark-theme');
            if(themeIcon) {
                themeIcon.setAttribute('name', 'sunny-outline');
            }
        } else {
            document.body.classList.remove('dark-theme');
            if(themeIcon) {
                themeIcon.setAttribute('name', 'moon-outline');
            }
        }
    }
    
    // Initialize responsive handling
    window.addEventListener('resize', window.handleResize);
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Önce responsive kontrolü yap
        window.handleResize();
        
        // Sonra tema kontrolü yap
        initializeTheme();
        
        // Sidebar'ın desktop'ta açık olduğundan emin ol
        const sidebar = document.querySelector('.sidebar');
        if(sidebar && window.innerWidth > 768) {
            sidebar.classList.add('open');
            document.body.classList.add('sidebar-open');
        }
    });
    
})();
