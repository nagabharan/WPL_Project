<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';

$id = $_REQUEST['id'];
$qty = $_REQUEST['quantity'];

$result = $mysqli->query("SELECT * FROM products WHERE id =".$id);

if($result) {
  while($obj = $result->fetch_object()) {
      $update = $mysqli->query("UPDATE products SET qty =".$qty." WHERE id =".$id);
      if($update)
        echo 'Data Updated';
      else
        echo 'Failed';
    }
  }

header ("location:admin.php");

?>
