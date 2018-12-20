<?php
//echo "bonjour";

$servername = "localhost";
$username = "root";
$password = "tseinfo";
$dbname = "evenements";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "error";
	exit();
}




