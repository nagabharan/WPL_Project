<?php

	include 'config.php';

	$aname = $_POST["aname"];
	$genre = $_POST["genre"];
	$artist = $_POST["artist"];
	$year = $_POST["year"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$image = $_POST["image"];
	
	if($mysqli->query("INSERT INTO `products`(`name`, `genre`, `artist`, `year`, `qty`, `image`, `price`) VALUES ('$aname','$genre','$artist','$year','$qty','$image','$price')")){
		echo 'Data inserted';	
		echo '<br/>';
	} else {
		echo 'Failed';
		echo $mysqli->error;
	}

	header ("location:account.php");

?>
