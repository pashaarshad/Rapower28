<?php 
$pageTitle = __('contact'); 
$lbl_name = $CURRENT_LANG === 'kn' ? 'ಹೆಸರು' : ($CURRENT_LANG === 'hi' ? 'नाम' : 'Name');
$lbl_email = $CURRENT_LANG === 'kn' ? 'ಇಮೇಲ್' : ($CURRENT_LANG === 'hi' ? 'ईमेल' : 'Email');
$lbl_subject = $CURRENT_LANG === 'kn' ? 'ವಿಷಯ' : ($CURRENT_LANG === 'hi' ? 'विषय' : 'Subject');
$lbl_message = $CURRENT_LANG === 'kn' ? 'ಸಂದೇಶ' : ($CURRENT_LANG === 'hi' ? 'संदेश' : 'Message');
$lbl_send = $CURRENT_LANG === 'kn' ? '📨 ಸಂದೇಶ ಕಳುಹಿಸಿ' : ($CURRENT_LANG === 'hi' ? '📨 संदेश भेजें' : '📨 Send Message');
$ph_name = $CURRENT_LANG === 'kn' ? 'ನಿಮ್ಮ ಹೆಸರು' : ($CURRENT_LANG === 'hi' ? 'आपका नाम' : 'Your name');
$ph_message = $CURRENT_LANG === 'kn' ? 'ನಿಮ್ಮ ಸಂದೇಶ...' : ($CURRENT_LANG === 'hi' ? 'आपका संदेश...' : 'Your message...');
?>
<section style="padding:2rem 0;min-height:50vh;">
<div class="container" style="max-width:700px;">
    <div class="section-header"><h2>📞 <?= __('contact') ?></h2></div>
    <div class="sidebar-widget" style="padding:2rem;">
        <form method="POST" style="display:flex;flex-direction:column;gap:1rem;">
            <div class="contact-form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div>
                    <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;"><?= $lbl_name ?></label>
                    <input type="text" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);transition:var(--transition-base);" placeholder="<?= $ph_name ?>">
                </div>
                <div>
                    <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;"><?= $lbl_email ?></label>
                    <input type="email" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);" placeholder="email@example.com">
                </div>
            </div>
            <div>
                <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;"><?= $lbl_subject ?></label>
                <input type="text" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);" placeholder="<?= $lbl_subject ?>">
            </div>
            <div>
                <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;"><?= $lbl_message ?></label>
                <textarea rows="5" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);resize:vertical;" placeholder="<?= $ph_message ?>"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="align-self:flex-start;"><?= $lbl_send ?></button>
        </form>
        <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid var(--color-border);display:grid;grid-template-columns:1fr 1fr;gap:1rem;font-size:0.85rem;color:var(--color-text-secondary);">
            <div><strong>📧 <?= $lbl_email ?>:</strong><br><?= SITE_EMAIL ?></div>
            <div><strong>🌐 <?= $CURRENT_LANG === 'kn' ? 'ವೆಬ್‌ಸೈಟ್' : ($CURRENT_LANG === 'hi' ? 'वेबसाइट' : 'Website') ?>:</strong><br><?= SITE_URL ?></div>
        </div>
    </div>
</div>
</section>
