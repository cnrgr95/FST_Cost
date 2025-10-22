// Sidebar JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar elemanlarını seç
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const menuItems = document.querySelectorAll('.sidebar-menu-link');
    const submenuItems = document.querySelectorAll('.sidebar-menu-item');
    const logoutBtn = document.querySelector('.sidebar-logout');
    
    // Çeviri fonksiyonu
    function getTranslation(key) {
        const translations = {
            'en': {
                'confirm_logout': 'Are you sure you want to logout?',
                'session_timeout': 'Your session has expired due to inactivity. Please login again.'
            },
            'tr': {
                'confirm_logout': 'Çıkış yapmak istediğinizden emin misiniz?',
                'session_timeout': 'Oturumunuz hareketsizlik nedeniyle sona erdi. Lütfen tekrar giriş yapın.'
            }
        };
        
        const htmlLang = document.documentElement.lang || 'en';
        return translations[htmlLang] ? translations[htmlLang][key] : key;
    }
    
    // Sidebar açma/kapama fonksiyonu
    function toggleSidebar() {
        if(sidebar) {
            sidebar.classList.toggle('open');
            if(sidebarOverlay) {
                sidebarOverlay.classList.toggle('open');
            }
            document.body.classList.toggle('sidebar-open');
        }
    }
    
    // Sidebar kapatma fonksiyonu
    function closeSidebar() {
        if(sidebar) {
            sidebar.classList.remove('open');
            if(sidebarOverlay) {
                sidebarOverlay.classList.remove('open');
            }
            document.body.classList.remove('sidebar-open');
        }
    }
    
    // Menu item tıklama olayları
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const submenu = this.nextElementSibling;
            
            // Eğer alt menü varsa
            if(submenu && submenu.classList.contains('sidebar-submenu')) {
                e.preventDefault();
                submenu.classList.toggle('open');
                
                // Diğer alt menüleri kapat
                document.querySelectorAll('.sidebar-submenu').forEach(menu => {
                    if(menu !== submenu) {
                        menu.classList.remove('open');
                    }
                });
            } else {
                // Normal link - sidebar'ı kapat (mobilde)
                if(window.innerWidth <= 768) {
                    closeSidebar();
                }
            }
            
            // Aktif menü işaretleme
            menuItems.forEach(menuItem => {
                menuItem.classList.remove('active');
            });
            this.classList.add('active');
        });
        
        // Hover efekti
        item.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#34495e';
        });
        
        item.addEventListener('mouseleave', function() {
            if(!this.classList.contains('active')) {
                this.style.backgroundColor = '';
            }
        });
    });
    
    // Alt menü linklerine tıklama
    const submenuLinks = document.querySelectorAll('.sidebar-submenu-link');
    submenuLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Mobilde sidebar'ı kapat
            if(window.innerWidth <= 768) {
                closeSidebar();
            }
            
            // Alt menüyü kapat
            const submenu = this.closest('.sidebar-submenu');
            if(submenu) {
                submenu.classList.remove('open');
            }
        });
    });
    
    // Çıkış butonu
    if(logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if(confirm(getTranslation('confirm_logout'))) {
                window.location.href = '?logout=1';
            }
        });
    }
    
    // Overlay tıklama ile kapatma
    if(sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }
    
    // Klavye kısayolları
    document.addEventListener('keydown', function(e) {
        // Escape ile sidebar kapat
        if(e.key === 'Escape') {
            closeSidebar();
        }
        
        // Ctrl + M ile sidebar aç/kapat
        if(e.ctrlKey && e.key === 'm') {
            e.preventDefault();
            toggleSidebar();
        }
    });
    
    // Responsive kontrol
    function handleResize() {
        if(window.innerWidth > 768) {
            // Desktop - sidebar'ı açık tut
            if(sidebar) {
                sidebar.classList.add('open');
                document.body.classList.add('sidebar-open');
            }
        } else {
            // Mobile - sidebar'ı kapat
            closeSidebar();
        }
    }
    
    window.addEventListener('resize', handleResize);
    
    // Sayfa yüklendiğinde kontrol et
    handleResize();
    
    // Kullanıcı avatarı oluştur
    const userAvatar = document.querySelector('.sidebar-user-avatar');
    if(userAvatar) {
        const userName = userAvatar.getAttribute('data-name') || 'U';
        userAvatar.textContent = userName.charAt(0).toUpperCase();
    }
    
    // Sidebar scroll efekti
    if(sidebar) {
        let lastScrollTop = 0;
        sidebar.addEventListener('scroll', function() {
            const scrollTop = this.scrollTop;
            
            // Scroll yönüne göre header'ı gizle/göster
            const header = this.querySelector('.sidebar-header');
            if(header) {
                if(scrollTop > lastScrollTop && scrollTop > 50) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
            }
            
            lastScrollTop = scrollTop;
        });
    }
    
    // Menu item animasyonları
    menuItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Sidebar açıldığında animasyon
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if(mutation.attributeName === 'class') {
                if(sidebar.classList.contains('open')) {
                    // Sidebar açıldığında
                    menuItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateX(0)';
                        }, index * 50);
                    });
                } else {
                    // Sidebar kapandığında
                    menuItems.forEach(item => {
                        item.style.opacity = '0';
                        item.style.transform = 'translateX(-20px)';
                    });
                }
            }
        });
    });
    
    if(sidebar) {
        observer.observe(sidebar, { attributes: true });
    }
});

// CSS ekleme
const style = document.createElement('style');
style.textContent = `
    body.sidebar-open {
        overflow: hidden;
    }
    
    .sidebar {
        transition: transform 0.3s ease;
    }
    
    .sidebar-header {
        transition: transform 0.3s ease;
    }
    
    .sidebar-menu-link {
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.3s ease;
    }
    
    .sidebar-menu-link:nth-child(1) { animation-delay: 0.1s; }
    .sidebar-menu-link:nth-child(2) { animation-delay: 0.2s; }
    .sidebar-menu-link:nth-child(3) { animation-delay: 0.3s; }
    .sidebar-menu-link:nth-child(4) { animation-delay: 0.4s; }
    .sidebar-menu-link:nth-child(5) { animation-delay: 0.5s; }
    
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            max-width: 300px;
        }
    }
    
    @media (min-width: 769px) {
        .sidebar {
            transform: translateX(0);
        }
    }
`;
document.head.appendChild(style);
