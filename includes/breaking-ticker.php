<?php $breakingItems = getBreakingNews(); ?>
<div class="breaking-ticker" id="breakingTicker">
    <div class="container" style="position:relative;overflow:hidden;">
        <div class="ticker-label">
            <span class="breaking-badge"><span class="breaking-dot"></span></span>
            &nbsp;<?= __('breaking_news') ?>
        </div>
        <div class="ticker-content" id="tickerContent">
            <?php foreach ($breakingItems as $item): ?>
            <span class="ticker-item"><?= htmlspecialchars($item) ?></span>
            <?php endforeach; ?>
            <?php foreach ($breakingItems as $item): ?>
            <span class="ticker-item"><?= htmlspecialchars($item) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>
