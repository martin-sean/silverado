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
    <link href="https://fonts.googleapis.com/css?family=Open Sans" rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Shopping Cart</title>
    
    <script>
        /* Removes specific session from cart when called */
        function delete_session(index) {
          document.getElementById("index").value = index;
          document.getElementById("delete-form").submit();
        }
      </script>
      
      <form id="delete-form" name="delete" method='post' action='php/form.php'>
        <input id="index" type="hidden" name="index" value="" /> 
      </form> 
      
  </head>
  
  <body>  
    
    <?php
      $active_page = "cart";
      include("php/header.php");
    ?>
    
    <main class='lightBG'>
      <div id="cart-area">
        <?php
          include_once "php/functions.php";
        
          if (empty($_SESSION['cart'])) {
            echo "<p id=\"no-items\">No movies have been added to the cart yet.</p>";
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
            
            $calculating_cost = 0;
            $calculated_total = 0;
            
            /* Loops until the last element in the cart */
            foreach ($_SESSION['cart'] as $index => $cart_element) {
              echo "<p class=\"items-cart\">";
              switch ($cart_element["movie"]) {
                case "AF":
                  echo "Toilet";
                  break;
                case "CH":
                  echo "Diary of a Wimpy Kid";
                  break;
                case "RC":
                  echo "The Big Sick";
                  break;
                case "AC":
                  echo "Wonder Women";
                  break;
              }
              echo "</p><p class=\"sessions-cart\">";
              
              /* Prints the session*/
              echo print_session($cart_element), "</p>";
              
              /* Creates delete button */
              echo "<button id=\"remove-button\" onclick=\"delete_session",
              "($index)\">Remove</button>";
              
              echo "<div id=\"cart-table-holder\">";
              echo "<table class=\"cart-table\">";
              echo "<tr>";
              echo "<th id=\"ticket-type\">Ticket Type</th>";
              echo "<th class=\"table-border\" id=\"cost\">Cost</th>";
              echo "<th class=\"table-border\" id=\"qty\">Qty</th>";
              echo "<th id=\"subtotal\">Subtotal</th>";
              echo "</tr>";
              
              echo "<tr>";        
              if ($cart_element["seats"]["SF"] != 0) {
                echo "<td id=\"special-left\">Standard (Full)</td>";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_SF_cheap;
                else
                  $calculating_cost = $cost_SF_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["SF"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["SF"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["SF"] * $calculating_cost;
              }
              if ($cart_element["seats"]["SP"] != 0) {
                echo "<td id=\"special-left\">Standard (Concession)</td>";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_SP_cheap;
                else
                  $calculating_cost = $cost_SP_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["SP"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["SP"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["SP"] * $calculating_cost;
              }
              if ($cart_element["seats"]["SC"] != 0) {
                echo "<td id=\"special-left\">Standard (Child)</td>";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_SC_cheap;
                else
                  $calculating_cost = $cost_SC_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["SC"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["SC"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["SC"] * $calculating_cost;
              }
              if ($cart_element["seats"]["FA"] != 0) {
                echo "<td id=\"special-left\">First Class (Adult)";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_FA_cheap;
                else
                  $calculating_cost = $cost_FA_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["FA"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["FA"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["FA"] * $calculating_cost;
              }
              if ($cart_element["seats"]["FC"] != 0) {
                echo "<td id=\"special-left\">First Class (Child)";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_FC_cheap;
                else
                  $calculating_cost = $cost_FC_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["FC"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["FC"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["FC"] * $calculating_cost;
              }
              if ($cart_element["seats"]["BA"] != 0) {
                echo "<td id=\"special-left\">Bean Bag (Adult)";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_BA_cheap;
                else
                  $calculating_cost = $cost_BA_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["BA"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["BA"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["BA"] * $calculating_cost;
              }
              if ($cart_element["seats"]["BF"] != 0) {
                echo "<td id=\"special-left\">Bean Bag (Family)";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_BF_cheap;
                else
                  $calculating_cost = $cost_BF_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["BF"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["BF"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["BF"] * $calculating_cost;
              }
              if ($cart_element["seats"]["BC"] != 0) {
                echo "<td id=\"special-left\">Bean Bag (Child)";
                if (cheap_session($cart_element))
                  $calculating_cost = $cost_BC_cheap;
                else
                  $calculating_cost = $cost_BC_expensive;
                echo "<td class=\"table-border\">$", number_format($calculating_cost, 2), "</td>";
                echo "<td class=\"table-border\">", $cart_element["seats"]["BC"], "</td>";
                echo "<td>$", number_format($cart_element["seats"]["BC"] * $calculating_cost, 2), "</td></tr>";
                $calculated_total += $cart_element["seats"]["BC"] * $calculating_cost;
              }
              echo "</tr></table></div>";
            }

            echo "<div class=\"total-table-holder\">";
            echo "<table id=\"total-table\"><tr><th class=\"white-right\">", "Grand Total:</th>";
            echo "<td class=\"white-left\">$", number_format($calculated_total, 2),"</td></table></div>";
            echo "<button id=\"checkout-button\">Checkout</button>";
          }
        ?>
        
        <script type="text/javascript">
          document.getElementById("checkout-button").onclick = function () {
            location.href = "checkout.php";
          };
        </script>
      </div>
    </main>
    
    <?php
      include("php/footer.php");
    ?>
    
  </body>
  
  <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</html>