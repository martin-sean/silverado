<!--  
RMIT Web Programming WP1750 Assignment 3
 - Sean Martin - s3645417
-->

<?php
  session_start();
?>

<?php
  /*Controls redirect location */
  $redirect = 0;
  
  /* Creates a cart array in Session */
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  
  if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = array();
  }

  /* Checks if delete command was sent */
  if (!isset($_POST['index'])) {
    $session_exists = false;
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
      /* If movie/session already exists append to it */
      if (($_POST['movie'] == $_SESSION['cart'][$i]['movie']) && ($_POST['session'] == $_SESSION['cart'][$i]['session'])) 
      {
        $_SESSION['cart'][$i]['seats']['SF'] += $_POST['seats']['SF'];
        $_SESSION['cart'][$i]['seats']['SP'] += $_POST['seats']['SP'];
        $_SESSION['cart'][$i]['seats']['SC'] += $_POST['seats']['SC'];
        $_SESSION['cart'][$i]['seats']['FA'] += $_POST['seats']['FA'];
        $_SESSION['cart'][$i]['seats']['FC'] += $_POST['seats']['FC'];
        $_SESSION['cart'][$i]['seats']['BA'] += $_POST['seats']['BA'];
        $_SESSION['cart'][$i]['seats']['BF'] += $_POST['seats']['BF'];
        $_SESSION['cart'][$i]['seats']['BC'] += $_POST['seats']['BC'];
        $session_exists = true;
      }
    }
    
    /* If movie/sesson does not exist, add the entire array to session. */
    if (!$session_exists && !isset($_POST['name']))
      array_push($_SESSION['cart'], $_POST);
    
    /* Process checkout data */
    if (isset($_POST['name'])) {
      /* Clears old data and pushes array */
      $_SESSION['order'] = array();
      array_push($_SESSION['order'], $_POST);
      $redirect = 1;
    }
    
  } else {
    unset($_SESSION['cart'][$_POST['index']]);
  }
  
  /* Redirect control */
  if ($redirect == 0)
    header('Location: ../cart.php');
  else
    header('Location: ../confirmation.php');
?>