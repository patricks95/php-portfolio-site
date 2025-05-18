<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile'])) {
    $image = basename($_FILES['profile']['name']);
    move_uploaded_file($_FILES['profile']['tmp_name'], "../uploads/" . $image);
    $pdo->exec("DELETE FROM profile");
    $stmt = $pdo->prepare("INSERT INTO profile (image) VALUES (?)");
    $stmt->execute([$image]);
}

$profile = $pdo->query("SELECT image FROM profile LIMIT 1")->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Profile Picture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fd7e14;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Upload Profile Picture</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="profile" class="form-control mb-2" required>
        <button class="btn btn-warning">Upload</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </form>
    <?php if ($profile): ?>
        <h4 class="mt-4">Current Image:</h4>
        <img src="../uploads/<?= $profile['image'] ?>" class="profile-preview mt-2">
    <?php endif; ?>
</div>
</body>
</html>
