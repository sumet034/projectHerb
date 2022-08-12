<?php

include("../dev Mysqli/db.php");

if(isset($_GET['herbID'])) {
  $herbID = $_GET['herbID'];
  $query = "DELETE FROM herbname WHERE herbID = $herbID";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'herbname Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>