<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }
require_once '../config/app.php';

// Handle AJAX Sub-Image Upload
if (isset($_POST['ajax_action']) && $_POST['ajax_action'] === 'sub_image_upload') {
    if (isset($_FILES['sub_image']) && $_FILES['sub_image']['error'] === 0) {
        $ext = pathinfo($_FILES['sub_image']['name'], PATHINFO_EXTENSION);
        $name = 'sub_' . time() . '_' . rand(100, 999) . '.' . $ext;
        if (!is_dir('../assets/images/news/')) mkdir('../assets/images/news/', 0777, true);
        move_uploaded_file($_FILES['sub_image']['tmp_name'], '../assets/images/news/' . $name);
        echo json_encode(['success' => true, 'filename' => $name]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}

$currentPage = $_GET['p'] ?? 'dashboard';
$message = '';

// Handle Article Actions (Delete)
if (isset($_GET['delete_id'])) {
    $news = getLocalNews();
    $id = (int)$_GET['delete_id'];
    $news = array_filter($news, fn($a) => (int)$a['id'] !== $id);
    saveLocalNews($news);
    $message = '<div class="alert alert-success">🗑️ Article deleted successfully!</div>';
}

// Handle Article Submission (Create/Edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $news = getLocalNews();
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    $input_lang = $_POST['input_lang'] ?? 'en';
    $author = $_POST['author'] ?: 'Admin';
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
    $title_field = "title_{$input_lang}";
    $body_field = "body_{$input_lang}";

    // Handle Image Upload
    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageName = 'news_' . time() . '_' . rand(100, 999) . '.' . $ext;
        $target = '../assets/images/news/' . $imageName;
        if (!is_dir('../assets/images/news/')) mkdir('../assets/images/news/', 0777, true);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    if ($_POST['action'] === 'publish_article') {
        $maxId = 0;
        foreach($news as $n) if((int)$n['id'] > $maxId) $maxId = (int)$n['id'];
        
        $newArticle = [
            'id' => $maxId + 1,
            'slug' => $slug . '-' . time(),
            'category' => $category,
            'image' => $imageName,
            $title_field => $title,
            $body_field => $body,
            'author' => $author,
            'views' => 0,
            'published_at' => date('Y-m-d H:i:s'),
            'is_featured' => 0,
            'is_breaking' => 0
        ];
        $news[] = $newArticle;
        saveLocalNews($news);
        $message = '<div class="alert alert-success">🚀 Article published successfully!</div>';
    } elseif ($_POST['action'] === 'edit_article') {
        $id = (int)$_POST['id'];
        foreach ($news as &$art) {
            if ((int)$art['id'] === $id) {
                $art[$title_field] = $title;
                $art[$body_field] = $body;
                $art['category'] = $category;
                $art['author'] = $author;
                if ($imageName) $art['image'] = $imageName;
                break;
            }
        }
        saveLocalNews($news);
        $message = '<div class="alert alert-success">📝 Article updated successfully!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Ra. Power 28 Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body class="admin-body">
<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <img src="../assets/images/logo.png" alt="Logo" style="height:40px;border-radius:6px;">
            <div><strong style="color:#fff;font-size:0.95rem;">Ra. Power 28</strong><br><small style="color:var(--color-highlight);font-size:0.7rem;">Admin Panel</small></div>
        </div>
        <nav class="sidebar-nav">
            <a href="?p=dashboard" class="nav-item <?= $currentPage==='dashboard'?'active':'' ?>">📊 Dashboard</a>
            <a href="?p=articles" class="nav-item <?= $currentPage==='articles'?'active':'' ?>">📝 All Articles</a>
            <a href="?p=create" class="nav-item <?= $currentPage==='create'?'active':'' ?>">➕ Add Articles/Post</a>
        </nav>
        <div class="sidebar-footer">
            <a href="../index.php" class="nav-item">🌐 View Website</a>
            <a href="login.php?logout=1" class="nav-item" style="color:#F87171;">🚪 Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <header class="admin-header">
            <h1 class="admin-title">
                <?php
                $titles = ['dashboard'=>'📊 Dashboard','articles'=>'📝 All Articles','create'=>'➕ Add Articles/Post','edit'=>'✏️ Edit Article'];
                echo $titles[$currentPage] ?? 'Dashboard';
                ?>
            </h1>
            <div class="admin-user">
                <span>👤 Admin</span>
            </div>
        </header>

        <div class="admin-content">
        <?= $message ?>
        <?php if ($currentPage === 'dashboard'): 
            $news = getLocalNews();
            $totalArticles = count($news);
            $totalViews = array_sum(array_column($news, 'views'));
            $totalCategories = count($CATEGORIES);
        ?>
            <!-- Dashboard Stats -->
            <div class="stats-grid">
                <div class="stat-card" style="--accent:#2196F3;">
                    <div class="stat-icon">📝</div>
                    <div class="stat-info"><div class="stat-number"><?= $totalArticles ?></div><div class="stat-label">Total Articles</div></div>
                </div>
                <div class="stat-card" style="--accent:#4CAF50;">
                    <div class="stat-icon">👁</div>
                    <div class="stat-info"><div class="stat-number"><?= number_format($totalViews) ?></div><div class="stat-label">Total Views</div></div>
                </div>
                <div class="stat-card" style="--accent:#FF9800;">
                    <div class="stat-icon">📂</div>
                    <div class="stat-info"><div class="stat-number"><?= $totalCategories ?></div><div class="stat-label">Categories</div></div>
                </div>
                <div class="stat-card" style="--accent:#E91E63;">
                    <div class="stat-icon">🌐</div>
                    <div class="stat-info"><div class="stat-number">3</div><div class="stat-label">Languages</div></div>
                </div>
            </div>

            <!-- Recent Articles -->
            <div class="admin-card" style="margin-top:1.5rem;">
                <div class="card-header"><h2>📝 Recent Articles</h2><a href="?p=create" class="btn btn-primary" style="font-size:0.8rem;padding:0.4rem 1rem;">+ New Article</a></div>
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Category</th><th>Author</th><th>Date</th><th>Views</th><th>Status</th></tr></thead>
                    <tbody>
                        <?php
                        $recent = getArticles(5);
                        foreach ($recent as $art):
                            $title = $art['title_en'] ?: ($art['title_kn'] ?: $art['title_hi']);
                        ?>
                        <tr>
                            <td><?= htmlspecialchars(substr($title, 0, 50)) ?>...</td>
                            <td><span class="badge" style="background:#2196F3;"><?= ucfirst($art['category']) ?></span></td>
                            <td><?= htmlspecialchars($art['author']) ?></td>
                            <td><?= date('M d', strtotime($art['published_at'])) ?></td>
                            <td><?= number_format($art['views']) ?></td>
                            <td><span class="badge" style="background:#22C55E;">Published</span></td>
                        </tr>
                        <?php endforeach; if (empty($recent)) echo '<tr><td colspan="6" style="text-align:center;">No articles found.</td></tr>'; ?>
                    </tbody>
                </table>
            </div>

            <!-- Quick Actions -->
            <div class="admin-card" style="margin-top:1.5rem;">
                <div class="card-header"><h2>⚡ Quick Actions</h2></div>
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;padding:1rem;">
                    <a href="?p=create" class="quick-action">➕<br><small>Add New Post</small></a>
                    <a href="?p=articles" class="quick-action">📝<br><small>View All Posts</small></a>
                    <a href="../index.php" target="_blank" class="quick-action">🌐<br><small>View Site</small></a>
                </div>
            </div>

        <?php elseif ($currentPage === 'create' || $currentPage === 'edit'): 
            $editArt = null;
            if ($currentPage === 'edit' && isset($_GET['id'])) {
                $news = getLocalNews();
                $id = (int)$_GET['id'];
                foreach ($news as $n) {
                    if ((int)$n['id'] === $id) {
                        $editArt = $n;
                        break;
                    }
                }
            }
        ?>
            <!-- Create/Edit Article Form -->
            <div class="admin-card">
                <div class="card-header"><h2><?= $currentPage === 'edit' ? '✏️ Edit Article' : '📝 Add Articles/Post' ?></h2></div>
                <form class="article-form" style="padding:1.5rem;" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $currentPage === 'edit' ? 'edit_article' : 'publish_article' ?>">
                    <?php if($editArt): ?><input type="hidden" name="id" value="<?= $editArt['id'] ?>"><?php endif; ?>
                    
                    <div class="form-row">
                        <label>Main Image *</label>
                        <input type="file" name="image" class="form-input" accept="image/*" <?= $editArt ? '' : 'required' ?>>
                        <?php if($editArt && !empty($editArt['image'])): ?>
                            <div style="margin-top:0.5rem;">
                                <img src="../assets/images/news/<?= $editArt['image'] ?>" style="height:60px;border-radius:4px;border:1px solid #ddd;">
                                <p style="font-size:0.7rem;color:#666;">Current Image</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-row">
                        <label>Language of Input</label>
                        <div style="display:flex;gap:0.5rem;">
                            <label class="radio-label"><input type="radio" name="input_lang" value="en" checked> English</label>
                            <label class="radio-label"><input type="radio" name="input_lang" value="kn"> ಕನ್ನಡ</label>
                            <label class="radio-label"><input type="radio" name="input_lang" value="hi"> हिन्दी</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-input" placeholder="Enter title..." value="<?= $editArt ? htmlspecialchars($editArt['title_en'] ?: ($editArt['title_kn'] ?: $editArt['title_hi'])) : '' ?>" required>
                    </div>
                    <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <div><label>Category *</label>
                        <select name="category" class="form-input" required>
                            <option value="">Select Category</option>
                            <?php foreach($CATEGORIES as $cat): ?>
                                <option value="<?= $cat['slug'] ?>" <?= ($editArt && $editArt['category'] === $cat['slug']) ? 'selected' : '' ?>><?= $cat['en'] ?></option>
                            <?php endforeach; ?>
                        </select></div>
                        <div><label>Author</label><input type="text" name="author" class="form-input" value="<?= $editArt ? htmlspecialchars($editArt['author']) : 'Admin' ?>"></div>
                    </div>
                    <div class="form-row">
                        <label>Post Body *</label>
                        <div class="editor-toolbar">
                            <button type="button" onclick="formatDoc('bold')"><b>B</b></button>
                            <button type="button" onclick="formatDoc('italic')"><i>I</i></button>
                            <span class="toolbar-sep">|</span>
                            <button type="button" onclick="document.getElementById('subImageInput').click()">🖼️ Upload & Insert Image</button>
                            <input type="file" id="subImageInput" style="display:none;" onchange="uploadSubImage(this)">
                        </div>
                        <textarea id="articleBody" name="body" class="form-input form-textarea" rows="15" placeholder="Write content here..." required><?= $editArt ? htmlspecialchars($editArt['body_en'] ?: ($editArt['body_kn'] ?: $editArt['body_hi'])) : '' ?></textarea>
                    </div>
                    <div style="display:flex;gap:0.75rem;margin-top:1rem;">
                        <button type="submit" class="btn btn-primary" style="background:linear-gradient(135deg,#22C55E,#16A34A);">💾 <?= $currentPage === 'edit' ? 'Update Post' : 'Publish Post' ?></button>
                        <a href="?p=articles" class="btn" style="background:#94A3B8;color:#fff;text-decoration:none;display:flex;align-items:center;padding:0 1rem;">Cancel</a>
                    </div>
                </form>
            </div>


        <?php elseif ($currentPage === 'articles'): ?>
            <!-- Article List -->
            <div class="admin-card">
                <div class="card-header">
                    <h2>📝 All Articles/Posts</h2>
                    <a href="?p=create" class="btn btn-primary" style="font-size:0.8rem;padding:0.4rem 1rem;">+ Add New</a>
                </div>
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Category</th><th>Author</th><th>Date</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php
                        $list = getArticles(100);
                        foreach ($list as $art):
                            $title = $art['title_en'] ?: ($art['title_kn'] ?: $art['title_hi']);
                        ?>
                        <tr>
                            <td><?= htmlspecialchars(substr($title, 0, 70)) ?>...</td>
                            <td><span class="badge" style="background:#2196F3;"><?= ucfirst($art['category']) ?></span></td>
                            <td><?= htmlspecialchars($art['author']) ?></td>
                            <td><?= date('M d, Y', strtotime($art['published_at'])) ?></td>
                            <td>
                                <a href="?p=edit&id=<?= $art['id'] ?>" class="btn" style="padding:0.2rem 0.5rem;font-size:0.75rem;background:#1B6B93;color:#fff;">✏️ Edit</a>
                                <a href="?p=articles&delete_id=<?= $art['id'] ?>" class="btn" style="padding:0.2rem 0.5rem;font-size:0.75rem;background:#F44336;color:#fff;" onclick="return confirm('Delete this article?')">🗑️ Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; if (empty($list)) echo '<tr><td colspan="5" style="text-align:center;">No articles found.</td></tr>'; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <div class="admin-card" style="text-align:center;padding:4rem 2rem;">
                <p style="font-size:3rem;margin-bottom:1rem;">🚧</p>
                <h2 style="color:var(--color-text-secondary);">Coming Soon</h2>
                <p style="color:var(--color-text-muted);margin-top:0.5rem;">This section will be available once we connect the backend database.</p>
            </div>
        <?php endif; ?>
        </div>
    </main>
</div>
<script src="assets/admin.js?v=<?= time() ?>"></script>
</body>
</html>
