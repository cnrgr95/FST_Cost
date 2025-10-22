# FST_Cost — Kod Tarama Raporu
_Tarih: 2025-10-22 11:41:53_

## Özet
- Taranan dosya sayısı: **78**
- Tespit edilen mükerrer (aynı/çok benzer) kod grubu: **0**
- Bulgu tipleri (adet):
  - css_deep_selector: 156
  - php_superglobals: 29
  - php_isset_index: 22
  - css_important: 15
  - php_header_location: 7
  - php_die_dump: 4
  - php_csrf_token: 2
  - js_innerHTML: 2
  - php_pdo_no_prepare: 2
  - php_password_verify: 1
  - js_console_log: 1
  - php_password_hash: 1

### En çok bulgu içeren dosyalar
- /mnt/data/FST_Cost_extracted/FST_Cost/login.php — 47 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php — 17 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js — 16 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js — 16 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js — 13 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css — 10 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js — 10 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/config/session.php — 10 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253 — 9 bulgu
- /mnt/data/FST_Cost_extracted/FST_Cost/config/database.php — 8 bulgu

## Detaylı Bulgular
**1.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 55): `php_die_dump`
> r_log("Dashboard database error: " . $e->getMessage());     die("Veritabanı bağlantı hatası: " . $e->getMessage()); }  // Ku

**2.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 18): `php_superglobals`
> SION['language'] : 'en';  // Dil değiştirme işlemi if(isset($_POST['change_language'])) {     // CSRF token kontrolü     if(is

**3.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 20): `php_superglobals`
> ange_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_

**4.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 20): `php_superglobals`
> / CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {         $newLa

**5.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 21): `php_superglobals`
> ken'] === $_SESSION['csrf_token']) {         $newLanguage = $_POST['change_language'];         if(in_array($newLanguage, array

**6.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 35): `php_superglobals`
>         // Sayfayı yenile             header('Location: ' . $_SERVER['PHP_SELF']);             exit;         }     } }  Language

**7.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 44): `php_superglobals`
> ::setLanguage($selectedLanguage);  // Çıkış işlemi if(isset($_GET['logout'])) {     logout(); }  // Veritabanı bağlantısı try

**8.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 35): `php_header_location`
>    }                          // Sayfayı yenile             header('Location: ' . $_SERVER['PHP_SELF']);             exit;         }     

**9.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 18): `php_isset_index`
> SION['language'] : 'en';  // Dil değiştirme işlemi if(isset($_POST['change_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_to

**10.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 20): `php_isset_index`
> ange_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {    

**11.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 20): `php_isset_index`
> / CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {         $newLanguage = $_POS

**12.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 21): `php_isset_index`
> ken'] === $_SESSION['csrf_token']) {         $newLanguage = $_POST['change_language'];         if(in_array($newLanguage, array_keys(Language::get

**13.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 44): `php_isset_index`
> ::setLanguage($selectedLanguage);  // Çıkış işlemi if(isset($_GET['logout'])) {     logout(); }  // Veritabanı bağlantısı try {     $db

**14.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 20): `css_deep_selector`
> et($_POST['change_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {         $newLanguage = $_POST['change_language'];         i

**15.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 22): `css_deep_selector`
> oken']) {         $newLanguage = $_POST['change_language'];         if(in_array($newLanguage, array_keys(Language::getAvailableLanguages()))) {             $_SESSION['language'] = $newLanguage;          

**16.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 183): `css_deep_selector`
> ipt>         // Global functions moved to separate JS files         window.changeLanguage = function(lang) {             const form = document.createElement('form');   

**17.** `/mnt/data/FST_Cost_extracted/FST_Cost/dashboard.php` (satır 205): `css_deep_selector`
> );         };                  window.logout = function() {             if(confirm('<?php echo Language::get('confirm_logout'); ?>')) {                 window.location.href = '?logout=1';        

**18.** `/mnt/data/FST_Cost_extracted/FST_Cost/index.php` (satır 3): `php_header_location`
> <?php // Ana giriş dosyası - login sayfasına yönlendirir header('Location: login.php'); exit(); ?> 

**19.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 22): `php_die_dump`
> e();     $db->createDatabase(); } catch(Exception $e) {     die("Veritabanı kurulum hatası: " . $e->getMessage()); }  // Dil

**20.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 26): `php_superglobals`
> getMessage()); }  // Dil ayarları $selectedLanguage = isset($_POST['language']) ? $_POST['language'] : (isset($_SESSION['langu

**21.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 26): `php_superglobals`
> il ayarları $selectedLanguage = isset($_POST['language']) ? $_POST['language'] : (isset($_SESSION['language']) ? $_SESSION['la

**22.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 31): `php_superglobals`
>   // Timeout mesajı kontrolü $timeoutMessage = ''; if(isset($_GET['timeout'])) {     $timeoutMessage = Language::get('session

**23.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 37): `php_superglobals`
> :get('session_timeout'); }  // Login işlemi $error = ''; if($_POST && isset($_POST['username']) && isset($_POST['password'])) 

**24.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 37): `php_superglobals`
> meout'); }  // Login işlemi $error = ''; if($_POST && isset($_POST['username']) && isset($_POST['password'])) {     // CSRF to

**25.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 37): `php_superglobals`
> error = ''; if($_POST && isset($_POST['username']) && isset($_POST['password'])) {     // CSRF token kontrolü     if(!isset($_

**26.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 39): `php_superglobals`
> ST['password'])) {     // CSRF token kontrolü     if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_

**27.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 39): `php_superglobals`
>  CSRF token kontrolü     if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {         $error

**28.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 42): `php_superglobals`
> ::get('login_error');     } else {         $username = trim($_POST['username']);         $password = $_POST['password'];      

**29.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 43): `php_superglobals`
>   $username = trim($_POST['username']);         $password = $_POST['password'];         $remember = isset($_POST['remember']);

**30.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 44): `php_superglobals`
>   $password = $_POST['password'];         $remember = isset($_POST['remember']);                  if(!empty($username) && !emp

**31.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 98): `php_superglobals`
> ogin_error');         }     } }  // Dil değiştirme if(isset($_POST['change_language'])) {     // CSRF token kontrolü     if(is

**32.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 100): `php_superglobals`
> ange_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_

**33.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 100): `php_superglobals`
> / CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {         $selec

**34.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 101): `php_superglobals`
>  === $_SESSION['csrf_token']) {         $selectedLanguage = $_POST['language'];         Language::setLanguage($selectedLanguag

**35.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 142): `php_superglobals`
> equired                             value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?

**36.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 142): `php_superglobals`
> ue="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">                 </div>             

**37.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 163): `php_superglobals`
> ame="remember"                             <?php echo isset($_POST['remember']) ? 'checked' : ''; ?>>                     <lab

**38.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 13): `php_header_location`
> dashboard'a yönlendir if(isset($_SESSION['user_id'])) {     header('Location: dashboard.php');     exit(); }  // Veritabanını oluştur try

**39.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 81): `php_header_location`
>          }                                                  header('Location: dashboard.php');                         exit();           

**40.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 26): `php_isset_index`
> getMessage()); }  // Dil ayarları $selectedLanguage = isset($_POST['language']) ? $_POST['language'] : (isset($_SESSION['language']) ? $_S

**41.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 26): `php_isset_index`
> il ayarları $selectedLanguage = isset($_POST['language']) ? $_POST['language'] : (isset($_SESSION['language']) ? $_SESSION['language'] : '

**42.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 31): `php_isset_index`
>   // Timeout mesajı kontrolü $timeoutMessage = ''; if(isset($_GET['timeout'])) {     $timeoutMessage = Language::get('session_timeout');

**43.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 37): `php_isset_index`
> meout'); }  // Login işlemi $error = ''; if($_POST && isset($_POST['username']) && isset($_POST['password'])) {     // CSRF token kontrolü

**44.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 37): `php_isset_index`
> error = ''; if($_POST && isset($_POST['username']) && isset($_POST['password'])) {     // CSRF token kontrolü     if(!isset($_POST['csrf_t

**45.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 39): `php_isset_index`
> ST['password'])) {     // CSRF token kontrolü     if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {    

**46.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 39): `php_isset_index`
>  CSRF token kontrolü     if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {         $error = Language::g

**47.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 42): `php_isset_index`
> ::get('login_error');     } else {         $username = trim($_POST['username']);         $password = $_POST['password'];         $remember

**48.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 43): `php_isset_index`
>   $username = trim($_POST['username']);         $password = $_POST['password'];         $remember = isset($_POST['remember']);            

