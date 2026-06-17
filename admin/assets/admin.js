// Admin Panel JavaScript
function updateToolbarStates() {
    const isBold = document.queryCommandState('bold');
    const isItalic = document.queryCommandState('italic');
    const btnBold = document.querySelector('.btn-bold');
    const btnItalic = document.querySelector('.btn-italic');
    if (btnBold) btnBold.classList.toggle('active', isBold);
    if (btnItalic) btnItalic.classList.toggle('active', isItalic);
}

function formatDoc(command) {
    document.execCommand(command, false, null);
    const editor = document.getElementById('articleBody');
    if (editor) editor.focus();
    updateToolbarStates();
}

async function uploadSubImage(input) {
    if (!input.files || !input.files[0]) return;
    
    const formData = new FormData();
    formData.append('ajax_action', 'sub_image_upload');
    formData.append('sub_image', input.files[0]);

    try {
        const response = await fetch('index.php', { method: 'POST', body: formData });
        const data = await response.json();
        
        if (data.success) {
            // Insert the image into the WYSIWYG editor
            const imgHtml = `<figure class="article-figure" style="max-width:100%;margin:1rem 0;text-align:center;"><img src="assets/images/news/${data.filename}" alt="Article Image" style="max-width:100%;height:auto;border-radius:8px;"></figure><p><br></p>`;
            
            const editor = document.getElementById('articleBody');
            editor.focus();
            document.execCommand('insertHTML', false, imgHtml);
            
        } else {
            alert('Upload failed!');
        }
    } catch (e) {
        alert('Error uploading image.');
    }
    input.value = ''; // clear input
}

document.addEventListener('DOMContentLoaded', () => {
    // Toolbar state syncing
    const editor = document.getElementById('articleBody');
    if (editor) {
        editor.addEventListener('keyup', updateToolbarStates);
        editor.addEventListener('mouseup', updateToolbarStates);
        editor.addEventListener('focus', updateToolbarStates);
    }

    // Current nav highlighting logic
    const path = window.location.search;
    document.querySelectorAll('.nav-item').forEach(item => {
        if (path.includes(item.getAttribute('href'))) item.classList.add('active');
    });
});
