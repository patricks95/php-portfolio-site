<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            overflow-x: hidden;
            background-color: #fbfbfd;
        }
        
        /* Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(253, 126, 20, 0.1);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }
        
        .bg-animation span:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
            animation-duration: 20s;
        }
        
        .bg-animation span:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 25s;
        }
        
        .bg-animation span:nth-child(3) {
            left: 70%;
            width: 40px;
            height: 40px;
            animation-delay: 4s;
            animation-duration: 15s;
        }
        
        .bg-animation span:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 15s;
        }
        
        .bg-animation span:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
            animation-duration: 18s;
        }
        
        .bg-animation span:nth-child(6) {
            left: 75%;
            width: 70px;
            height: 70px;
            animation-delay: 3s;
            animation-duration: 12s;
        }
        
        .bg-animation span:nth-child(7) {
            left: 35%;
            width: 50px;
            height: 50px;
            animation-delay: 7s;
            animation-duration: 24s;
        }
        
        .bg-animation span:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }
        
        .bg-animation span:nth-child(9) {
            left: 20%;
            width: 30px;
            height: 30px;
            animation-delay: 2s;
            animation-duration: 35s;
        }
        
        .bg-animation span:nth-child(10) {
            left: 85%;
            width: 45px;
            height: 45px;
            animation-delay: 0s;
            animation-duration: 22s;
        }
        
        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.8;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #5b247a, #1bcedf);
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        
        .profile-pic-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;
        }
        
        .profile-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .profile-pic:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        
        /* Section Styling */
        .section-container {
            padding: 80px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 40px;
            font-size: 2.2rem;
            font-weight: 700;
            padding-left: 15px;
            display: inline-block;
        }
        
        .section-title::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(to bottom, #5b247a, #1bcedf);
            border-radius: 20px;
        }
        
        /* About Section */
        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        /* Skills Section */
        .skill-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: none;
        }
        
        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .skill-icon {
            font-size: 2rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #5b247a, #1bcedf);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .skill-level {
            background: #f6f6f6;
            height: 8px;
            border-radius: 10px;
            margin-top: 10px;
        }
        
        .skill-level-fill {
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(to right, #5b247a, #1bcedf);
        }
        
        /* Projects Section */
        .project-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .project-img {
            height: 220px;
            object-fit: cover;
        }
        
        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 220px;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .project-card:hover .project-overlay {
            opacity: 1;
        }
        
        /* Experience Section */
        .experience-item {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .experience-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .experience-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(to bottom, #5b247a, #1bcedf);
        }
        
        .experience-position {
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
        
        .experience-company {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }
        
        .experience-duration {
            background: linear-gradient(135deg, #5b247a, #1bcedf);
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        /* Footer */
        .footer {
            background: #222;
            color: white;
            padding: 30px 0;
            text-align: center;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero {
                padding: 80px 0 60px;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .experience-position {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<!-- Background Animation -->
<div class="bg-animation">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <div class="profile-pic-container">
            <?php
            $profile = $pdo->query("SELECT image FROM profile LIMIT 1")->fetch();
            $img = $profile ? $profile['image'] : 'default_profile.png';
            ?>
            <img src="uploads/<?= $img ?>" class="profile-pic" alt="Profile Picture">
        </div>
        <h1 class="hero-title">Hi, I'm a Marketing Professional</h1>
        <p class="hero-subtitle">Building brand power through design, data, and storytelling.</p>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <!-- About Section -->
    <section id="about" class="section-container">
        <h2 class="section-title">About Me</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="about-text">
                    <?php
                    $about = $pdo->query("SELECT content FROM about LIMIT 1")->fetch();
                    echo $about ? $about['content'] : 'No content available.';
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section-container">
        <h2 class="section-title">Skills</h2>
        <div class="row">
            <?php 
            $skillIcons = [
                'Social Media Marketing' => 'fa-hashtag',
                'Content Creation' => 'fa-pencil',
                'Email Marketing' => 'fa-envelope',
                'SEO' => 'fa-search',
                'Analytics' => 'fa-chart-line',
                'Branding' => 'fa-trademark',
                'Advertising' => 'fa-ad',
                'Copywriting' => 'fa-pen-fancy',
                'Marketing Strategy' => 'fa-chess',
                'UI/UX Design' => 'fa-palette',
                'Video Production' => 'fa-video',
                'Photography' => 'fa-camera'
            ];
            
            foreach ($pdo->query("SELECT * FROM skills") as $skill): 
                $icon = isset($skillIcons[$skill['name']]) ? $skillIcons[$skill['name']] : 'fa-star';
                $levelPercentage = intval($skill['level']) * 10; // Assuming level is 1-10
            ?>
                <div class="col-md-4 mb-4">
                    <div class="skill-card">
                        <i class="fas <?= $icon ?> skill-icon"></i>
                        <h4><?= $skill['name'] ?></h4>
                        <div class="skill-level">
                            <div class="skill-level-fill" style="width: <?= $levelPercentage ?>%"></div>
                        </div>
                        <small class="mt-2 d-block text-muted">Level: <?= $skill['level'] ?>/10</small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="section-container">
        <h2 class="section-title">Projects</h2>
        <div class="row">
            <?php foreach ($pdo->query("SELECT * FROM projects") as $project): ?>
                <div class="col-md-4 mb-4">
                    <div class="card project-card">
                        <?php if ($project['image']): ?>
                            <div class="position-relative">
                                <img src="uploads/<?= $project['image'] ?>" class="card-img-top project-img" alt="<?= $project['title'] ?>">
                                <div class="project-overlay"></div>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['title'] ?></h5>
                            <p class="card-text"><?= $project['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="section-container">
        <h2 class="section-title">Work Experience</h2>
        <?php foreach ($pdo->query("SELECT * FROM experience") as $exp): ?>
            <div class="experience-item">
                <h3 class="experience-position"><?= $exp['position'] ?></h3>
                <div class="experience-company"><?= $exp['company'] ?></div>
                <div class="experience-duration"><?= $exp['duration'] ?></div>
                <p><?= $exp['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; <?= date('Y') ?> Marketing Professional. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>