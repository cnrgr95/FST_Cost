// Login Sayfası JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Form elemanlarını seç
    const form = document.querySelector('.login-form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const languageSelect = document.getElementById('language');
    const rememberCheckbox = document.getElementById('remember');
    const loginButton = document.querySelector('.login-button');
    
    // Çeviri fonksiyonu
    function getTranslation(key) {
        const translations = {
            'en': {
                'logging_in': 'Logging in...',
                'login': 'Login'
            },
            'tr': {
                'logging_in': 'Giriş yapılıyor...',
                'login': 'Giriş'
            }
        };
        
        // HTML'den dil bilgisini al
        const htmlLang = document.documentElement.lang || 'en';
        return translations[htmlLang] ? translations[htmlLang][key] : key;
    }
    
    // Dil değiştirme fonksiyonu
    window.changeLanguage = function() {
        const selectedLang = languageSelect.value;
        
        // Formu yeniden gönder (dil değişikliği için)
        const form = document.createElement('form');
        form.method = 'POST';
        form.style.display = 'none';
        
        const languageInput = document.createElement('input');
        languageInput.type = 'hidden';
        languageInput.name = 'change_language';
        languageInput.value = '1';
        
        const langSelect = document.createElement('input');
        langSelect.type = 'hidden';
        langSelect.name = 'language';
        langSelect.value = selectedLang;
        
        // CSRF token ekle
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = 'csrf_token';
        csrfInput.value = document.querySelector('input[name="csrf_token"]').value;
        
        form.appendChild(languageInput);
        form.appendChild(langSelect);
        form.appendChild(csrfInput);
        document.body.appendChild(form);
        form.submit();
    };
    
    // Form gönderimi animasyonu
    form.addEventListener('submit', function(e) {
        // Loading animasyonu - güvenli DOM manipülasyonu
        const spinner = document.createElement('span');
        spinner.className = 'loading-spinner';
        loginButton.textContent = '';
        loginButton.appendChild(spinner);
        loginButton.appendChild(document.createTextNode(' ' + getTranslation('logging_in')));
        loginButton.disabled = true;
        
        // Eğer hata varsa animasyonu geri al
        setTimeout(function() {
            if(document.querySelector('.error-message')) {
                loginButton.textContent = getTranslation('login');
                loginButton.disabled = false;
            }
        }, 2000);
    });
    
    // Input animasyonları
    [usernameInput, passwordInput, languageSelect].forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if(!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });
    
    // Enter tuşu ile form gönderimi
    [usernameInput, passwordInput].forEach(input => {
        input.addEventListener('keypress', function(e) {
            if(e.key === 'Enter') {
                form.submit();
            }
        });
    });
    
    // Beni hatırla checkbox animasyonu
    rememberCheckbox.addEventListener('change', function() {
        if(this.checked) {
            this.parentElement.classList.add('checked');
        } else {
            this.parentElement.classList.remove('checked');
        }
    });
    
    // Sayfa yüklendiğinde kullanıcı adına odaklan
    if(usernameInput && !usernameInput.value) {
        usernameInput.focus();
    }
    
    // Hata mesajı varsa animasyon ekle
    const errorMessage = document.querySelector('.error-message');
    if(errorMessage) {
        errorMessage.style.opacity = '0';
        errorMessage.style.transform = 'translateY(-10px)';
        
        setTimeout(function() {
            errorMessage.style.transition = 'all 0.3s ease';
            errorMessage.style.opacity = '1';
            errorMessage.style.transform = 'translateY(0)';
        }, 100);
    }
});

// Loading animasyonu için CSS ekle
const style = document.createElement('style');
style.textContent = `
    .loading-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s linear infinite;
        margin-right: 8px;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .form-group.focused label {
        color: #667eea;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    
    .checkbox-group.checked label {
        color: #667eea;
        font-weight: 600;
    }
`;
document.head.appendChild(style);
