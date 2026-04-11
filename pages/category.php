<?php
global $CATEGORIES, $CURRENT_LANG;
$slug = $_GET['slug'] ?? '';
$cat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $slug));
$articles = getDummyArticles();

if (!empty($cat)) {
    $cat = $cat[0];
    $pageTitle = getCatName($cat);
    $catArticles = getArticles(20, $cat['slug']);
} else {
    $cat = ['en'=>'All News','kn'=>'ಎಲ್ಲಾ ಸುದ್ದಿ','hi'=>'सभी समाचार','icon'=>'📰','color'=>'#1B6B93','slug'=>'all'];
    $pageTitle = getCatName($cat);
    $catArticles = getArticles(20);
}
?>

<section class="category-section" style="padding-top:2rem;">
    <div class="container">
        <div class="content-with-sidebar">
            <main>
                <div class="section-header" style="border-bottom-color:<?= $cat['color'] ?>">
                    <h2><span style="color:<?= $cat['color'] ?>"><?= $cat['icon'] ?></span> <?= getCatName($cat) ?></h2>
                </div>
                <div class="news-grid">
                    <?php foreach ($catArticles as $j => $art): ?>
                    <a href="<?= getArticleUrl($art) ?>" class="news-card hover-lift animate-fadeInUp delay-<?= ($j % 4) + 1 ?>">
                        <div class="news-card-image">
                            <img src="<?= getImagePath($art['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($art)) ?>" loading="lazy">
                        </div>
                        <div class="news-card-body">
                            <?php $artCat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $art['category'])); ?>
                            <span class="cat-badge" style="background:<?= !empty($artCat) ? $artCat[0]['color'] : $cat['color'] ?>"><?= !empty($artCat) ? getCatName($artCat[0]) : '' ?></span>
                            <h3><?= htmlspecialchars(getArticleTitle($art)) ?></h3>
                            <div class="card-meta">
                                <span>📅 <?= formatDate($art['date']) ?></span>
                                <span>👁 <?= number_format($art['views']) ?></span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="pagination" style="margin-top:2rem;">
                    <span class="active">1</span><a href="#">2</a><a href="#">3</a><a href="#">→</a>
                </div>
            </main>
            <aside>
                <?php include __DIR__ . '/../includes/sidebar.php'; ?>
            </aside>
        </div>
    </div>
</section>
