<?php
// Database connection (optional, can be used to dynamically fetch portfolio projects)
$conn = new mysqli("127.0.0.1", "root", "", "portfolio_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Fetch portfolio projects from the database
$sql = "SELECT * FROM projects ORDER BY created_at DESC";
$projects_result = $conn->query($sql);

// Close the database connection after fetching data
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }
        .profile img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }
        .profile h1 {
            font-size: 2.5em;
        }
        .profile p {
            font-size: 1.2em;
            color: #555;
        }
        .skills, .projects {
            margin-top: 40px;
        }
        .skills ul, .projects ul {
            list-style: none;
            padding: 0;
        }
        .skills li, .projects li {
            margin: 10px 0;
            font-size: 1.1em;
        }
        .projects .project-card {
            background-color: white;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .projects .project-card img {
            max-width: 100%;
            border-radius: 8px;
        }
        footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to My Portfolio</h1>
</header>

<div class="container">
    <section class="profile">
        <img src="images/profile.jpg" alt="Your Profile Picture">
        <div>
            <h1>John Doe</h1>
            <p>Web Developer | Designer | Problem Solver</p>
        </div>
    </section>

    <section class="skills">
        <h2>Skills</h2>
        <ul>
            <li>HTML & CSS</li>
            <li>JavaScript & jQuery</li>
            <li>PHP & MySQL</li>
            <li>React.js</li>
            <li>UI/UX Design</li>
        </ul>
    </section>

    <section class="projects">
        <h2>My Projects</h2>
        <ul>
            <?php if ($projects_result->num_rows > 0): ?>
                <?php while ($project = $projects_result->fetch_assoc()): ?>
                    <li class="project-card">
                        <h3><?= htmlspecialchars($project['title']) ?></h3>
                        <img src="images/<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>">
                        <p><?= htmlspecialchars($project['description']) ?></p>
                        <a href="<?= htmlspecialchars($project['url']) ?>" target="_blank">View Project</a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>No projects available at the moment.</li>
            <?php endif; ?>
        </ul>
    </section>
</div>

<footer>
    <p>&copy; 2024 John Doe | Web Developer</p>
</footer>

</body>
</html>
