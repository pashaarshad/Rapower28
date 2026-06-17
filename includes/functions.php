<?php
// Helper functions

function getArticleUrl($article) {
    return '?page=article&slug=' . $article['slug'];
}

function getCategoryUrl($cat) {
    return '?page=category&slug=' . $cat['slug'];
}

function formatDate($date) {
    return date('M d, Y', strtotime($date));
}

function getArticleTitle($article) {
    global $CURRENT_LANG;
    $key = 'title_' . $CURRENT_LANG;
    return $article[$key] ?? $article['title_en'];
}

function getArticleBody($article) {
    global $CURRENT_LANG;
    $key = 'body_' . $CURRENT_LANG;
    return $article[$key] ?? $article['body_en'];
}

function getArticlesByCategory($articles, $catSlug, $limit = 4) {
    $filtered = array_filter($articles, fn($a) => $a['category'] === $catSlug);
    return array_slice($filtered, 0, $limit);
}

function getFeaturedArticles($articles) {
    return array_filter($articles, fn($a) => $a['is_featured']);
}

function getImagePath($img) {
    if (empty($img)) return 'assets/images/default-news.jpg';
    return 'assets/images/news/' . $img;
}

function getSiteName() {
    global $CURRENT_LANG;
    if ($CURRENT_LANG === 'kn') return SITE_NAME_KN;
    if ($CURRENT_LANG === 'hi') return SITE_NAME_HI;
    return SITE_NAME;
}

function getSiteTagline() {
    global $CURRENT_LANG;
    if ($CURRENT_LANG === 'kn') return SITE_TAGLINE;
    if ($CURRENT_LANG === 'hi') return SITE_TAGLINE_HI;
    return SITE_TAGLINE_EN;
}

function truncateText($text, $length = 120) {
    // Remove shortcodes and block comments like <!-- wp:paragraph -->
    $text = preg_replace('/<!--(.|\s)*?-->/', '', $text);
    // Remove HTML tags
    $text = strip_tags($text);
    // Trim extra spaces
    $text = trim(preg_replace('/\s+/', ' ', $text));
    
    if (mb_strlen($text, 'UTF-8') <= $length) return $text;
    return mb_substr($text, 0, $length, 'UTF-8') . '...';
}

function cleanArticleBody($html) {
    // Remove Gutenberg block comments
    $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
    // Remove old embedded figure/image blocks to prevent double images
    $html = preg_replace('/<figure\b[^>]*>(.*?)<\/figure>/is', '', $html);
    return $html;
}
