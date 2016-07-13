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
$query = "INSERT INTO Comentarios(Comentario)values(?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
's',
$comentario["Comentario"]
);
$stmt->execute();
//$res=$stmt->get_result();
}
mysqli_close($con);
?>