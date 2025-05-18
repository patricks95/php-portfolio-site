<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = '';

    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
    }

    $stmt = $pdo->prepare("INSERT INTO projects (title, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $image]);
}

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
}

$projects = $pdo->query("SELECT * FROM projects")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Projects</h2>
    <form method="post" enctype="multipart/form-data" class="mb-4">
        <input type="text" name="title" placeholder="Title" class="form-control mb-2" required>
        <textarea name="description" placeholder="Description" class="form-control mb-2" required></textarea>
        <input type="file" name="image" class="form-control mb-2">
        <button class="btn btn-primary">Add Project</button>
    </form>
    <div class="row">
        <?php foreach ($projects as $project): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <?php if ($project['image']): ?>
                        <img src="../uploads/<?= $project['image'] ?>" class="card-img-top">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $project['title'] ?></h5>
                        <p class="card-text"><?= $project['description'] ?></p>
                        <a href="?delete=<?= $project['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
