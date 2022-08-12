<?php 
    require_once('./db.php');
   
    $ratestar = $_POST['ratestar'];
    if ($ratestar == 5) {
        $rate = "ratefive";
    } elseif ($ratestar == 4) {
        $rate = "ratefour";
    } elseif ($ratestar == 3) {
        $rate = "ratethree";
    } elseif ($ratestar == 2) {
        $rate = "ratetwo";
    } elseif ($ratestar == 1 || $ratestar == 0) {
        $rate = "rateone";
    }
    $feedtxt = $_POST['feedtxt'];
    $img = $_FILES['image'];

        $img = $_FILES['image'];
        if ($img['name'] != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = '../img/imgFeed/' . $fileNew;
            if (in_array($fileActExt, $allow)) {

                if ($img['size'] > 0 && $img['size'] < 20000000 && $img['error'] == 0) {
                    move_uploaded_file($img['tmp_name'], $filePath);
                    
                }
            }
        } else {
            $fileNew = "no picture.jpg";
        }

        $select = "SELECT * from ratestar";
        $stmtstar = $conn->prepare($select);
        $stmtstar->execute();
        $result = $stmtstar->fetchAll();
        if ($result) {
            foreach ($result as $row) {
                $retex = $row[$rate];
                $retex++;
            }
        }

        $stmtup = $conn->prepare("UPDATE ratestar SET $rate=:rate");
        $stmtup->bindParam(":rate", $retex);
        $stmtup->execute();

        $pdosql = "INSERT INTO feedherb (feedTxt,feedImg,feedStar) VALUES (:feedTxt, :feedImg, :feedStar);";
        $stmt = $conn->prepare($pdosql);
        $stmt->bindParam(":feedTxt", $feedtxt);
        $stmt->bindParam(":feedImg", $fileNew);
        $stmt->bindParam(":feedStar", $ratestar);
        $result = $stmt->execute();
?>