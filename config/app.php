<?php
/**
 * Ra. Power 28 - Application Configuration
 */

define('SITE_NAME', 'Ra. Power 28');
define('SITE_NAME_KN', 'ರಾ.ಪವರ್ 28');
define('SITE_NAME_HI', 'रा. पावर 28');
define('SITE_TAGLINE', 'ನಿಂಪು★ವಾರ್ತೆ');
define('SITE_TAGLINE_EN', 'Your News');
define('SITE_TAGLINE_HI', 'आपकी खबर');
define('SITE_URL', 'https://rapower28.com');
define('SITE_EMAIL', 'contact@rapower28.com');
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin');
define('BASE_PATH', dirname(__DIR__));

// Current language (default English)
function getCurrentLang() {
    if (isset($_GET['lang']) && in_array($_GET['lang'], ['en','kn','hi'])) {
        setcookie('lang', $_GET['lang'], time()+86400*365, '/');
        return $_GET['lang'];
    }
    return $_COOKIE['lang'] ?? 'en';
}

$CURRENT_LANG = getCurrentLang();

// Categories
$CATEGORIES = [
    ['slug'=>'district','en'=>'District','kn'=>'ಜಿಲ್ಲೆ','hi'=>'ज़िला','icon'=>'🏘️','color'=>'#2196F3'],
    ['slug'=>'sports','en'=>'Sports','kn'=>'ಕ್ರೀಡೆ','hi'=>'खेल','icon'=>'⚽','color'=>'#4CAF50'],
    ['slug'=>'crime','en'=>'Crime','kn'=>'ಅಪರಾಧ','hi'=>'अपराध','icon'=>'🔍','color'=>'#F44336'],
    ['slug'=>'health-environment','en'=>'Health & Environment','kn'=>'ಆರೋಗ್ಯ ಮತ್ತು ಪರಿಸರ','hi'=>'स्वास्थ्य और पर्यावरण','icon'=>'🌿','color'=>'#00BCD4'],
    ['slug'=>'country','en'=>'Country','kn'=>'ದೇಶ','hi'=>'ದೇಶ','icon'=>'🇮🇳','color'=>'#FF9800'],
    ['slug'=>'politics','en'=>'Politics','kn'=>'ರಾಜಕೀಯ','hi'=>'राजनीति','icon'=>'🏛️','color'=>'#9C27B0'],
    ['slug'=>'state','en'=>'State','kn'=>'ರಾಜ್ಯ','hi'=>'राज्य','icon'=>'📍','color'=>'#3F51B5'],
    ['slug'=>'literature','en'=>'Literature','kn'=>'ಸಾಹಿತ್ಯ','hi'=>'साहित्य','icon'=>'📚','color'=>'#795548'],
    ['slug'=>'astrology','en'=>'Astrology','kn'=>'ಜ್ಯೋತಿಷ್ಯ','hi'=>'ज्योतिष','icon'=>'⭐','color'=>'#FFC107'],
    ['slug'=>'epaper','en'=>'E-Paper','kn'=>'ಇ-ಪೇಪರ್','hi'=>'ई-पेपर','icon'=>'📰','color'=>'#607D8B'],
];

