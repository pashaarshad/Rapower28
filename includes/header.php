<?php 
global $CURRENT_LANG, $CATEGORIES, $pageTitle; 

// Dynamic Open Graph Tags
$ogTitle = getSiteName() . ' - ' . getSiteTagline();
$ogDesc = "ರಾ ಪವರ್ 28 ವೆಬ್ ಸೈಟ್ ಪುಟ ಓದಿರಿ. ಕರ್ನಾಟಕದ ತಾಜಾ ಸುದ್ದಿಗಳು, ಕನ್ನಡ ನ್ಯೂಸ್.";
$ogImage = SITE_URL . "/assets/images/logo.png";
$ogUrl = SITE_URL;

if (isset($_GET['page']) && $_GET['page'] === 'article' && !empty($_GET['slug'])) {
    $slug = $_GET['slug'];
    $article = getArticleBySlug($slug);
    if ($article) {
        $ogTitle = getArticleTitle($article);
        $ogDesc = truncateText(getArticleBody($article), 160);
        $ogImage = SITE_URL . '/' . getImagePath($article['image']);
        $ogUrl = SITE_URL . '/?page=article&slug=' . $slug;
    }
}
?>
<!DOCTYPE html>
<html lang="kn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | ' : '' ?><?= getSiteName() ?> - <?= getSiteTagline() ?></title>
    <meta name="description" content="<?= htmlspecialchars($ogDesc) ?>">
    <meta name="keywords" content="Kannada news today, ಕನ್ನಡ ನ್ಯೂಸ್, Karnataka latest news, ಕರ್ನಾಟಕ ಸುದ್ದಿ, breaking news Karnataka, Ra Power 28, ರಾ ಪವರ್ 28, India news Kannada, district news Karnataka, Karnataka politics, sports news, crime news, health news">
    <meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($ogDesc) ?>">
    <meta property="og:type" content="<?= isset($_GET['page']) && $_GET['page'] === 'article' ? 'article' : 'website' ?>">
    <meta property="og:url" content="<?= $ogUrl ?>">
    <meta property="og:image" content="<?= $ogImage ?>">
    <meta name="twitter:card" content="summary_large_image">

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
            <!-- Language switcher removed as per client requirement -->
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
