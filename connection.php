<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "meetnow";
$connection = mysqli_connect("$server","$username","$password","$database");
if(!$connection)
{
	echo("connection terminated");
}
?>