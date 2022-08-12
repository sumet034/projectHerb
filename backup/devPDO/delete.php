<?php

include("../dev/db.php");

if(isset($_GET['herbID'])) {
    $herbID = $_GET['herbID'];
    $stmt = $conn->prepare('DELETE FROM herbname WHERE herbID=:herbID');
    $stmt->bindParam(':herbID', $herbID , PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->execute();
    if($result){header('Location: ../dev/index.php');}
    //if($result){echo "aaa";}
}

?>