<?php 
/** 
* ======================
* DATABASE CONNECTION
* ======================
**/
$con = mysqli_connect('localhost','root','','signature') or die("ERROR");

$output = array();
if($action  = isset($_POST['action']) ? $_POST["action"]  : null){
	if($action == "saveJson"){
		try{	
			$person_Name = 'saveJson';
			$person_Signature = isset( $_POST["signature"]) ? $_POST["signature"] : null; 

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
	if($action == "saveSVG"){
		try{	
			$person_Name = 'saveSVG';
			$person_Signature = isset( $_POST["signature"]) ? $_POST["signature"] : null; 

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
	if($action == "submit"){
		try {	
			$person_Name = isset( $_POST["signatureName"]) ? $_POST["signatureName"] : null; 
			$person_Signature = isset( $_POST["signature"]) ? $_POST["signature"] : null; 

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
	if($action == "update"){
		try{
			$person_ID = isset( $_POST["signatureID"]) ? $_POST["signatureID"] : null;	
			$person_Name = isset( $_POST["signatureName"]) ? $_POST["signatureName"] : null; 
			$person_Signature = isset( $_POST["signature"]) ? $_POST["signature"] : null; 

			$sql = "UPDATE `person` SET `Name` = '$person_Name',`Signature` = '$person_Signature' WHERE `person`.`ID` = '$person_ID';";
			$query=mysqli_query($con,$sql);

			if(!empty($query))
			{
			
				 $output["msg"] = "Succesfully update signature";
				
			}
		} 
		catch (PDOException $e)
		{
		   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
		}
	}
	if($action == "load"){
		try{
			$person_ID = isset( $_POST["person_ID"]) ? $_POST["person_ID"] : null;
			$sql = "SELECT * FROM `person` where ID = '$person_ID'";
			$query=mysqli_query($con,$sql);
			while( $row=mysqli_fetch_array($query) ) 
			{ 
				$output["ID"] = $row[1];
				$output["Name"] = $row[1];
				$output["Signature"] = $row[2];
			}
			if(!empty($query))
			{
			
				 $output["msg"] = "Succesfully load signature";
				
			}
		}	
		catch (PDOException $e)
		{
		   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
		}	
	}
	if($action == "delete"){
		try{
			$person_ID = isset( $_POST["person_ID"]) ? $_POST["person_ID"] : null;
			$sql = "DELETE FROM `person` WHERE ID = '$person_ID'";
			$query=mysqli_query($con,$sql);
			if(!empty($query))
			{
			
			 	$output["msg"] = "Succesfully Deleted";
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