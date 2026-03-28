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

// Dummy Articles Data
function getDummyArticles() {
    global $CATEGORIES;
    $images = ['politics.png','sports.png','district.png','health.png','country.png'];
    $articles = [
        [
            'id'=>1,'slug'=>'karnataka-budget-2026-highlights',
            'title_en'=>'Karnataka Budget 2026: ₹3.71 Lakh Crore Allocation Announced',
            'title_kn'=>'ಕರ್ನಾಟಕ ಬಜೆಟ್ 2026: ₹3.71 ಲಕ್ಷ ಕೋಟಿ ಹಂಚಿಕೆ ಘೋಷಣೆ',
            'title_hi'=>'कर्नाटक बजट 2026: ₹3.71 लाख करोड़ आवंटन की घोषणा',
            'body_en'=>'The Karnataka state government today presented its annual budget for 2026-27 with a total outlay of ₹3.71 lakh crore, focusing heavily on infrastructure development, healthcare, and education. Chief Minister announced major road projects connecting Tier-2 cities. The budget also includes significant allocations for farmers with enhanced crop insurance schemes and direct benefit transfers. Opposition parties have called it "election-oriented" while the ruling party defends the balanced approach.',
            'body_kn'=>'ಕರ್ನಾಟಕ ರಾಜ್ಯ ಸರ್ಕಾರ ಇಂದು 2026-27ನೇ ಸಾಲಿನ ವಾರ್ಷಿಕ ಬಜೆಟ್ ಅನ್ನು ₹3.71 ಲಕ್ಷ ಕೋಟಿ ಒಟ್ಟು ವೆಚ್ಚದೊಂದಿಗೆ ಮಂಡಿಸಿದೆ. ಮೂಲಸೌಕರ್ಯ ಅಭಿವೃದ್ಧಿ, ಆರೋಗ್ಯ ಮತ್ತು ಶಿಕ್ಷಣಕ್ಕೆ ಹೆಚ್ಚಿನ ಒತ್ತು ನೀಡಲಾಗಿದೆ.',
            'body_hi'=>'कर्नाटक राज्य सरकार ने आज 2026-27 के लिए ₹3.71 लाख करोड़ के कुल परिव्यय के साथ अपना वार्षिक बजट प्रस्तुत किया।',
            'category'=>'politics','image'=>'politics.png','author'=>'Rajesh Kumar','date'=>'2026-03-28','views'=>15420,'is_featured'=>true,'is_breaking'=>true,'read_time'=>5,
        ],
        [
            'id'=>2,'slug'=>'ipl-2026-rcb-wins-thriller',
            'title_en'=>'IPL 2026: RCB Wins Thriller Against CSK by 3 Wickets at Chinnaswamy',
            'title_kn'=>'ಐಪಿಎಲ್ 2026: ಚಿನ್ನಸ್ವಾಮಿಯಲ್ಲಿ ಆರ್‌ಸಿಬಿ CSK ವಿರುದ್ಧ 3 ವಿಕೆಟ್‌ಗಳಿಂದ ಗೆಲುವು',
            'title_hi'=>'IPL 2026: RCB ने चिन्नास्वामी में CSK को 3 विकेट से रोमांचक मैच में हराया',
            'body_en'=>'In a nail-biting encounter at the M. Chinnaswamy Stadium, Royal Challengers Bangalore chased down 198 runs with just 2 balls to spare. The crowd erupted as the winning six sailed over long-on. The match witnessed breathtaking batting displays from both sides, with the Bangalore franchise finally getting their campaign back on track after two consecutive losses.',
            'body_kn'=>'ಎಂ. ಚಿನ್ನಸ್ವಾಮಿ ಕ್ರೀಡಾಂಗಣದಲ್ಲಿ ನಡೆದ ರೋಮಾಂಚಕ ಪಂದ್ಯದಲ್ಲಿ ರಾಯಲ್ ಚಾಲೆಂಜರ್ಸ್ ಬೆಂಗಳೂರು ಕೇವಲ 2 ಎಸೆತಗಳು ಬಾಕಿ ಇರುವಾಗ 198 ರನ್ ಬೆನ್ನತ್ತಿತು.',
            'body_hi'=>'एम. चिन्नास्वामी स्टेडियम में एक रोमांचक मुकाबले में, रॉयल चैलेंजर्स बैंगलोर ने सिर्फ 2 गेंदें शेष रहते 198 रनों का लक्ष्य हासिल कर लिया।',
            'category'=>'sports','image'=>'sports.png','author'=>'Priya Sharma','date'=>'2026-03-27','views'=>28340,'is_featured'=>true,'is_breaking'=>false,'read_time'=>4,
        ],
        [
            'id'=>3,'slug'=>'bengaluru-metro-phase-3-approved',
            'title_en'=>'Bengaluru Metro Phase 3: ₹16,000 Crore Project Gets Central Approval',
            'title_kn'=>'ಬೆಂಗಳೂರು ಮೆಟ್ರೋ ಹಂತ 3: ₹16,000 ಕೋಟಿ ಯೋಜನೆಗೆ ಕೇಂದ್ರ ಅನುಮೋದನೆ',
            'title_hi'=>'बेंगलुरु मेट्रो फेज 3: ₹16,000 करोड़ की परियोजना को केंद्रीय मंजूरी',
            'body_en'=>'The Central Government has approved the much-awaited Phase 3 of Bengaluru Metro project with an estimated cost of ₹16,000 crore. The new phase will connect key areas including Hebbal, Sarjapur, and Yelahanka with the existing metro network. Construction is expected to begin by Q3 2026.',
            'body_kn'=>'ಕೇಂದ್ರ ಸರ್ಕಾರ ಬಹುನಿರೀಕ್ಷಿತ ಬೆಂಗಳೂರು ಮೆಟ್ರೋ ಯೋಜನೆಯ ಹಂತ 3 ಕ್ಕೆ ₹16,000 ಕೋಟಿ ಅಂದಾಜಿನಲ್ಲಿ ಅನುಮೋದನೆ ನೀಡಿದೆ.',
            'body_hi'=>'केंद्र सरकार ने बेंगलुरु मेट्रो परियोजना के बहुप्रतीक्षित चरण 3 को ₹16,000 करोड़ की अनुमानित लागत से मंजूरी दे दी है।',
            'category'=>'district','image'=>'district.png','author'=>'Anil Desai','date'=>'2026-03-27','views'=>12890,'is_featured'=>false,'is_breaking'=>true,'read_time'=>3,
        ],
        [
            'id'=>4,'slug'=>'karnataka-green-energy-project',
            'title_en'=>'Karnataka Launches ₹5,000 Crore Green Energy Corridor Project',
            'title_kn'=>'ಕರ್ನಾಟಕ ₹5,000 ಕೋಟಿ ಹಸಿರು ಶಕ್ತಿ ಕಾರಿಡಾರ್ ಯೋಜನೆ ಆರಂಭ',
            'title_hi'=>'कर्नाटक ने ₹5,000 करोड़ की हरित ऊर्जा कॉरिडोर परियोजना शुरू की',
            'body_en'=>'In a landmark move for sustainable development, the Karnataka government has launched the Green Energy Corridor project worth ₹5,000 crore. The project aims to establish solar and wind energy farms across 10 districts, potentially generating 2,500 MW of clean energy by 2028.',
            'body_kn'=>'ಸುಸ್ಥಿರ ಅಭಿವೃದ್ಧಿಗಾಗಿ ಐತಿಹಾಸಿಕ ಕ್ರಮದಲ್ಲಿ, ₹5,000 ಕೋಟಿ ಮೌಲ್ಯದ ಹಸಿರು ಶಕ್ತಿ ಕಾರಿಡಾರ್ ಯೋಜನೆಯನ್ನು ಆರಂಭಿಸಲಾಗಿದೆ.',
            'body_hi'=>'सतत विकास के लिए एक ऐतिहासिक कदम में, कर्नाटक सरकार ने ₹5,000 करोड़ की हरित ऊर्जा कॉरिडोर परियोजना शुरू की है।',
            'category'=>'health-environment','image'=>'health.png','author'=>'Meera Nair','date'=>'2026-03-26','views'=>8760,'is_featured'=>false,'is_breaking'=>false,'read_time'=>6,
        ],
        [
            'id'=>5,'slug'=>'india-g20-summit-preparations',
            'title_en'=>'India Begins Preparations for Hosting G20 Energy Ministers Summit',
            'title_kn'=>'G20 ಶಕ್ತಿ ಮಂತ್ರಿಗಳ ಶೃಂಗಸಭೆ ಆಯೋಜನೆಗೆ ಭಾರತ ಸಿದ್ಧತೆ ಆರಂಭ',
            'title_hi'=>'भारत ने G20 ऊर्जा मंत्रियों के शिखर सम्मेलन की तैयारी शुरू की',
            'body_en'=>'India has begun extensive preparations for hosting the G20 Energy Ministers Summit scheduled for next month in New Delhi. The summit will focus on global energy transition strategies and collaborative frameworks for renewable energy adoption among G20 nations.',
            'body_kn'=>'ಮುಂದಿನ ತಿಂಗಳು ನವದೆಹಲಿಯಲ್ಲಿ ನಿಗದಿತವಾಗಿರುವ G20 ಶಕ್ತಿ ಮಂತ್ರಿಗಳ ಶೃಂಗಸಭೆಯ ಆಯೋಜನೆಗೆ ಭಾರತ ವ್ಯಾಪಕ ಸಿದ್ಧತೆ ಆರಂಭಿಸಿದೆ.',
            'body_hi'=>'भारत ने अगले महीने नई दिल्ली में निर्धारित G20 ऊर्जा मंत्रियों के शिखर सम्मेलन की मेजबानी के लिए व्यापक तैयारी शुरू कर दी है।',
            'category'=>'country','image'=>'country.png','author'=>'Vikram Singh','date'=>'2026-03-26','views'=>19200,'is_featured'=>false,'is_breaking'=>false,'read_time'=>4,
        ],
        [
            'id'=>6,'slug'=>'cyber-crime-gang-busted-bengaluru',
            'title_en'=>'Major Cyber Crime Gang Busted in Bengaluru, 12 Arrested',
            'title_kn'=>'ಬೆಂಗಳೂರಿನಲ್ಲಿ ಪ್ರಮುಖ ಸೈಬರ್ ಕ್ರೈಮ್ ಗ್ಯಾಂಗ್ ಭೇದಿಸಲಾಗಿದೆ, 12 ಬಂಧನ',
            'title_hi'=>'बेंगलुरु में बड़े साइबर क्राइम गिरोह का भंडाफोड़, 12 गिरफ्तार',
            'body_en'=>'Bengaluru Cyber Crime Police have busted a major online fraud gang operating from Whitefield, arresting 12 individuals involved in phishing and UPI fraud worth ₹15 crore. The gang had been targeting victims across multiple states through fake banking apps.',
            'body_kn'=>'ಬೆಂಗಳೂರು ಸೈಬರ್ ಕ್ರೈಮ್ ಪೊಲೀಸರು ವೈಟ್‌ಫೀಲ್ಡ್‌ನಿಂದ ಕಾರ್ಯನಿರ್ವಹಿಸುತ್ತಿದ್ದ ಪ್ರಮುಖ ಆನ್‌ಲೈನ್ ವಂಚನಾ ಗ್ಯಾಂಗ್ ಅನ್ನು ಭೇದಿಸಿದ್ದಾರೆ.',
            'body_hi'=>'बेंगलुरु साइबर क्राइम पुलिस ने व्हाइटफील्ड से संचालित एक बड़े ऑनलाइन धोखाधड़ी गिरोह का भंडाफोड़ किया है।',
            'category'=>'crime','image'=>'politics.png','author'=>'Suresh Rao','date'=>'2026-03-25','views'=>22100,'is_featured'=>false,'is_breaking'=>false,'read_time'=>3,
        ],
        [
            'id'=>7,'slug'=>'karnataka-assembly-session-updates',
            'title_en'=>'Karnataka Assembly Session: Key Bills on Education Reform Tabled',
            'title_kn'=>'ಕರ್ನಾಟಕ ವಿಧಾನಸಭೆ ಅಧಿವೇಶನ: ಶಿಕ್ಷಣ ಸುಧಾರಣೆ ಮಸೂದೆಗಳು ಮಂಡನೆ',
            'title_hi'=>'कर्नाटक विधानसभा सत्र: शिक्षा सुधार पर प्रमुख विधेयक पेश',
            'body_en'=>'The ongoing Karnataka Assembly session saw the tabling of three key bills focused on education reform. The proposed legislation aims to modernize the state curriculum, increase teacher training standards, and introduce digital learning infrastructure in all government schools across Karnataka by 2027.',
            'body_kn'=>'ನಡೆಯುತ್ತಿರುವ ಕರ್ನಾಟಕ ವಿಧಾನಸಭೆ ಅಧಿವೇಶನದಲ್ಲಿ ಶಿಕ್ಷಣ ಸುಧಾರಣೆಗೆ ಸಂಬಂಧಿಸಿದ ಮೂರು ಪ್ರಮುಖ ಮಸೂದೆಗಳನ್ನು ಮಂಡಿಸಲಾಯಿತು.',
            'body_hi'=>'चल रहे कर्नाटक विधानसभा सत्र में शिक्षा सुधार पर केंद्रित तीन प्रमुख विधेयक पेश किए गए।',
            'category'=>'state','image'=>'politics.png','author'=>'Lakshmi Devi','date'=>'2026-03-25','views'=>9870,'is_featured'=>false,'is_breaking'=>false,'read_time'=>5,
        ],
        [
            'id'=>8,'slug'=>'kannada-sahitya-sammelana-2026',
            'title_en'=>'87th Kannada Sahitya Sammelana to be Held in Raichur This April',
            'title_kn'=>'87ನೇ ಕನ್ನಡ ಸಾಹಿತ್ಯ ಸಮ್ಮೇಳನ ಏಪ್ರಿಲ್‌ನಲ್ಲಿ ರಾಯಚೂರಿನಲ್ಲಿ ನಡೆಯಲಿದೆ',
            'title_hi'=>'87वां कन्नड़ साहित्य सम्मेलन इस अप्रैल रायचूर में होगा',
            'body_en'=>'The prestigious 87th Akhila Bharata Kannada Sahitya Sammelana will be held in Raichur from April 18-20, 2026. Noted author Dr. Chandrashekhar Kambar has been named the president of this year\'s literary conference, which is expected to attract over 50,000 literature enthusiasts.',
            'body_kn'=>'ಪ್ರತಿಷ್ಠಿತ 87ನೇ ಅಖಿಲ ಭಾರತ ಕನ್ನಡ ಸಾಹಿತ್ಯ ಸಮ್ಮೇಳನ ಏಪ್ರಿಲ್ 18-20, 2026 ರಂದು ರಾಯಚೂರಿನಲ್ಲಿ ನಡೆಯಲಿದೆ.',
            'body_hi'=>'प्रतिष्ठित 87वां अखिल भारत कन्नड़ साहित्य सम्मेलन 18-20 अप्रैल, 2026 को रायचूर में आयोजित होगा।',
            'category'=>'literature','image'=>'district.png','author'=>'Deepa Hegde','date'=>'2026-03-24','views'=>6540,'is_featured'=>false,'is_breaking'=>false,'read_time'=>4,
        ],
    ];
    return $articles;
}

