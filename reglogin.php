<?php
	//Get values passed from form
	
	$password = $_POST['password'];
	

	//connect to the server and select database
	/*mysql_connect("localhost","root","");
	mysql_select_db("fyp");*/
	$db = mysqli_connect("localhost","root","","fyp");

	
if(isset($_POST['loginbtn'])){
	//to prevent mysql injection
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
		
		session_start();
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($db, $sql);
		$row_cnt =  mysqli_num_rows($result);
		
		$sqlid = "SELECT id FROM users WHERE username = '$username'";
		$result = mysqli_query($db, $sqlid);
		$rows = mysqli_fetch_assoc($result);
		$id = $rows['id'];
		$_SESSION['id'] = $id;

		if($row_cnt==1){
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['username'] = $username;
				echo $_SESSION['username'];
				echo $_SESSION['username'];
				header('Location: user.php');
				//header("location: index.html"); // redirect
			}/*else{
				$_SESSION['message'] = "Username/password combination incorrect";
			}*/
	}else if(isset($_POST['logoutbtn'])){
		session_start();
		
		echo $_SESSION['username'];
		echo $_SESSION['message'];
		session_destroy();
		unset($_SESSION['username']);
		$_SESSION['message']="You are now logged out";
		echo "logout";
		header('Location: index.php');
		

	}else if(isset($_POST['regbtn'])){
		session_start();
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$randomid = uniqid();
		$password = md5($password); // hash password before storing 
			
		$checkSql = "SELECT COUNT(username) AS number FROM users WHERE username = '$username'";
		$checkSqlResult = mysqli_query($db, $checkSql);
		$checkSqlRow = mysqli_fetch_assoc($checkSqlResult);
		if($checkSqlRow['number']==0){
			$sql = "INSERT INTO users(username, id, modelnum, password) VALUES('$username', '$randomid', '0','$password')";
			mysqli_query($db, $sql);
			$sql2 = "CREATE TABLE $username (modelname VARCHAR(100))";
			mysqli_query($db, $sql2);
		}


		
		header("location: index.php");

	}


?>