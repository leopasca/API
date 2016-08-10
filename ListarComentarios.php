<?php
$con=mysqli_connect("us-cdbr-azure-east-c.cloudapp.net","bab9897d1830ea","05e3e334","acsm_9bbdbc7874919a6");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
echo "hola";
/*
$string = file_get_contents('php://input');
$comentario=json_decode($string,true);
$query = "SELECT * FROM comentarios";
$result = mysqli_query($con, $query);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
		$IdComentario=$row['IdComentario'];
		$Comentario=$row['Comentario'];
		$CordComentarioY=$row['CordComentarioY'];
		$CordAsteriscoX=$row['CordAsteriscoX'];
		$CordAsteriscoY=$row['CordAsteriscoY'];
		
    	$objeto = array('IdComentario'=> $IdComentario,'Comentario'=> $Comentario,'CordComentarioY'=> $CordComentarioY,'CordAsteriscoX'=> $CordAsteriscoX,'CordAsteriscoY'=> $CordAsteriscoY);	
    	$objetos[] = $objeto;
*/	
}

mysqli_close($con);
/*
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
*/
?>