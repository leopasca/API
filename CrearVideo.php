<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
$string = file_get_contents('php://input');
$objeto=json_decode($string,true);
$query = "INSERT INTO Videos(url)values(?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
's',
$objeto["url"]
);
$stmt->execute();
//$res=$stmt->get_result();
}

$query2 = "SELECT MAX(IdVideo) AS ultimo FROM Videos";
$result = mysqli_query($con, $query2);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
	$Id=$row['ultimo'];
    	$objeto = array('IdVideo'=> $Id);	
    	$objetos[] = $objeto;
	
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
?>