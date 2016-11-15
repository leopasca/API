<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
$id=$_GET["IdGrupo"];
$string = file_get_contents('php://input');
$comentario=json_decode($string,true);
$query = "SELECT * FROM Usuarios WHERE IdUsuario NOT IN (SELECT IdUsuario From UsuariosGrupo  Where IdGrupo = '$id')
";
$stmt=$con->prepare($query);
$result = mysqli_query($con, $query);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
		
		$IdUsuario=$row['IdUsuario'];
		$Email=$row['Email'];
		$Password=$row['Password'];
		$Nombre=$row['Nombre'];
		$IdGrupo=$row['IdGrupo'];		
		
    	$objeto = array('IdUsuario'=> $IdUsuario,'Email'=> $Email,'Password'=> $Password,'Nombre'=> $Nombre,'IdGrupo'=> $IdGrupo);	
    	$objetos[] = $objeto;


}

mysqli_close($con);

header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
}
?>