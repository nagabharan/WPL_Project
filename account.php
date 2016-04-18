<?php

  if(session_id() == '' || !isset($_SESSION)){session_start();}

  if(!isset($_SESSION["username"])) {
    echo '<h1>Invalid Login! Redirecting...</h1>';
    header("Refresh: 3; url=index.php");
  }

  if($_SESSION["type"]==="admin") {
    header("location:admin.php");
  }

  include 'config.php';

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

    <title>Account Details</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
<!-- NAVBAR
================================================== -->
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php">Songify</a>
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
              echo '<li class="active"><a href="./account.php">My Account</a></li>';
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
      <div class="small-12">
        <p><?php echo '<h2 align="center">Hi ' .$_SESSION['fname'] .'!</h2>'; ?></p>
        <p><br><h4 align="center">Your Account Details</h4></p>
        <p><br>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
      </div>
    </div>

    <form method="POST" action="update.php">
      <div class="row">
        <div class="col-md-12">

          <div class="row">
            
              <?php

                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  
                  echo '<br><label for="inputFName">First Name</label>';
                  echo '<input type="text" id="inputFName" name="fname" class="form-control" value="'.$obj->fname.'"> <br/>';

                  echo '<label for="inputLName">Last Name</label>';
                  echo '<input type="text" id="inputLName" name="lname" class="form-control" value="'.$obj->lname.'"> <br/>';

                  echo '<label for="inputAddr">Address</label>';
                  echo '<input type="text" id="inputAddr" name="addr" class="form-control" value="'.$obj->address.'"> <br/>';

                  echo '<label for="inputCity">City</label>';
                  echo '<input type="text" id="inputCity" name="city" class="form-control" value="'.$obj->city.'"> <br/>';

                  echo '<label for="inputState">State</label>';
                  echo '<input type="text" id="inputState" name="state" class="form-control" value="'.$obj->state.'"> <br/>';

                  echo '<label for="inputZip">Zip Code</label>';
                  echo '<input type="text" id="inputZip" name="zip" class="form-control" value="'.$obj->pin.'"> <br/>';

                  echo '<label for="inputEmail">Email address</label>';
                  echo '<input type="email" id="inputEmail" name="email" class="form-control" value="'.$obj->email.'"> <br/>';

                  echo '<label for="inputPassword">Password</label>';
                  echo '<input type="password" id="inputPassword" name="pwd" class="form-control" value="" required> <br/>';

                  echo '<input hidden name="id" value="'.$obj->id.'"/>';
              }

          ?>
          <div align="center">
            <br><button class="btn btn-lg btn-primary" type="submit">Update</button>
            <button class="btn btn-lg btn-primary" type="reset">Reset</button>
           </div>
        </div>
      </div>
    </form>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
