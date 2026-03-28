<?php global $CATEGORIES, $CURRENT_LANG; ?>
<nav class="category-nav" id="categoryNav">
    <div class="container">
        <a href="index.php" class="cat-link <?= !isset($_GET['page']) ? 'active' : '' ?>">
            <span class="cat-icon">🏠</span> <?= __('home') ?>
        </a>
        <?php foreach ($CATEGORIES as $cat): ?>
        <a href="<?= getCategoryUrl($cat) ?>" class="cat-link <?= (isset($_GET['slug']) && $_GET['slug'] === $cat['slug']) ? 'active' : '' ?>" style="--cat-color:<?= $cat['color'] ?>">
            <span class="cat-icon"><?= $cat['icon'] ?></span> <?= getCatName($cat) ?>
        </a>
        <?php endforeach; ?>
    </div>
</nav>
