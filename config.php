<?php

error_reporting(E_ERROR || E_WARNING);

$server = "localhost";
$user = "root";
$pass = "";
$database = "chatbot_forteen";

$conn = mysqli_connect($server, $user, $pass);

mysqli_select_db($conn, $database) or die(mysqli_error($conn));
if (!$conn) {
   echo 'Connected failure<br>';
}
//echo 'Connected successfully<br>';



mysqli_set_charset($conn, 'utf8');
mysqli_query($conn, "set character_set_results='utf8'");
mysqli_set_charset($conn, 'utf8mb4');
mysqli_query($conn, "set character_set_results='utf8mb4'");
date_default_timezone_set('Asia/Kolkata');
ini_set('date.timezone', 'Asia/Kolkata');




$date = time();
$datetime = date('Y-m-d H:i:s');

