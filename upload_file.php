<?php
	
	session_start();
	$db = mysqli_connect("localhost","root","","fyp");
	$username = $_SESSION['username'];
	echo $username;
	
	if (isset($_POST['modelname']))    
			{    
          		// Instructions if $_POST['value'] exist   
          		$model = $_POST['modelname']; 
			}  
			echo "<br>".$model."<br>";  

	/*if (isset($_POST['userID']))    
			{    
          		// Instructions if $_POST['value'] exist   
          		$userID = $_POST['userID']; 
			}  
			echo "<br>".$userID."<br>"; */ 

			$sqlInputModelName = "INSERT INTO $username(modelname) VALUES('$model')";
			mysqli_query($db, $sqlInputModelName);

		//mkdir("./models/".$userID."/", 0777, true);
		$sql = "SELECT id FROM users WHERE username = '$username'";
		$result = mysqli_query($db, $sql);
		$rows = mysqli_fetch_assoc($result);
		$id = $rows['id'];
		$modelref = $id . $model;
		echo $modelref . "<br>";

		$sqlgetnum = "SELECT modelnum FROM users WHERE username = '$username'";
		$resultnum = mysqli_query($db, $sqlgetnum);
		$modelrow = mysqli_fetch_assoc($resultnum);
		$modelnum = $modelrow['modelnum'];
		echo $modelnum;
		$_SESSION['modelnum'] = $modelnum;

		
		
		

	if(isset($_FILES['file_array'])){
		$modelnum = $modelnum+1; 
		$_SESSION['modelnum'] = $modelnum;
		$sqlupdate = "UPDATE users SET modelnum = '$modelnum' WHERE username = '$username'";
		mysqli_query($db, $sqlupdate);

		$sql2 = "CREATE TABLE $modelref (obj VARCHAR(30), mtl VARCHAR(30), jpg VARCHAR(30), path VARCHAR(100))";
		mysqli_query($db, $sql2);

		$path = "./models"."/".$id."/".$model."/";
		echo $path;
		$sql3 = "INSERT INTO $modelref(path) VALUES('$path')";
		mysqli_query($db, $sql3);

		mkdir("./models"."/".$id."/".$model."/",0777,true);


		$name_array = $_FILES['file_array']['name'];
		$tmp_name_array = $_FILES['file_array']['tmp_name'];
		$size_array = $_FILES['file_array']['size'];
		$error_array = $_FILES['file_array']['error'];
		$type_array = $_FILES['file_array']['type'];

		$file_result="";

		for($i = 0; $i < count($tmp_name_array); $i++){
			if(move_uploaded_file($tmp_name_array[$i], 
				"./models/".$id."/".$model."/".$name_array[$i] )){
				
			echo $name_array[$i]. "upload is complete<br>";
			echo "type: ".$type_array[$i]."<br>";
			echo "size: ".($size_array[$i]/1024)."kb<br><br>";
				if(substr($name_array[$i],-3)=="obj"){
					$sql3 = "INSERT INTO $modelref(obj) VALUES('$name_array[$i]')";
					mysqli_query($db, $sql3);
				}else if(substr($name_array[$i],-3)=="mtl"){
					$sql3 = "INSERT INTO $modelref(mtl) VALUES('$name_array[$i]')";
					mysqli_query($db, $sql3);
				}else if(substr($name_array[$i],-3)=="jpg"){
					$sql3 = "INSERT INTO $modelref(jpg) VALUES('$name_array[$i]')";
					mysqli_query($db, $sql3);
				}
			
			}else{
				echo "move_uploaded_file function failed for ". $name_array[$i]."<br>";
			}
		}
		header("location: user.php");
	}


	

?>
<br>
<br>
<br>
<input type="button" value="Back" onclick="location.href='user.php';" />