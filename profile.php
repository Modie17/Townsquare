<?php
session_start();
require 'db.php';  // Ensure this file has the mysqli connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch the user details based on the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Use MySQLi to fetch the user's username from the database
$query = "SELECT username FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

// Check for errors in the query
if (!$result) {
    die("Error fetching user: " . mysqli_error($conn));
}

// Fetch the user data
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?></h2>
    
    <!-- Post Tweet Form -->
    <form method="POST" action="post_tweet.php">
        <textarea name="content" placeholder="What's happening?" required></textarea>
        <button type="submit">Tweet</button>
    </form>

    <!-- View All Tweets Link -->
    <a href="tweets.php">View All Tweets</a>
</body>
</html>
