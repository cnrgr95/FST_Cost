// Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Dashboard elemanlarını seç
    const dashboardCards = document.querySelectorAll('.dashboard-card');
    const statNumbers = document.querySelectorAll('.stat-number');
    
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
            this.style.borderColor = 'var(--primary-color)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.borderColor = 'var(--border-color)';
        });
    });
    
    // İstatistik animasyonları
    animateStats();
    
    // Periyodik olarak istatistikleri güncelle (simülasyon)
    setInterval(updateStats, 5000);
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
            stat.style.color = change > 0 ? '#28a745' : change < 0 ? '#dc3545' : 'var(--primary-color)';
            stat.textContent = newValue;
            
            setTimeout(() => {
                stat.style.color = 'var(--primary-color)';
            }, 1000);
        }
    });
}

// Dashboard specific functionality
