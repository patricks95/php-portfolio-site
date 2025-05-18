<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $position = $_POST['position'];
    $company = $_POST['company'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO experience (position, company, duration, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$position, $company, $duration, $description]);
}

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM experience WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
}

$experiences = $pdo->query("SELECT * FROM experience")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Experience</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Work Experience</h2>
    <form method="post" class="mb-4">
        <input type="text" name="position" placeholder="Position" class="form-control mb-2" required>
        <input type="text" name="company" placeholder="Company" class="form-control mb-2" required>
        <input type="text" name="duration" placeholder="Duration" class="form-control mb-2" required>
        <textarea name="description" placeholder="Description" class="form-control mb-2" required></textarea>
        <button class="btn btn-primary">Add Experience</button>
    </form>

    <ul class="list-group">
        <?php foreach ($experiences as $exp): ?>
            <li class="list-group-item">
                <strong><?= $exp['position'] ?></strong> at <?= $exp['company'] ?> (<?= $exp['duration'] ?>)
                <br><?= $exp['description'] ?>
                <a href="?delete=<?= $exp['id'] ?>" class="btn btn-sm btn-danger float-end">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back</a>
</div>
</body>
</html>