**49.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 44): `php_isset_index`
>   $password = $_POST['password'];         $remember = isset($_POST['remember']);                  if(!empty($username) && !empty($password

**50.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 98): `php_isset_index`
> ogin_error');         }     } }  // Dil değiştirme if(isset($_POST['change_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_to

**51.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 100): `php_isset_index`
> ange_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {    

**52.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 100): `php_isset_index`
> / CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {         $selectedLanguage = 

**53.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 101): `php_isset_index`
>  === $_SESSION['csrf_token']) {         $selectedLanguage = $_POST['language'];         Language::setLanguage($selectedLanguage);     } } 

**54.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 142): `php_isset_index`
> equired                             value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">         

**55.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 142): `php_isset_index`
> ue="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">                 </div>                         

**56.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 163): `php_isset_index`
> ame="remember"                             <?php echo isset($_POST['remember']) ? 'checked' : ''; ?>>                     <label for="reme

**57.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 137): `php_csrf_token`
> T" class="login-form">                 <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">            

**58.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 57): `php_password_verify`
> tch();                                          if($user && password_verify($password, $user['password'])) {                         $_S

**59.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 37): `css_deep_selector`
> ge::get('session_timeout'); }  // Login işlemi $error = ''; if($_POST && isset($_POST['username']) && isset($_POST['password'])) {     // CSRF token kontrolü     if(!isset($_POST['csrf_token

**60.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 39): `css_deep_selector`
>  && isset($_POST['password'])) {     // CSRF token kontrolü     if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {         $error = Language::get('login_error');     } else {

**61.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 46): `css_deep_selector`
> '];         $remember = isset($_POST['remember']);                  if(!empty($username) && !empty($password)) {             // Input validation             if(strlen($user

**62.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 48): `css_deep_selector`
> me) && !empty($password)) {             // Input validation             if(strlen($username) > 50 || strlen($password) > 255) {                 $error = Language::get('login_error');     

**63.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 57): `css_deep_selector`
>                $user = $stmt->fetch();                                          if($user && password_verify($password, $user['password'])) {                         $_SESSION['user_id'] = $user['id'];

**64.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 64): `css_deep_selector`
>                                     // Dil ayarını güncelle                         if($selectedLanguage != $user['language']) {                             $updateStmt = $conn->prepare("U

**65.** `/mnt/data/FST_Cost_extracted/FST_Cost/login.php` (satır 100): `css_deep_selector`
> et($_POST['change_language'])) {     // CSRF token kontrolü     if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {         $selectedLanguage = $_POST['language'];         Lan

**66.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/10/4c87ec5c02d9830fe506c76cdeb35c67884bd1` (satır 2): `css_deep_selector`
> U1{I.w}j޽[k;(4?k>X%]lMɺ>F3DjC9h%Զ|o$SFm+ 9g]ݛ#jՃl lSncבsC`>jܣ?]㳸$Dul^)e2QlMU~&G:CӡƠ*ǹ&B&G2,ş_FSKLlyb704l6)+76)U:8	`6Nh5T	CJiyOcpRZCKGT[M^KkYZ 5tuj@.0r$ aPeEsK9s3){Vs4/X>и::BHw

**67.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/10/4c87ec5c02d9830fe506c76cdeb35c67884bd1` (satır 2): `css_deep_selector`
> 5T	CJiyOcpRZCKGT[M^KkYZ 5tuj@.0r$ aPeEsK9s3){Vs4/X>и::BHwѹ>C4}DOGvʷX<lz]&Ɏ޺137SPN#UITf$\/yM3uU/OI{#b(XʯRf>Ó@sϧINX$2<zߓrC)2pNzQp}~

