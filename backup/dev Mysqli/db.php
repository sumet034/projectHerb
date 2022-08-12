<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "herb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_set_charset($conn,"utf8"); // บ้างครั้งจะเซฟข้อมูลภาษาไทยไม่ได้

?>
