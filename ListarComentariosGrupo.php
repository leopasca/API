<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
$id=$_GET["IdHoja"];
$idGrupo=$_GET["IdGrupo"];
$query = "SELECT * FROM Comentarios WHERE IdHoja ='$id' AND IdGrupo= '$idGrupo'";
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
	
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
}
?>