// UI Translations
$UI_STRINGS = [
    'en' => [
        'home'=>'Home','search'=>'Search','breaking_news'=>'Breaking News','trending'=>'Trending',
        'latest'=>'Latest News','read_more'=>'Read More','see_all'=>'See All','share'=>'Share',
        'about'=>'About Us','contact'=>'Contact','privacy'=>'Privacy Policy','terms'=>'Terms',
        'subscribe'=>'Subscribe','published'=>'Published','author'=>'Author','views'=>'Views',
        'related'=>'Related News','most_read'=>'Most Read','search_placeholder'=>'Search news...',
        'categories'=>'Categories','follow_us'=>'Follow Us','copyright'=>'All Rights Reserved',
        'min_read'=>'min read','back_to_home'=>'Back to Home','no_results'=>'No results found',
        'load_more'=>'Load More','daily_horoscope'=>'Daily Horoscope',
        'admin_panel'=>'Admin Panel','language'=>'Language',
    ],
    'kn' => [
        'home'=>'ಮುಖಪುಟ','search'=>'ಹುಡುಕಿ','breaking_news'=>'ಬ್ರೇಕಿಂಗ್ ನ್ಯೂಸ್','trending'=>'ಟ್ರೆಂಡಿಂಗ್',
        'latest'=>'ಇತ್ತೀಚಿನ ಸುದ್ದಿ','read_more'=>'ಮತ್ತಷ್ಟು ಓದಿ','see_all'=>'ಎಲ್ಲಾ ನೋಡಿ','share'=>'ಹಂಚಿಕೊಳ್ಳಿ',
        'about'=>'ನಮ್ಮ ಬಗ್ಗೆ','contact'=>'ಸಂಪರ್ಕಿಸಿ','privacy'=>'ಗೌಪ್ಯತಾ ನೀತಿ','terms'=>'ನಿಯಮಗಳು',
        'subscribe'=>'ಚಂದಾದಾರರಾಗಿ','published'=>'ಪ್ರಕಟಿತ','author'=>'ಲೇಖಕರು','views'=>'ವೀಕ್ಷಣೆಗಳು',
        'related'=>'ಸಂಬಂಧಿತ ಸುದ್ದಿ','most_read'=>'ಹೆಚ್ಚು ಓದಿದ','search_placeholder'=>'ಸುದ್ದಿ ಹುಡುಕಿ...',
        'categories'=>'ವರ್ಗಗಳು','follow_us'=>'ನಮ್ಮನ್ನು ಅನುಸರಿಸಿ','copyright'=>'ಎಲ್ಲಾ ಹಕ್ಕುಗಳನ್ನು ಕಾಯ್ದಿರಿಸಲಾಗಿದೆ',
        'min_read'=>'ನಿಮಿಷ ಓದು','back_to_home'=>'ಮುಖಪುಟಕ್ಕೆ ಹಿಂತಿರುಗಿ','no_results'=>'ಯಾವುದೇ ಫಲಿತಾಂಶಗಳಿಲ್ಲ',
        'load_more'=>'ಇನ್ನಷ್ಟು ಲೋಡ್ ಮಾಡಿ','daily_horoscope'=>'ದಿನ ಭವಿಷ್ಯ',
        'admin_panel'=>'ನಿರ್ವಹಣಾ ಫಲಕ','language'=>'ಭಾಷೆ',
    ],
    'hi' => [
        'home'=>'मुख्यपृष्ठ','search'=>'खोजें','breaking_news'=>'ब्रेकिंग न्यूज़','trending'=>'ट्रेंडिंग',
        'latest'=>'नवीनतम समाचार','read_more'=>'और पढ़ें','see_all'=>'सभी देखें','share'=>'शेयर करें',
        'about'=>'हमारे बारे में','contact'=>'संपर्क करें','privacy'=>'गोपनीयता नीति','terms'=>'नियम और शर्तें',
        'subscribe'=>'सब्सक्राइब करें','published'=>'प्रकाशित','author'=>'लेखक','views'=>'व्यूज',
        'related'=>'संबंधित समाचार','most_read'=>'सबसे ज्यादा पढ़ा गया','search_placeholder'=>'खबरें खोजें...',
        'categories'=>'श्रेणियां','follow_us'=>'हमें फॉलो करें','copyright'=>'सर्वाधिकार सुरक्षित',
        'min_read'=>'मिनट पढ़ें','back_to_home'=>'मुख्यपृष्ठ पर वापस','no_results'=>'कोई परिणाम नहीं मिला',
        'load_more'=>'और लोड करें','daily_horoscope'=>'दैनिक राशिफल',
        'admin_panel'=>'एडमिन पैनल','language'=>'भाषा',
    ]
];

