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
    <title>Checkout</title>
    
    <script>
        /* Checks that name, email and phone number are valid */
        function validateForm()
        {      
          if (checkName() && checkEmail && checkNumber())
            return true;
          else
            return false;
        }
        
        /* Validates the name and styles the input box */
        function checkName()
        {
          if(document.getElementById("name").value == "" || !alphabetical(document.getElementById("name").value))
          {
            document.getElementById("name").style.border = "1px solid red";
            document.getElementById("not-valid-name").style.display = "inline-block";
            return false;
          }
          else
          {
            document.getElementById("name").style.border = "1px solid rgb(60,  60, 102)";
            document.getElementById("not-valid-name").style.display = "none";
            return true;
          }
        }
        
        /* Validates the email and styles the input box */
        function checkEmail()
        {
          if(document.getElementById("email").value == "" || !validEmail(document.getElementById("email").value))
          {
            document.getElementById("email").style.border = "1px solid red";
            document.getElementById("not-valid-email").style.display = "inline-block";
            return false;
          }
          else
          {
            document.getElementById("email").style.border = "1px solid rgb(60,  60, 102)";
            document.getElementById("not-valid-email").style.display = "none";
            return true;
          }
        }
        
        /* Validates the number and styles the input box */
        function checkNumber()
        {
          if(document.getElementById("phone").value == "" || !validPhone(document.getElementById("phone").value))
          {
            document.getElementById("phone").style.border = "1px solid red";
            document.getElementById("not-valid-phone").style.display = "inline-block";
            return false;
          }
          else
          {
            document.getElementById("phone").style.border = "1px solid rgb(60,  60, 102)";
            document.getElementById("not-valid-phone").style.display = "none";
            return true;
          }
        }
        
        /* Validates name is alphabetical */
        /* Source: https://stackoverflow.com/questions/9289451/regular-expression-for-alphabets-with-spaces */
        function alphabetical(string)
        {
          var pattern = /^[a-zA-Z ]*$/;
          return pattern.test(string);
        }
        
        /* Validates email is formatted correctly */
        /* Source: http://emailregex.com/ */
        function validEmail(string)
        {
          var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(string);
        }
        
        /* Validates number is formatted correctly */
        /* Source: https://manual.limesurvey.org/Using_regular_expressions */
        function validPhone(string)
        {
          var pattern = /^\(?(?:\+?61|0)(?:(?:2\)?[ -]?(?:3[ -]?[38]|[46-9][ -]?[0-9]|5[ -]?[0-35-9])|3\)?(?:4[ -]?[0-57-9]|[57-9][ -]?[0-9]|6[ -]?[1-67])|7\)?[ -]?(?:[2-4][ -]?[0-9]|5[ -]?[2-7]|7[ -]?6)|8\)?[ -]?(?:5[ -]?[1-4]|6[ -]?[0-8]|[7-9][ -]?[0-9]))(?:[ -]?[0-9]){6}|4\)?[ -]?(?:(?:[01][ -]?[0-9]|2[ -]?[0-57-9]|3[ -]?[1-9]|4[ -]?[7-9]|5[ -]?[018])[ -]?[0-9]|3[ -]?0[ -]?[0-5])(?:[ -]?[0-9]){5})$/;
          return pattern.test(string);
        } 
      </script>
  </head>

  <body>
  
    <?php
      $active_page = "checkout";
      include("php/header.php");
    ?>

    <main class= "lightBG">
      <div id="checkout-title">Checkout</div>
      <form id="checkout-form" name="checkout-form" method='post' 
      action='php/form.php' onsubmit="return validateForm()">
        <div class="input-line">
          <label>Name:</label>
          <input type="text" id="name" name="name" onchange="checkName()"></input>
          <div class="not-valid" id="not-valid-name">Not Valid</div>
        </div>
        <div class="input-line">
          <label>Email:</label>
          <input type="text" id="email" name="email" onchange="checkEmail()"></input>
          <div class="not-valid" id="not-valid-email">Not Valid</div>
        </div>
        <div class="input-line">
          <label>Mobile:</label>
          <input type="text" id="phone" name="phone" onchange="checkNumber()"></input>
          <div class="not-valid" id="not-valid-phone">Not Valid</div>
        </div>
    
        <button id="order-confirm-button">Submit</button>
        
      </form>
      
    </main>

    <?php
      include("php/footer.php");
    ?>

  </body>
  
  <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</html>

