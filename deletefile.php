<?php
	
	if(isset($_POST['loadbtn'])){
		session_start();
		echo "load";
		header('Location: user.php');
	}else if(isset($_POST['delbtn'])){
		session_start();
		$db = mysqli_connect("localhost","root","","fyp");
   		$username = $_SESSION['username'];
		
   		
				
		echo "del";
		echo $_POST['modeldropdown'];
		$model = $_POST['modeldropdown'];
		echo $_SESSION['id'];
		$id = $_SESSION['id'];
		$modelref = $id .$model;
		
		
		//decrease model number
		if($_SESSION['modelnum']!='0'){
			$_SESSION['modelnum'] = $_SESSION['modelnum']-1;
			$modelnum = $_SESSION['modelnum'];
			$sqldec = "UPDATE users SET modelnum = '$modelnum' WHERE username = '$username'";
			mysqli_query($db, $sqldec);
		} 
		
		$modelnum = $_SESSION['modelnum'];
		$sqldec = "UPDATE users SET modelnum = '$modelnum' WHERE username = '$username'";
		mysqli_query($db, $sqldec);

		//delete model name
		$sqldelname = "DELETE FROM $username WHERE modelname = '$model'";
		mysqli_query($db, $sqldelname);

		$source = "./models"."/". $id ."/".$model."/";
		chmod("./models/",0777);
		chmod($source, 0777);
		echo "<br>";
		echo fileperms("./models/");
		echo "<br>";
		echo $perms = base_convert(fileperms("./models/"), 10, 8); 
		echo "<br>";
		echo $perms = base_convert(fileperms($source), 10, 8); 
		chown($source, 666);

		$sqlgetobj = "SELECT obj FROM $modelref";
		$result = mysqli_query($db, $sqlgetobj);
		$row = mysqli_fetch_row($result);
		$row_cnt =  mysqli_num_rows($result);
		echo "<br>".$row_cnt;

		while($row=mysqli_fetch_assoc($result)){
			if(($row['obj'])){
				echo $row['obj'];
				$objsource = $source . $row['obj'];
				echo $objsource;
				unlink($objsource);
		
			
			}
		}
		
		$sqlgetmtl = "SELECT mtl FROM $modelref";
		$result = mysqli_query($db, $sqlgetmtl);
		$row = mysqli_fetch_row($result);
		$row_cnt = mysqli_num_rows($result);
		echo "<br>".$row_cnt;
		
		while($row=mysqli_fetch_assoc($result)){
			if(($row['mtl'])){
				echo $row['mtl'];
				$objsource = $source . $row['mtl'];
				echo $objsource;
				unlink($objsource);
		
			
			}
		}

		

		$sqlgetjpg = "SELECT jpg FROM $modelref";
		$result = mysqli_query($db, $sqlgetjpg);
		$row = mysqli_fetch_row($result);
		$row_cnt = mysqli_num_rows($result);
		echo "<br>".$row_cnt;
		
		while($row=mysqli_fetch_assoc($result)){
			if(($row['jpg'])){
				echo $row['jpg'];
				$objsource = $source . $row['jpg'];
				echo $objsource;
				unlink($objsource);
		
			
			}
		}

		$dir = "./models"."/". $id ."/".$model;
		rmdir($dir);




		

		

		//delete model table
		$sqldelmodel = "DROP TABLE $modelref";
		mysqli_query($db, $sqldelmodel);


		header('Location: user.php');
	}



?>