function __($key) {
    global $UI_STRINGS, $CURRENT_LANG;
    return $UI_STRINGS[$CURRENT_LANG][$key] ?? $UI_STRINGS['en'][$key] ?? $key;
}

function getCatName($cat) {
    global $CURRENT_LANG;
    return $cat[$CURRENT_LANG] ?? $cat['en'];
}

// Online Auto-Translate via API
function autoTranslate($text, $sourceLang, $targetLang) {
    if (empty(trim(strip_tags($text))) || $sourceLang === $targetLang) return $text;
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $sourceLang . "&tl=" . $targetLang . "&dt=t&q=" . urlencode($text);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    curl_close($ch);
    if ($response) {
        $result = json_decode($response, true);
        if (isset($result[0])) {
            $translatedText = "";
            foreach ($result[0] as $part) {
                $translatedText .= $part[0];
            }
            return $translatedText;
        }
    }
    return $text;
}

// Load News from Local JSON
function getLocalNews() {
    $path = BASE_PATH . '/data/news.json';
    if (!file_exists($path)) return [];
    return json_decode(file_get_contents($path), true) ?: [];
}

// Save News to Local JSON
function saveLocalNews($news) {
    $path = BASE_PATH . '/data/news.json';
    file_put_contents($path, json_encode($news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Process single article translations and update record
function processArticleTranslations($article) {
    global $CURRENT_LANG;
    $fields = ['title', 'body'];
    $sourceLang = 'en';
    if (!empty($article['title_kn'])) $sourceLang = 'kn';
    elseif (!empty($article['title_hi'])) $sourceLang = 'hi';
    elseif (!empty($article['title_en'])) $sourceLang = 'en';
    $updated = false;
    foreach ($fields as $field) {
        $langField = "{$field}_{$CURRENT_LANG}";
        if (empty($article[$langField]) && !empty($article["{$field}_{$sourceLang}"])) {
            $translated = autoTranslate($article["{$field}_{$sourceLang}"], $sourceLang, $CURRENT_LANG);
            $article[$langField] = $translated;
            if (!empty(trim(strip_tags($translated)))) {
                $updated = true;
            }
        }
        $article[$field] = !empty($article[$langField]) ? $article[$langField] : (!empty($article["{$field}_en"]) ? $article["{$field}_en"] : (!empty($article["{$field}_kn"]) ? $article["{$field}_kn"] : $article["{$field}_hi"]));
    }
    if ($updated) {
        $news = getLocalNews();
        foreach ($news as &$n) {
            if ($n['id'] == $article['id']) {
                $n = $article;
                break;
            }
        }
        saveLocalNews($news);
    }
    $article['read_time'] = ceil(str_word_count(strip_tags($article['body'] ?? '')) / 200) ?: 1;
    $article['date'] = date('Y-m-d', strtotime($article['published_at'] ?? 'now'));
    return $article;
}

// Fetch Articles from JSON
function getArticles($limit = 10, $category = null, $search = null) {
    $news = getLocalNews();
    if ($category) {
        $news = array_filter($news, fn($a) => $a['category'] === $category);
    }
    if ($search) {
        $search = strtolower($search);
        $news = array_filter($news, function($a) use ($search) {
            return str_contains(strtolower($a['title_en'] ?? ''), $search) || 
                   str_contains(strtolower($a['title_kn'] ?? ''), $search) || 
                   str_contains(strtolower($a['title_hi'] ?? ''), $search);
        });
    }
    usort($news, fn($a, $b) => strtotime($b['published_at'] ?? 'now') <=> strtotime($a['published_at'] ?? 'now'));
    $limited = array_slice($news, 0, (int)$limit);
    return array_map('processArticleTranslations', $limited);
}

function getDummyArticles($limit = 10, $category = null, $search = null) {
    return getArticles($limit, $category, $search);
}

// Get single article by slug
function getArticleBySlug($slug) {
    $news = getLocalNews();
    foreach ($news as $article) {
        if ($article['slug'] === $slug) {
            return processArticleTranslations($article);
        }
    }
    return null;
}

// Breaking news items
function getBreakingNews() {
    $news = getLocalNews();
    $items = [];
    foreach ($GLOBALS['CATEGORIES'] as $cat) {
        $catNews = array_filter($news, fn($a) => $a['category'] === $cat['slug']);
        if (!empty($catNews)) {
            usort($catNews, fn($a, $b) => strtotime($b['published_at'] ?? 'now') <=> strtotime($a['published_at'] ?? 'now'));
            $items[] = reset($catNews);
        }
    }
    usort($items, fn($a, $b) => strtotime($b['published_at'] ?? 'now') <=> strtotime($a['published_at'] ?? 'now'));
    $breaking = [];
    foreach ($items as $item) {
        $processed = processArticleTranslations($item);
        $breaking[] = $processed['title'];
    }
    return !empty($breaking) ? $breaking : ['Welcome to Ra. Power 28 News Portal'];
}

// Horoscope data
function getHoroscope() {
    return [
        ['sign'=>'Aries','kn'=>'ಮೇಷ','hi'=>'मेष','icon'=>'♈','text_en'=>'A positive day ahead. Financial gains expected.','text_kn'=>'ಉತ್ತಮ ದಿನ. ಆರ್ಥಿಕ ಲಾಭ ನಿರೀಕ್ಷಿಸಬಹುದು.','text_hi'=>'एक सकारात्मक दिन। आर्थिक लाभ की उम्मीद।'],
        ['sign'=>'Taurus','kn'=>'ವೃಷಭ','hi'=>'वृषभ','icon'=>'♉','text_en'=>'Focus on health today. Avoid unnecessary travel.','text_kn'=>'ಇಂದು ಆರೋಗ್ಯದ ಮೇಲೆ ಗಮನ ಕೊಡಿ.','text_hi'=>'आज स्वास्थ्य पर ध्यान दें।'],
        ['sign'=>'Gemini','kn'=>'ಮಿಥುನ','hi'=>'मिथुन','icon'=>'♊','text_en'=>'Good day for business decisions. Stars favor new ventures.','text_kn'=>'ವ್ಯಾಪಾರ ನಿರ್ಧಾರಗಳಿಗೆ ಉತ್ತಮ ದಿನ.','text_hi'=>'व्यापार के फैसलों के लिए अच्छा दिन।'],
        ['sign'=>'Cancer','kn'=>'ಕರ್ಕ','hi'=>'कर्क','icon'=>'♋','text_en'=>'Family matters need attention. Stay calm and patient.','text_kn'=>'ಕುಟುಂಬದ ವಿಷಯಗಳಿಗೆ ಗಮನ ಬೇಕು.','text_hi'=>'पारिवारिक मामलों पर ध्यान दें।'],
        ['sign'=>'Leo','kn'=>'ಸಿಂಹ','hi'=>'सिंह','icon'=>'♌','text_en'=>'Career growth opportunities ahead. Be prepared.','text_kn'=>'ವತ್ತಿ ಬೆಳವಣಿಗೆಯ ಅವಕಾಶಗಳು ಮುಂದಿವೆ.','text_hi'=>'करियर में तरक्की के अवसर आगे हैं।'],
        ['sign'=>'Virgo','kn'=>'ಕನ್ಯಾ','hi'=>'कन्या','icon'=>'♍','text_en'=>'A day of creative inspiration. Express yourself.','text_kn'=>'ಸೃಜನಶೀಲ ಸ್ಫೂರ್ತಿಯ ದಿನ.','text_hi'=>'रचनात्मक प्रेरणा का दिन।'],
    ];
}
