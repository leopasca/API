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
$query = "INSERT INTO Usuarios(Email,Contraseña,Nombre)values(?,?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
'sss',
$objeto["Email"],
$objeto["Contraseña"],
$objeto["Nombre"]

);
$stmt->execute();
//$res=$stmt->get_result();
}