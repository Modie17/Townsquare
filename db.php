<?php
$pdo = new PDO('mysql:host=localhost;dbname=mini_twitter', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
