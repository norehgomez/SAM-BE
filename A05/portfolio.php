<?php

$conn = new mysqli("127.0.0.1", "root", "", "corememories");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$default_islands_query = "SELECT * FROM islandsofpersonality WHERE status='active'";
$islands_result = $conn->query($default_islands_query);


$contents_query = "SELECT * FROM islandcontents";
$contents_result = $conn->query($contents_query);
$island_contents = [];
while ($content = $contents_result->fetch_assoc()) {
    $island_contents[$content['islandOfPersonalityID']][] = $content;
}a
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inside Out - Core Memories</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Karma", sans-serif;
        }
        .w3-bar-block .w3-bar-item {
            padding: 20px;
        }
        .island-card {
            margin-bottom: 20px;
            border: 2px solid #ccc;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
        .island-content {
            margin: 10px 5px;
            padding: 10px;
            border-radius: 5px;
            color: white;
            text-align: center;
        }
        .island-content img {
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>


<div class="w3-top">
    <div class="w3-bar w3-black w3-xlarge">
        <a href="#home" class="w3-bar-item w3-button">Home</a>
        <a href="#islands" class="w3-bar-item w3-button">Islands</a>
    </div>
</div>


<div class="w3-container w3-padding-64 w3-center" id="home">
    <h1>Inside Out</h1>
    <p>Explore the core memories and personality islands that define who we are.</p>
</div>

<div class="w3-container w3-padding-64" id="islands">
    <h2 class="w3-center">Islands of Personality</h2>
    <?php if ($islands_result->num_rows > 0): ?>
        <div class="w3-row-padding">
            <?php while ($island = $islands_result->fetch_assoc()): ?>
                <div class="w3-quarter island-card" style="background-color: <?= $island['color'] ?>;">
                    <h3><?= $island['name'] ?></h3>
                    <p><?= $island['shortDescription'] ?></p>
                    <img src="images/<?= $island['image'] ?>" alt="<?= $island['name'] ?>" class="w3-image" style="max-width: 100%; height: auto;">
                    <div class="w3-row-padding">
                        <?php if (!empty($island_contents[$island['islandOfPersonalityID']])): ?>
                            <?php foreach ($island_contents[$island['islandOfPersonalityID']] as $index => $content): ?>
                                <?php if ($index % 2 === 0): ?>
                                    <div class="w3-row-padding">
                                <?php endif; ?>
                                <div class="w3-col s6 island-content" style="background-color: <?= $content['color'] ?>;">
                                    <img src="images/<?= $content['image'] ?>" alt="<?= $content['content'] ?>">
                                    <p><?= $content['content'] ?></p>
                                </div>
                                <?php if ($index % 2 === 1 || $index === count($island_contents[$island['islandOfPersonalityID']]) - 1): ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No memories available for this island.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No islands available.</p>
    <?php endif; ?>
</div>

<footer class="w3-center w3-black w3-padding-32">
    <p>Powered by Inside Out | Core Memories</p>
</footer>

</body>
</html>
<?php
$conn->close();
?>
