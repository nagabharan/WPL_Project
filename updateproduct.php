<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
$id=$_POST["id"];
$aname = $_POST["aname"];
$genre = $_POST["genre"];
$artist = $_POST["artist"];
$year = $_POST["year"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$image = $_POST["image"];

$result = $mysqli->query("SELECT * FROM products WHERE id =".$id);

if($result) {
  while($obj = $result->fetch_object()) {
      $update = $mysqli->query("UPDATE products SET name ='$aname', genre ='$genre' ,artist='$artist' ,year='$year' ,qty='$qty' ,image='$image' ,price='$price'  WHERE id =".$id);
      if($update)
        echo 'Data Updated';
      else
        echo 'Failed';
    	echo $mysqli->error;
    }
  }

header ("location:products.php");

?>
