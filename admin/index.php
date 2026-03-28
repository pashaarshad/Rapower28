<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }
$currentPage = $_GET['p'] ?? 'dashboard';
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
            <a href="?p=articles" class="nav-item <?= $currentPage==='articles'?'active':'' ?>">📝 Articles</a>
            <a href="?p=create" class="nav-item <?= $currentPage==='create'?'active':'' ?>">➕ New Article</a>
            <a href="?p=categories" class="nav-item <?= $currentPage==='categories'?'active':'' ?>">📂 Categories</a>
            <a href="?p=media" class="nav-item <?= $currentPage==='media'?'active':'' ?>">🖼️ Media Library</a>
            <a href="?p=epaper" class="nav-item <?= $currentPage==='epaper'?'active':'' ?>">📰 E-Paper</a>
            <a href="?p=breaking" class="nav-item <?= $currentPage==='breaking'?'active':'' ?>">🔴 Breaking News</a>
            <a href="?p=seo" class="nav-item <?= $currentPage==='seo'?'active':'' ?>">🔍 SEO Settings</a>
            <a href="?p=analytics" class="nav-item <?= $currentPage==='analytics'?'active':'' ?>">📈 Analytics</a>
            <a href="?p=users" class="nav-item <?= $currentPage==='users'?'active':'' ?>">👥 Users</a>
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
                $titles = ['dashboard'=>'📊 Dashboard','articles'=>'📝 All Articles','create'=>'➕ Create Article',
                    'categories'=>'📂 Categories','media'=>'🖼️ Media Library','epaper'=>'📰 E-Paper',
                    'breaking'=>'🔴 Breaking News','seo'=>'🔍 SEO Settings','analytics'=>'📈 Analytics','users'=>'👥 Users'];
                echo $titles[$currentPage] ?? 'Dashboard';
                ?>
            </h1>
            <div class="admin-user">
                <span>👤 Admin</span>
            </div>
        </header>

        <div class="admin-content">
        <?php if ($currentPage === 'dashboard'): ?>
            <!-- Dashboard Stats -->
            <div class="stats-grid">
                <div class="stat-card" style="--accent:#2196F3;">
                    <div class="stat-icon">📝</div>
                    <div class="stat-info"><div class="stat-number">248</div><div class="stat-label">Total Articles</div></div>
                </div>
                <div class="stat-card" style="--accent:#4CAF50;">
                    <div class="stat-icon">👁</div>
                    <div class="stat-info"><div class="stat-number">1.2M</div><div class="stat-label">Total Views</div></div>
                </div>
                <div class="stat-card" style="--accent:#FF9800;">
                    <div class="stat-icon">📂</div>
                    <div class="stat-info"><div class="stat-number">10</div><div class="stat-label">Categories</div></div>
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
                        <tr><td>Karnataka Budget 2026 Highlights</td><td><span class="badge" style="background:#9C27B0;">Politics</span></td><td>Rajesh Kumar</td><td>Mar 28</td><td>15,420</td><td><span class="badge" style="background:#22C55E;">Published</span></td></tr>
                        <tr><td>IPL 2026: RCB Wins Thriller</td><td><span class="badge" style="background:#4CAF50;">Sports</span></td><td>Priya Sharma</td><td>Mar 27</td><td>28,340</td><td><span class="badge" style="background:#22C55E;">Published</span></td></tr>
                        <tr><td>Bengaluru Metro Phase 3 Approved</td><td><span class="badge" style="background:#2196F3;">District</span></td><td>Anil Desai</td><td>Mar 27</td><td>12,890</td><td><span class="badge" style="background:#22C55E;">Published</span></td></tr>
                        <tr><td>Green Energy Corridor Project</td><td><span class="badge" style="background:#00BCD4;">Health</span></td><td>Meera Nair</td><td>Mar 26</td><td>8,760</td><td><span class="badge" style="background:#F59E0B;">Draft</span></td></tr>
                        <tr><td>G20 Energy Ministers Summit</td><td><span class="badge" style="background:#FF9800;">Country</span></td><td>Vikram Singh</td><td>Mar 26</td><td>19,200</td><td><span class="badge" style="background:#22C55E;">Published</span></td></tr>
                    </tbody>
                </table>
            </div>

            <!-- Quick Actions -->
            <div class="admin-card" style="margin-top:1.5rem;">
                <div class="card-header"><h2>⚡ Quick Actions</h2></div>
                <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;padding:1rem;">
                    <a href="?p=create" class="quick-action">➕<br><small>New Article</small></a>
                    <a href="?p=breaking" class="quick-action">🔴<br><small>Breaking News</small></a>
                    <a href="?p=media" class="quick-action">🖼️<br><small>Upload Media</small></a>
                    <a href="?p=epaper" class="quick-action">📰<br><small>Upload E-Paper</small></a>
                </div>
            </div>

        <?php elseif ($currentPage === 'create'): ?>
            <!-- Create Article Form -->
            <div class="admin-card">
                <div class="card-header"><h2>📝 Create New Article</h2></div>
                <form class="article-form" style="padding:1.5rem;">
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
                        <input type="text" class="form-input" placeholder="Enter article title..." required>
                    </div>
                    <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <div><label>Category *</label>
                        <select class="form-input"><option>Select Category</option><option>District</option><option>Sports</option><option>Crime</option><option>Health & Environment</option><option>Country</option><option>Politics</option><option>State</option><option>Literature</option><option>Astrology</option><option>E-Paper</option></select></div>
                        <div><label>Author</label><input type="text" class="form-input" value="Admin" placeholder="Author name"></div>
                    </div>
                    <div class="form-row">
                        <label>Featured Image</label>
                        <div class="upload-zone" id="uploadZone">
                            <p>📷 Drop image here or <strong>click to upload</strong></p>
                            <input type="file" accept="image/*" style="display:none;" id="imageUpload">
                        </div>
                    </div>
                    <div class="form-row">
                        <label>Article Body *</label>
                        <div class="editor-toolbar">
                            <button type="button" title="Bold"><b>B</b></button>
                            <button type="button" title="Italic"><i>I</i></button>
                            <button type="button" title="Underline"><u>U</u></button>
                            <span class="toolbar-sep">|</span>
                            <button type="button">H1</button>
                            <button type="button">H2</button>
                            <button type="button">H3</button>
                            <span class="toolbar-sep">|</span>
                            <button type="button">📷</button>
                            <button type="button">🔗</button>
                            <button type="button">📹</button>
                            <span class="toolbar-sep">|</span>
                            <button type="button">≡</button>
                            <button type="button">"</button>
                        </div>
                        <textarea class="form-input form-textarea" rows="12" placeholder="Write your article content here..."></textarea>
                    </div>
                    <div class="form-row">
                        <label>Tags</label>
                        <input type="text" class="form-input" placeholder="Add tags separated by commas...">
                    </div>
                    <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <div><label>Meta Title (SEO)</label><input type="text" class="form-input" placeholder="SEO title..."></div>
                        <div><label>Focus Keyword</label><input type="text" class="form-input" placeholder="Primary keyword..."></div>
                    </div>
                    <div class="form-row">
                        <label>Meta Description (SEO)</label>
                        <textarea class="form-input" rows="2" placeholder="SEO meta description (160 chars)..."></textarea>
                    </div>
                    <div class="form-row">
                        <label>Publishing Options</label>
                        <div style="display:flex;gap:1.5rem;flex-wrap:wrap;">
                            <label class="radio-label"><input type="radio" name="status" value="publish" checked> 🚀 Publish Now</label>
                            <label class="radio-label"><input type="radio" name="status" value="schedule"> 📅 Schedule</label>
                            <label class="radio-label"><input type="radio" name="status" value="draft"> 📋 Save as Draft</label>
                        </div>
                        <div style="display:flex;gap:1.5rem;margin-top:0.75rem;">
                            <label class="check-label"><input type="checkbox"> 🔴 Mark as Breaking News</label>
                            <label class="check-label"><input type="checkbox"> ⭐ Featured Article</label>
                        </div>
                    </div>
                    <div class="form-row" style="background:#F0F9FF;padding:1rem;border-radius:8px;border:1px solid #BAE6FD;">
                        <label style="margin-bottom:0.5rem;">🌐 Auto-Translation Preview</label>
                        <div style="font-size:0.82rem;color:#4A5568;display:grid;gap:0.4rem;">
                            <div>✅ <strong>English:</strong> <em>Title will appear here after typing...</em></div>
                            <div>✅ <strong>ಕನ್ನಡ:</strong> <em>ಶೀರ್ಷಿಕೆ ಇಲ್ಲಿ ಕಾಣಿಸುತ್ತದೆ...</em></div>
                            <div>✅ <strong>हिन्दी:</strong> <em>शीर्षक यहाँ दिखाई देगा...</em></div>
                        </div>
                    </div>
                    <div style="display:flex;gap:0.75rem;margin-top:1rem;">
                        <button type="button" class="btn" style="background:#94A3B8;color:#fff;">💾 Save Draft</button>
                        <button type="button" class="btn" style="background:#1B6B93;color:#fff;">👁️ Preview</button>
                        <button type="submit" class="btn btn-primary" style="background:linear-gradient(135deg,#22C55E,#16A34A);">🚀 Publish Article</button>
                    </div>
                </form>
            </div>

        <?php elseif ($currentPage === 'articles'): ?>
            <!-- Article List -->
            <div class="admin-card">
                <div class="card-header">
                    <h2>📝 All Articles</h2>
                    <div style="display:flex;gap:0.5rem;">
                        <input type="text" class="form-input" placeholder="Search articles..." style="width:200px;padding:0.4rem 0.75rem;font-size:0.82rem;">
                        <select class="form-input" style="padding:0.4rem 0.75rem;font-size:0.82rem;"><option>All Categories</option></select>
                        <a href="?p=create" class="btn btn-primary" style="font-size:0.8rem;padding:0.4rem 1rem;">+ New</a>
                    </div>
                </div>
                <table class="admin-table">
                    <thead><tr><th><input type="checkbox"></th><th>Title</th><th>Category</th><th>Author</th><th>Date</th><th>Views</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        <tr><td><input type="checkbox"></td><td>Karnataka Budget 2026 Highlights</td><td><span class="badge" style="background:#9C27B0;">Politics</span></td><td>Rajesh Kumar</td><td>Mar 28</td><td>15,420</td><td><span class="badge" style="background:#22C55E;">Published</span></td><td><a href="#" style="color:#1B6B93;font-size:0.8rem;">✏️</a> <a href="#" style="color:#F44336;font-size:0.8rem;">🗑️</a></td></tr>
                        <tr><td><input type="checkbox"></td><td>IPL 2026: RCB Wins Thriller Against CSK</td><td><span class="badge" style="background:#4CAF50;">Sports</span></td><td>Priya Sharma</td><td>Mar 27</td><td>28,340</td><td><span class="badge" style="background:#22C55E;">Published</span></td><td><a href="#" style="color:#1B6B93;font-size:0.8rem;">✏️</a> <a href="#" style="color:#F44336;font-size:0.8rem;">🗑️</a></td></tr>
                        <tr><td><input type="checkbox"></td><td>Bengaluru Metro Phase 3 Gets Approval</td><td><span class="badge" style="background:#2196F3;">District</span></td><td>Anil Desai</td><td>Mar 27</td><td>12,890</td><td><span class="badge" style="background:#22C55E;">Published</span></td><td><a href="#" style="color:#1B6B93;font-size:0.8rem;">✏️</a> <a href="#" style="color:#F44336;font-size:0.8rem;">🗑️</a></td></tr>
                        <tr><td><input type="checkbox"></td><td>Green Energy Corridor Project Launched</td><td><span class="badge" style="background:#00BCD4;">Health</span></td><td>Meera Nair</td><td>Mar 26</td><td>8,760</td><td><span class="badge" style="background:#F59E0B;">Draft</span></td><td><a href="#" style="color:#1B6B93;font-size:0.8rem;">✏️</a> <a href="#" style="color:#F44336;font-size:0.8rem;">🗑️</a></td></tr>
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
<script src="assets/admin.js"></script>
</body>
</html>
