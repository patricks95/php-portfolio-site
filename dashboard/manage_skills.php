<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $level = $_POST['level'];
    $stmt = $pdo->prepare("INSERT INTO skills (name, level) VALUES (?, ?)");
    $stmt->execute([$name, $level]);
}
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM skills WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
}
$skills = $pdo->query("SELECT * FROM skills")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Skills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Skills</h2>
    <form method="post" class="mb-3">
        <input type="text" name="name" placeholder="Skill Name" class="form-control mb-2" required>
        <input type="text" name="level" placeholder="Level (e.g. Beginner)" class="form-control mb-2" required>
        <button class="btn btn-primary">Add Skill</button>
    </form>
    <ul class="list-group">
        <?php foreach ($skills as $skill): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $skill['name'] ?> - <?= $skill['level'] ?>
                <a href="?delete=<?= $skill['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back</a>
</div>
</body>
</html>
