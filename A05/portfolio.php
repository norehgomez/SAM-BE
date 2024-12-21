<?php
// Database connection
$conn = new mysqli("127.0.0.1", "root", "", "corememories");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Islands of Personality
$default_islands_query = "SELECT * FROM islandsofpersonality WHERE status='active'";
$islands_result = $conn->query($default_islands_query);

// Fetch Island Contents
$contents_query = "SELECT * FROM islandcontents";
$contents_result = $conn->query($contents_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Noreh Lei - Core Memories</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Lato", sans-serif;
        }

        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }

        .bgimg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .family {
            background-color: #FFD700;
        }

        .friendship {
            background-color: #87CEEB;
        }

        .adventure {
            background-color: #32CD32;
        }

        .hobby {
            background-color: #FF4500;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-black" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button">HOME</a>
        <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
        <a href="#islands" class="w3-bar-item w3-button">ISLANDS</a>
        <a href="#contact" class="w3-bar-item w3-button">CONTACT</a>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .w3-display-middle {
            padding: 20px;
        }
        .w3-jumbo {
            font-size: 30px;
        }
        .w3-display-container p {
            font-size: 14px;
        }
    }
</style>

<div class="w3-display-container w3-opacity-min bgimg family" id="home" style="margin-top: 200px">
    <div class="w3-display-middle w3-center">
        <h1 class="w3-jumbo">Inside Out</h1>
        <p>Welcome to the world of core memories!</p>
    </div>
</div>


<!-- About Section -->
<div class="w3-content w3-container w3-padding-64" id="about">
    <h2 class="w3-center">ABOUT</h2>
    <p class="w3-center">Inside Out explores the world of core memories and personality islands that define who we are.</p>
</div>

<!-- Islands of Personality with DB connected-->
<div class="w3-content w3-container w3-padding-64" id="islands">
    <h2 class="w3-center">ISLANDS OF PERSONALITY</h2>
    <div class="w3-row">
        <?php if ($islands_result->num_rows > 0): ?>
            <?php while ($island = $islands_result->fetch_assoc()): ?>
                <div class="w3-col m6 w3-padding">
                    <div class="w3-card w3-padding-large" style="background-color: <?= $island['color'] ?>;">
                        <h3><?= $island['name'] ?></h3>
                        <p><?= $island['shortDescription'] ?></p>
                        <img src="images/<?= $island['image'] ?>" alt="<?= $island['name'] ?>" class="w3-image">
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Island Contents DB connected -->
<div class="w3-content w3-container w3-padding-64">
    <h2 class="w3-center">CORE MEMORIES</h2>
    <div class="w3-row">
        <?php if ($contents_result->num_rows > 0): ?>
            <?php while ($content = $contents_result->fetch_assoc()): ?>
                <div class="w3-col m4 w3-padding">
                    <div class="w3-card" style="background-color: <?= $content['color'] ?>;">
                        <img src="images/<?= $content['image'] ?>" alt="<?= $content['content'] ?>" class="w3-image">
                        <p><?= $content['content'] ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
    <p>Powered by Inside Out | Core Memories</p>
</footer>

</body>
</html>
<?php
$conn->close();
?>
