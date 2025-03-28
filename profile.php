<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require 'db.php';
$stmt = $pdo->prepare('SELECT username FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?></h2>
    <form method="POST">
        <textarea name="content" placeholder="What's happening?" required></textarea>
        <button type="submit" name="tweet">Tweet</button>
    </form>
    <a href="tweets.php">View All Tweets</a>
</body>
</html>

<!-- Tweets Page (tweets.php) -->
<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>All Tweets</title>
</head>
<body>
    <h2>All Tweets</h2>
    <?php
    $stmt = $pdo->query('SELECT tweets.content, users.username FROM tweets JOIN users ON tweets.user_id = users.id ORDER BY tweets.created_at DESC');
    while ($row = $stmt->fetch()) {
        echo '<p><strong>' . htmlspecialchars($row['username']) . ':</strong> ' . htmlspecialchars($row['content']) . '</p>';
    }
    ?>
    <a href="profile.php">Back to Profile</a>
</body>
</html>
