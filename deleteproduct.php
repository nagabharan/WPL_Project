<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';

$id = $_GET['id'];

$result = $mysqli->query("SELECT * FROM products WHERE id =".$id);

if($result) {
  	while($obj = $result->fetch_object()) {
		$chk = $mysqli->query("SELECT * FROM orders WHERE prod_id=".$id);
		if($chk){
			header ("location:unsuccess.php");
		} else {
		$update = $mysqli->query("DELETE FROM products WHERE id =".$id);
		if($update)
			echo 'Data Updated';
		else
			echo 'Failed';
		header ("location:admin.php");
		}      
	}	
}


?>
