<?php

function connect_mysql()
{
	$host = 'localhost:8500';
	$user = 'root';
	$pass = 'root';
	$dbname = 'mystore';

	/*connnect database*/
	$conn = mysqli_connect($host, $user, $pass, $dbname);
	if(!$conn){
			die("Could not connect: ".mysqli_connect_error());
	}
	//echo "Database Connected successfully\n";
	return $conn;
}

?>
