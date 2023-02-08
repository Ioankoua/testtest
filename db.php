<?php

$conn = new mysqli("localhost", "root", "", "test");
if (!$conn) {
  die("Error: " . mysqli_connect_error());
}



