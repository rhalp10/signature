<?php 
$con = mysqli_connect('localhost','root','','signature') or die("ERROR");

$output = array();
if(isset($_POST['action'])){
	if($_POST["action"] == "saveJson"){
			try{	
				$person_Name = '';
				$person_Signature = $_POST["signature"];

				$sql = "INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES (NULL, '$person_Name', '$person_Signature');";
				$query=mysqli_query($con,$sql);

				if(!empty($query))
				{
				
				 	$output["msg"] = "Succesfully Save as JSON";
				    
				}
			
			} 
			catch (PDOException $e)
			{
			   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
			}

			

	}
		if($_POST["action"] == "saveSVG"){
			try{	
				$person_Name = '';
				$person_Signature = $_POST["signature"];

				$sql = "INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES (NULL, '$person_Name', '$person_Signature');";
				$query=mysqli_query($con,$sql);

				if(!empty($query))
				{
				
				 	$output["msg"] = "Succesfully Save as SVG";
				    
				}
			
			} 
			catch (PDOException $e)
			{
			   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
			}

			

	}
	if($_POST["action"] == "load"){
		
			$person_ID = $_POST["person_ID"];
			$sql = "SELECT * FROM `person` where ID = '$person_ID'";
			$query=mysqli_query($con,$sql);
			while( $row=mysqli_fetch_array($query) ) 
			{ 
				$output["ID"] = $row[1];
				$output["Name"] = $row[1];
				$output["Signature"] = $row[2];
			}
			

	}
	if($_POST["action"] == "delete"){
		
			$person_ID = $_POST["person_ID"];
			$sql = "DELETE FROM `person` WHERE ID = '$person_ID'";
			$query=mysqli_query($con,$sql);
			if(!empty($query))
			{
			
			 	$output["msg"] = "Succesfully Deleted";
			}
			
			

	}
	if($_POST["action"] == "submit"){

		$output["msg"] = "submit";
		try{	
				$person_Name = $_POST["signatureName"];
				$person_Signature = $_POST["signature"];

				$sql = "INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES (NULL, '$person_Name', '$person_Signature');";
				$query=mysqli_query($con,$sql);

				if(!empty($query))
				{
				
				 	$output["msg"] = "Succesfully Save as JSON";
				    
				}
			
			} 
			catch (PDOException $e)
			{
			   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
			}
	}


}




echo json_encode($output);
?>