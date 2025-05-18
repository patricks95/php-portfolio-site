<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $pdo->exec("DELETE FROM about"); // Ensure only one entry
    $stmt = $pdo->prepare("INSERT INTO about (content) VALUES (?)");
    $stmt->execute([$content]);
    header("Location: dashboard.php");
    exit;
}

$about = $pdo->query("SELECT content FROM about LIMIT 1")->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit About Section</h2>
    <form method="post">
        <textarea class="form-control mb-2" name="content" rows="6"><?= $about ? $about['content'] : '' ?></textarea>
        <button class="btn btn-success">Save</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
