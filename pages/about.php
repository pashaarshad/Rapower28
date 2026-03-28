<?php $pageTitle = __('about'); ?>
<section style="padding:2rem 0;min-height:50vh;">
<div class="container" style="max-width:800px;">
    <div class="section-header"><h2>🪔 <?= __('about') ?> — <?= getSiteName() ?></h2></div>
    <div class="sidebar-widget" style="padding:2rem;">
        <img src="assets/images/logo.png" alt="<?= SITE_NAME ?>" style="height:80px;margin-bottom:1.5rem;">
        <?php if ($CURRENT_LANG === 'kn'): ?>
        <p style="line-height:1.9;color:var(--color-text-secondary);margin-bottom:1rem;">ರಾ.ಪವರ್ 28 ಕರ್ನಾಟಕದ ಅತ್ಯಂತ ನಂಬಿಕಸ್ಥ ಡಿಜಿಟಲ್ ಸುದ್ದಿ ವೇದಿಕೆಗಳಲ್ಲಿ ಒಂದಾಗಿದೆ. ನಾವು ಕನ್ನಡ, ಇಂಗ್ಲಿಷ್ ಮತ್ತು ಹಿಂದಿಯಲ್ಲಿ ರಾಜಕೀಯ, ಕ್ರೀಡೆ, ಅಪರಾಧ, ಆರೋಗ್ಯ, ಸಾಹಿತ್ಯ ಮತ್ತು ಹೆಚ್ಚಿನ ವಿಷಯಗಳ ಬಗ್ಗೆ ನಿಖರ ಮತ್ತು ಸಮಯೋಚಿತ ಸುದ್ದಿಗಳನ್ನು ಒದಗಿಸುತ್ತೇವೆ.</p>
        <p style="line-height:1.9;color:var(--color-text-secondary);">ನಮ್ಮ ಧ್ಯೇಯವಾಕ್ಯ "ನಿಂಪು★ವಾರ್ತೆ" — ನಿಮ್ಮ ವಾರ್ತೆ. ನಾವು ಜನರಿಗಾಗಿ, ಜನರಿಂದ ಸುದ್ದಿ ಒದಗಿಸುತ್ತೇವೆ.</p>
        <?php elseif ($CURRENT_LANG === 'hi'): ?>
        <p style="line-height:1.9;color:var(--color-text-secondary);margin-bottom:1rem;">रा. पावर 28 कर्नाटक के सबसे विश्वसनीय डिजिटल समाचार प्लेटफार्मों में से एक है। हम कन्नड़, अंग्रेजी और हिंदी में राजनीति, खेल, अपराध, स्वास्थ्य, साहित्य और अधिक विषयों पर सटीक और समय पर समाचार प्रदान करते हैं।</p>
        <p style="line-height:1.9;color:var(--color-text-secondary);">हमारा आदर्श वाक्य "निंपु★वार्ते" — आपकी खबर। हम लोगों के लिए, लोगों द्वारा समाचार प्रदान करते हैं।</p>
        <?php else: ?>
        <p style="line-height:1.9;color:var(--color-text-secondary);margin-bottom:1rem;">Ra. Power 28 is one of Karnataka's most trusted digital news platforms. We provide accurate, timely news on politics, sports, crime, health, literature, and much more — in Kannada, English, and Hindi.</p>
        <p style="line-height:1.9;color:var(--color-text-secondary);margin-bottom:1rem;">Our motto "ನಿಂಪು★ವಾರ್ತೆ" (Nimpu Varte) means "Your News." We deliver news by the people, for the people — covering every district and taluk across Karnataka.</p>
        <p style="line-height:1.9;color:var(--color-text-secondary);">Founded with the vision of providing unbiased, fact-based journalism, Ra. Power 28 has grown to become a go-to source for breaking news, in-depth analysis, and community stories that matter to the people of Karnataka.</p>
        <?php endif; ?>
    </div>
</div>
</section>
