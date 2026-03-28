<?php global $CURRENT_LANG, $CATEGORIES, $pageTitle; ?>
<!DOCTYPE html>
<html lang="<?= $CURRENT_LANG === 'kn' ? 'kn' : ($CURRENT_LANG === 'hi' ? 'hi' : 'en') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | ' : '' ?><?= getSiteName() ?> - <?= getSiteTagline() ?></title>
    <meta name="description" content="<?= getSiteName() ?> - <?= getSiteTagline() ?>. Get latest news in Kannada, English, Hindi. ಕನ್ನಡ ನ್ಯೂಸ್, Karnataka news, ಕರ್ನಾಟಕ ಸುದ್ದಿ, breaking news, politics, sports, crime, health.">
    <meta name="keywords" content="Kannada news today, ಕನ್ನಡ ನ್ಯೂಸ್, Karnataka latest news, ಕರ್ನಾಟಕ ಸುದ್ದಿ, breaking news Karnataka, Ra Power 28, ರಾ ಪವರ್ 28, India news Kannada, कर्नाटक समाचार, district news Karnataka, Karnataka politics, sports news, crime news, health news, ರಾಶಿ ಭವಿಷ್ಯ, daily horoscope Kannada, e-paper, ನಿಂಪು ವಾರ್ತೆ, Kannada newspaper online, Bangalore news today, ಬೆಂಗಳೂರು ಸುದ್ದಿ">
    <meta property="og:title" content="<?= getSiteName() ?> - <?= getSiteTagline() ?>">
    <meta property="og:description" content="Latest news from Karnataka in Kannada, English, Hindi. ಕನ್ನಡ ನ್ಯೂಸ್, ಕರ್ನಾಟಕ ಸುದ್ದಿ.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= SITE_URL ?>">
    <meta property="og:image" content="<?= SITE_URL ?>/assets/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="alternate" hreflang="en" href="<?= SITE_URL ?>?lang=en">
    <link rel="alternate" hreflang="kn" href="<?= SITE_URL ?>?lang=kn">
    <link rel="alternate" hreflang="hi" href="<?= SITE_URL ?>?lang=hi">
    <link rel="canonical" href="<?= SITE_URL ?>">
    <link rel="icon" href="assets/images/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NewsMediaOrganization",
        "name": "<?= SITE_NAME ?>",
        "alternateName": "<?= SITE_NAME_KN ?>",
        "url": "<?= SITE_URL ?>",
        "logo": "<?= SITE_URL ?>/assets/images/logo.png",
        "description": "Karnataka's trusted news source in Kannada, English, and Hindi",
        "sameAs": ["https://facebook.com/rapower28","https://twitter.com/rapower28","https://instagram.com/rapower28"]
    }
    </script>
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <span class="date-display">📅 <?= date('l, F j, Y') ?></span>
            <div class="social-links">
                <a href="#" title="Facebook">📘</a>
                <a href="#" title="Twitter">🐦</a>
                <a href="#" title="Instagram">📷</a>
                <a href="#" title="YouTube">▶️</a>
                <a href="#" title="WhatsApp">💬</a>
            </div>
        </div>
        <div class="top-bar-right">
            <div class="lang-switcher" id="langSwitcher">
                <a href="?lang=en<?= isset($_GET['page']) ? '&page='.$_GET['page'] : '' ?><?= isset($_GET['slug']) ? '&slug='.$_GET['slug'] : '' ?>" class="<?= $CURRENT_LANG === 'en' ? 'active' : '' ?>">EN</a>
                <a href="?lang=kn<?= isset($_GET['page']) ? '&page='.$_GET['page'] : '' ?><?= isset($_GET['slug']) ? '&slug='.$_GET['slug'] : '' ?>" class="<?= $CURRENT_LANG === 'kn' ? 'active' : '' ?>">ಕ</a>
                <a href="?lang=hi<?= isset($_GET['page']) ? '&page='.$_GET['page'] : '' ?><?= isset($_GET['slug']) ? '&slug='.$_GET['slug'] : '' ?>" class="<?= $CURRENT_LANG === 'hi' ? 'active' : '' ?>">हि</a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header" id="mainHeader">
    <div class="container">
        <div class="header-inner">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.png" alt="<?= SITE_NAME ?> Logo">
                <div class="logo-text">
                    <h1><?= getSiteName() ?></h1>
                    <span class="tagline"><?= getSiteTagline() ?></span>
                </div>
            </a>
            <div class="header-actions">
                <form class="search-bar" action="index.php" method="GET">
                    <input type="hidden" name="page" value="search">
                    <input type="text" name="q" placeholder="<?= __('search_placeholder') ?>" id="searchInput">
                    <button type="submit">🔍</button>
                </form>
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">☰</button>
            </div>
        </div>
    </div>
</header>

<?php include __DIR__ . '/nav.php'; ?>
<?php include __DIR__ . '/breaking-ticker.php'; ?>
