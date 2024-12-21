<?php
// Include the connect.php to get the database connection and data
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inside Out - Core Memories</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <style>
        /* Your CSS styles here */
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
                            <?php foreach ($island_contents[$island['islandOfPersonalityID']] as $content): ?>
                                <div class="w3-col s6 island-content" style="background-color: <?= $content['color'] ?>;">
                                    <img src="images/<?= $content['image'] ?>" alt="<?= $content['content'] ?>">
                                    <p><?= $content['content'] ?></p>
                                </div>
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
// Close the database connection after the page loads
$conn->close();
?>
