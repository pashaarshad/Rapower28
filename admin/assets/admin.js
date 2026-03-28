// Admin Panel JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // Upload zone click handler
    const uploadZone = document.getElementById('uploadZone');
    const imageUpload = document.getElementById('imageUpload');
    if (uploadZone && imageUpload) {
        uploadZone.addEventListener('click', () => imageUpload.click());
        uploadZone.addEventListener('dragover', (e) => { e.preventDefault(); uploadZone.style.borderColor = '#1B6B93'; uploadZone.style.background = '#E8F4F8'; });
        uploadZone.addEventListener('dragleave', () => { uploadZone.style.borderColor = '#CBD5E1'; uploadZone.style.background = ''; });
        uploadZone.addEventListener('drop', (e) => { e.preventDefault(); uploadZone.style.borderColor = '#22C55E'; uploadZone.innerHTML = '<p>✅ Image uploaded successfully!</p>'; });
        imageUpload.addEventListener('change', () => { if (imageUpload.files.length) uploadZone.innerHTML = '<p>✅ ' + imageUpload.files[0].name + ' selected</p>'; });
    }

    // Form validation
    const form = document.querySelector('.article-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Article published successfully! (Demo mode — no database connected)');
        });
    }

    // Editor toolbar buttons (demo)
    document.querySelectorAll('.editor-toolbar button').forEach(btn => {
        btn.addEventListener('click', (e) => { e.preventDefault(); btn.style.background = '#E8F4F8'; setTimeout(() => btn.style.background = '', 300); });
    });
});