// Breaking news items
function getBreakingNews() {
    global $CURRENT_LANG;
    $items = [
        ['en'=>'Karnataka Budget 2026: ₹3.71 Lakh Crore Allocation','kn'=>'ಕರ್ನಾಟಕ ಬಜೆಟ್ 2026: ₹3.71 ಲಕ್ಷ ಕೋಟಿ ಹಂಚಿಕೆ','hi'=>'कर्नाटक बजट 2026: ₹3.71 लाख करोड़ आवंटन'],
        ['en'=>'Bengaluru Metro Phase 3 Gets Central Approval','kn'=>'ಬೆಂಗಳೂರು ಮೆಟ್ರೋ ಹಂತ 3 ಕ್ಕೆ ಕೇಂದ್ರ ಅನುಮೋದನೆ','hi'=>'बेंगलुरु मेट्रो फेज़ 3 को केंद्रीय मंजूरी'],
        ['en'=>'IPL 2026: RCB Wins Thriller Against CSK','kn'=>'ಐಪಿಎಲ್ 2026: ಆರ್‌ಸಿಬಿ CSK ವಿರುದ್ಧ ಗೆಲುವು','hi'=>'IPL 2026: RCB ने CSK को हराया'],
        ['en'=>'Major Cyber Crime Gang Busted in Bengaluru','kn'=>'ಬೆಂಗಳೂರಿನಲ್ಲಿ ಸೈಬರ್ ಕ್ರೈಮ್ ಗ್ಯಾಂಗ್ ಬಂಧನ','hi'=>'बेंगलुरु में साइबर क्राइम गिरोह गिरफ्तार'],
    ];
    return array_map(fn($i) => $i[$CURRENT_LANG] ?? $i['en'], $items);
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
