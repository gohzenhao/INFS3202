<?php

if(isset($_POST['submit'])) {

	include_once '../model/database.php';

	$db = new Database;

	//$sql = "SELECT * FROM ";
	echo "Connected to DB yo!";
	



	
	header("Location: ../index.php?submit=success");

} else {

	exit();
}