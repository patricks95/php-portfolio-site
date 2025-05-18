<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Welcome, <?= $_SESSION['user'] ?></h2>
    <a href="logout.php" class="btn btn-danger float-end">Logout</a>
    <p>Choose a section to manage:</p>
    <ul>
        <li><a href="manage_about.php">About</a></li>
        <li><a href="manage_skills.php">Skills</a></li>
        <li><a href="manage_projects.php">Projects</a></li>
        <li><a href="manage_experience.php">Experience</a></li>
        <li><a href="manage_profile.php">Profile Picture</a></li>
    </ul>
</div>
</body>
</html>
