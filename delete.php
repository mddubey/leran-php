<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$mysqli = new mysqli("localhost","root","","first_db") or die("Error " . mysqli_error($mysqli));
		$id = $_GET['id'];
		$mysqli->query("DELETE FROM list WHERE id='$id'");
		header("location: home.php");
	}
?>