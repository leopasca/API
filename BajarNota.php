<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
<<<<<<< HEAD
$id=$_GET["Nota"];
=======
$id=$_GET["Nombre"];
>>>>>>> 13030ddc4ad15f6bcac2c6e57f3920a02b9d6acd
$query = "SELECT Nota FROM Notas  WHERE Nombre = '$id'";
$result = mysqli_query($con, $query);
$objetos = array();

while($row = mysqli_fetch_array($result)) 
{ 
		$Nota=$row['Nota'];		
    	$objeto = array('Nota'=> $Nota);	
    	$objetos[] = $objeto;
	
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
}
?>