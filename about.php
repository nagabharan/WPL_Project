<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Songify the one stop shop for Vinyl CDs and Albums">
    <meta name="author" content="Deeptha, Nagabharan, Sudhir">
    <link rel="icon" href="./images/favicon.png">

    <title>About</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">

  </head>
<!-- NAVBAR
================================================== -->
  <body id="aboutBody">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php"><span style="color:#CCFF00">Songify<span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="./index.php">Home</a></li>
            <li class="active"><a href="./about.php">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <?php
              if(isset($_SESSION['username'])){
                echo '<li><a href="./products.php">Products</a></li>';                
              }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['username'])){
              echo '<li><a href="./cart.php">Cart</a></li>'; 
              echo '<li><a href="./history.php">My Orders</a></li>';  
              echo '<li><a href="./account.php">My Account</a></li>';
              echo '<li><a href="./logout.php">Log Out</a></li>';
            }
            else{
              echo '<li><a href="./signup.php">Log In</a></li>';
              echo '<li><a href="./register.php">Register</a></li>';
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row" style="margin-top:70px;">
        <div class="col-md-12">
          <h1 style="color:#CCFF00;font-size:50px;" align="center">ABOUT US</h1><br><br>

          <div class="row">
            <div class="col-md-7 about">
                <p>With Songify, it’s easy to find the right music for every moment – on your phone, your computer, your tablet and more.</p><br>
 
                <p>There are millions of tracks on Songify. So whether you’re working out, partying or relaxing, the right music is always at your fingertips. Choose what you want to listen to.</p><br>
                 
                <p>Browse through the music collections.</p><br>
                 
                <p>Soundtrack your life with Songify.</p>
            </div>
          </div>
          <br>
        <hr>
      <div class="row col-md-12" align="center">
        <h1 style="color:#CCFF00;">THE TEAM</h1><br>
        <div class="col-md-4">
          <img class="img-circle" src="images/deeptha.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 style="color:#CCFF00;">Deeptha Parsi Diwakar</h2>
          <p></p>          
        </div>
        <div class="col-md-4">
          <img class="img-circle" src="images/naga.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 style="color:#CCFF00;">Nagabharan Nagendran</h2>
          <p></p>          
        </div>
        <div class="col-md-4">
          <img class="img-circle" src="images/sudhir.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 style="color:#CCFF00;">Sudhir Ramalingham</h2>
          <p></p>
        </div>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