**68.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/26/2e955fd743eda924abc411c4ca7e9c86d06688` (satır 4): `css_deep_selector`
> ٕⰛ郥#QuO:mk:٠sfXYw? H-&}KJwFGZc 5:b#rpGan`W)9w K<ж<[/ υFj5vzO25$sLhLbJ4ۺh#:Ƿƚc 5')ʴE"r,m]Il:	InB?xV:.YX(:K1%<Mge|>IRWª<G&PXp2i %4(1ϊЗ?TvG㲄aKR]^HLx<2Q&+{#)pfTf蘙U%^,JloPK3f:7xc90

**69.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/26/2e955fd743eda924abc411c4ca7e9c86d06688` (satır 4): `css_deep_selector`
> (:K1%<Mge|>IRWª<G&PXp2i %4(1ϊЗ?TvG㲄aKR]^HLx<2Q&+{#)pfTf蘙U%^,JloPK3f:7xc90k-K~e"l'x$#dzD#4?^ϛg2bN6xu4ָ-|\x	[ޅ7&ҷԋ;VB{biFpa+1[\_$*u5Z*$pLs+v¢;0~=v7^

**70.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/2b/a24b75f62bc3776c659ef346e6240265d89b40` (satır 1): `css_deep_selector`
> xT=o0_q0HEn(کcZ:).ARAsJvMa!E}Zj@w|݉{ͫw[.gs"+w.?5^DL)DZf$gAiy~THB5(X-PdxP퍃9l'S."0Pؖ

**71.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/32/4fea6070037fa7b4bb4c2e69067787edbadfbb` (satır 1): `css_deep_selector`
> x+)JMU07g040031Q(LIMJ,+(`9o#'V,e蝜$ Hu_ od݉eV{ E{!1

**72.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/36/9816ba34b03bfb08c6cd2a4265f20ce4c77f0d` (satır 5): `css_deep_selector`
> *pB.\ǍnYm*WpV4qm"6'K,X`z h iHZ9$69tt!?'xtueB@41h;9{cm2v+Dj6ҿ0kk^BGEf[I+Zޚ2ӣp`.i@k}¾]1nV4{hmilCZ}϶NX`@F<Lt\x .V%B)I[kKVZ! FN|]G31Z";:c_I

**73.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/36/9816ba34b03bfb08c6cd2a4265f20ce4c77f0d` (satır 7): `css_deep_selector`
> Lt\x .V%B)I[kKVZ! FN|]G31Z";:c_IMKۙ%tkXVXߠ¼]\{To,!r/\ֺj;Gb&av&<1Xx' 	S;=׳:w&K3)nRNɝ3x/镉ōi.:O5{R9SqJ]g@A*lRCĳi ,f|>t<9^&RWrR5~no& xTЉ\J\RW_sˎ!przf 

**74.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/43/ba506093ba13a0e3c489fd34fac6a826d2f42d` (satır 3): `css_deep_selector`
> #yd	_NUZ!)R6ߙBRedٓ%UF5=6ꖴ)SqͥȂoYinjr(q$^!JxvݟB ̈́&w&n /4%qnc1k-YYLkkjd\w/vސpҚW".#xԞu܈c}x&k11g{ά; vVaf[RuГYoX7T-.E'h,\Uk@vh3rWU9=Kfs2œ䧣:H$^6

**75.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/43/ba506093ba13a0e3c489fd34fac6a826d2f42d` (satır 5): `css_deep_selector`
>  J7xɅTMff"p ,LjYɵn,,='suɰl6L#-f	4	!M0/8%ϨrS%H^ e 6C0~g]Uo:h87䔜r~yuXY;`G%WoFV-¼ >9^td_xpo&.2{: Rɜ촤5-p@C>e"JS-Z#z.qbw^c]d Y aSȈz2rDh|o~<Kڈ

**76.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/43/ba506093ba13a0e3c489fd34fac6a826d2f42d` (satır 7): `css_deep_selector`
> -¼ >9^td_xpo&.2{: Rɜ촤5-p@C>e"JS-Z#z.qbw^c]d Y aSȈz2rDh|o~<KڈnM@ dXkr(pAe5;japᷨѸS{{#7Uab؁w@:%++R.IEU3AbxNwς7IBxk\}۽3!`f-mXGgwJ6

**77.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/43/ba506093ba13a0e3c489fd34fac6a826d2f42d` (satır 7): `css_deep_selector`
> w^c]d Y aSȈz2rDh|o~<KڈnM@ dXkr(pAe5;japᷨѸS{{#7Uab؁w@:%++R.IEU3AbxNwς7IBxk\}۽3!`f-mXGgwJ6dKatKvdHby4Md+{%A%U|jG" 	G˨X<B^,fU'pw\&9" II 7H

**78.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/44/d693a1180ead0f90d635e2e81aba125f61011a` (satır 1): `css_deep_selector`
> xYIsy~ET2P8XTe{$O*+v\&$8:OI_^/@)ک R^}8ç	;}YTȅzQL<DJdGoN"IEJ`]=bx<")^fw?i(JJ{>oO%"Ђ;9Eaan@d biA4<	~l&SVEI6$2qcŹ,$ټ< e2dstV#T

**79.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/44/d693a1180ead0f90d635e2e81aba125f61011a` (satır 16): `css_deep_selector`
>  dR>@#m^'!:-XO7`!RDǘa -$02 F5`j!DNLtfeHFG6  S	guWMl.𳗯rGg~B`r#ĝ蓦w?c74LjO,cm5F_ږ^AW$D`/;ʣ;|1@Tz#Rl87hU6G[mI'DuZƦ.i^SLĎ)niF%x%i,.w4)	Q+FuְXҢXI=oo9yӐƏ1FXo^J}=pgړ7}nW}pR8aeg	oZD

**80.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/44/d693a1180ead0f90d635e2e81aba125f61011a` (satır 16): `css_deep_selector`
> Xo^J}=pgړ7}nW}pR8aeg	oZD!jĔmH<@3~;9$YboVT@OGؙSt{F{Xq5kO9:L9}:j[  OT2IYcܞF$0ijt\^-iRuD?fWr{{]?oó3&c`/c+"9u++aW9~[5fTwf6t+5@$ܣ-)g~-rW09D[ofr

**81.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/49/76f736aa049570770c16d1fe41e33c478d7059` (satır 5): `css_deep_selector`
> ^Ҝ|q!>*ɀ0!@dv6OoG[SSF9ĬNzV{#ԝBmeYP|rCȌ.X/=[J,  ߸ * O\ŕ,rrV' 	`kI@edjlu$ds*Z,,ZO"4]wȇG}o{z53#	#c\e,Y<wMƏ{G'4gja&OjA>{8~2&,D5; 	dPSvzR>

**82.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/49/76f736aa049570770c16d1fe41e33c478d7059` (satır 10): `css_deep_selector`
>  Z-'Řg(gixY3p5p⮢R&뒇H9un0qm ĬWtE05AD!EDA3eXK qVṸ 3}@ee=a7hEd4v\	M-ժd꧖%Id%ّ̫,Xzv{LF}Rւ-A	ب<)k:WTUOj)1]	|!ݙL6j[)4v<l_[F'JMҔ/RK[wҌ՛T5߫WHa]

**83.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/52/2081685eb6c40ff563befd9413a7a49962cf5b` (satır 1): `css_deep_selector`
> xU;o0_z.ڥp"E%p2#>\J /1kd&(2h29=y!􂝾{{	9WN=sɛ>XZ4 d\ ӶfC&`Pz^B޽EڠD@uPq6F@Ziu<VEcܣ|ÊhF-VGSu

**84.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/6f/68c06bd80dc30399d5909be0c82226074b129c` (satır 4): `css_deep_selector`
> YHWp XGǶZDD7&*+چ:f`s(xq~xWB,B-E Oӧ NCew$ѩ÷U	aE2i 0tS6g70O4-qeuYG,|Y~6 ;݈	].b4::MӰa&}ҖGG7|鑩9_'|hZYyS^ȭBI!h0\˴9U9^21bQD/R]mPO܇<x\g"W5iUU |-an}d(WܫW"9bvMJAP5xq0Y{ ^LW)nYH9fFg3b+qI]

**85.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/6f/68c06bd80dc30399d5909be0c82226074b129c` (satır 4): `css_deep_selector`
> ^21bQD/R]mPO܇<x\g"W5iUU |-an}d(WܫW"9bvMJAP5xq0Y{ ^LW)nYH9fFg3b+qI]KNN2[6؀oXq/<.nzAKt`lf> JID2ig$M>#	ʅNMAk @%P^%9]~!%roh%S{8֏6V'Do?u(,z=U3)+dfcYY"[YCSOL _3sqxZa*K:a

**86.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/87/07121eb17dc04848597f6cfc58dc9fb9b4783b` (satır 1): `css_deep_selector`
> xUnF_15uФhb$N	`IR*wX|g蘳/9&:Jc'nc9;3;3c/=OF`{:h l"lJHe 94L5Vd6? Im%YF{dwgb=H6u;N:SalWVJ; OD1

**87.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/93/63b9f36b066c6df7c0ae29acd8f89506448abe` (satır 1): `css_deep_selector`
> xYKsE_1`"ڈP'H`ST`;;+fg3?ǜ}ᔛ7ٕp@[w>+3уO>}}rZϨ$_szI>W{y5%*y_Z1 yq%zRќ=2nDx%=O VRQPRKCUVDًI{ peeH?XsZM&#oj

**88.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/93/63b9f36b066c6df7c0ae29acd8f89506448abe` (satır 10): `css_deep_selector`
> c2[F'ӚZPfF5cn5)٨Tyd':[ɔIr*d\W]uJ(V~)^liuvـ̛u#_V Ϝ,jg2^P:~w7_s\#8#6ofu!;(&UѼ1D345GO[Z1I--R#$ˡP(7(#&^cq9iZpHhc bgԮYfjU)&CLoqTb&5Em?tť&xa(cr[7ȃthmܢz9:tzWnӳFgt1Ӝ._tӘ"V:kmGֲ!Z

**89.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/93/63b9f36b066c6df7c0ae29acd8f89506448abe` (satır 11): `css_deep_selector`
> H/0X3OhKچ҂ψűy<D;xTKi"DSEMi)e`J֪|6c~7ƴy-nKV ƌ ʔ`hQup؂, C_z"9: .·f"|	aC_A-߭5U68߮nZ״<zS;koVgu~$Mcj	CK't1d|5+,iaF;A/iݾ-(căWv0{(  h$廧;	aPd{DL29רA`6tT`Ҹ.ȔxWg+-r{Eu`ߐuMZeJbxwL

**90.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 1): `css_deep_selector`
> xXKo7ٿIѬZ9i@y6)s) v)ܒ\Bs9SoVWg劻YFuc9oCM{.Ԭ.oev+WYU0iS$ӃWJ{hdL+Y`|"ٿ(]&XAzu!Aayd$OH믊dVT !R%ۏ

**91.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 3): `css_deep_selector`
> ɎZSKMX}_ɒX*}j 9󩉀g/޼:Lr&Ip1KNhRq$CEɜb"OS4$ i[;2&E9@ `?9[,f	:I9@bKiZ [h\EYOzLEF5ީ[HELr3M"_X	v^2ͨeOIW,Nf*{_IָܩKҜR%I%YD,tpcBJ1=y~Եɰ#"p9v#s7﹮^Ti-K&9

**92.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 3): `css_deep_selector`
> f	:I9@bKiZ [h\EYOzLEF5ީ[HELr3M"_X	v^2ͨeOIW,Nf*{_IָܩKҜR%I%YD,tpcBJ1=y~Եɰ#"p9v#s7﹮^Ti-K&9 HuAH.QJL'*_19*}~TAnZu:5֋5Nd<cY܉A.Naly.pAr	)$It4>OIBǡ}Gֻ.]+Ts(9SmhT`Y*;2h)Pu Za

**93.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 4): `css_deep_selector`
> ]+Ts(9SmhT`Y*;2h)Pu ZaVlCV|cGu`="={[@)&jnHۭCF-gH4ʝ [!aK|.<|4QOMa3qu]fܤ%հhr	DDn,ޔ&Q@o9-tw{:f0]d|t9X[}98%a]_]j3v5,J	T9c!;ݐ`(c.$l~kXu{rOؠ+

**94.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 4): `css_deep_selector`
> nHۭCF-gH4ʝ [!aK|.<|4QOMa3qu]fܤ%հhr	DDn,ޔ&Q@o9-tw{:f0]d|t9X[}98%a]_]j3v5,J	T9c!;ݐ`(c.$l~kXu{rOؠ+<>BWaCB	sfQs7\ȢPnB4%*x愀&w['~W>vEL'ԽxZ w:

**95.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 4): `css_deep_selector`
> -tw{:f0]d|t9X[}98%a]_]j3v5,J	T9c!;ݐ`(c.$l~kXu{rOؠ+<>BWaCB	sfQs7\ȢPnB4%*x愀&w['~W>vEL'ԽxZ w:.a W]Bi_m~R%͸u(Bz(ݖ:pwTnGM&Eo=8(d7Qoz9'ު6PoisCvCbSmw%7q;˛evs&݆tUx7%Nv>&{vNB+O

**96.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/a6/4352fb6be26aaffc2d9db7398945f1f8200ca9` (satır 4): `css_deep_selector`
> Eo=8(d7Qoz9'ު6PoisCvCbSmw%7q;˛evs&݆tUx7%Nv>&{vNB+OQD&tp""g]e軵̪r)@ɜhVa\|Ȯ!h`nj1mA5,=C?D7N5lKؤ;_0{D+(gGQ SkFJqÙVU	_Ä(B]ɽqsOjGvDưEP\o3j8u1OE[+KY

**97.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 1): `css_deep_selector`
> xIoh<o5h	Ȋnآ%dȲ韟H	DSU]ýO[oݞ|zw}洽xɻ?>y}2ٲ4<ӧ_~u?ǷWsƧoïoǿ~-l~t.cm޼9m>{s}zn-{&zl1ǽݽsnsqn<60{ %k]f~̭{ɞ8شךucƄ9{>$+\R^96}F1

**98.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 3): `css_deep_selector`
> ^96}F1u	E^LxMky52LL [1{zxZ<_nM)?׹kXR\ʛSs=_c"Ń{ epH mݸ8b~'GHi87cB..d4O2w]Hvbm+1J4GiO.ãF.MC!@hz%X^v_z^|lB1vPeyO&ca0nBehp6xgGHwm#rq_0%{.ݳ P4 BD7$9_94x=$\>+reh@Tِ;#gvB#$ؠPEv´Y

**99.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 6): `css_deep_selector`
> $SMg$Qn(Դ 䝅  v(iڽ.kag[&[? *YbB#PElxCDֈqѰ!4S? ,LL%փF%#ƻM+tyi>wѺ</r˯ŀ5y,0"Pʮ<5ͭ ?/^9Kcf3ox.9A:NpC5{4zֱ~7iT>7n=c1p_TJ2;V1nppKly;ޟP4z5xfatiVB !@-TA-{

**100.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 6): `css_deep_selector`
> F%#ƻM+tyi>wѺ</r˯ŀ5y,0"Pʮ<5ͭ ?/^9Kcf3ox.9A:NpC5{4zֱ~7iT>7n=c1p_TJ2;V1nppKly;ޟP4z5xfatiVB !@-TA-{Mա3hZ!TcI9}i#+?;>TXԚB%QaN=2_$#|HB9V$PS6r{$j<

**101.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 6): `css_deep_selector`
> 4zֱ~7iT>7n=c1p_TJ2;V1nppKly;ޟP4z5xfatiVB !@-TA-{Mա3hZ!TcI9}i#+?;>TXԚB%QaN=2_$#|HB9V$PS6r{$j<s*Lm D&';ۣ~z0AwWRbk4!w_YMXǻisC{.Fm҅#7u1[4.˼IOY/6v

**102.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 7): `css_deep_selector`
> N=2_$#|HB9V$PS6r{$j<s*Lm D&';ۣ~z0AwWRbk4!w_YMXǻisC{.Fm҅#7u1[4.˼IOY/6v|4]4<SA^^#de'K$@:Y2~Mqcļ<t<g[4("Y0w˿W+<T0@BnPcl~+ۛ,-qh>L~Ss[pFnX;ge1+=-Egv-nE[t	IɗGx"6fqc1:CRNZqۄkpBr0g7kI

**103.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/725fb37e03667974c6152529a723f80af89365` (satır 10): `css_deep_selector`
> <	u; eD2eU:U>;㋙s]4@IcP%	9 awk'ǡVum[F06m3$LӅUoMHBFOȤ͐I ڪ6L}bdbsa	@,=F0bn];ͺ%h	pr,yoE727L=* y#lS L9"9؊Qs^GF*U[`	I$E>)=)gb#<Tp|(&M|[|sx=^p .cƱo;6P* bEjj3l?{:pZ9(@*eX9244k7phI:[ <G&2ڤAv

**104.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/f8c2524617abbb2d01ba34f0deb406dc13b08e` (satır 1): `css_deep_selector`
> xXn#EE#v2I%c8*=O'홡l8 @\)'7"TL;c{@OwWU_UWw'ys},j>r	4a@,Mx?PO5oWDTULFФ?}'SPd&c璿8''

**105.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/f8c2524617abbb2d01ba34f0deb406dc13b08e` (satır 3): `css_deep_selector`
> 	4a@,Mx?PO5oWDTULFФ?}'SPd&c璿8''ie*Yc1Nn]3 {\zFr2(4D h$\)Ѝnçug~JvH"uH06 `pdNƏ;ӡF˫O>`)HnCHNY=+M˳Bg%a\	eopo1	TCi O%\s=dLNA+ɶ.F5g23HVqhx%+'1!lB䇘G}cuz9=.\ 	'T`^@{~+Q:2T :맛ti&="<yMxP;~

**106.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/b3/f8c2524617abbb2d01ba34f0deb406dc13b08e` (satır 5): `css_deep_selector`
> J$CC<q3gۗӜ _1*4Z%\YomaZRud}xZ	 G<2t0_6%5=jV R_Nc"JL@2	TӬG0+\bJXa>򜆽4:+1aX/b4d# PloE-M\ur7Dq\6s50L`ΚVpj+1#'RfȒ41?ND%\W7n=FN5T| Aޚ\g0a>83{-"+颰B%®f\!l,Y5b]*b{Kd]l?l(-4ØC3ϥ	g

**107.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/c4/873b8e500d6b197ec8bb76a6a9eb2ee208036e` (satır 1): `css_deep_selector`
> xT0홯EHX4[l{kOQT2k&C#چXr	{͐ou]A'YTA8~A16|}l8|*'(-F1xO*M' ;<A4ƟU=`ig{}to|ʆEۇG΂䎐KSst  NNC 3Iv8B t	ND(#<-\@*VVC^tT$w|E

**108.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/c4/873b8e500d6b197ec8bb76a6a9eb2ee208036e` (satır 6): `css_deep_selector`
> ;ިGXg^V3J2Tu=Dض^֗Ib^]TXo~0$=RCU;CܚR7a7Ъ7kT3/soD 5KF墅aR&1F^EC,K!P(4Gm`iHK~bv*4\sYƤ𲹝hcľ(:nOcI{M"ke

**109.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/d9/1217ef30f126f2d2a38ccde55ff79d43c538ea` (satır 5): `css_deep_selector`
> V2 ߂lC%|{F!@OYaΓ-A+i5M9jsr\2FI_nV	](]ǂ+fV\ZUmtn #,w yBgBJ<UDqqϡЃ@XaGסQ<omI;$L@bis{UsXm,e.i#G5Wd.we$R5, \ܲf#+"+Uj! \D"sںr5 A}#+wbbw

**110.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/de/152fbb88d70cffde803c4fc07eb8e6619c1f96` (satır 2): `css_deep_selector`
> xWNV:Oq"9TMRL $B'L@htm$W\@JUm]g;	=?NEj`BXGzGf3o6AB!@? WcϦ%tfz9]IgAvBlܬauϥC)PcX~sGz]ޫLc2Z]nXk6)YZ1].XZF64Z/Yqm/`/TYWh8OJB'`,p\R5tT/Al)ܖaۏg`	SM?7$3uޑJrqY [`{=vK/ FAWsͩ$Bu`SN

**111.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/de/152fbb88d70cffde803c4fc07eb8e6619c1f96` (satır 9): `css_deep_selector`
> Jlڄ2 6H#jt#- O$qQdNSPcMRd(K͹04	%bp,-<_h AgT ?!=C:֕ 9FSzkvqADӬ''f}^YP,9ZDHf=7DL9U؄zYK"ov!{܋t5n/^|Z4l.zMXzt	Ӣ 2H n'="rQUsy7aH P+w:1xά"|e~

**112.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/de/152fbb88d70cffde803c4fc07eb8e6619c1f96` (satır 13): `css_deep_selector`
> |e~A|xnUWЌa`ȧ.-uaz/8 myvZDGͽΖؑЉ۟nRPdŕfK^i٦E!h9> 2&&yzIJw8GJ]9p6)A܇f$`$U uEV-{G*bۛyIM__#IXt2!0ء5*: S|jr6}f(+Έ$mU(p

**113.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 1): `css_deep_selector`
> xYKs7޳RPDSr8.[V~nl˥3 < #rt1g]|ҍگ&pmղ\g 4nӢor.{_p+91".3.O|y%PEHU6("אּ>++6LE&X&<gvR*K6O@)ۂ.Ftⰳ6

**114.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 1): `css_deep_selector`
> xYKs7޳RPDSr8.[V~nl˥3 < #rt1g]|ҍگ&pmղ\g 4nӢor.{_p+91".3.O|y%PEHU6("אּ>++6LE&X&<gvR*K6O@)ۂ.Ftⰳ6lwgw7{/^e6wA~=7ܰN&STX1^e,8c|lwZ>&>ʊR8q6b:Q8}ױ*ҔGpe)Ne<>tS

**115.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 1): `css_deep_selector`
> 91".3.O|y%PEHU6("אּ>++6LE&X&<gvR*K6O@)ۂ.Ftⰳ6lwgw7{/^e6wA~=7ܰN&STX1^e,8c|lwZ>&>ʊR8q6b:Q8}ױ*ҔGpe)Ne<>tS['"+-72\`VZD+FSNVQxR12Eiafvx(*?-pm.CkmM{2I9,a4+?ٟg㋳ϧl'VMZA e:Cau-#_1ZL0v(sx])1q

**116.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 4): `css_deep_selector`
> Cիn` qLAIͪ\\^by`CR=qD*Z[7 vٻTp-2g|6 "QH)Bq"r&` I 7k"6ORqr1!OV<뢍)Tn.mraz>D~{2_=-ӱHS9-]fe^{JNS3eff ,1V0qtp5.O\#"cd:b^f<'92Y

**117.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 4): `css_deep_selector`
> 7k"6ORqr1!OV<뢍)Tn.mraz>D~{2_=-ӱHS9-]fe^{JNS3eff ,1V0qtp5.O\#"cd:b^f<'92YC:/;DN@t@f7%p8(^x{Dl҆ՊԮ93<Ծ	b3 ^oP]Iv.͉Do4֣ KЛK7jyg% Zeb5?_	L

**118.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 5): `css_deep_selector`
> O\#"cd:b^f<'92YC:/;DN@t@f7%p8(^x{Dl҆ՊԮ93<Ծ	b3 ^oP]Iv.͉Do4֣ KЛK7jyg% Zeb5?_	LM =GI:-e:'	)z>tZz𧐳?AJ" 	P|3OIPo1{':^5l;`$06J4d1}1vW>7ZdRF_D"-y?.Tݑj,mŏ"{-a&

**119.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 5): `css_deep_selector`
> 7jyg% Zeb5?_	LM =GI:-e:'	)z>tZz𧐳?AJ" 	P|3OIPo1{':^5l;`$06J4d1}1vW>7ZdRF_D"-y?.Tݑj,mŏ"{-a&KjŊOù1&_zp{ܤN2cܝ'. /SKڭ*{VVB%$o.JZovg8	YVy

**120.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 8): `css_deep_selector`
> [Al*g'fȘ# &8|S9Y|G-	O_	>nb;Հ#{qRsFl	Pvvkbd7ҦWN Oki2OᮩLBkmoxr$;ZEK1̛2K#4s-S=,	5wvC/6pwf	4Ȍ1Kb ݶO$XbɽLkO>0,~;[-!ӕ^ދⱟ紥9Sajf4Q歅fER{QA՚' @,J4#p]&^g'2xz`rjCZX~Ov[A'kzWYo)gspšJQs[an

**121.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/ed/95f09dfd1bde5958b47c4af7f35bc8c3ccf253` (satır 10): `css_deep_selector`
> qgᰐkZWd*;Q"|Wtc[5a_?n':[Caԃ,nU	4r-),CB~ZRwt Hob6z敒Ñx2O6;R-쪢sQ]1pݮT̛p$htW6QMtU˚,&{_Gwk 5sտFpG k4@֬!0 9sDK^jw ovvImt*X7֠ɴ'0@{

**122.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f1/315ba45314a90087b0aee90f0507bf5242a20c` (satır 7): `css_deep_selector`
> 5o_lxFD#$X˒`2	g57`=CxeFvDͤ6i˚'Z}ֱ Xu <;Ū+Ddi ` lN!G<eɊxjǝY,5}dƆh Z)m~^iLf,;쬺"~u)'9Did_4,kHSļy0݃>j{B'w,hP3ҷV-ݞpbND?iN׸dbPLlmx GmxY3ƬT4Zt8%aNlp

**123.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f1/315ba45314a90087b0aee90f0507bf5242a20c` (satır 18): `css_deep_selector`
> *S 7wPa_~?xueL&0zJ pv18Y/Xl0x53C\ 9L0i*~tG ֋բ?BtЀD:K`,s`.^po,OLus٢rۘBە]MFJ8|&\$/]ߦ'7= 7}Dnv@n3-7zשbrd2YX4pM 0<lΐ>9' {Ck`8$5LؐƷrW$;_7g;K VG`:$BD'W	rMVP kH.feKhÅ%\Vrd)

**124.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 1): `css_deep_selector`
> xX_o>ńT#Y=t4Qz|q)W@ȱ1ܕcŏ}K-.LIz`Xofg~3;;Uoi|l;k'2\Iir&CR49 C;$%>dav{"	noW_akOװͧkC*a?II(8󄔨r>_:uwwl14y2*i{?h^ 3f"hZn	$

**125.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 1): `css_deep_selector`
> W@ȱ1ܕcŏ}K-.LIz`Xofg~3;;Uoi|l;k'2\Iir&CR49 C;$%>dav{"	noW_akOװͧkC*a?II(8󄔨r>_:uwwl14y2*i{?h^ 3f"hZn	$4/H3i!9SZ?x lt ʚJv1lHLר~^Yg7q9iyz}

**126.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 3): `css_deep_selector`
> II(8󄔨r>_:uwwl14y2*i{?h^ 3f"hZn	$4/H3i!9SZ?x lt ʚJv1lHLר~^Yg7q9iyz}2_6AwywFdPAy9Ar.&.e(>kXFHf{!bLw b{<MTFt}&O\J1#rP%M9khDznK+ZpyEƢ,KrY|F9?Ff1RIٵ

**127.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 4): `css_deep_selector`
> HLר~^Yg7q9iyz}2_6AwywFdPAy9Ar.&.e(>kXFHf{!bLw b{<MTFt}&O\J1#rP%M9khDznK+ZpyEƢ,KrY|F9?Ff1RIٵZe"6AͳJ҂.dct7vP3{Vm=Ӛ BFpzҌ&FI+F1z0f3Jxl"uv>QX2}/ޜͬ$GNNO`zSC e06

**128.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 6): `css_deep_selector`
> P3{Vm=Ӛ BFpzҌ&FI+F1z0f3Jxl"uv>QX2}/ޜͬ$GNNO`zSC e06p0=Cދ%9ZzpFtف>h̩k*e%iJl rr23ޤS)`i{@`}WU]r^+bQl7m^[|L\N(9mTGR ZN	zӅ 	٢ʒ<qDHtR&][psԪYU)O

**129.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 7): `css_deep_selector`
> k*e%iJl rr23ޤS)`i{@`}WU]r^+bQl7m^[|L\N(9mTGR ZN	zӅ 	٢ʒ<qDHtR&][psԪYU)O]Mu.j,ٿc"?5Skwy+{*=Cu+n$LjPz)b]R# I_ Gb$>H>	AmSԛW{B|f/_-N[vH8DeR;ԇƥz㷳9

