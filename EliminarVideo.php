<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
$string = file_get_contents('php://input');
$IdVideo=json_decode($string,true);
$query = "DELETE * FROM Videos WHERE IdVideo = ?";
$stmt=$con->prepare($query);
$stmt->bind_param(
'i',
$IdVideo["IdVideo"]
);
$stmt->execute();
}
mysqli_close($con);
?>