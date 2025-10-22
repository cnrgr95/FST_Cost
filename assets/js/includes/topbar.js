// Topbar JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Topbar elemanlarını seç
    const topbar = document.querySelector('.topbar');
    const menuToggle = document.querySelector('.topbar-menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const logoutBtn = document.querySelector('.logout-btn');
    
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
    
    // Sidebar açma/kapama
    if(menuToggle && sidebar) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            sidebar.classList.toggle('open');
            if(sidebarOverlay) {
                sidebarOverlay.classList.toggle('open');
            }
            document.body.classList.toggle('sidebar-open');
        });
    }
    
    // Overlay tıklama ile sidebar kapatma
    if(sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('open');
            document.body.classList.remove('sidebar-open');
        });
    }
    
    // Çıkış butonu onayı
    if(logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if(confirm(getTranslation('confirm_logout'))) {
                window.location.href = this.href;
            }
        });
    }
    
    // Topbar scroll efekti
    let lastScrollTop = 0;
    let scrollTimeout;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Scroll timeout'u temizle
        clearTimeout(scrollTimeout);
        
        // Sadece mobile'da scroll efekti aktif olsun
        if(window.innerWidth <= 768) {
            if(scrollTop > lastScrollTop && scrollTop > 200) {
                // Aşağı scroll - topbar'ı gizle
                topbar.style.transform = 'translateY(-100%)';
            } else {
                // Yukarı scroll - topbar'ı göster
                topbar.style.transform = 'translateY(0)';
            }
        } else {
            // Desktop'ta topbar her zaman görünür
            topbar.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
        
        // Scroll durduğunda topbar'ı göster
        scrollTimeout = setTimeout(() => {
            if(window.innerWidth <= 768) {
                topbar.style.transform = 'translateY(0)';
            }
        }, 150);
    });
    
    // Kullanıcı avatarı oluştur
    const userAvatar = document.querySelector('.user-avatar');
    if(userAvatar) {
        const userName = userAvatar.getAttribute('data-name') || 'U';
        userAvatar.textContent = userName.charAt(0).toUpperCase();
    }
    
    // Topbar butonlarına hover efekti
    const topbarBtns = document.querySelectorAll('.topbar-btn');
    topbarBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Klavye kısayolları
    document.addEventListener('keydown', function(e) {
        // Escape ile sidebar kapat
        if(e.key === 'Escape') {
            if(sidebar && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                if(sidebarOverlay) {
                    sidebarOverlay.classList.remove('open');
                }
                document.body.classList.remove('sidebar-open');
            }
        }
        
        // Ctrl + M ile sidebar aç/kapat
        if(e.ctrlKey && e.key === 'm') {
            e.preventDefault();
            if(menuToggle) {
                menuToggle.click();
            }
        }
        
        // Ctrl + Q ile çıkış
        if(e.ctrlKey && e.key === 'q') {
            e.preventDefault();
            if(logoutBtn) {
                logoutBtn.click();
            }
        }
    });
    
    // Responsive kontrol
    function handleResize() {
        if(window.innerWidth > 768) {
            // Desktop - sidebar'ı açık tut
            if(sidebar) {
                sidebar.classList.add('open');
            }
            if(sidebarOverlay) {
                sidebarOverlay.classList.remove('open');
            }
            document.body.classList.add('sidebar-open');
        } else {
            // Mobile - sidebar'ı kapat
            if(sidebar) {
                sidebar.classList.remove('open');
            }
            if(sidebarOverlay) {
                sidebarOverlay.classList.remove('open');
            }
            document.body.classList.remove('sidebar-open');
        }
    }
    
    window.addEventListener('resize', handleResize);
    
    // Sayfa yüklendiğinde kontrol et
    handleResize();
    
    // Topbar animasyonu
    if(topbar) {
        topbar.style.transition = 'transform 0.3s ease';
    }
});

// CSS ekleme
const style = document.createElement('style');
style.textContent = `
    body.sidebar-open {
        overflow: hidden;
    }
    
    .topbar {
        transition: transform 0.3s ease;
    }
    
    @media (max-width: 768px) {
        .topbar-menu-toggle {
            display: block !important;
        }
    }
    
    @media (min-width: 769px) {
        .topbar-menu-toggle {
            display: none !important;
        }
    }
`;
document.head.appendChild(style);