**130.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f4/36ec6eefc387abf4d4690072e0651565b85cbf` (satır 11): `css_deep_selector`
> L7IÉõfxjP2XgnF # ı6G㡖oPɖ\f+4UဩLsz ZHYUsG;*JTzZu/S{eUn1Kd5/.q3lKt?D|5V_>gK|3wE~XgV>(}O}w%^%l򙔣>쬈nd^vBvTz=%_RCLy{{7$ךtB%[:jQG@ kfk*%mn-kU|$̩WMU, ;Ka\Y	slm|n 58K7%k

**131.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/f9/9ea2f752c433c84a52a8a44cfa314b63604fda` (satır 7): `css_deep_selector`
> H4ˆ?>s)H w쫉B25u  i\yNZ2B:lfX} *ih6jeɘh$掻@R=*1{18z{`/ ز*`ZiETnWwvuQgSs\&}A	Մqbzo^aj1^q`cHbA^ֳm.b2n-4o)^L%Jۥ_<{SMcDdVG:Uf{"

**132.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/fd/5dc5e4075cb159b3c35b44e828a45176ea453f` (satır 3): `css_deep_selector`
> ,Dqy`wEHi_HTWqlȹ,.Rж!'t(.#v[<WٿŁ$LEYfkMޯx2n=kҷUn7 )h~"QDgyR*:YR[ޯ236X;YFqX@0U'њ؜~EV쓛2@'PzSvJh-Iq=)ຮ54?V]\f|]1%#2e?˺ӘlGsY`d0fzo3`Y94:f9Z)ՍA3MTvvSL1+3uև:8bMp8{_S~%@y+Xfg߈,hp	R^u^3|C\B.

**133.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/fd/5dc5e4075cb159b3c35b44e828a45176ea453f` (satır 7): `css_deep_selector`
> ʏnݿ@u`} >tH$bt/?Բ窔ԅLΙfCSrkDB^i<|}+Ech0P Y *9,7a f`e%"Fڒc[H3!Cmp>70w#Vc!rjŅh*ҺY9BQDxB?d5\ぷ w+*aM gs+9xs!ZFH5m.4z}{1&(ϡgsT0D 62r <pP@>n#-G <@LAUǊ |Z$sb&rgx6#

**134.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/fd/5dc5e4075cb159b3c35b44e828a45176ea453f` (satır 10): `css_deep_selector`
> gs+9xs!ZFH5m.4z}{1&(ϡgsT0D 62r <pP@>n#-G <@LAUǊ |Z$sb&rgx6#ؽu9	5GOF%Y @QAяHX.S=e_nM#Aλ#i3>6x.G_0x{Qt<ξ,@Ori"c{_p ooP!yu4'"__zY},ejGs~r1_^C]hK $ԘEy

**135.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/fd/5dc5e4075cb159b3c35b44e828a45176ea453f` (satır 17): `css_deep_selector`
> "	f>bj9gvw ٝ/OYck@,8ӃsvD4\ 'C>@!qmcJtk![HƖ R^.^ %B_ ,:[A1OxŜRcFXTEApy4n5RymHa;U~-veF=b1F~4u8X(i^*I&#DI*9My8lRun2{ J;kjU$0Lfta1>4oéԢe2cxxo~kOeaxQy4TSfA5qrM/8

**136.** `/mnt/data/FST_Cost_extracted/FST_Cost/.git/objects/fe/c1fd4681dc518aab97ba90cf0142f35e15c18d` (satır 1): `css_deep_selector`
> x+)JMU04d040031QHI,ILJ,N+(`8}0̫f?8-4.'1/41N{w79>=SaJ1883?l\;9"߹ y40

**137.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 280): `css_important`
>  @media (max-width: 768px) {     .d-md-none { display: none !important; }     .d-md-block { display: block !important; }     .d-md

**138.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 281): `css_important`
> isplay: none !important; }     .d-md-block { display: block !important; }     .d-md-flex { display: flex !important; }          .t

**139.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 282): `css_important`
> display: block !important; }     .d-md-flex { display: flex !important; }          .text-md-center { text-align: center; }     .te

**140.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 292): `css_important`
>  @media (max-width: 480px) {     .d-sm-none { display: none !important; }     .d-sm-block { display: block !important; }     .d-sm

**141.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 293): `css_important`
> isplay: none !important; }     .d-sm-block { display: block !important; }     .d-sm-flex { display: flex !important; }          .t

**142.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 294): `css_important`
> display: block !important; }     .d-sm-flex { display: flex !important; }          .text-sm-center { text-align: center; }     .te

**143.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/common.css` (satır 348): `css_important`
> : 768px) {     .topbar-menu-toggle {         display: block !important;     } }  /* Dark Theme Support */ body.dark-theme {     --

**144.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 15): `css_important`
> -width: 768px) {     .main-content {         margin-left: 0 !important;     }          .main-content.sidebar-closed {         marg

**145.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 19): `css_important`
>       .main-content.sidebar-closed {         margin-left: 0 !important;     } } .sidebar {     position: fixed;     left: 0;     t

**146.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 326): `css_important`
> h: 769px) {     .sidebar {         transform: translateX(0) !important;         position: fixed !important;     }          .sideba

**147.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 327): `css_important`
> ransform: translateX(0) !important;         position: fixed !important;     }          .sidebar.open {         transform: translat

**148.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 331): `css_important`
> }          .sidebar.open {         transform: translateX(0) !important;     } } 

