<?php
$q = $_GET['q'] ?? '';
$articles = getDummyArticles();
$results = [];
if ($q) {
    $q_lower = mb_strtolower($q);
    foreach ($articles as $art) {
        if (mb_stripos($art['title_en'], $q) !== false || mb_stripos($art['title_kn'], $q) !== false ||
            mb_stripos($art['title_hi'], $q) !== false || mb_stripos($art['body_en'], $q) !== false ||
            mb_stripos($art['category'], $q) !== false) {
            $results[] = $art;
        }
    }
}
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
        <?php else: ?>
        <div style="text-align:center;padding:3rem;color:var(--color-text-muted);">
            <p style="font-size:1.1rem;"><?= __('search_placeholder') ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>
