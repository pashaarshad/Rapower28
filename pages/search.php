<?php
$q = $_GET['q'] ?? '';
$page = isset($_GET['pg']) ? (int)$_GET['pg'] : 1;
$limit = 12;

if ($q) {
    $results = getArticles($limit, null, $q, $page);
    $totalResults = getTotalArticlesCount(null, $q);
} else {
    $results = [];
    $totalResults = 0;
}

$totalPages = ceil($totalResults / $limit);
$pageTitle = __('search') . ($q ? ': ' . $q : '');
?>
<section style="padding:2rem 0;min-height:50vh;">
    <div class="container">
        <div class="section-header"><h2>🔍 <?= __('search') ?><?= $q ? ': "' . htmlspecialchars($q) . '"' : '' ?></h2></div>
        <?php if (empty($results) && $q): ?>
        <div style="text-align:center;padding:3rem;color:var(--color-text-muted);">
            <p style="font-size:3rem;margin-bottom:1rem;">🔍</p>
            <p style="font-size:1.1rem;"><?= __('no_results') ?></p>
        </div>
        <?php elseif (!empty($results)): ?>
        <div class="news-grid">
            <?php foreach ($results as $art): ?>
            <a href="<?= getArticleUrl($art) ?>" class="news-card hover-lift">
                <div class="news-card-image"><img src="<?= getImagePath($art['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($art)) ?>" loading="lazy"></div>
                <div class="news-card-body">
                    <h3><?= htmlspecialchars(getArticleTitle($art)) ?></h3>
                    <div class="card-meta"><span>📅 <?= formatDate($art['date']) ?></span><span>👁 <?= number_format($art['views']) ?></span></div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        
        <?php if ($totalPages > 1): ?>
        <div class="pagination" style="margin-top:3rem;display:flex;justify-content:center;gap:0.5rem;">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=search&q=<?= urlencode($q) ?>&pg=<?= $i ?>" class="<?= $page === $i ? 'active' : '' ?>" style="display:flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:6px;text-decoration:none;font-weight:700;<?= $page === $i ? 'background:#1B6B93;color:#fff;' : 'background:#fff;color:#1B6B93;border:1px solid #E2E8F0;' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <div style="text-align:center;padding:3rem;color:var(--color-text-muted);">
            <p style="font-size:1.1rem;"><?= __('search_placeholder') ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>
