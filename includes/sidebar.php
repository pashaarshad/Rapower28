<?php
global $CURRENT_LANG;
$allArticles = getArticles(50);
$horoscope = getHoroscope();
// Sort by views for trending
$trending = $allArticles;
usort($trending, fn($a,$b) => ($b['views'] ?? 0) - ($a['views'] ?? 0));
$trending = array_slice($trending, 0, 5);
// Latest
$latest = $allArticles;
usort($latest, fn($a,$b) => strtotime($b['published_at'] ?? $b['date']) - strtotime($a['published_at'] ?? $a['date']));
$latest = array_slice($latest, 0, 5);
?>

<!-- Trending Widget -->
<div class="sidebar-widget animate-fadeInUp">
    <h3 class="widget-title">📈 <?= __('trending') ?></h3>
    <div class="trending-list">
        <?php foreach ($trending as $art): ?>
        <a href="<?= getArticleUrl($art) ?>" class="trending-item">
            <div>
                <h4><?= htmlspecialchars(getArticleTitle($art)) ?></h4>
                <div class="trend-meta">👁 <?= number_format($art['views']) ?> · <?= formatDate($art['date']) ?></div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<!-- Latest News Widget -->
<div class="sidebar-widget animate-fadeInUp delay-1">
    <h3 class="widget-title">🕐 <?= __('latest') ?></h3>
    <?php foreach ($latest as $art): ?>
    <a href="<?= getArticleUrl($art) ?>" class="trending-item" style="counter-increment:none;">
        <div>
            <h4><?= htmlspecialchars(getArticleTitle($art)) ?></h4>
            <div class="trend-meta"><?= formatDate($art['date']) ?> · <?= $art['read_time'] ?> <?= __('min_read') ?></div>
        </div>
    </a>
    <?php endforeach; ?>
</div>

<!-- Daily Horoscope Widget -->
<div class="sidebar-widget animate-fadeInUp delay-2">
    <h3 class="widget-title">⭐ <?= __('daily_horoscope') ?></h3>
    <?php foreach ($horoscope as $h): ?>
    <div class="horoscope-item">
        <div class="sign-icon"><?= $h['icon'] ?></div>
        <div>
            <div class="sign-name"><?= $CURRENT_LANG === 'kn' ? $h['kn'] : ($CURRENT_LANG === 'hi' ? $h['hi'] : $h['sign']) ?></div>
            <div class="sign-text"><?= $CURRENT_LANG === 'kn' ? $h['text_kn'] : ($CURRENT_LANG === 'hi' ? $h['text_hi'] : $h['text_en']) ?></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
