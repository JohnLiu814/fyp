<?php
	session_start();
	$db = mysqli_connect("localhost","root","","fyp");
	$username = $_SESSION['username'];

	$returnPathSql = "SELECT "

?>