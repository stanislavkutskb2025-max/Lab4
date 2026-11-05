<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "SQL_Kuts768KB"; 
$dbName   = "hospital_db";              
$port     = 3306;                       

$dbc = mysqli_connect($hostname, $username, $password, $dbName, $port);

if (!$dbc) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

mysqli_set_charset($dbc, "utf8mb4");
?>


