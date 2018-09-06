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
    <title>Now Showing</title>
     
    <script>
      /* Clears sessions box on movie change */
      function changeMovie() {
        document.getElementById("sickSessions").selectedIndex = "";
        document.getElementById("toiletSessions").selectedIndex = "";
        document.getElementById("diarySessions").selectedIndex = "";
        document.getElementById("wonderSessions").selectedIndex = "";
        document.getElementById("seatsSF").selectedIndex = 0;
        document.getElementById("seatsSP").selectedIndex = 0;
        document.getElementById("seatsSC").selectedIndex = 0;
        document.getElementById("seatsFA").selectedIndex = 0;
        document.getElementById("seatsFC").selectedIndex = 0;
        document.getElementById("seatsBA").selectedIndex = 0;
        document.getElementById("seatsBF").selectedIndex = 0;
        document.getElementById("seatsBC").selectedIndex = 0;
        updateForm();
      }
      
      /* Calculates the total while selecting seats and hides elements*/
      function updateForm() {
       
        /* Hides elements */
        var x = document.forms["form"]["movie"].value;
        
        switch(x) {
          case "AF":
            document.getElementById("toilet-block").style.display = "block";
            document.getElementById("diary-block").style.display = "none";
            document.getElementById("sick-block").style.display = "none";
            document.getElementById("wonder-block").style.display = "none";
            break;
          case "CH":
            document.getElementById("diary-block").style.display = "block";
            document.getElementById("toilet-block").style.display = "none";
            document.getElementById("sick-block").style.display = "none";
            document.getElementById("wonder-block").style.display = "none";
            break;
          case "RC":
            document.getElementById("sick-block").style.display = "block";
            document.getElementById("toilet-block").style.display = "none";
            document.getElementById("diary-block").style.display = "none";
            document.getElementById("wonder-block").style.display = "none";
            break;
          case "AC":
            document.getElementById("wonder-block").style.display = "block";
            document.getElementById("toilet-block").style.display = "none";
            document.getElementById("diary-block").style.display = "none";
            document.getElementById("sick-block").style.display = "none";
        }
        
        if (x != "" && (document.getElementById("wonderSessions").options[document.getElementById("wonderSessions").selectedIndex].value != "" ||
        document.getElementById("toiletSessions").options[document.getElementById("toiletSessions").selectedIndex].value != "" ||
        document.getElementById("diarySessions").options[document.getElementById("diarySessions").selectedIndex].value != "" ||
        document.getElementById("sickSessions").options[document.getElementById("sickSessions").selectedIndex].value != "")) {
          document.getElementById("seating").style.display = "block";
          document.getElementById("total").style.display = "block";
        } else {
          document.getElementById("seating").style.display = "none";
          document.getElementById("total").style.display = "none";
        }
        
        calculateTotal(document.getElementById("wonderSessions").options[document.getElementById("wonderSessions").selectedIndex].value);
        calculateTotal(document.getElementById("toiletSessions").options[document.getElementById("toiletSessions").selectedIndex].value);
        calculateTotal(document.getElementById("diarySessions").options[document.getElementById("diarySessions").selectedIndex].value);
        calculateTotal(document.getElementById("sickSessions").options[document.getElementById("sickSessions").selectedIndex].value);
      }
      
      function calculateTotal(x) {
        /* Calculates total */
        if (x) {
          switch (x) {
            case "MON-01":
            case "MON-06":
            case "MON-09":
            case "TUE-01":
            case "TUE-06":
            case "TUE-09":
            case "WED-01":
            case "THU-01":
            case "FRI-01":
              total = (document.getElementById("seatsSF").value * 12.50) +
                      (document.getElementById("seatsSP").value * 10.50) +
                      (document.getElementById("seatsSC").value * 8.50) +
                      (document.getElementById("seatsFA").value * 25) +
                      (document.getElementById("seatsFC").value * 20) +
                      (document.getElementById("seatsBA").value * 22) +
                      (document.getElementById("seatsBF").value * 20) +
                      (document.getElementById("seatsBC").value * 20);
              break;
            case "WED-06":
            case "WED-09":
            case "THU-06":
            case "THU-09":
            case "FRI-06":
            case "FRI-09":
            case "SAT-12":
            case "SAT-03":
            case "SAT-06":
            case "SAT-09":
            case "SUN-12":
            case "SUN-03":
            case "SUN-06":
            case "SUN-09":
              total = (document.getElementById("seatsSF").value * 18.50) +
                      (document.getElementById("seatsSP").value * 15.50) +
                      (document.getElementById("seatsSC").value * 12.50) +
                      (document.getElementById("seatsFA").value * 30) +
                      (document.getElementById("seatsFC").value * 25) +
                      (document.getElementById("seatsBA").value * 33) +
                      (document.getElementById("seatsBF").value * 30) +
                      (document.getElementById("seatsBC").value * 30);
          }
          /* Shows Add to Cart Button */
          if (total != 0)
            document.getElementById("submit-button").style.display = "block";
          else
            document.getElementById("submit-button").style.display = "none";
          
          document.getElementById("total").innerHTML = "Total: $" + total.toFixed(2);
        }
      }
      
    </script>
  </head>

  <body>
    <?php
      $active_page = "showing";
      include("php/header.php");
    ?>

    <main class="lightBG">

      <div id="now-showing">
        <h1>MOVIES NOW SHOWING:</h1>
      </div>

      <!-- start of movie banners section -->
      <div id="banners">
      
        <div class="banner">
          <img class="movie-img" src="images/wimpy240.jpg" alt="Movie banner titled, Diary of a Whimpy Kid Long Haul">
          <div class="banner-desc">
            <img class="rating" src="images/ratingPG.png" alt="rated P G">
            <p class="caption">Diary of a Whimpy Kid (91 min)</p>
          </div>
        </div>

        <div class="banner">
          <img class="movie-img" src="images/wonder240.jpg" alt="Movie banner titled, Wonder Woman">
          <div class="banner-desc">
            <img class="rating" src="images/ratingM.png" alt="rated P G">
            <p class="caption">Wonder Woman (141 min)</p>
          </div>
        </div>

        <div class="banner">
          <img class="movie-img" src="images/sick240.jpg" alt="Movie banner titled, The Big Sick">
          <div class="banner-desc">
            <img class="rating" src="images/ratingM.png" alt="rated P G">
            <p class="caption">The Big Sick (120 min)</p>
          </div>
        </div>

        <div class="banner">
          <img class="movie-img" src="images/toilet240.jpg" alt="Movie banner titled, Toilet">
          <div class="banner-desc">
            <img class="rating" src="images/ratingPG.png" alt="rated P G">
            <p class="caption">Toilet (141 min)</p>
          </div>
        </div>
        
      </div>
      <!-- end of movie banners section -->

      <!-- sessions -->
      <div class="label" id="session-list">
        <div class="label-box">
          <p>SESSIONS</p>
        </div>
      </div>
      
      <!-- Normal-->
      <div class="table-container">
        <table class="table">
          <tr class="table-heading">
            <th id="bold-title">Diary of a Wimpy Kid</th>
            <th id="bold-title" class="table-border">Wonder Women</th>
            <th id="bold-title" class="table-border">The Big Sick</th>
            <th id="bold-title">Toilet</th>
          </tr>
          <tr>
            <td>Mon - Tue 1pm</td>
            <td class="table-border">Wed - Fri 9pm</td>
            <td class="table-border">Mon - Tue 9pm</td>
            <td>Mon - Tue 6pm</td>
          </tr>
          <tr>
            <td>Wed - Fri 6pm</td>
            <td class="table-border">Sat - Sun 9pm </td>
            <td class="table-border">Wed - Fri 1pm </td>
            <td>Sat - Sun 6pm</td>
          </tr>
          <tr>
            <td>Sat - Sun 12pm</td>
            <td class="table-border"></td>
            <td class="table-border">Sat - Sun 6pm</td>
            <td></td>
          <tr>
        </table>
      </div>
      
      <!-- end sessions -->

      <!-- cheap prices -->
      <div class="label" id="price-list">
        <div class="label-box">
          <p>DISCOUNT PRICES</p>
        </div>
      </div>
  
      <div class="price-category">
        <p>Mon - Tue and Fri - 1:00pm</p>
      </div>
      
      <!-- Discout Prices-->
      <div class="table-container">
        <table class="table">
          <tr class="table-heading">
            <td></td>
            <th id="bold-title" class="table-border">Standard Seat</th>
            <th id="bold-title" class="table-border">First Class</th>
            <th id="bold-title">Bean Bag p/p</th>
          </tr>
          <tr>
            <th id="bold-title">Adult</th>
            <td class="table-border">$12.50</td>
            <td class="table-border">$22</td>
            <td>$22</td>
          </tr>
          <tr>
            <th id="bold-title">Child</th>
            <td class="table-border">$8.50</td>
            <td class="table-border">$20</td>
            <td>$20</td>
          <tr>
          </tr>
            <th id="bold-title">Family</th>
            <td class="table-border">-</td>
            <td class="table-border">-</td>
            <td>$20</td>
          </tr>
          <tr>
            <th id="bold-title">Concession</th>
            <td class="table-border">$10.50</td>
            <td class="table-border">-</td>
            <td>-</td>
          </tr>
        </table>
      </div>
      <!-- end cheap prices -->

      <!-- full prices -->
      <div class="label">
        <div class="label-box">
          <p>NORMAL PRICES</p>
        </div>
      </div>
      
      <div class="price-category">
        <p>Wed - Fri after 1:00pm and Sat - Sun</p>
      </div>
      
      <!-- Normal prices -->
      <div class="table-container">
        <table class="table">
          <tr class="table-heading">
            <th></th>
            <th id="bold-title" class="table-border">Standard Seat</th>
            <th id="bold-title" class="table-border">First Class</th>
            <th id="bold-title">Bean Bag p/p</th>
          </tr>
          <tr>
            <th id="bold-title">Adult</th>
            <td class="table-border">$18.50</td>
            <td class="table-border">$30</td>
            <td>$33</td>
          </tr>
          <tr>
            <th id="bold-title">Child</th>
            <td class="table-border">$12.50</td>
            <td class="table-border">$25</td>
            <td>$30</td>
          <tr>
          </tr>
            <th id="bold-title">Family</th>
            <td class="table-border">-</td>
            <td class="table-border">-</td>
            <td>$30</td>
          </tr>
          <tr>
            <th id="bold-title">Concession</th>
            <td class="table-border">$15.50</td>
            <td class="table-border">-</td>
            <td>-</td>
          </tr>
        </table>
      </div>
      
      <!-- end full prices -->

      <!-- bookings label - start of bookings section -->
      <div class="label" id="make-booking">
        <div class="label-box">
          <p>BOOKINGS</p>
        </div>
      </div>

      <!-- Here's what our last "developer" left us, hope it helps! <i>- Silverado crew -->
      <!-- Starting form code sourced and adapted from https://titan.csit.rmit.edu.au/~e54061/wp/silverado-test.php -->
      <form name="form" method="post" action="php/form.php" class="lightBG">

        <fieldset>

          <h1>1. Choose a movie and session</h1><br>
          
          <p><label>Movie</label>
            <select name="movie" onchange="changeMovie()">
              <option selected disabled value="">Select an option</option>
              
              <optgroup label="Childrens">
                <option value="CH">Diary of a Whimpy Kid</option>
              </optgroup>
              
              <optgroup label="Art/Foreign">
                <option value="AF">Toilet</option>
              </optgroup>
              
              <optgroup label="Romantic Comedy">
                <option value="RC">Big Sick</option>
              </optgroup>
             
             <optgroup label="Action">
                <option value="AC">Wonder Woman</option>
              </optgroup>
              
            </select>
          </p>
         
          <p class="times" id="toilet-block"><label>Session</label>
            <select id="toiletSessions" name="session" onchange="updateForm()">
              <option selected disabled value="">Select an option</option>
              <option value="MON-06">Monday 6pm</option>
              <option value="TUE-06">Tuesday 6pm</option>
              <option value="SAT-03">Saturday 3pm</option>
              <option value="SUN-03">Sunday 3pm</option>
            </select>
          </p>
          
          <p class="times" id="diary-block"><label>Session</label>
            <select id="diarySessions" name="session" onchange="updateForm()">
              <option selected disabled value="">Select an option</option>
              <option value="MON-01">Monday 1pm</option>
              <option value="TUE-01">Tuesday 1pm</option>
              <option value="WED-06">Wednesday 6pm</option>
              <option value="THU-06">Thursday 6pm</option>
              <option value="FRI-06">Friday 6pm</option>
              <option value="SAT-12">Saturday 12pm</option>
              <option value="SUN-12">Sunday 12pm</option>
            </select>
          </p>
          
          <p class="times" id="sick-block"><label>Session</label>
            <select id="sickSessions" name="session" onchange="updateForm()">
              <option selected disabled value="">Select an option</option>
              <option value="MON-09">Monday 9pm</option>
              <option value="TUE-09">Tuesday 9pm</option>
              <option value="WED-01">Wednesday 1pm</option>
              <option value="THU-01">Thursday 1pm</option>
              <option value="FRI-01">Friday 1pm</option>
              <option value="SAT-06">Saturday 6pm</option>
              <option value="SUN-06">Sunday 6pm</option>
            </select>
          </p>
          
          <p class="times" id="wonder-block"><label>Session</label>
            <select id="wonderSessions" name="session" onchange="updateForm()">
              <option selected disabled value="">Select an option</option>
              <option value="WED-09">Wednesday 9pm</option>
              <option value="THU-09">Thursday 9pm</option>
              <option value="FRI-09">Friday 9pm</option>
              <option value="SAT-09">Saturday 9pm</option>
              <option value="SUN-09">Sunday 9pm</option>
            </select>
          </p>
          
          <br>
          
          <fieldset class="seating" id="seating">
            <h1>2. Choose your seating</h1><br>
            
            <fieldset class="booking-block">
              <h2>Standard</h2><br>
              
              <p><label>Adult</label>
                <select id="seatsSF" name="seats[SF]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
              <p><label>Concession</label>
                <select id="seatsSP" name="seats[SP]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
              <p><label>Child</label>
                <select id="seatsSC" name="seats[SC]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
            </fieldset>
            
            <fieldset class="booking-block">
              <h2>First Class</h2><br>
              <p><label>Adult</label>
                <select id="seatsFA" name="seats[FA]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
              <p><label>Child</label>
                <select id="seatsFC" name="seats[FC]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
              <br>
            </fieldset>
            
            <fieldset class="booking-block">
              <h2>Bean Bags</h2><br>
              <p><label>Adult</label>
                <select id="seatsBA" name="seats[BA]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
              <p><label>Family</label>
                <select id="seatsBF" name="seats[BF]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
              <p><label>Child</label>
                <select id="seatsBC" name="seats[BC]" 
                class="dropdown" onchange="updateForm()">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </p>
            </fieldset>
          </fieldset>
          <h3 id="total">Total: </h3>
          <p><button id="submit-button">Add to Cart</button></p>
        </fieldset>
      </form>
    </main>

    <?php
      include("php/footer.php");
    ?>

  </body>
  
  <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</html>
