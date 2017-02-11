<?php
	

	if (isset($_POST['modelname']))    
			{    
          		// Instructions if $_POST['value'] exist   
          		$model = $_POST['modelname']; 
			}  
			echo "<br>".$model."<br>";  

	if (isset($_POST['userID']))    
			{    
          		// Instructions if $_POST['value'] exist   
          		$userID = $_POST['userID']; 
			}  
			echo "<br>".$userID."<br>";  



		//mkdir("./models/".$userID."/", 0777, true);
		mkdir("./models"."/".$userID."/".$model."/",0777,true);

	if(isset($_FILES['file_array'])){
		$name_array = $_FILES['file_array']['name'];
		$tmp_name_array = $_FILES['file_array']['tmp_name'];
		$size_array = $_FILES['file_array']['size'];
		$error_array = $_FILES['file_array']['error'];
		$type_array = $_FILES['file_array']['type'];

		$file_result="";

		for($i = 0; $i < count($tmp_name_array); $i++){
			if(move_uploaded_file($tmp_name_array[$i], 
				"./models/".$userID."/".$model."/".$name_array[$i] )){
				
			echo $name_array[$i]. "upload is complete<br>";
			echo "type: ".$type_array[$i]."<br>";
			echo "size: ".($size_array[$i]/1024)."kb<br><br>";
			
			}else{
				echo "move_uploaded_file function failed for ". $name_array[$i]."<br>";
			}
		}
	}


	

?>
<br>
<br>
<br>
<input type="button" value="Back" onclick="location.href='index.html';" />