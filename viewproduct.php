<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
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

    <title>Add Products</title>

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
            <span>Toggle navigation</span>
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

    <div class="container" style="margin-top:70px;">
      <div class="row">

      <?php
          $product_id = $_GET['id'];

          $result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);

          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {
              echo '<form class="form-signin" method="POST" action="updateproduct.php">';
              echo '<h2 class="form-signin-heading">Update Product</h2>';
        
              echo '<label for="inputAlbumName">Album Name</label>';
              echo '<input type="text" id="inputAlbumName" name="aname" class="form-control" value="'.$obj->name.'" required autofocus> <br/>';

              echo '<label for="inputGenre">Genre</label>';
              echo '<input type="text" id="inputGenre" name="genre" class="form-control" value="'.$obj->genre.'" required> <br/>';
              
              echo '<label for="inputArtist">Artist</label>';
              echo '<input type="text" id="inputArtist" name="artist" class="form-control" value="'.$obj->artist.'" required> <br/>';
              
              echo '<label for="inputYear">Year</label>';
              echo '<input type="text" id="inputYear" name="year" class="form-control" value="'.$obj->year.'" required> <br/>';

              echo '<label for="inputQty">Quantity</label>';
              echo '<input type="text" id="inputQty" name="qty" class="form-control" value="'.$obj->qty.'" required> <br/>';
              
              echo '<label for="inputPrice">Price(Per Unit)</label>';
              echo '<input type="text" id="inputPrice" name="price" class="form-control" value="'.$obj->price.'" required> <br/>';
              
              echo '<label for="inputImage">Thumbnail</label>';
              echo '<img src="images/products/'.$obj->image.'"/>';
              echo '<input type="text" id="inputImage" name="image" class="form-control" value="'.$obj->image.'" required> <br/>';
              
              echo '<input hidden name="id" value="'.$obj->id.'"/>';

              echo '<div class="col-md-6"><button class="btn btn-primary" type="submit">Update</button></div>';
              echo '<div class="col-md-6"><a href="deleteproduct.php?id='.$obj->id.'" class="btn btn-danger" role="button">Delete</a></div>';
              echo '</form>';
            }
          }

          $_SESSION['product_id'] = $product_id;


          ?>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>