**149.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 93): `css_deep_selector`
>  transform: translateX(2px); }  /* Dark theme için hover */ body.dark-theme .sidebar-menu-link:hover {     background: rgba(255, 255, 255, 0.1);     color: var(--

**150.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 99): `css_deep_selector`
>   color: var(--dark-color); }  /* Light theme için hover */ body:not(.dark-theme) .sidebar-menu-link:hover {     background: rgba(0, 0, 0, 0.08);     color: var(--dark-

**151.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 134): `css_deep_selector`
> transform var(--transition-base);     margin-left: auto; }  .sidebar-menu-item.open .sidebar-dropdown-icon {     transform: rotate(180deg); }  .sidebar-submenu {     li

**152.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 194): `css_deep_selector`
> rm: translateX(4px); }  /* Dark theme için submenu hover */ body.dark-theme .sidebar-submenu-link:hover {     background: rgba(255, 255, 255, 0.1);     color: var(--

**153.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/sidebar.css` (satır 200): `css_deep_selector`
>  var(--dark-color); }  /* Light theme için submenu hover */ body:not(.dark-theme) .sidebar-submenu-link:hover {     background: rgba(0, 0, 0, 0.08);     color: var(--dark-

**154.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/topbar.css` (satır 171): `css_important`
>     }          .topbar-menu-toggle {         display: block !important;     }          .topbar-btn {         width: 36px;         

**155.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/topbar.css` (satır 205): `css_important`
> h: 769px) {     .topbar-menu-toggle {         display: none !important;     }          .fullscreen-toggle {         display: flex 

**156.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/css/includes/topbar.css` (satır 209): `css_important`
> ;     }          .fullscreen-toggle {         display: flex !important; /* Desktop'ta tam ekran butonunu göster */     }          

**157.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 205): `js_console_log`
> tElement.requestFullscreen().catch(err => {                 console.log('Fullscreen error:', err);             });         } else { 

**158.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 6): `css_deep_selector`
> {     'use strict';          // Global translation function     window.getTranslation = function(key) {         const translations = {             'en': {         

**159.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 33): `css_deep_selector`
> ][key] : key;     };          // Global notification system     window.showNotification = function(message, type = 'info') {         const notification = document.createElement('div');

