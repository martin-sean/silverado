<!--  
RMIT Web Programming WP1750 Assignment 3
 - Sean Martin - s3645417
-->

<?php
  /* Creates a file pointer for appending to orders.csv */
  $fp = fopen("orders.csv", "a");
  
  if (isset($_SESSION['order'])) {
    fputcsv($fp, array("--- NEW ORDER ---"));
    fputcsv($fp, array("NAME", $_SESSION['order'][0]['name']));
    fputcsv($fp, array("EMAIL", $_SESSION['order'][0]['email']));
    fputcsv($fp, array("PHONE", $_SESSION['order'][0]['phone']));
    fputcsv($fp, array(""));
    
    foreach ($_SESSION['cart'] as $cart_element) {
      fputcsv($fp, array("MOVIE", print_movie($cart_element)));
      fputcsv($fp, array("SESSION", print_session($cart_element)));
      fputcsv($fp, array(""));
      fputcsv($fp, array("TICKETS", "QTY"));
      
      foreach ($cart_element['seats'] as $ticket_type => $ticket_type_number) {
        if ($ticket_type_number > 0)
          fputcsv($fp, array(print_ticket_type($ticket_type), $ticket_type_number));
      }
      fputcsv($fp, array(""));
    }
    fputcsv($fp, array("TOTAL ($)", $grand_total));
    fputcsv($fp, array(""));
  }
  fclose($fp);
  
  /* Removes cart and order data (is now saved to file) */
  unset($_SESSION['cart']);
  unset($_SESSION['order']);
?>