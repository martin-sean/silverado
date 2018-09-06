<?php
  session_start();
?>

<!DOCTYPE html>

<!--  
RMIT Web Programming WP1750 Assignment 3
 - Sean Martin - s3645417
-->

<html>

  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Silverado Cinema - Sean Martin A3</title>
  </head>

  <body>
    
    <?php
      $active_page = "index";
      include("php/header.php");
    ?>

    <main class= "lightBG">

      <div id="welcome">
        <h2>Welcome to the new Silverado!</h2><br>
        
        <ul>
          <li>New first-class recliners and beanbags for greater comfort</li>
          <li>3D Projection for greater depth</li>
          <li>Dolby Cinema audio and lighting for greater immersion</li>
        </ul><br>
        
        <p>And best of all, the same competitive pricing.</p>
      </div>

      <div id="beanBags">
        <h2>NEW SEATING</h2>
        <p>
          Our regular seating has been refurbished
          and we now have new first-class recliners
          and bean bags for greater comfort.
        </p>
      </div>

      <div id="proj3D">
        <img src="images/placeholder.png" alt="Family eating popcorn and watching 3D movie">
          <div id="proj3D-text">
            <h2>3D PROJECTION</h2>
            <p> 
              3D as finally made it's way to Silverado. Become engrossed in 
			        the incredibly immersive world of 3D films. You can enjoy the 
				      latest Blockbusters in both 3D and regular 2D.
            </p>
          </div>
      </div>

      <div id="dolbyLogo">
        <p>POWERED BY</p>
        <div>
          <img id="DolbyImg" src="images/Dolby320x320.jpg" alt="Dolby Industries Logo">
        </div>
      </div>

      <div id="sound-light">
        <h2>DOLBY CINEMA - AUDIO AND LIGHTING</h2>
        <p>
          Your Silverado experience is now enriched with the crystal clear DOLBY CINEMA audio. 
          True surround sound and acoustic audio normalization delivers the worlds best audio experience. 
          Dolby lighting provides a safe and immersive experience, easing you in and out of the film as 
          well as lighting the stareways while not affecting viewing.
        </p>
      </div>
    </main>

    <?php
      include("php/footer.php");
    ?>

  </body>
  
  <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</html>

