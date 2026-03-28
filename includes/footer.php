<?php global $CATEGORIES, $CURRENT_LANG; ?>

<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo-text">
                    <h2><?= getSiteName() ?></h2>
                </div>
                <div class="tagline"><?= SITE_TAGLINE ?> — <?= getSiteTagline() ?></div>
                <p><?= $CURRENT_LANG === 'kn' ? 'ಕರ್ನಾಟಕದ ನಂಬಿಕಸ್ಥ ಸುದ್ದಿ ಮೂಲ. ರಾಜಕೀಯ, ಕ್ರೀಡೆ, ಅಪರಾಧ, ಆರೋಗ್ಯ ಮತ್ತು ಹೆಚ್ಚಿನ ಸುದ್ದಿಗಳನ್ನು ಪಡೆಯಿರಿ.' : ($CURRENT_LANG === 'hi' ? 'कर्नाटक का विश्वसनीय समाचार स्रोत। राजनीति, खेल, अपराध, स्वास्थ्य और अधिक समाचार प्राप्त करें।' : 'Karnataka\'s trusted news source. Get the latest news on politics, sports, crime, health, and more in Kannada, English, and Hindi.') ?></p>
                <div class="social-links" style="margin-top:1rem;">
                    <a href="#">📘</a><a href="#">🐦</a><a href="#">📷</a><a href="#">▶️</a><a href="#">💬</a>
                </div>
            </div>
            <div class="footer-col">
                <h3><?= __('categories') ?></h3>
                <ul>
                    <?php foreach (array_slice($CATEGORIES, 0, 5) as $cat): ?>
                    <li><a href="<?= getCategoryUrl($cat) ?>"><?= $cat['icon'] ?> <?= getCatName($cat) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="footer-col">
                <h3>&nbsp;</h3>
                <ul>
                    <?php foreach (array_slice($CATEGORIES, 5) as $cat): ?>
                    <li><a href="<?= getCategoryUrl($cat) ?>"><?= $cat['icon'] ?> <?= getCatName($cat) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="footer-col">
                <h3><?= __('about') ?></h3>
                <ul>
                    <li><a href="?page=about"><?= __('about') ?></a></li>
                    <li><a href="?page=contact"><?= __('contact') ?></a></li>
                    <li><a href="#"><?= __('privacy') ?></a></li>
                    <li><a href="#"><?= __('terms') ?></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© <?= date('Y') ?> <?= getSiteName() ?> — <?= SITE_TAGLINE ?> — <?= __('copyright') ?></p>
        </div>
    </div>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>
