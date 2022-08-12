<?php

include('../dev/db.php');

if (isset($_POST['createHerb'])) {
  //$herbImg = $_POST['herbImg'];
  $science_name = $_POST['science_name'];
  $family_herb = $_POST['family_herb'];
  $common_name = $_POST['common_name'];
  $local_name = $_POST['local_name'];
  //$query = "INSERT INTO herbname(title, description) VALUES ('$science_name', '$family_herb')";
  $query = "INSERT INTO herbname (scienceName, familyHerb, commonName, localName) VALUES ('$science_name', '$family_herb', '$common_name', '$local_name')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
    echo "My first PHP script!";
    
  }

  $_SESSION['message'] = 'createHerb Successfully';
  $_SESSION['message_type'] = 'success';
  $_SESSION['management'] = 'create';
  header('Location: ../dev/index.php');

}

?>

