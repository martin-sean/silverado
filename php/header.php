<!--  
RMIT Web Programming WP1750 Assignment 3
 - Sean Martin - s3645417
-->

<?php
  echo "<header>";
	echo "<img class=\"logo\" src=\"images/logo.png\" alt=\"Silverado clapperboard logo\">";
  echo "<h1>SILVERADO</h1>";
  
  echo "<div class=\"cart-items\">";
  if ($active_page == "confirmation")
    echo "<p class=\"item-num\">( 0 )</p>";
  else if (isset($_SESSION['cart']))
    echo "<p class=\"item-num\">( ", count($_SESSION['cart']), " )</p>";
  else
    echo "<p class=\"item-num\">( 0 )</p>";
  
  echo "<a href=\"cart.php\">";
  echo "<img id=\"cart\" href=\"cart.php\" src=\"images/cart.svg\" alt=\"Shopping cart logo\">";
  echo "</a>";
  echo "</div>";
  echo "</header>";
    
  echo "<div class=\"spacer\"></div>";
	
  echo "<nav>";
  echo "<a "; 
    if ($active_page == "index")
      echo "class=\"active\" ";
  echo "href=\"index.php\">HOME</a>";
  echo "<a ";
    if ($active_page == "showing")
      echo "class=\"active\" ";
  echo "href=\"showing.php\">SHOWING</a>";
  echo "<a href=\"showing.php#session-list\">SESSIONS</a>";
  echo "<a href=\"showing.php#price-list\">PRICES</a>";
  echo "<a href=\"showing.php#make-booking\">BOOKINGS</a>";
  echo "</nav>";
?>