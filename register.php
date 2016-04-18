<?php

  if(session_id() == '' || !isset($_SESSION)){session_start();}

  if (isset($_SESSION["username"])) {header ("location:index.php");}

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
    <link rel="icon" href="img/favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body id="registerBody">

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
            <li><a href="./about.php">About</a></li>
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
              echo '<li class="active"><a href="./logout.php">Log Out</a></li>';
            }
            else{
              echo '<li><a href="./signup.php">Log In</a></li>';
              echo '<li class="active"><a href="./register.php">Register</a></li>';
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <form class="form-signin" method="POST" action="insert.php">
        <h2 class="form-signin-heading" style="color:#CCFF00">Create New Account</h2><br>
        
        <!-- <label for="inputFName">First Name</label> -->
        <input type="text" id="inputFName" name="fname" class="form-control" placeholder="First Name" required autofocus> <br/>

        <!-- <label for="inputLName">Last Name</label> -->
        <input type="text" id="inputLName" name="lname" class="form-control" placeholder="Last Name" required> <br/>
        
        <!-- <label for="inputAddr">Address</label> -->
        <input type="text" id="inputAddr" name="addr" class="form-control" placeholder="Address" required> <br/>
        
        <!-- <label for="inputCity">City</label> -->
        <input type="text" id="inputCity" name="city" class="form-control" placeholder="City" required> <br/>

        <!-- <label for="inputState">State</label> -->
        <input type="text" id="inputState" name="state" class="form-control" placeholder="State" required> <br/>
        
        <!-- <label for="inputZip">Zip Code</label> -->
        <input type="text" id="inputZip" name="zip" class="form-control" placeholder="Zip" required> <br/>
        
        <!-- <label for="inputEmail">Email address</label> -->
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required> <br/>
        
        <!-- <label for="inputPassword">Password</label> -->
        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" required> <br/>
        <div id="pswd_info">
          <p id = "pCheck" class ="invalid">Password not strong enough!!</p><h4>Password must meet the following requirements:</h4>
          <ul>
            <li id="letter" class="invalid">At least <strong>one lowercase letter</strong></li>
            <li id="capital" class="invalid">At least <strong>one uppercase letter</strong></li>
            <li id="number" class="invalid">At least <strong>one number</strong></li>
            <li id="sChar" class="invalid">At least <strong>one special character</strong></li>
            <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
          </ul>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      </form>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
