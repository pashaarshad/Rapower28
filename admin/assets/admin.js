// Admin Panel JavaScript
function formatDoc(command) {
    const textarea = document.getElementById('articleBody');
    if (!textarea) return;
    
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selectedText = textarea.value.substring(start, end);
    let newText = '';

    if (command === 'bold') newText = `<strong>${selectedText}</strong>`;
    else if (command === 'italic') newText = `<em>${selectedText}</em>`;

    textarea.setRangeText(newText, start, end, 'select');
    textarea.focus();
}

async function uploadSubImage(input) {
    if (!input.files || !input.files[0]) return;
    
    const textarea = document.getElementById('articleBody');
    const formData = new FormData();
    formData.append('ajax_action', 'sub_image_upload');
    formData.append('sub_image', input.files[0]);

    try {
        const response = await fetch('index.php', { method: 'POST', body: formData });
        const data = await response.json();
        
        if (data.success) {
            const imgTag = `\n<figure class="article-figure"><img src="assets/images/news/${data.filename}" alt="Image"></figure>\n`;
            const start = textarea.selectionStart;
            textarea.setRangeText(imgTag, start, start, 'end');
            textarea.focus();
        } else {
            alert('Upload failed!');
        }
    } catch (e) {
        alert('Error uploading image.');
    }
    input.value = ''; // clear input
}

document.addEventListener('DOMContentLoaded', () => {
    // Current nav highlighting logic
    const path = window.location.search;
    document.querySelectorAll('.nav-item').forEach(item => {
        if (path.includes(item.getAttribute('href'))) item.classList.add('active');
    });
});
