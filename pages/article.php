<?php
global $CATEGORIES, $CURRENT_LANG;
$slug = $_GET['slug'] ?? '';
$articles = getDummyArticles();
$article = null;
foreach ($articles as $a) {
    if ($a['slug'] === $slug) { $article = $a; break; }
}
if (!$article) $article = $articles[0]; // fallback
$pageTitle = getArticleTitle($article);
$artCat = array_values(array_filter($CATEGORIES, fn($c) => $c['slug'] === $article['category']));
$catInfo = !empty($artCat) ? $artCat[0] : null;
// Related articles (different from current)
$related = array_filter($articles, fn($a) => $a['id'] !== $article['id']);
$related = array_slice($related, 0, 3);
?>

<article class="article-page" itemscope itemtype="https://schema.org/NewsArticle">
    <div class="container">
        <div class="content-with-sidebar">
            <main class="animate-fadeInUp">
                <div class="article-header">
                    <div class="breadcrumb">
                        <a href="index.php"><?= __('home') ?></a> &rsaquo;
                        <?php if ($catInfo): ?>
                        <a href="<?= getCategoryUrl($catInfo) ?>"><?= getCatName($catInfo) ?></a> &rsaquo;
                        <?php endif; ?>
                        <span><?= truncateText(getArticleTitle($article), 50) ?></span>
                    </div>
                    <?php if ($catInfo): ?>
                    <span class="cat-badge" style="background:<?= $catInfo['color'] ?>;display:inline-block;padding:0.2rem 0.75rem;border-radius:4px;font-size:0.7rem;font-weight:700;color:#fff;text-transform:uppercase;margin-bottom:0.75rem;"><?= getCatName($catInfo) ?></span>
                    <?php endif; ?>
                    <h1 itemprop="headline"><?= htmlspecialchars(getArticleTitle($article)) ?></h1>
                    <div class="article-meta">
                        <span itemprop="author">👤 <?= $article['author'] ?></span>
                        <span>📅 <time itemprop="datePublished" datetime="<?= $article['date'] ?>"><?= formatDate($article['date']) ?></time></span>
                        <span>🕐 <?= $article['read_time'] ?> <?= __('min_read') ?></span>
                        <span>👁 <?= number_format($article['views']) ?> <?= __('views') ?></span>
                    </div>
                </div>

                <div class="share-bar">
                    <a href="#" class="share-btn fb">📘 Facebook</a>
                    <a href="#" class="share-btn tw">🐦 Twitter</a>
                    <a href="#" class="share-btn wa">💬 WhatsApp</a>
                    <a href="#" class="share-btn tg">✈️ Telegram</a>
                </div>

                <div class="article-featured-img">
                    <img src="<?= getImagePath($article['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($article)) ?>" itemprop="image" loading="eager">
                </div>

                <div class="article-body" itemprop="articleBody">
                    <?= cleanArticleBody(getArticleBody($article)) ?>
                    <p><?= $CURRENT_LANG === 'kn' ? 'ಈ ಸುದ್ದಿಯ ಬಗ್ಗೆ ಹೆಚ್ಚಿನ ಮಾಹಿತಿಗಾಗಿ ನಮ್ಮ ವೆಬ್‌ಸೈಟ್ ಅನ್ನು ನಿಯಮಿತವಾಗಿ ಭೇಟಿ ನೀಡಿ. ಈ ಬೆಳವಣಿಗೆಯ ಬಗ್ಗೆ ಹೆಚ್ಚಿನ ವಿವರಗಳು ಬಂದಂತೆ ನಾವು ನಿಮ್ಮನ್ನು ಅಪ್‌ಡೇಟ್ ಮಾಡುತ್ತೇವೆ. ಕರ್ನಾಟಕದ ಎಲ್ಲಾ ಇತ್ತೀಚಿನ ಸುದ್ದಿಗಳಿಗಾಗಿ ರಾ.ಪವರ್ 28 ಅನ್ನು ಅನುಸರಿಸಿ.' : ($CURRENT_LANG === 'hi' ? 'इस खबर के बारे में अधिक जानकारी के लिए हमारी वेबसाइट पर नियमित रूप से आएं। जैसे-जैसे इस विकास के बारे में अधिक विवरण आएंगे, हम आपको अपडेट करते रहेंगे। कर्नाटक की सभी नवीनतम खबरों के लिए रा. पावर 28 को फॉलो करें।' : 'For more information about this story, visit our website regularly. We will keep you updated as more details emerge about this development. Follow Ra. Power 28 for all the latest news from Karnataka, covering politics, sports, crime, health, and more.') ?></p>
                </div>

                <div class="article-tags">
                    <span class="tag">#<?= $article['category'] ?></span>
                    <span class="tag">#Karnataka</span>
                    <span class="tag">#LatestNews</span>
                    <span class="tag">#RaPower28</span>
                </div>

                <!-- Related Articles -->
                <section style="margin-top:2.5rem;">
                    <div class="section-header">
                        <h2>📰 <?= __('related') ?></h2>
                    </div>
                    <div class="news-grid" style="grid-template-columns:repeat(3,1fr);">
                        <?php foreach ($related as $rel): ?>
                        <a href="<?= getArticleUrl($rel) ?>" class="news-card hover-lift">
                            <div class="news-card-image">
                                <img src="<?= getImagePath($rel['image']) ?>" alt="<?= htmlspecialchars(getArticleTitle($rel)) ?>" loading="lazy">
                            </div>
                            <div class="news-card-body">
                                <h3><?= htmlspecialchars(getArticleTitle($rel)) ?></h3>
                                <div class="card-meta">
                                    <span>📅 <?= formatDate($rel['date']) ?></span>
                                    <span>👁 <?= number_format($rel['views']) ?></span>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            </main>
            <aside>
                <?php include __DIR__ . '/../includes/sidebar.php'; ?>
            </aside>
        </div>
    </div>
</article>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "headline": "<?= htmlspecialchars(getArticleTitle($article)) ?>",
    "image": "<?= SITE_URL ?>/<?= getImagePath($article['image']) ?>",
    "datePublished": "<?= $article['date'] ?>",
    "author": {"@type": "Person", "name": "<?= $article['author'] ?>"},
    "publisher": {"@type": "Organization", "name": "<?= SITE_NAME ?>", "logo": {"@type": "ImageObject", "url": "<?= SITE_URL ?>/assets/images/logo.png"}},
    "description": "<?= htmlspecialchars(truncateText(getArticleBody($article), 160)) ?>"
}
</script>
