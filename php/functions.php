<!--  
RMIT Web Programming WP1750 Assignment 3
 - Sean Martin - s3645417
-->

<?php
  function cheap_session($cart_element) {
    switch ($cart_element["session"]) {
      case "MON-01":
      case "MON-06":
      case "MON-09":
      case "TUE-01":
      case "TUE-06":
      case "TUE-09":
      case "WED-01":
      case "THU-01":
      case "FRI-01":
        return true;
    }
    return false;
  }
  
  function print_movie($cart_element) {
    switch ($cart_element["movie"]) {
        case "AF":
          return "Toilet";
        case "CH":
          return "Diary of a Wimpy Kid";
        case "RC":
          return "The Big Sick";
        case "AC":
          return "Wonder Women";
        default:
          return "Unknown Movie";
      }
  }
  
  function print_session($cart_element) {
    switch ($cart_element["session"]) {
      case "MON-01":
        return "Monday - 1:00pm";
      case "MON-06":
        return "Monday - 6:00pm";
      case "MON-09":
        return "Monday - 9:00pm";
      case "TUE-01":
        return "Tuesday - 1:00pm";
      case "TUE-06":
        return "Tuesday - 6:00pm";
      case "TUE-09":
        return "Tuesday - 9:00pm";
      case "WED-01":
        return "Wednesday - 1:00pm";
      case "WED-06":
        return "Wednesday - 6:00pm";
      case "WED-09":
        return "Wednesday - 9:00pm";
      case "THU-01":
        return "Thursday - 1:00pm";
      case "THU-06":
        return "Thursday - 6:00pm";
      case "THU-09":
        return "Thursday - 9:00pm";
      case "FRI-01":
        return "Friday - 1:00pm";
      case "FRI-06":
        return "Friday - 6:00pm";
      case "FRI-09":
        return "Friday - 9:00pm";
      case "SAT-12":
        return "Saturday - 12:00pm";
      case "SAT-03":
        return "Saturday - 3:00pm";
      case "SAT-06":
        return "Saturday - 6:00pm";
      case "SAT-09":
        return "Saturday - 9:00pm";
      case "SUN-12":
        return "Sunday - 12:00pm";
      case "SUN-03":
        return "Sunday - 3:00pm";
      case "SUN-06":
        return "Sunday - 6:00pm";
      case "SUN-09":
        return "Sunday - 9:00pm";
      default:
        return "Error: Session not found.";
    }  
  }
  
  function print_ticket_type($ticket_type) {
    switch ($ticket_type) {
      case "SF":
        return "Standard (Full)";
      case "SP":
        return "Standard (Concession)";
      case "SC":
        return "Standard (Child)";
      case "FA":
        return "First Class (Adult)";
      case "FC":
        return "First Class (Child)";
      case "BA":
        return "Bean Bag (Adult)";
      case "BF":
        return "Bean Bag (Family)";
      case "BC":
        return "Bean Bag (Child)";
      default:
        return "Error";
    }
  }
?>