<?php

$conn = new mysqli("127.0.0.1", "root", "", "corememories");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$default_islands_query = "SELECT * FROM islandsofpersonality WHERE status='active'";
$islands_result = $conn->query($default_islands_query);

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
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
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
        .island-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

            #about h2 {
            font-size: 48px;
            margin-bottom: 20px;
            margin-top: 50px;
            justify-content: center;
            align-items: center;
            text-align: center;

            }

        #about p {
            font-size: 20px;
            margin: 10px 0;
            text-align: center;
            color: rgb(49, 44, 44);
            line-height: 1.6;
            padding-bottom: 50px;
            padding-left: 20px;
            padding-right: 20px;
            }

        #about .profile-pic-container {
            text-align: center;
            margin-bottom: 20px;
            }

            .profile-pic {
            width: 300px;
            height: 300px;
            border-radius: 60%;
            object-fit: cover;
            border: 3px solid #007bff;
            }

        #home {
            text-align: center;
            padding: 100px 0;
        }

        #home h1 {
            font-size: 72px;
            color: black;
            margin-bottom: 20px;
        }

        #home p {
            font-size: 24px;
            color: black;
        }


        #contact {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }

        #contact h2 {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
            color: black;
            
        }

        #contact p {
            font-size: 18px;
            margin: 20px 0;
            text-align: center;
            color: black;
        }

        #contact form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        #contact label {
            font-size: 16px;
            margin: 10px 0;
            color: black;
        }

        #contact input,
        #contact textarea {
            width: 80%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #contact button {
            width: 80%;
            padding: 12px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        #contact button:hover {
            background-color: #45a049;
        }


    </style>
</head>
<body>


<div class="w3-top">
    <div class="w3-bar w3-black w3-xlarge">
        <a href="#home" class="w3-bar-item w3-button">Home</a>
        <a href="#aboutme" class="w3-bar-item w3-button">About Me</a>
        <a href="#islands" class="w3-bar-item w3-button">Islands</a>
    </div>
</div>

<section id="about">
    <div class="container">
      <h2>About Me</h2>
      <div class="about-content">
        <div class="profile-pic-container">
          <img src="images/profile.jpg" alt="Profile" class="profile-pic">
        </div>
        <p>Hello, I'm Noreh Lei S. Gomez! I’m passionate about web development and design. This site showcases my journey through various projects. Navigate the sections to explore my work and feel free to contact me!</p>
      </div>
    </div>
  </section>

<div class="w3-container w3-padding-64 w3-center" id="home">
    <h1></h1>
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
                    <img src="images/<?= $island['image'] ?>" alt="<?= $island['name'] ?>">
                    
                  
                    <a href="familyisland.php?id=<?= $island['islandOfPersonalityID'] ?>" class="w3-button w3-black">Show Island Contents</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No islands available.</p>
    <?php endif; ?>
</div>

<div class="w3-container w3-padding-64" id="contact">
    <h2 class="w3-center">Contact Me</h2>
    <p class="w3-center">Feel free to reach out for inquiries or collaboration opportunities!</p>
    <div class="w3-center">
        <form action="contact_form.php" method="POST">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Your Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Your Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
            <button type="submit" class="w3-button w3-black">Send Message</button>
        </form>
    </div>
</div>



<footer class="w3-center w3-black w3-padding-32">
    <p>Powered by Inside Out | Core Memories</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>