**160.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 35): `css_deep_selector`
>         const notification = document.createElement('div');         notification.className = `notification notification-${type}`;         notification.textContent = message;         

**161.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 73): `css_deep_selector`
> nsform = 'translateX(100%)';             setTimeout(() => {                 if(document.body.contains(notification)) {                     document.body.removeChild(notification)

**162.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 123): `css_deep_selector`
>    }         }     };          // Global keyboard shortcuts     document.addEventListener('keydown', function(e) {         // Escape key - close sidebar and notifications    

**163.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 130): `css_deep_selector`
> notifications = document.querySelectorAll('.notification');             notifications.forEach(notification => {                 notification.style.transform = 'translateX(

**164.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 133): `css_deep_selector`
> rm = 'translateX(100%)';                 setTimeout(() => {                     if(document.body.contains(notification)) {                         document.body.removeChild(notificat

**165.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 149): `css_deep_selector`
> ctrlKey && e.key === 'q') {             e.preventDefault();             if(typeof window.logout === 'function') {                 window.logout();             }         }   

**166.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 186): `css_deep_selector`
> themeIcon = document.querySelector('.theme-icon');                  if(body.classList.contains('dark-theme')) {             body.classList.remove('dark-theme');           

**167.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 202): `css_deep_selector`
>     }         }     };          // Global fullscreen toggle     window.toggleFullscreen = function() {         if (!document.fullscreenElement) {             docu

