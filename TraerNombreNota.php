<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
$id=$_GET["IdNota"];
$query = "SELECT Nombre FROM Notas  WHERE IdNota = '$id'";
$result = mysqli_query($con, $query);
$objetos = array();

while($row = mysqli_fetch_array($result)) 
{ 
		$Nombre=$row['Nombre'];		
    	$objeto = array('Nombre'=> $Nombre);	
    	$objetos[] = $objeto;
	
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
}
?>