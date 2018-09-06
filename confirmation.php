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
    <title>Booking Confirmed</title>
  </head>

  <body>
  
    <?php
      $active_page = "confirmation";
      include("php/header.php");
    ?>

    <main class= "lightBG">
      <?php
        include_once "php/functions.php";
        
        if (empty($_SESSION['order']) || !isset($_SESSION['order'])) {
            echo "<p id=\"no-items\">Please purchase a ticket first.</p>";
        } else {
          /* Defining cheap prices */
          $cost_SF_cheap = 12.50;
          $cost_SP_cheap = 10.50;
          $cost_SC_cheap = 8.50;
          $cost_FA_cheap = 25;
          $cost_FC_cheap = 20;
          $cost_BA_cheap = 22;
          $cost_BF_cheap = 20;
          $cost_BC_cheap = 20;
          
          /* Defining Expensive prices */
          $cost_SF_expensive = 18.50;
          $cost_SP_expensive = 15.50;
          $cost_SC_expensive = 12.50;
          $cost_FA_expensive = 30;
          $cost_FC_expensive = 25;
          $cost_BA_expensive = 33;
          $cost_BF_expensive = 30;
          $cost_BC_expensive = 30;
          
          /* Final total for outputting to file */
          $grand_total = 0;
          /* Total displayed per movie*/
          $calculated_total = 0;
          $calculated_cost = 0;
          
          echo "<h2 id=\"confirm-heading\">Thank you for your order. Please print your receipt and tickets.</h2>";

          foreach ($_SESSION['cart'] as $cart_element)
          {
            $calculated_total = 0;
            $calculated_cost = 0;
          
            echo "<div id=\"confirm-table-holder\">";
            echo "<table class=\"confirm-table\">";
            
            echo "<tr><th class=\"left-align\">Receipt</th></tr>";
            
            echo "<tr class=\"blank-row\"></tr>";
            
            echo "<tr><td class=\"left-align\">", $_SESSION['order']['0']['name'], "</td>";
            echo "<td class=\"right-align\">Silverado</td></tr>";
            
            echo "<tr><td class=\"left-align\">", $_SESSION['order']['0']['email'], "</td>"; 
            echo "<td class=\"right-align\">";
            
            echo print_movie($cart_element);
            
            echo "</td></tr>";
            echo "<tr><td class=\"left-align\">", $_SESSION['order']['0']['phone'], "</td>";
            echo "<td class=\"right-align\">", print_session($cart_element), "</td></tr>";
            
            echo "<tr class=\"blank-row\"></tr>";
            
            echo "<tr>";        
            if ($cart_element["seats"]["SF"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_SF_cheap;
              else
                $calculating_cost = $cost_SF_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["SF"], " x ", "Standard (Full)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["SF"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["SF"] * $calculating_cost;
            }
            if ($cart_element["seats"]["SP"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_SP_cheap;
              else
                $calculating_cost = $cost_SP_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["SP"], " x ", "Standard (Concession)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["SP"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["SP"] * $calculating_cost;
            }
            if ($cart_element["seats"]["SC"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_SC_cheap;
              else
                $calculating_cost = $cost_SC_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["SC"], " x ", "Standard (Child)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["SC"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["SC"] * $calculating_cost;
            }
            if ($cart_element["seats"]["FA"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_FA_cheap;
              else
                $calculating_cost = $cost_FA_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["FA"], " x ", "First Class (Adult)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["FA"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["FA"] * $calculating_cost;
            }
            if ($cart_element["seats"]["FC"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_FC_cheap;
              else
                $calculating_cost = $cost_FC_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["FC"], " x ", "First Class (Child)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["FC"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["FC"] * $calculating_cost;
            }
            if ($cart_element["seats"]["BA"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_BA_cheap;
              else
                $calculating_cost = $cost_BA_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["BA"], " x ", "Bean Bag (Adult)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["BA"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["BA"] * $calculating_cost;
            }
            if ($cart_element["seats"]["BF"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_BF_cheap;
              else
                $calculating_cost = $cost_BF_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["BF"], " x ", "Bean Bag (Family)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["BF"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["BF"] * $calculating_cost;
            }
            if ($cart_element["seats"]["BC"] != 0) {
              if (cheap_session($cart_element))
                $calculating_cost = $cost_BC_cheap;
              else
                $calculating_cost = $cost_BC_expensive;
              echo "<td class=\"left-align\">", $cart_element["seats"]["BC"], " x ", "Bean Bag (Child)</td>";
              echo "<td class=\"right-align\">$", number_format($cart_element["seats"]["BC"] * $calculating_cost, 2), "</td></tr>";
              $calculated_total += $cart_element["seats"]["BC"] * $calculating_cost;
            }
            
            echo "</tr><tr class=\"blank-row\"></tr>";
            echo "<tr><th class=\"left-align\">Total:</th><td class=\"right-align\">$", number_format($calculated_total, 2), "<td></tr>";
            echo "</table></div>";
            
            /* Prints the individual tickets */
            echo "<div id=\"ticket-table-holder\"><table id=\"ticket-table\">";
            foreach ($cart_element["seats"] as $ticket_type => $ticket_type_number) {
              for ($i = 0; $i < $ticket_type_number; $i++) {
                echo "<tr><th class=\"left-align\">S I L V E R A D O</th></tr>";
                echo "<tr><td class=\"left-align\">", print_session($cart_element), "</td></tr>";
                echo "<tr><td>", print_movie($cart_element), "</td></tr>";
                echo "<tr class=\"blank-row\"></tr>";
                echo "<tr><td id=\"bottom-border\" class=\"left-align\">", print_ticket_type($ticket_type), "</td></tr>";
              }
            }
            echo "</table></div>";
            echo "<div class=\"spacer\"></div>";
            echo "<div class=\"spacer\"></div>";

            $grand_total += $calculated_total;
          }
        }

        include_once "php/order.php";
      ?>
    </main>

    <?php
      include("php/footer.php");
    ?>

  </body>
  
  <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</html>

