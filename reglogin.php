<?php
	//Get values passed from form
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//to prevent mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	//connect to the server and select database
	/*mysql_connect("localhost","root","");
	mysql_select_db("fyp");*/
	$db = mysqli_connect("localhost","root","","fyp") or die("Error".mysqli_error());



	if(isset($_POST['loginbtn'])){
		echo "login";
		$result = mysql_query("select * from Users where username = '$username' and password = '$password'") or die("Failed to query database".mysql_error());
		$row = mysql_fetch_array($result);
		if($row['username']==$username && $row['password'] == $password){
			echo "Login success !!!!";
		}
	}else if(isset($_POST['logoutbtn'])){
		echo "logout";
	}else if(isset($_POST['regbtn'])){
		echo "reg";
		$randomid = uniqid();
		$password = md5($password); // hash password before storing 
		$sql = "INSERT INTO Users(username, id, modelnum, password) VALUES('$username', '$randomid', '0','$password')";
		mysqli_query($db, $sql);

	}


?>