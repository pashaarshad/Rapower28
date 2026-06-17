<?php
global $CATEGORIES, $CURRENT_LANG;
$slug = $_GET['slug'] ?? '';
$page = isset($_GET['pg']) ? (int)$_GET['pg'] : 1;
$limit = 12;

$cat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $slug));

if (!empty($cat)) {
    $cat = $cat[0];
    $pageTitle = getCatName($cat);
    $catArticles = getArticles($limit, $cat['slug'], null, $page);
    $totalArticles = getTotalArticlesCount($cat['slug']);
} else {
    $cat = ['en'=>'All News','kn'=>'ಎಲ್ಲಾ ಸುದ್ದಿ','hi'=>'सभी समाचार','icon'=>'📰','color'=>'#1B6B93','slug'=>'all'];
    $pageTitle = getCatName($cat);
    $catArticles = getArticles($limit, 'all', null, $page);
    $totalArticles = getTotalArticlesCount('all');
}

$totalPages = ceil($totalArticles / $limit);
?>

<section class="category-section" style="padding-top:2rem;">
    <div class="container">
        <div class="content-with-sidebar">
            <main>
                <div class="section-header" style="border-bottom-color:<?= $cat['color'] ?>">
                    <h2><span style="color:<?= $cat['color'] ?>"><?= $cat['icon'] ?></span> <?= getCatName($cat) ?></h2>
                </div>
                
                <?php if (empty($catArticles)): ?>
                    <div style="text-align:center;padding:4rem 0;">
                        <p style="font-size:3rem;margin-bottom:1rem;">📭</p>
                        <h3><?= __('no_results') ?></h3>
                    </div>
                <?php else: ?>
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

                    <?php if ($totalPages > 1): ?>
                    <div class="pagination" style="margin-top:3rem;display:flex;justify-content:center;gap:0.5rem;">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?page=category&slug=<?= $cat['slug'] ?>&pg=<?= $i ?>" class="<?= $page === $i ? 'active' : '' ?>" style="display:flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:6px;text-decoration:none;font-weight:700;<?= $page === $i ? 'background:#1B6B93;color:#fff;' : 'background:#fff;color:#1B6B93;border:1px solid #E2E8F0;' ?>"><?= $i ?></a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages): ?>
                            <a href="?page=category&slug=<?= $cat['slug'] ?>&pg=<?= $page + 1 ?>" style="display:flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:6px;text-decoration:none;background:#fff;color:#1B6B93;border:1px solid #E2E8F0;">&rarr;</a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </main>
            <aside>
                <?php include __DIR__ . '/../includes/sidebar.php'; ?>
            </aside>
        </div>
    </div>
</section>