**168.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 203): `css_deep_selector`
> ullscreen toggle     window.toggleFullscreen = function() {         if (!document.fullscreenElement) {             document.documentElement.requestFullscreen().ca

**169.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 204): `css_deep_selector`
> n = function() {         if (!document.fullscreenElement) {             document.documentElement.requestFullscreen().catch(err => {                 console.log('Fullscreen error:', err);     

**170.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 208): `css_deep_selector`
> 'Fullscreen error:', err);             });         } else {             if (document.exitFullscreen) {                 document.exitFullscreen();             }   

**171.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 236): `css_deep_selector`
> , window.handleResize);          // Initialize on page load     document.addEventListener('DOMContentLoaded', function() {         // Önce responsive kontrolü yap         window.hand

**172.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/common.js` (satır 245): `css_deep_selector`
>         const sidebar = document.querySelector('.sidebar');         if(sidebar && window.innerWidth > 768) {             sidebar.classList.add('open');             docu

**173.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/dashboard.js` (satır 2): `css_deep_selector`
> // Dashboard JavaScript document.addEventListener('DOMContentLoaded', function() {     // Dashboard elemanlarını seç     const dashboardCards 

**174.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/dashboard.js` (satır 9): `css_deep_selector`
> arına tıklama olayları     dashboardCards.forEach(card => {         card.addEventListener('click', function() {             // Kart tıklama animasyonu             this.sty

**175.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/dashboard.js` (satır 22): `css_deep_selector`
> cardTitle);         });                  // Hover efektleri         card.addEventListener('mouseenter', function() {             this.style.borderColor = 'var(--primary-color)'

**176.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/dashboard.js` (satır 26): `css_deep_selector`
> .borderColor = 'var(--primary-color)';         });                  card.addEventListener('mouseleave', function() {             this.style.borderColor = 'var(--border-color)';

**177.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/dashboard.js` (satır 70): `css_deep_selector`
> urrent = 0;         const increment = target / 50;                  const timer = setInterval(() => {             current += increment;             if(current >=

**178.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 52): `php_csrf_token`
> n';         csrfInput.value = document.querySelector('input[name="csrf_token"]').value;                  form.appendChild(languageInput);

**179.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 64): `js_innerHTML`
> ction(e) {         // Loading animasyonu         loginButton.innerHTML = '<span class="loading-spinner"></span> ' + getTranslation('

**180.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 70): `js_innerHTML`
> erySelector('.error-message')) {                 loginButton.innerHTML = getTranslation('login');                 loginButton.disabl

**181.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 2): `css_deep_selector`
> // Login Sayfası JavaScript document.addEventListener('DOMContentLoaded', function() {     // Form elemanlarını seç     const form = document.quer

**182.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 62): `css_deep_selector`
> form.submit();     };          // Form gönderimi animasyonu     form.addEventListener('submit', function(e) {         // Loading animasyonu         loginButton.innerHTML

**183.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 69): `css_deep_selector`
> ta varsa animasyonu geri al         setTimeout(function() {             if(document.querySelector('.error-message')) {                 loginButton.innerHTML = getTranslation('log

**184.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 77): `css_deep_selector`
> }         }, 2000);     });          // Input animasyonları     [usernameInput, passwordInput, languageSelect].forEach(input => {         input.addEventListener('focus', function() {       

**185.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 78): `css_deep_selector`
> ameInput, passwordInput, languageSelect].forEach(input => {         input.addEventListener('focus', function() {             this.parentElement.classList.add('focused');   

**186.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 82): `css_deep_selector`
> arentElement.classList.add('focused');         });                  input.addEventListener('blur', function() {             if(!this.value) {                 this.parentEl

**187.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 90): `css_deep_selector`
>       });     });          // Enter tuşu ile form gönderimi     [usernameInput, passwordInput].forEach(input => {         input.addEventListener('keypress', function(e) {   

**188.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 91): `css_deep_selector`
> erimi     [usernameInput, passwordInput].forEach(input => {         input.addEventListener('keypress', function(e) {             if(e.key === 'Enter') {                 form.su

**189.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 99): `css_deep_selector`
>    });     });          // Beni hatırla checkbox animasyonu     rememberCheckbox.addEventListener('change', function() {         if(this.checked) {             this.parentElement.c

**190.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/login.js` (satır 108): `css_deep_selector`
> });          // Sayfa yüklendiğinde kullanıcı adına odaklan     if(usernameInput && !usernameInput.value) {         usernameInput.focus();     }          // Hata mesaj

**191.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 2): `css_deep_selector`
> // Sidebar JavaScript document.addEventListener('DOMContentLoaded', function() {     // Sidebar elemanlarını seç     const sidebar = documen

**192.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 11): `css_deep_selector`
>  Menu item tıklama olayları     menuItems.forEach(item => {         item.addEventListener('click', function(e) {             const submenu = this.nextElementSibling;       

**193.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 15): `css_deep_selector`
> entSibling;                          // Eğer alt menü varsa             if(submenu && submenu.classList.contains('sidebar-submenu')) {                 e.preventDefault();                 submenu

**194.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 26): `css_deep_selector`
>                                 // Diğer alt menüleri kapat                 document.querySelectorAll('.sidebar-submenu').forEach(menu => {                     if(menu !== submenu) {                 

**195.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 27): `css_deep_selector`
> ment.querySelectorAll('.sidebar-submenu').forEach(menu => {                     if(menu !== submenu) {                         menu.classList.remove('open');     

**196.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 37): `css_deep_selector`
>                  // Normal link - sidebar'ı kapat (mobilde)                 if(window.innerWidth <= 768) {                     window.sidebarControl.close();         

**197.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 43): `css_deep_selector`
>         }                          // Aktif menü işaretleme             menuItems.forEach(menuItem => {                 menuItem.classList.remove('active');       

**198.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 50): `css_deep_selector`
> add('active');         });                  // Hover efekti         item.addEventListener('mouseenter', function() {             this.style.backgroundColor = '#34495e';        

**199.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 54): `css_deep_selector`
> his.style.backgroundColor = '#34495e';         });                  item.addEventListener('mouseleave', function() {             if(!this.classList.contains('active')) {       

**200.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 55): `css_deep_selector`
>            item.addEventListener('mouseleave', function() {             if(!this.classList.contains('active')) {                 this.style.backgroundColor = '';           

**201.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 64): `css_deep_selector`
> .sidebar-submenu-link');     submenuLinks.forEach(link => {         link.addEventListener('click', function() {             // Mobilde sidebar'ı kapat             if(windo

**202.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 66): `css_deep_selector`
> click', function() {             // Mobilde sidebar'ı kapat             if(window.innerWidth <= 768) {                 window.sidebarControl.close();             

**203.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 94): `css_deep_selector`
> in-content');          function updateMainContentMargin() {         if(sidebar && sidebar.classList.contains('open')) {             if(mainContent) {                 mainContent.c

**204.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 109): `css_deep_selector`
>          // Sidebar değişikliklerini izle     if(sidebar) {         const observer = new MutationObserver(function(mutations) {             mutations.forEach(function(mutation) {         

**205.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 110): `css_deep_selector`
> const observer = new MutationObserver(function(mutations) {             mutations.forEach(function(mutation) {                 if(mutation.attributeName === 'class') {   

**206.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/sidebar.js` (satır 111): `css_deep_selector`
> tions) {             mutations.forEach(function(mutation) {                 if(mutation.attributeName === 'class') {                     updateMainContentMargin();             

**207.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 2): `css_deep_selector`
> // Topbar JavaScript document.addEventListener('DOMContentLoaded', function() {     // Topbar elemanlarını seç     const topbar = document.

**208.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 16): `css_deep_selector`
>      // Sidebar açma/kapama     if(menuToggle && sidebar) {         menuToggle.addEventListener('click', function(e) {             e.preventDefault();             window.sidebarC

**209.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 29): `css_deep_selector`
> );     }          // Çıkış butonu onayı     if(logoutBtn) {         logoutBtn.addEventListener('click', function(e) {             e.preventDefault();                          if

