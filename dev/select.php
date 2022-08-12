<?php 
    require_once('./db.php');
    $select = "SELECT * from ratestar";
    $stmtstar = $conn->prepare($select);
    $stmtstar->execute();
    $result = $stmtstar->fetchAll();
    /* if ($result) {
        foreach ($result as $row) {
            $retex = $row[$rate];
            $retex++;
        }
    } */

    echo json_encode($result);

?>