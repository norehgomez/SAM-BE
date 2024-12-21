<?php

$conn = new mysqli("127.0.0.1", "root", "", "corememories");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$island_id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$island_query = "SELECT * FROM islandsofpersonality WHERE islandOfPersonalityID = $island_id";
$island_result = $conn->query($island_query);
$island = $island_result->fetch_assoc();

$contents_query = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = $island_id";
$contents_result = $conn->query($contents_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $island['name'] ?> - Contents</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
   body {
    font-family: Arial, sans-serif;
} 

.island-content {
    margin: 30px 10px;
    padding: 30px;
    border-radius: 8px;
    color: black;
    text-align: center;
    background-color: black;
    width: 90%;
    max-width: 1400px;
    margin-left: auto;
    margin-right: auto;
}

.island-content img {
    height: 350px;
    width: 100%;
    object-fit: cover;
    display: block;
    margin: 20px auto;
}

.w3-row-padding {
    margin-left: 5%;
    margin-right: 5%;
}



    </style>
</head>
<body>
    <div class="w3-container w3-padding-64">
        <h1 class="w3-center"><?= $island['name'] ?></h1>
        <p class="w3-center"><?= $island['shortDescription'] ?></p>
        
        <?php if ($contents_result->num_rows > 0): ?>
            <div class="w3-row-padding">
                <?php while ($content = $contents_result->fetch_assoc()): ?>
                    <div class="w3-col s4 island-content" style="background-color: <?= $content['color'] ?>;">
                        <img src="images/<?= $content['image'] ?>" alt="<?= $content['content'] ?>">
                        <p><?= $content['content'] ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No contents available for this island.</p>
        <?php endif; ?>
    </div>
    <div class="w3-center">
    <a href="portfolio.php" class="w3-button w3-black">Back to Islands</a>
</div>
</body>
</html>


<?php
$conn->close();
?>