**210.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 32): `css_deep_selector`
>  function(e) {             e.preventDefault();                          if(confirm(getTranslation('confirm_logout'))) {                 window.location.href = '?logout=1';        

**211.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 38): `css_deep_selector`
> on.href = '?logout=1';             }         });     }          window.addEventListener('scroll', function() {         const scrollTop = window.pageYOffset || document.do

**212.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 46): `css_deep_selector`
> l efekti aktif olsun         if(window.innerWidth <= 768) {             if(scrollTop > lastScrollTop && scrollTop > 200) {                 // Aşağı scroll - topbar'ı gizle           

**213.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 67): `css_deep_selector`
> lTop;                  // Scroll durduğunda topbar'ı göster         scrollTimeout = setTimeout(() => {             if(window.innerWidth <= 768 && topbar) {       

**214.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 68): `css_deep_selector`
>  topbar'ı göster         scrollTimeout = setTimeout(() => {             if(window.innerWidth <= 768 && topbar) {                 topbar.style.transform = 'translateY(0)';  

**215.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 84): `css_deep_selector`
> SelectorAll('.topbar-btn');     topbarBtns.forEach(btn => {         btn.addEventListener('mouseenter', function() {             this.style.transform = 'translateY(-2px)';     

**216.** `/mnt/data/FST_Cost_extracted/FST_Cost/assets/js/includes/topbar.js` (satır 88): `css_deep_selector`
> .style.transform = 'translateY(-2px)';         });                  btn.addEventListener('mouseleave', function() {             this.style.transform = 'translateY(0)';        

**217.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 23): `php_die_dump`
> ETCH_ASSOC);         } catch(PDOException $e) {             die("Veritabanı bağlantı hatası: " . $e->getMessage());         

**218.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 59): `php_die_dump`
> return true;         } catch(PDOException $e) {             die("Veritabanı oluşturma hatası: " . $e->getMessage());        

**219.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 19): `php_pdo_no_prepare`
> 432;dbname=" . DB_NAME;             $this->connection = new PDO($dsn, DB_USER, DB_PASS);             $this->connection->setA

**220.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 38): `php_pdo_no_prepare`
> ql:host=" . DB_HOST . ";port=5432";             $conn = new PDO($dsn, DB_USER, DB_PASS);             $conn->setAttribute(PDO

**221.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 97): `php_password_hash`
>   if($checkUser->rowCount() == 0) {             $password = password_hash('admin123', PASSWORD_DEFAULT);             $sql = "INSERT IN

**222.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 45): `css_deep_selector`
> ?");             $checkDb->execute([DB_NAME]);                          if($checkDb->rowCount() == 0) {                 // Veritabanını oluştur                 $sq

**223.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 92): `css_deep_selector`
> cısı oluştur         $this->createDefaultUser();     }          private function createDefaultUser() {         $checkUser = $this->connection->prepare("SELECT id 

**224.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/database.php` (satır 96): `css_deep_selector`
> ame = ?");         $checkUser->execute(['admin']);                  if($checkUser->rowCount() == 0) {             $password = password_hash('admin123', PASSWORD_

**225.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 7): `css_deep_selector`
> anguage = 'en';     private static $translations = [];          public static function setLanguage($lang) {         self::$currentLanguage = $lang;         self::loadT

**226.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 12): `css_deep_selector`
> guage = $lang;         self::loadTranslations();     }          public static function getCurrentLanguage() {         return self::$currentLanguage;     }          priva

**227.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 16): `css_deep_selector`
> guage() {         return self::$currentLanguage;     }          private static function loadTranslations() {         $langFile = "languages/" . self::$currentLanguage .

**228.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 24): `css_deep_selector`
> lizce yükle             $defaultFile = "languages/en.json";             if(file_exists($defaultFile)) {                 $content = file_get_contents($defaultFile);

**229.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 31): `css_deep_selector`
> _decode($content, true);             }         }     }          public static function get($key, $default = null) {         if(isset(self::$translations[$key])) {             

**230.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 32): `css_deep_selector`
>         public static function get($key, $default = null) {         if(isset(self::$translations[$key])) {             return self::$translations[$key];         }    

**231.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/language.php` (satır 38): `css_deep_selector`
> key];         }         return $default ?: $key;     }          public static function getAvailableLanguages() {         return [             'en' => 'English',            

**232.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 24): `php_superglobals`
> otomatik giriş yap if(!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {     try {         require_once 'confi

**233.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 38): `php_superglobals`
> ND s.expires_at > NOW()         ");         $stmt->execute([$_COOKIE['remember_token']]);         $user = $stmt->fetch();       

**234.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 68): `php_superglobals`
>   } }  // Çıkış fonksiyonu function logout() {     if(isset($_COOKIE['remember_token'])) {         try {             require_onc

**235.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 76): `php_superglobals`
> ions WHERE session_token = ?");             $stmt->execute([$_COOKIE['remember_token']]);                          setcookie('re

**236.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 16): `php_header_location`
>    setcookie('remember_token', '', time() - 3600, '/');     header('Location: login.php?timeout=1');     exit(); }  // Session aktivitesi

**237.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 61): `php_header_location`
> kSession() {     if(!isset($_SESSION['user_id'])) {         header('Location: login.php');         exit();     } }  // Çıkış fonksiyonu f

**238.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 87): `php_header_location`
> 3600, '/');         }     }          session_destroy();     header('Location: login.php');     exit(); } ?> 

**239.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 11): `css_deep_selector`
> 32)); }  // Session timeout kontrolü (2 saat = 7200 saniye) if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 7200)) {     // Session süresi dolmuş, otomatik çıkış     session_un

**240.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 24): `css_deep_selector`
>  // Eğer session yoksa ama cookie varsa, otomatik giriş yap if(!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {     try {         require_once 'config/database.php';      

**241.** `/mnt/data/FST_Cost_extracted/FST_Cost/config/session.php` (satır 68): `css_deep_selector`
>    exit();     } }  // Çıkış fonksiyonu function logout() {     if(isset($_COOKIE['remember_token'])) {         try {             require_once 'config/database.php

**242.** `/mnt/data/FST_Cost_extracted/FST_Cost/includes/sidebar.php` (satır 13): `php_superglobals`
> '     ]; }  // Aktif sayfa kontrolü $currentPage = basename($_SERVER['PHP_SELF'], '.php'); ?> <!-- Sidebar --> <aside class="sid

## Öneriler (Genel)

**PHP (Güvenlik & Performans)**
1. Tüm veritabanı işlemlerinde **prepared statement** ve **parametre bağlama** kullanın; `$_GET/$_POST` verisini doğrudan sorguya eklemeyin.
2. `display_errors` üretimde **kapalı** olmalı; loglara yönlendirin. `error_reporting(E_ALL)` yalnızca geliştirici ortamında aktif olsun.
3. `eval`, `unserialize`, `base64_decode` gibi fonksiyonları kaçının; gerekiyorsa çok kontrollü ve doğrulanmış girdilerde kullanın.
4. Parola saklama için `password_hash/password_verify`; `md5/sha1` **kullanmayın**.
5. Dosya yükleme varsa uzantı/mime kontrolü, boyut limiti, rastgele isim, ayrı upload dizini, istemci girdisini asla iş path’i olarak kullanmama.
6. CSRF koruması: Formlarda token üretimi ve sunucuda doğrulama.
7. Yönlendirmelerde (`header('Location: ...')`) açık yönlendirme (open redirect) kontrolü.

**JavaScript (Güvenlik & Temizlik)**
1. Kullanıcı girdisini DOM'a basarken `innerHTML` yerine **textContent** tercih edin. Gerekirse güvenli şablonlama kullanın.
2. `eval`, `document.write` kullanmayın. Gereksiz `console.log` kayıtlarını kaldırın ya da debug bayrağına bağlayın.
3. Tekrarlayan fonksiyonları `utils` modülüne alın; olayları `addEventListener` ile delege edin.

**CSS (Bakım Kolaylığı)**
1. `!important` kullanımını azaltın; özgüllüğü (specificity) doğru kurgulayın.
2. 3+ seviye çok derin seçicilerden kaçının; BEM/utility-first (Tailwind gibi) yaklaşımı düşünün.
3. Tekrarlayan kuralları ortak bir sınıfa taşıyın.

**Genel Mimarî**
1. Ortak yardımcı (helpers), config ve sabitleri modülerleştirin.
2. Uzun dosyaları bölün; 300+ satır üstü dosyalar için mantıksal parçalara ayırma.
3. Kod tarzını standardize edin (PHP-CS-Fixer, ESLint, Stylelint). CI’de otomatik kontrol.