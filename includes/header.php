<?php
session_start();
$counter_name = "counter.txt";

// Check if a text file exists.
// If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}

// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f);
}

// echo "You are visitor number $counterVal to this site";.
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	     <title>Rapid</title>
  	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/main.js"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    

</head>
<body>
    <div class="container-fluid" style="padding: 0" id="navbar-header1 ">
    <nav class="navbar navbar-expand-lg" id="navbar-1">
      <a class="navbar-brand" id="navlink-1" href=""></a>
        <ul class="navbar-nav ml-auto ul-list1">
          <li class="dropdown nav1-list"><a class="dropdown nav-link nav-dropdown1" data-toggle="dropdown" href="#">
            <span class="fas fa-ad icon-1"></span>MEGA PROMOTION<span class="fas fa-chevron-down icon-1"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Page 1-1</a></li>
                <li><a href="#">Page 1-2</a></li>
              </ul>
          </li>
          <li class="dropdown nav1-list">
            <a class="dropdown nav-link nav-dropdown1"  href="login.php">
            <span class="fas fa-user-secret icon-1"></span>Login/Register
            <!-- <span class="fas fa-chevron-down icon-1"></span>  -->
            </a>
     <!--          <ul class="dropdown-menu">
                <li><a href="#">Login</a></li>
                <li><a href="#">Page 1-2</a></li>
              </ul> -->
          </li>
          <li class="dropdown nav1-list"><a class="dropdown nav-link nav-dropdown1" data-toggle="dropdown" href="#">
            <span class="fas fa-shopping-cart icon-1"></span>RM 0.00</a>
              <ul class="dropdown-menu">
                <li><a href="#">Page 1-1</a></li>
                <li><a href="#">Page 1-2</a></li>
              </ul>
          </li>
        </ul>
    </nav>
  </div>
     <!--header navbar 2-->
  <div class="container" id= "navbar-header2">
    <nav class="navbar navbar-light navbar-expand-lg  navbar-2" >
      <a class="navbar-brand" href=""><img class="logo1" src="assets/images/logo1.png"></a>
      <button class="navbar-toggler" id="toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto" >
            <li class="nav-item item2">
              <a class="nav-link" id="nav-link2" id="lid" href="#">Home</a>
            <li class="nav-item item2">
              <a class="nav-link" id="nav-link2" href="#">About Us</a>
            </li>
            <li class="nav-item dropdown item2">
              <a class="nav-link" id="nav-link2" data-toggle="dropdown" href="#cta">Our Services
               <span class="fas fa-chevron-down icon-1 fa-xs"></a>
              <ul class="dropdown-menu">
                <li><a href=""></a>  lemanweb dev</li>
              </ul>
            </li>
            <li class="nav-item item2">
              <a class="nav-link" id="nav-link2" href="#">eStore</a>
            </li> 
            <li class="nav-item item2">
              <a class="nav-link" id="nav-link2" href="#">eNews</a>
            </li>
            <li class="nav-item item2">
              <a class="nav-link" id="nav-link2" href="">Contact Us</a>
            </li>
          </ul>
        </div>    
    </nav>
  </div>  