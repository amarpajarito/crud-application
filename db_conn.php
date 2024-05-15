<?php
$servername = "localhost";
$username = "root";
$password = "Oct2023101618";
$dbname = "BIGBREW";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
