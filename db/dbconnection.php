<?php
$servername = "localhost";
$username = "Hazz_Wondor";
$password = "Hazz@2023";
$dbname = "hazz_wonder";

//create connection
$conn = new mysqli ($servername,$username,$password,$dbname);

//check connection
if($conn-> connect_error)
{
	die ("Connection Failed: ".$conn->connect_error);
}
//echo "Connected Successfully"


?>