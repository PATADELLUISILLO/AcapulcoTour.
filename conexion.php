<?php

$dbhost = "localhost";
$dbUser = "root";
$dbpass = "R00t1234/";
$bname = "acapulcouser";


$conn = new mysqli($dbhost, $dbUser,$dbpass,$bname);


if ($conn -> connect_error) {


    die( "Error en la conexion : ". $conn->connect_error);
    # code...
}




?>