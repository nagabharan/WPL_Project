<?php

	include 'config.php';

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$address = $_POST["addr"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$pin = $_POST["zip"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];

	if($mysqli->query("INSERT INTO `users`(`fname`, `lname`, `address`, `city`, `state`, `pin`, `email`, `password`) VALUES ('$fname','$lname','$address','$city','$state','$pin','$email','$pwd')")){
		echo 'Data inserted';	
		echo '<br/>';
	} else {
		echo 'Failed';
	}

	header ("location:signup.php");

?>
