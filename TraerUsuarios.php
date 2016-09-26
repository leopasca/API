<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{

$string = file_get_contents('php://input');
$comentario=json_decode($string,true);
$query = "SELECT * FROM Usuarios";
$result = mysqli_query($con, $query);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
		$IdUsuario=$row['IdUsuario'];
		$Email=$row['Email'];
		$Contraseña=$row['Contraseña'];		
    	$objeto = array('IdUsuario'=> $IdUsuario,'Email'=> $Email,'Contraseña'=> $Contraseña);	
    	$objetos[] = $objeto;

}

mysqli_close($con);

header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
}
?>