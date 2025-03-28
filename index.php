<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=mini_twitter', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// User Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->execute([$username, $password]);
    echo 'User registered!';
}

// User Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo 'Logged in!';
    } else {
        echo 'Invalid credentials!';
    }
}

// Post Tweet
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tweet'])) {
    if (!isset($_SESSION['user_id'])) die('Login first!');
    $content = $_POST['content'];
    $stmt = $pdo->prepare('INSERT INTO tweets (user_id, content) VALUES (?, ?)');
    $stmt->execute([$_SESSION['user_id'], $content]);
    echo 'Tweet posted!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini Twitter</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>
    
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    
    <h2>Post Tweet</h2>
    <form method="POST">
        <textarea name="content" placeholder="What's happening?" required></textarea>
        <button type="submit" name="tweet">Tweet</button>
    </form>
    
    <h2>Tweets</h2>
    <?php
    $stmt = $pdo->query('SELECT tweets.content, users.username FROM tweets JOIN users ON tweets.user_id = users.id ORDER BY tweets.created_at DESC');
    while ($row = $stmt->fetch()) {
        echo '<p><strong>' . htmlspecialchars($row['username']) . ':</strong> ' . htmlspecialchars($row['content']) . '</p>';
    }
    ?>
</body>
</html>
