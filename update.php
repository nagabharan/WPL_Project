<?php

  include 'config.php';

  $id = $_POST["id"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $address = $_POST["addr"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $pin = $_POST["zip"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  $result = $mysqli->query("SELECT * FROM users WHERE id =".$id);

  if($result) {
    while($obj = $result->fetch_object()) {
        $update = $mysqli->query("UPDATE users SET fname ='$fname', lname ='$lname' ,address='$address' ,city='$city' ,state='$state' ,pin='$pin' ,email='$email', password='$pwd'  WHERE id =".$id);
        if($update)
          echo 'Data Updated';
        else
          echo 'Failed';
      	echo $mysqli->error;
      }
    }

  header ("location:success.php");

?>