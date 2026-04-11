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

function insertImage() {
    const textarea = document.getElementById('articleBody');
    if (!textarea) return;

    const imgName = prompt('Enter the image filename (e.g., news_123.jpg):');
    if (imgName) {
        const imgTag = `\n<figure class="article-figure"><img src="assets/images/news/${imgName}" alt="Sub image"></figure>\n`;
        const start = textarea.selectionStart;
        textarea.setRangeText(imgTag, start, start, 'end');
        textarea.focus();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Current nav highlighting logic
    const path = window.location.search;
    document.querySelectorAll('.nav-item').forEach(item => {
        if (path.includes(item.getAttribute('href'))) item.classList.add('active');
    });
});
