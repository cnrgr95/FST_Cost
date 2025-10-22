// Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Dashboard elemanlarını seç
    const dashboardCards = document.querySelectorAll('.dashboard-card');
    const statNumbers = document.querySelectorAll('.stat-number');
    const mainContent = document.querySelector('.main-content');
    const sidebar = document.querySelector('.sidebar');
    
    // Çeviri fonksiyonu
    function getTranslation(key) {
        const translations = {
            'en': {
                'cost_calculation_module': 'Cost calculation module will be active soon!',
                'reports_module': 'Reports module will be active soon!',
                'users_module': 'User management module will be active soon!',
                'settings_module': 'Settings module will be active soon!',
                'feature_coming_soon': 'This feature will be available soon!',
                'session_timeout': 'Your session has expired due to inactivity. Please login again.'
            },
            'tr': {
                'cost_calculation_module': 'Maliyet hesaplama modülü yakında aktif olacak!',
                'reports_module': 'Raporlar modülü yakında aktif olacak!',
                'users_module': 'Kullanıcı yönetimi modülü yakında aktif olacak!',
                'settings_module': 'Ayarlar modülü yakında aktif olacak!',
                'feature_coming_soon': 'Bu özellik yakında aktif olacak!',
                'session_timeout': 'Oturumunuz hareketsizlik nedeniyle sona erdi. Lütfen tekrar giriş yapın.'
            }
        };
        
        const htmlLang = document.documentElement.lang || 'en';
        return translations[htmlLang] ? translations[htmlLang][key] : key;
    }
    
    // Dashboard kartlarına tıklama olayları
    dashboardCards.forEach(card => {
        card.addEventListener('click', function() {
            // Kart tıklama animasyonu
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
            
            // Kart içeriğine göre işlem yap
            const cardTitle = this.querySelector('h3').textContent;
            handleCardClick(cardTitle);
        });
        
        // Hover efektleri
        card.addEventListener('mouseenter', function() {
            this.style.borderColor = '#667eea';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.borderColor = '#e9ecef';
        });
    });
    
    // Sidebar durumunu takip et
    function updateMainContentMargin() {
        if(sidebar && sidebar.classList.contains('open')) {
            mainContent.classList.remove('sidebar-closed');
            document.body.classList.add('sidebar-open');
        } else {
            mainContent.classList.add('sidebar-closed');
            document.body.classList.remove('sidebar-open');
        }
    }
    
    // Sidebar değişikliklerini izle
    if(sidebar) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if(mutation.attributeName === 'class') {
                    updateMainContentMargin();
                }
            });
        });
        
        observer.observe(sidebar, { attributes: true });
    }
    
    // Sayfa yüklendiğinde kontrol et
    updateMainContentMargin();
    
    // İstatistik animasyonları
    animateStats();
    
    // Periyodik olarak istatistikleri güncelle (simülasyon)
    setInterval(updateStats, 5000);
    
    // Responsive kontrol
    function handleResize() {
        if(window.innerWidth <= 768) {
            // Mobilde sidebar'ı kapat
            if(sidebar) {
                sidebar.classList.remove('open');
            }
            mainContent.classList.add('sidebar-closed');
            document.body.classList.remove('sidebar-open');
        } else {
            // Desktop'ta sidebar'ı açık tut
            if(sidebar) {
                sidebar.classList.add('open');
            }
            mainContent.classList.remove('sidebar-closed');
            document.body.classList.add('sidebar-open');
        }
    }
    
    window.addEventListener('resize', handleResize);
    
    // Sayfa yüklendiğinde kontrol et
    handleResize();
});

function handleCardClick(cardTitle) {
    // Kart başlığına göre işlem yap
    switch(cardTitle) {
        case 'Maliyet Hesaplama':
        case 'Cost Calculation':
            showNotification(getTranslation('cost_calculation_module'), 'info');
            break;
        case 'Raporlar':
        case 'Reports':
            showNotification(getTranslation('reports_module'), 'info');
            break;
        case 'Kullanıcılar':
        case 'Users':
            showNotification(getTranslation('users_module'), 'info');
            break;
        case 'Ayarlar':
        case 'Settings':
            showNotification(getTranslation('settings_module'), 'info');
            break;
        default:
            showNotification(getTranslation('feature_coming_soon'), 'info');
    }
}

function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    statNumbers.forEach(stat => {
        const target = parseInt(stat.textContent);
        let current = 0;
        const increment = target / 50;
        
        const timer = setInterval(() => {
            current += increment;
            if(current >= target) {
                current = target;
                clearInterval(timer);
            }
            stat.textContent = Math.floor(current);
        }, 30);
    });
}

function updateStats() {
    // Simüle edilmiş istatistik güncellemeleri
    const statNumbers = document.querySelectorAll('.stat-number');
    
    statNumbers.forEach(stat => {
        const currentValue = parseInt(stat.textContent);
        const change = Math.floor(Math.random() * 3) - 1; // -1, 0, veya 1
        const newValue = Math.max(0, currentValue + change);
        
        if(newValue !== currentValue) {
            stat.style.color = change > 0 ? '#28a745' : change < 0 ? '#dc3545' : '#667eea';
            stat.textContent = newValue;
            
            setTimeout(() => {
                stat.style.color = '#667eea';
            }, 1000);
        }
    });
}

function showNotification(message, type = 'info') {
    // Bildirim oluştur
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    // Bildirim stilleri
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: ${type === 'info' ? '#667eea' : type === 'success' ? '#28a745' : '#dc3545'};
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
    
    // Animasyon
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Otomatik kaldırma
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if(document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Session yenileme mekanizması
let lastActivity = Date.now();
const SESSION_TIMEOUT = 2 * 60 * 60 * 1000; // 2 saat (milisaniye)

// Kullanıcı aktivitesini takip et
['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart', 'click'].forEach(function(name) {
    document.addEventListener(name, function() {
        lastActivity = Date.now();
    }, true);
});

// Session timeout kontrolü
setInterval(function() {
    const now = Date.now();
    if (now - lastActivity > SESSION_TIMEOUT) {
        // Session süresi dolmuş, çıkış yap
        alert(getTranslation('session_timeout'));
        window.location.href = 'login.php?timeout=1';
    }
}, 60000); // Her dakika kontrol et

// Klavye kısayolları
document.addEventListener('keydown', function(e) {
    // Escape ile bildirimleri kapat
    if(e.key === 'Escape') {
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
});

// CSS ekleme
const style = document.createElement('style');
style.textContent = `
    .main-content {
        transition: margin-left 0.3s ease;
    }
    
    @media (max-width: 768px) {
        .main-content {
            margin-left: 0 !important;
        }
        
        .main-content.sidebar-closed {
            margin-left: 0 !important;
        }
    }
`;
document.head.appendChild(style);
