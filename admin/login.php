<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Ra. Power 28</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: linear-gradient(135deg, #0D4F6F 0%, #1B6B93 50%, #2A8BB5 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { background: #fff; border-radius: 16px; padding: 2.5rem; width: 100%; max-width: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .login-card .logo-area { text-align: center; margin-bottom: 2rem; }
        .login-card .logo-area img { height: 60px; margin: 0 auto 0.75rem; border-radius: 8px; }
        .login-card .logo-area h1 { font-size: 1.3rem; color: #1B6B93; }
        .login-card .logo-area p { font-size: 0.8rem; color: #94A3B8; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; font-weight: 600; font-size: 0.85rem; margin-bottom: 0.4rem; color: #4A5568; }
        .form-group input { width: 100%; padding: 0.7rem 1rem; border: 2px solid #E2E8F0; border-radius: 8px; font-size: 0.9rem; transition: 0.25s ease; }
        .form-group input:focus { border-color: #1B6B93; box-shadow: 0 0 0 3px rgba(27,107,147,0.15); }
        .login-btn { width: 100%; padding: 0.75rem; background: linear-gradient(135deg, #1B6B93, #E91E63); color: #fff; border: none; border-radius: 8px; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: 0.25s; }
        .login-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(233,30,99,0.3); background: red !important; }
        .error-msg { background: #FEE2E2; color: #DC2626; padding: 0.6rem 1rem; border-radius: 8px; font-size: 0.82rem; margin-bottom: 1rem; display: none; }
        .back-link { text-align: center; margin-top: 1.5rem; font-size: 0.82rem; }
        .back-link a { color: #1B6B93; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-area">
            <img src="../assets/images/logo.png" alt="Ra. Power 28">
            <h1>Ra. Power 28</h1>
            <p>Admin Panel — ನಿರ್ವಾಹಕ ಫಲಕ</p>
        </div>
        <?php
        session_start();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['username'] ?? '';
            $pass = $_POST['password'] ?? '';
            if ($user === 'admin' && $pass === 'admin') {
                $_SESSION['admin_logged_in'] = true;
                header('Location: index.php');
                exit;
            } else {
                $error = 'Invalid username or password!';
            }
        }
        ?>
        <?php if ($error): ?>
        <div class="error-msg" style="display:block;"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>👤 Username</label>
                <input type="text" name="username" placeholder="Enter username" required autofocus>
            </div>
            <div class="form-group">
                <label>🔒 Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="login-btn">🔐 Login to Dashboard</button>
        </form>
        <div class="back-link"><a href="../index.php">← Back to Website</a></div>
    </div>
</body>
</html>
