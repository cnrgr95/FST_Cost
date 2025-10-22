// Topbar JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Topbar elemanlarını seç
    const topbar = document.querySelector('.topbar');
    const menuToggle = document.querySelector('.topbar-menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const logoutBtn = document.querySelector('.logout-btn');
    const fullscreenBtn = document.querySelector('.fullscreen-toggle');
    const themeBtn = document.querySelector('.theme-toggle');
    
    // Scroll değişkenleri
    let scrollTimeout;
    let lastScrollTop = 0;
    
    // Sidebar açma/kapama
    if(menuToggle && sidebar) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            window.sidebarControl.toggle();
        });
    }
    
    // Overlay tıklama ile sidebar kapatma
    if(sidebarOverlay) {
        sidebarOverlay.addEventListener('click', window.sidebarControl.close);
    }
    
    // Çıkış butonu onayı
    if(logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if(confirm(getTranslation('confirm_logout'))) {
                window.location.href = '?logout=1';
            }
        });
    }
    
    // Tam ekran butonu
    if(fullscreenBtn) {
        fullscreenBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.toggleFullscreen();
        });
    }
    
    // Tema değiştirme butonu
    if(themeBtn) {
        themeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.toggleTheme();
        });
    }
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Scroll timeout'u temizle
        clearTimeout(scrollTimeout);
        
        // Sadece mobile'da scroll efekti aktif olsun
        if(window.innerWidth <= 768) {
            if(scrollTop > lastScrollTop && scrollTop > 200) {
                // Aşağı scroll - topbar'ı gizle
                if(topbar) {
                    topbar.style.transform = 'translateY(-100%)';
                }
            } else {
                // Yukarı scroll - topbar'ı göster
                if(topbar) {
                    topbar.style.transform = 'translateY(0)';
                }
            }
        } else {
            // Desktop'ta topbar her zaman görünür
            if(topbar) {
                topbar.style.transform = 'translateY(0)';
            }
        }
        
        lastScrollTop = scrollTop;
        
        // Scroll durduğunda topbar'ı göster
        scrollTimeout = setTimeout(() => {
            if(window.innerWidth <= 768 && topbar) {
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
    
    // Topbar animasyonu
    if(topbar) {
        topbar.style.transition = 'transform var(--transition-base)';
    }
});

// Topbar specific functionality
