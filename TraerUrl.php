<?php
$con=mysqli_connect("localhost","u643932110_leop","leopas98","u643932110_leop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
$string = file_get_contents('php://input');
$video=json_decode($string,true);
$query = "SELECT url AS url FROM Videos  WHERE IdVideo = ?";
$result = mysqli_query($con, $query);
$stmt=$con->prepare($query);
$stmt->bind_param(
'i',
$video["IdVideo"]
);
$stmt->execute();
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
		$url=$row['url'];		
    	$objeto = array('url'=> $url);	
    	$objetos[] = $objeto;
	
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
}
?>