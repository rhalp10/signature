<?php 
  $con = mysqli_connect('localhost','root','','signature') or die("ERROR");

$query = '';
$output = array();
$query .= "SELECT *";
$query .= " FROM `person`";

$query .= ' WHERE';

if(isset($_POST["search"]["value"]))
{
 	$query .= ' ( ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR Name LIKE "%'.$_POST["search"]["value"].'%" )';  
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY ID DESC ';
}

$result=mysqli_query($con,$query);
$filtered_rows = mysqli_num_rows($result) ;
while( $row=mysqli_fetch_array($result) ) 
{ 

	$sub_array = array();
	
		
		$sub_array[] = $row["ID"];
		$sub_array[] =  $row["Name"];
		$sub_array[] = '
		<div class="btn-group">
		<button class="btn btn-primary" id="loadSignature" data-id="'.$row["ID"].'">Load</button>

		<button class="btn btn-danger" id="deleteSignature" data-id="'.$row["ID"].'">Delete</button>
		</div>
		';
	$data[] = $sub_array;
}

$query = "SELECT * FROM `person`";
$result=mysqli_query($con,$query);
$filtered_rec = mysqli_num_rows($result);

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$filtered_rec,
	"data"				=>	$data
);
echo json_encode($output);



?>



        
