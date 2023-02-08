<?php

$host = "localhost";
$database = "test";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $database);
if (!$conn) {
  die("Error: " . mysqli_connect_error());
}



