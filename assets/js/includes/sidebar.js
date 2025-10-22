// Sidebar JavaScript - Optimized and Clean
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar elements
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const menuItems = document.querySelectorAll('.sidebar-menu-link');
    const submenuLinks = document.querySelectorAll('.sidebar-submenu-link');
    const mainContent = document.querySelector('.main-content');
    
    // Constants
    const MOBILE_BREAKPOINT = 768;
    const ANIMATION_DURATION = 300;
    
    // Utility functions
    function isMobile() {
        return window.innerWidth <= MOBILE_BREAKPOINT;
    }
    
    function closeAllSubmenus() {
        document.querySelectorAll('.sidebar-submenu').forEach(menu => {
            menu.classList.remove('open');
            const parentItem = menu.closest('.sidebar-menu-item');
            if(parentItem) {
                parentItem.classList.remove('open');
            }
        });
    }
    
    function setActiveMenuItem(activeItem) {
        menuItems.forEach(menuItem => {
            menuItem.classList.remove('active');
        });
        if(activeItem) {
            activeItem.classList.add('active');
        }
    }
    
    function updateMainContentMargin() {
        if(!mainContent) return;
        
        const isOpen = sidebar && sidebar.classList.contains('open');
        
        if(isOpen) {
            mainContent.classList.remove('sidebar-closed');
            document.body.classList.add('sidebar-open');
        } else {
            mainContent.classList.add('sidebar-closed');
            document.body.classList.remove('sidebar-open');
        }
    }
    
    function closeSidebarOnMobile() {
        if(isMobile() && window.sidebarControl) {
            window.sidebarControl.close();
        }
    }
    
    // Menu item click handlers
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const submenu = this.nextElementSibling;
            
            // Check if it has a submenu
            if(submenu && submenu.classList.contains('sidebar-submenu')) {
                e.preventDefault();
                
                // Toggle submenu
                const isOpen = submenu.classList.contains('open');
                closeAllSubmenus();
                
                if(!isOpen) {
                    submenu.classList.add('open');
                    this.parentElement.classList.add('open');
                }
                
                // Update dropdown icon
                const dropdownIcon = this.querySelector('.sidebar-dropdown-icon');
                if(dropdownIcon) {
                    dropdownIcon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
                }
            } else {
                // Regular link - close sidebar on mobile
                closeSidebarOnMobile();
            }
            
            // Set active state
            setActiveMenuItem(this);
        });
        
        // Keyboard navigation support
        item.addEventListener('keydown', function(e) {
            if(e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
        
        // Focus management
        item.addEventListener('focus', function() {
            this.style.outline = '2px solid var(--accent-color)';
            this.style.outlineOffset = '-2px';
        });
        
        item.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });
    
    // Submenu link click handlers
    submenuLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Close sidebar on mobile
            closeSidebarOnMobile();
            
            // Close submenu
            const submenu = this.closest('.sidebar-submenu');
            if(submenu) {
                submenu.classList.remove('open');
                const parentItem = submenu.closest('.sidebar-menu-item');
                if(parentItem) {
                    parentItem.classList.remove('open');
                }
            }
            
            // Set active state
            setActiveMenuItem(this);
        });
        
        // Keyboard navigation
        link.addEventListener('keydown', function(e) {
            if(e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
    
    // Overlay click handler
    if(sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            if(window.sidebarControl) {
                window.sidebarControl.close();
            }
        });
        
        // Keyboard support for overlay
        sidebarOverlay.addEventListener('keydown', function(e) {
            if(e.key === 'Escape' && window.sidebarControl) {
                window.sidebarControl.close();
            }
        });
    }
    
    // User avatar initialization
    const userAvatar = document.querySelector('.sidebar-user-avatar');
    if(userAvatar) {
        const userName = userAvatar.getAttribute('data-name') || 'U';
        userAvatar.textContent = userName.charAt(0).toUpperCase();
        
        // Add accessibility attributes
        userAvatar.setAttribute('aria-label', `User avatar for ${userName}`);
        userAvatar.setAttribute('role', 'img');
    }
    
    // Mutation observer for sidebar state changes
    if(sidebar) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if(mutation.attributeName === 'class') {
                    updateMainContentMargin();
                }
            });
        });
        
        observer.observe(sidebar, { 
            attributes: true,
            attributeFilter: ['class']
        });
    }
    
    // Window resize handler
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            updateMainContentMargin();
            
            // Close sidebar on mobile when resizing to desktop
            if(!isMobile() && sidebar && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                if(sidebarOverlay) {
                    sidebarOverlay.classList.remove('open');
                }
            }
        }, 100);
    });
    
    // Escape key handler
    document.addEventListener('keydown', function(e) {
        if(e.key === 'Escape' && isMobile() && sidebar && sidebar.classList.contains('open')) {
            if(window.sidebarControl) {
                window.sidebarControl.close();
            }
        }
    });
    
    // Initial state update
    updateMainContentMargin();
    
    // Performance optimization: Use passive event listeners where possible
    const passiveEvents = ['scroll', 'touchstart', 'touchmove'];
    passiveEvents.forEach(eventType => {
        document.addEventListener(eventType, function() {}, { passive: true });
    });
});

// Sidebar specific functionality
window.sidebarControl = window.sidebarControl || {};
