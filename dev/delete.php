<?php

include("../dev/db.php");

if(isset($_GET['herbID'])) {
    $herbID = $_GET['herbID'];
    $stmt = $conn->prepare('DELETE FROM herbname WHERE herbID=:herbID');
    $stmt->bindParam(':herbID', $herbID , PDO::PARAM_INT);
    $result1 = $stmt->execute();

    $stmt = $conn->prepare('DELETE FROM detail WHERE herbID=:herbID');
    $stmt->bindParam(':herbID', $herbID , PDO::PARAM_INT);
    $result2 = $stmt->execute();

    $stmt = $conn->prepare('DELETE FROM statuss WHERE herbID=:herbID');
    $stmt->bindParam(':herbID', $herbID , PDO::PARAM_INT);
    $result3 = $stmt->execute();

    $stmt = $conn->prepare('DELETE FROM imgfeature WHERE herbID=:herbID');
    $stmt->bindParam(':herbID', $herbID , PDO::PARAM_INT);
    $result4 = $stmt->execute();

    if($result1 && $result2 && $result3 && $result4 ){header('Location: ../dev/index.php');}
    //if($result){echo "aaa";}
}

?>