<?php
global $CATEGORIES, $CURRENT_LANG;
$articles = getArticles(20);
$featured = array_values(array_filter($articles, fn($a) => ($a['is_featured'] ?? false) || ($a['is_breaking'] ?? false)));
if (empty($featured)) {
    $featured = array_slice($articles, 0, 3);
}
$pageTitle = __('home');
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <?php if (!empty($featured)): ?>
            <!-- Main Hero -->
            <a href="<?= getArticleUrl($featured[0]) ?>" class="hero-main animate-fadeInUp">
                <img src="<?= getImagePath($featured[0]['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($featured[0])) ?>" loading="eager">
                <div class="hero-overlay">
                    <?php
                    $heroCat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $featured[0]['category']));
                    if (!empty($heroCat)):
                    ?>
                    <span class="cat-badge" style="background:<?= $heroCat[0]['color'] ?>"><?= getCatName($heroCat[0]) ?></span>
                    <?php endif; ?>
                    <h2><?= htmlspecialchars(getArticleTitle($featured[0])) ?></h2>
                    <div class="hero-meta">
                        <span>👤 <?= $featured[0]['author'] ?></span>
                        <span>📅 <?= formatDate($featured[0]['date']) ?></span>
                        <span>👁 <?= number_format($featured[0]['views']) ?></span>
                    </div>
                </div>
            </a>
            <!-- Hero Sidebar -->
            <div class="hero-sidebar">
                <?php foreach (array_slice($featured, 1, 2) as $i => $art): ?>
                <a href="<?= getArticleUrl($art) ?>" class="hero-sub animate-fadeInUp delay-<?= $i+1 ?>">
                    <img src="<?= getImagePath($art['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($art)) ?>" loading="eager">
                    <div class="hero-overlay">
                        <?php
                        $subCat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $art['category']));
                        if (!empty($subCat)):
                        ?>
                        <span class="cat-badge" style="background:<?= $subCat[0]['color'] ?>"><?= getCatName($subCat[0]) ?></span>
                        <?php endif; ?>
                        <h2><?= htmlspecialchars(getArticleTitle($art)) ?></h2>
                    </div>
                </a>
                <?php endforeach; ?>
                <?php if (count($featured) < 3): ?>
                <a href="<?= getArticleUrl($articles[2]) ?>" class="hero-sub animate-fadeInUp delay-2">
                    <img src="<?= getImagePath($articles[2]['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($articles[2])) ?>">
                    <div class="hero-overlay">
                        <h2><?= htmlspecialchars(getArticleTitle($articles[2])) ?></h2>
                    </div>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Category Sections + Sidebar -->
<div class="container">
    <div class="content-with-sidebar">
        <main>
            <?php
            $showCats = ['politics','sports','district','health-environment','country','crime','state','literature'];
            foreach ($showCats as $catSlug):
                $cat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $catSlug));
                if (empty($cat)) continue;
                $cat = $cat[0];
                $catArticles = getArticlesByCategory($articles, $catSlug, 4);
                if (empty($catArticles)) {
                    // Show all articles as fallback
                    $catArticles = array_slice($articles, 0, 4);
                }
            ?>
            <section class="category-section reveal">
                <div class="section-header" style="border-bottom-color:<?= $cat['color'] ?>">
                    <h2><span style="color:<?= $cat['color'] ?>"><?= $cat['icon'] ?></span> <?= getCatName($cat) ?></h2>
                    <a href="<?= getCategoryUrl($cat) ?>" class="see-all"><?= __('see_all') ?> →</a>
                </div>
                <div class="news-grid">
                    <?php foreach ($catArticles as $j => $art): ?>
                    <a href="<?= getArticleUrl($art) ?>" class="news-card hover-lift animate-fadeInUp delay-<?= $j+1 ?>">
                        <div class="news-card-image">
                            <img src="<?= getImagePath($art['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($art)) ?>" loading="lazy">
                        </div>
                        <div class="news-card-body">
                            <span class="cat-badge" style="background:<?= $cat['color'] ?>"><?= getCatName($cat) ?></span>
                            <h3><?= htmlspecialchars(getArticleTitle($art)) ?></h3>
                            <div class="card-meta">
                                <span>📅 <?= formatDate($art['date']) ?></span>
                                <span>👁 <?= number_format($art['views']) ?></span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endforeach; ?>
        </main>
        <aside>
            <?php include __DIR__ . '/../includes/sidebar.php'; ?>
        </aside>
    </div>
</div>
