<?php
/**
 * Ra. Power 28 - Application Configuration
 * ರಾ.ಪವರ್ 28 - ನಿಂಪು★ವಾರ್ತೆ
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
    ['slug'=>'country','en'=>'Country','kn'=>'ದೇಶ','hi'=>'देश','icon'=>'🇮🇳','color'=>'#FF9800'],
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
        'subscribe'=>'ಚಂದಾದಾರರಾಗಿ','published'=>'ಪ್ರಕಟಿಸಲಾಗಿದೆ','author'=>'ಲೇಖಕ','views'=>'ವೀಕ್ಷಣೆಗಳು',
        'related'=>'ಸಂಬಂಧಿತ ಸುದ್ದಿ','most_read'=>'ಹೆಚ್ಚು ಓದಲಾಗಿದೆ','search_placeholder'=>'ಸುದ್ದಿ ಹುಡುಕಿ...',
        'categories'=>'ವಿಭಾಗಗಳು','follow_us'=>'ನಮ್ಮನ್ನು ಅನುಸರಿಸಿ','copyright'=>'ಎಲ್ಲ ಹಕ್ಕುಗಳು ಕಾಯ್ದಿರಿಸಲಾಗಿದೆ',
        'min_read'=>'ನಿಮಿಷ ಓದು','back_to_home'=>'ಮುಖಪುಟಕ್ಕೆ ಹಿಂತಿರುಗಿ','no_results'=>'ಯಾವುದೇ ಫಲಿತಾಂಶ ಕಂಡುಬಂದಿಲ್ಲ',
        'load_more'=>'ಇನ್ನಷ್ಟು ಲೋಡ್ ಮಾಡಿ','daily_horoscope'=>'ದಿನದ ರಾಶಿ ಭವಿಷ್ಯ',
        'admin_panel'=>'ನಿರ್ವಾಹಕ ಫಲಕ','language'=>'ಭಾಷೆ',
    ],
    'hi' => [
        'home'=>'होम','search'=>'खोजें','breaking_news'=>'ब्रेकिंग न्यूज़','trending'=>'ट्रेंडिंग',
        'latest'=>'ताज़ा खबरें','read_more'=>'और पढ़ें','see_all'=>'सब देखें','share'=>'शेयर करें',
        'about'=>'हमारे बारे में','contact'=>'संपर्क','privacy'=>'गोपनीयता नीति','terms'=>'शर्तें',
        'subscribe'=>'सदस्यता लें','published'=>'प्रकाशित','author'=>'लेखक','views'=>'दृश्य',
        'related'=>'संबंधित समाचार','most_read'=>'सबसे ज़्यादा पढ़ा गया','search_placeholder'=>'समाचार खोजें...',
        'categories'=>'श्रेणियाँ','follow_us'=>'हमें फॉलो करें','copyright'=>'सर्वाधिकार सुरक्षित',
        'min_read'=>'मिनट पढ़ें','back_to_home'=>'होम पर वापस','no_results'=>'कोई परिणाम नहीं मिला',
        'load_more'=>'और लोड करें','daily_horoscope'=>'दैनिक राशिफल',
        'admin_panel'=>'एडमिन पैनल','language'=>'भाषा',
    ],
];

// Helper: get translated string
function __($key) {
    global $UI_STRINGS, $CURRENT_LANG;
    return $UI_STRINGS[$CURRENT_LANG][$key] ?? $UI_STRINGS['en'][$key] ?? $key;
}

// Helper: get category name in current lang
function getCatName($cat) {
    global $CURRENT_LANG;
    return $cat[$CURRENT_LANG] ?? $cat['en'];
}

// Database Connection
function getDB() {
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=rapower28;charset=utf8mb4", 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

// Online Auto-Translate via API
function autoTranslate($text, $targetLang) {
    if (empty(trim(strip_tags($text))) || $targetLang === 'kn') return $text;

    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=kn&tl=$targetLang&dt=t&q=" . urlencode(substr($text, 0, 4000));
    $response = @file_get_contents($url);
    if ($response) {
        $result = json_decode($response, true);
        if (isset($result[0])) {
            $translated = '';
            foreach ($result[0] as $parts) {
                $translated .= $parts[0] ?? '';
            }
            return $translated;
        }
    }
    return $text;
}

// Ensure translation exists and return mapped article
function processArticleTranslations($article) {
    global $CURRENT_LANG;
    if (!$article) return null;
    
    foreach (['title', 'body'] as $field) {
        $langField = "{$field}_{$CURRENT_LANG}";
        
        // If content in desired language is missing, translate from Kannada
        if (empty(trim($article[$langField]))) {
            $translated = autoTranslate($article["{$field}_kn"], $CURRENT_LANG);
            $article[$langField] = $translated;
            
            // Save translation back to DB asynchronously
            if (!empty(trim(strip_tags($translated)))) {
                try {
                    $stmt = getDB()->prepare("UPDATE rp_articles SET $langField = ? WHERE id = ?");
                    $stmt->execute([$translated, $article['id']]);
                } catch (Exception $e) {}
            }
        }
        
        $article[$field] = $article[$langField];
        // For fallback
        $article["{$field}_en"] = $article["{$field}_en"] ?? $article["{$field}_kn"]; 
        $article["{$field}_kn"] = $article["{$field}_kn"];
        $article["{$field}_hi"] = $article["{$field}_hi"] ?? $article["{$field}_kn"];
    }

    $article['read_time'] = ceil(str_word_count(strip_tags($article['body'])) / 200) ?: 1;
    $article['date'] = date('Y-m-d', strtotime($article['published_at']));
    return $article;
}

// Fetch Articles from Database (replaces getDummyArticles)
function getDummyArticles($limit = 10, $category = null, $search = null) {
    // 1. Fetch default static articles from local JSON file
    $articles = [];
    $jsonPath = BASE_PATH . '/data/articles.json';
    if (file_exists($jsonPath)) {
        $articles = json_decode(file_get_contents($jsonPath), true) ?: [];
    }

    // 2. Filter the articles
    if ($category) {
        $articles = array_filter($articles, fn($a) => $a['category'] === $category);
    }
    if ($search) {
        $search = strtolower($search);
        $articles = array_filter($articles, function($a) use ($search) {
            return str_contains(strtolower($a['title_kn']), $search) || str_contains(strtolower($a['title_en'] ?? ''), $search);
        });
    }

    // 3. Sort by date and apply limit
    usort($articles, fn($a, $b) => strtotime($b['published_at']) <=> strtotime($a['published_at']));
    $articles = array_slice($articles, 0, (int)$limit);

    return array_map('processArticleTranslations', $articles);
}

// Get single article by slug
function getArticleBySlug($slug) {
    // Read from default static JSON
    $articles = [];
    $jsonPath = BASE_PATH . '/data/articles.json';
    if (file_exists($jsonPath)) {
        $articles = json_decode(file_get_contents($jsonPath), true) ?: [];
    }
    
    foreach ($articles as $article) {
        if ($article['slug'] === $slug) {
            return processArticleTranslations($article);
        }
    }
    
    return null;
}

// Breaking news items dynamically fetched and translated
function getBreakingNews() {
    global $CURRENT_LANG;
    $articles = [];
    $jsonPath = BASE_PATH . '/data/articles.json';
    if (file_exists($jsonPath)) {
        $articles = json_decode(file_get_contents($jsonPath), true) ?: [];
    }

    $breaking_articles = array_filter($articles, fn($a) => !empty($a['is_breaking']));
    usort($breaking_articles, fn($a, $b) => strtotime($b['published_at']) <=> strtotime($a['published_at']));
    $items = array_slice($breaking_articles, 0, 5);
    
    $breaking = [];
    foreach ($items as $item) {
        $field = "title_{$CURRENT_LANG}";
        if (empty(trim($item[$field]))) {
            $translated = autoTranslate($item['title_kn'], $CURRENT_LANG);
            $breaking[] = $translated;
            
            if (!empty(trim($translated))) {
                // We keep a DB update here just in case MySQL is still active
                // so translations are saved over time.
                try {
                    $db = getDB();
                    $upd = $db->prepare("UPDATE rp_articles SET $field = ? WHERE id = ?");
                    $upd->execute([$translated, $item['id']]);
                } catch (Exception $e) {}
            }
        } else {
            $breaking[] = $item[$field];
        }
    }
    // Check if empty
    if (empty($breaking)) {
        return ['Welcome to Ra. Power 28 News Portal'];
    }
    return $breaking;
}

// Horoscope data
function getHoroscope() {
    return [
        ['sign'=>'Aries','kn'=>'ಮೇಷ','hi'=>'मेष','icon'=>'♈','text_en'=>'A positive day ahead. Financial gains expected.','text_kn'=>'ಉತ್ತಮ ದಿನ. ಆರ್ಥಿಕ ಲಾಭ ನಿರೀಕ್ಷಿಸಬಹುದು.','text_hi'=>'एक सकारात्मक दिन। आर्थिक लाभ की उम्मीद।'],
        ['sign'=>'Taurus','kn'=>'ವೃಷಭ','hi'=>'वृषभ','icon'=>'♉','text_en'=>'Focus on health today. Avoid unnecessary travel.','text_kn'=>'ಇಂದು ಆರೋಗ್ಯದ ಮೇಲೆ ಗಮನ ಕೊಡಿ.','text_hi'=>'आज स्वास्थ्य पर ध्यान दें।'],
        ['sign'=>'Gemini','kn'=>'ಮಿಥುನ','hi'=>'मिथुन','icon'=>'♊','text_en'=>'Good day for business decisions. Stars favor new ventures.','text_kn'=>'ವ್ಯಾಪಾರ ನಿರ್ಧಾರಗಳಿಗೆ ಉತ್ತಮ ದಿನ.','text_hi'=>'व्यापार के फैसलों के लिए अच्छा दिन।'],
        ['sign'=>'Cancer','kn'=>'ಕರ್ಕ','hi'=>'कर्क','icon'=>'♋','text_en'=>'Family matters need attention. Stay calm and patient.','text_kn'=>'ಕುಟುಂಬದ ವಿಷಯಗಳಿಗೆ ಗಮನ ಬೇಕು.','text_hi'=>'पारिवारिक मामलों पर ध्यान दें।'],
        ['sign'=>'Leo','kn'=>'ಸಿಂಹ','hi'=>'सिंह','icon'=>'♌','text_en'=>'Career growth opportunities ahead. Be prepared.','text_kn'=>'ವೃತ್ತಿ ಬೆಳವಣಿಗೆಯ ಅವಕಾಶಗಳು ಮುಂದಿವೆ.','text_hi'=>'करियर में तरक्की के अवसर आगे हैं।'],
        ['sign'=>'Virgo','kn'=>'ಕನ್ಯಾ','hi'=>'कन्या','icon'=>'♍','text_en'=>'A day of creative inspiration. Express yourself.','text_kn'=>'ಸೃಜನಶೀಲ ಸ್ಫೂರ್ತಿಯ ದಿನ.','text_hi'=>'रचनात्मक प्रेरणा का दिन।'],
    ];
}
