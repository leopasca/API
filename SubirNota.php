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
$query = "INSERT INTO Notas(Nota)values(?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
'b',
$objeto["Nota"]
);
$stmt->execute();
//$res=$stmt->get_result();
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
?>