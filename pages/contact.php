<?php $pageTitle = __('contact'); ?>
<section style="padding:2rem 0;min-height:50vh;">
<div class="container" style="max-width:700px;">
    <div class="section-header"><h2>📞 <?= __('contact') ?></h2></div>
    <div class="sidebar-widget" style="padding:2rem;">
        <form method="POST" style="display:flex;flex-direction:column;gap:1rem;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div>
                    <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;">Name</label>
                    <input type="text" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);transition:var(--transition-base);" placeholder="Your name">
                </div>
                <div>
                    <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;">Email</label>
                    <input type="email" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);" placeholder="email@example.com">
                </div>
            </div>
            <div>
                <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;">Subject</label>
                <input type="text" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);" placeholder="Subject">
            </div>
            <div>
                <label style="font-weight:600;font-size:0.85rem;display:block;margin-bottom:0.35rem;">Message</label>
                <textarea rows="5" style="width:100%;padding:0.6rem 0.85rem;border:2px solid var(--color-border);border-radius:var(--radius-md);resize:vertical;" placeholder="Your message..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="align-self:flex-start;">📨 Send Message</button>
        </form>
        <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid var(--color-border);display:grid;grid-template-columns:1fr 1fr;gap:1rem;font-size:0.85rem;color:var(--color-text-secondary);">
            <div><strong>📧 Email:</strong><br><?= SITE_EMAIL ?></div>
            <div><strong>🌐 Website:</strong><br><?= SITE_URL ?></div>
        </div>
    </div>
</div>
</section>
