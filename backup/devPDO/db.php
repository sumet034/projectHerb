<?php 

/* $servername = "localhost";
$username = "dd";
$password = "asdfg";
$database = "herb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_set_charset($conn,"utf8"); // บ้างครั้งจะเซฟข้อมูลภาษาไทยไม่ได้ */


$servername = "localhost";
$username = "dd";
$password = "asdfg";
$db_name = "herb";
 
try {
  $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

?>

