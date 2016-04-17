<?php

  if(session_id() == '' || !isset($_SESSION)){session_start();}
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

    <title>Products</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
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
              echo '<li><a href="./admin.php">My Account</a></li>';
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
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $sql = 'SELECT * FROM products';

          if(isset($_POST['search']))
          {
           $search_term =$_POST['search_box'];

            if($_POST['filter'] == "name"){
              $sql = "SELECT * FROM products WHERE name LIKE '%{$search_term}%'";
            }

            else if($_POST['filter'] == "artist"){
              $sql = "SELECT * FROM products WHERE artist LIKE '%{$search_term}%'";
            }

            else if($_POST['filter'] == "genre"){
              $sql = "SELECT * FROM products WHERE genre LIKE '%{$search_term}%'";
            }


          }

          $result = $mysqli->query($sql);
          if($result === FALSE){
            die(mysql_error());
          } ?>

          <form method="POST" action="products.php">
              <input placeholder="Search by" name="search_box" type="text">
                <select name="filter">
                  <option value="name"> Album </option>
                  <option value="artist">Artist</option>
                  <option value="genre">Genre</option>
                </select>
              <button type="submit" class="btn btn-primary" name="search" value="Search"> Search</button>
              <button type="reset" class="btn btn-primary" name="reset" value="reset"> Reset</button>
              <button class="btn btn-primary" href="./products.php"> Back</button>
          </form>

     <?php


          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="col-md-4">';
              echo '<p><h3>'.$obj->name.'</h3></p>';
              echo '<img src="images/products/'.$obj->image.'"/>';
              echo '<p><strong>Genre</strong>: '.$obj->genre.'</p>';
              echo '<p><strong>Artist</strong>: '.$obj->artist.'</p>';
              echo '<p><strong>Year</strong>: '.$obj->year.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';

              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" class="btn btn-primary" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          ?>

           </div>
         </div>
      <!-- FOOTER -->
      <footer>
        <p>&copy; 2015 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
