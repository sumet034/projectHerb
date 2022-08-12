<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once('./db.php');
if (isset($_POST['action'])) {

    if ($_POST['action'] == "edit_regis") {
        $emailx = $_POST['email_regis'];
        $passx = $_POST['pass_regis'];
        $namex = $_POST['name_regis'];
        $lastx = $_POST['last_regis'];
        $idstdx = $_POST['idstd_regis'];
        $adidx = $_POST['adid'];
        $rolex = "admin";


        $pdosql = "UPDATE  accountpm SET Email=:emailx,  pass=:passx, nameStd=:namex, surnameStd=:lastx, idStd=:idstdx, role=:rolex  WHERE addminID=:adidx;";


        $stmt = $conn->prepare($pdosql);
        $stmt->bindParam(":emailx", $emailx);
        $stmt->bindParam(":passx", $passx);
        $stmt->bindParam(":namex", $namex);
        $stmt->bindParam(":lastx", $lastx);
        $stmt->bindParam(":idstdx", $idstdx);
        $stmt->bindParam(":rolex", $rolex);
        $stmt->bindParam(":adidx", $adidx);

        $result = $stmt->execute();
        if (isset($result)) {
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลโปรไฟล์สำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
            })
            </script>";
            header("refresh:1.5; url=index.php");
        } else {
            echo    "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'ไม่สามารแก้ไขโปรไฟล์ได้',
                            'error'
                        )
                    })
                    </script>";
            header("refresh:1.5; url=index.php");
        }
    }

    if ($_POST['action'] == "register") {
        $emailx = $_POST['email_regis'];
        $passx = $_POST['pass_regis'];
        $namex = $_POST['name_regis'];
        $lastx = $_POST['last_regis'];
        $idstdx = $_POST['idstd_regis'];
        $rolex = "admin";

        $pdosql = "INSERT INTO accountpm (Email,pass,nameStd,surnameStd,idStd,role) VALUES (:emailx, :passx, :namex, :lastx, :idstdx,:rolex);";
        $stmt = $conn->prepare($pdosql);
        $stmt->bindParam(":emailx", $emailx);
        $stmt->bindParam(":passx", $passx);
        $stmt->bindParam(":namex", $namex);
        $stmt->bindParam(":lastx", $lastx);
        $stmt->bindParam(":idstdx", $idstdx);
        $stmt->bindParam(":rolex", $rolex);
        $result = $stmt->execute();
        if (isset($result)) {
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'สมัครสมาชิกสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
            })
            </script>";
            header("refresh:1.5; url=index.php");
        } else {
            echo    "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'ไม่สามารถสมัครสมาชิกได้',
                            'error'
                        )
                    })
                    </script>";
            header("refresh:1.5; url=index.php");
        }
    }


    if ($_POST['action'] == "testfeed") {
        $feedtxt = "asd";
        $ratestar = "1";
        $img = $_FILES['imgfeed'];
        if ($img['name'] != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = '../img/imgFeed/' . $fileNew;
            if (in_array($fileActExt, $allow)) {

                if ($img['size'] > 0 && $img['size'] < 20000000 && $img['error'] == 0) {
                    move_uploaded_file($img['tmp_name'], $filePath);
                    /* echo "<pre> print_r($fileActExt) </pre>"; */
                }
            }
        } else {
            $fileNew = "no picture.jpg";
        }

        $pdosql = "INSERT INTO feedherb (feedTxt,feedImg,feedStar) VALUES (:feedTxt, :feedImg, :feedStar);";
        $stmt = $conn->prepare($pdosql);
        $stmt->bindParam(":feedTxt", $feedtxt);
        $stmt->bindParam(":feedImg", $fileNew);
        $stmt->bindParam(":feedStar", $ratestar);
        $result = $stmt->execute();
    }


    if ($_POST['action'] == "imageFeed") {
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
        $img = $_FILES['imgfeed'];
        if ($img['name'] != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = '../img/imgFeed/' . $fileNew;
            if (in_array($fileActExt, $allow)) {

                if ($img['size'] > 0 && $img['size'] < 20000000 && $img['error'] == 0) {
                    move_uploaded_file($img['tmp_name'], $filePath);
                    /* echo "<pre> print_r($fileActExt) </pre>"; */
                } else {
                    echo "<script>
                     $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'ขาดไฟล์เกิน 2 mb',
                            showConfirmButton: false,
                            timer: 5000
                        })
                    })
                    </script>";
                    header("refresh:5; url=../index.php");
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
        if (isset($result)) {
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'ส่งข้อเสนอแนะสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
            })
            </script>";
            header("refresh:1.5; url=../index.php");
        } else {
            echo    "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'ไม่สามารถส่งข้อเสนอแนะได้',
                            'error'
                        )
                    })
                    </script>";
            header("refresh:1.5; url=../index.php");
        }
    }


    if ($_POST['action'] == "createHerb") {
        $nameShow = $_POST['herb_name'];
        $scienceName = $_POST['science_name'];
        $familyHerb = $_POST['family_herb'];
        $commonName = $_POST['common_name'];
        $localName = $_POST['local_name'];

        $leaves = $_POST['feature_leaves'];
        $flower = $_POST['feature_flower'];
        $fruit = $_POST['feature_fruit'];
        $haulm = $_POST['feature_haulm'];
        $rootHerb = $_POST['feature_rootHerb'];
        $propagating = $_POST['propagated'];
        $feature = $_POST['features'];


        if (isset($_POST['sw1'])) $sw1 = 1;
        else $sw1 = 0;
        if (isset($_POST['sw2'])) $sw2 = 1;
        else $sw2 = 0;
        if (isset($_POST['sw3'])) $sw3 = 1;
        else $sw3 = 0;
        if (isset($_POST['sw4'])) $sw4 = 1;
        else $sw4 = 0;
        if (isset($_POST['sw5'])) $sw5 = 1;
        else $sw5 = 0;

        $allow = array('jpg', 'jpeg', 'png');

        if ($_FILES['img1']['name'] != "") {
            $img1 = $_FILES['img1'];
            $extension1 = explode('.', $img1['name']);
            $fileActExt1 = strtolower(end($extension1));
            $fileNew1 = "a_" . rand() . "." . $fileActExt1;
            $filePath1 = '../img/imgHerb/' . $fileNew1;

            if (in_array($fileActExt1, $allow)) {
                if ($img1['size'] > 0 && $img1['size'] < 5000000 && $img1['error'] == 0) {
                    move_uploaded_file($img1['tmp_name'], $filePath1);
                }
            }
        } else $fileNew1 = "loadimg.gif";

        if ($_FILES['img2']['name'] != "") {
            $img2 = $_FILES['img2'];
            $extension2 = explode('.', $img2['name']);
            $fileActExt2 = strtolower(end($extension2));
            $fileNew2 = "b_" . rand() . "." . $fileActExt2;
            $filePath2 = '../img/imgHerb/' . $fileNew2;

            if (in_array($fileActExt2, $allow)) {
                if ($img2['size'] > 0 && $img2['size'] < 5000000 && $img2['error'] == 0) {
                    move_uploaded_file($img2['tmp_name'], $filePath2);
                }
            }
        } else $fileNew2 = "loadimg.gif";

        if ($_FILES['img3']['name'] != "") {
            $img3 = $_FILES['img3'];
            $extension3 = explode('.', $img3['name']);
            $fileActExt3 = strtolower(end($extension3));
            $fileNew3 = "c_" . rand() . "." . $fileActExt3;
            $filePath3 = '../img/imgHerb/' . $fileNew3;

            if (in_array($fileActExt3, $allow)) {
                if ($img3['size'] > 0 && $img3['size'] < 5000000 && $img3['error'] == 0) {
                    move_uploaded_file($img3['tmp_name'], $filePath3);
                }
            }
        } else $fileNew3 = "loadimg.gif";

        if ($_FILES['img4']['name'] != "") {
            $img4 = $_FILES['img4'];
            $extension4 = explode('.', $img4['name']);
            $fileActExt4 = strtolower(end($extension4));
            $fileNew4 = "d_" . rand() . "." . $fileActExt4;
            $filePath4 = '../img/imgHerb/' . $fileNew4;

            if (in_array($fileActExt4, $allow)) {
                if ($img4['size'] > 0 && $img4['size'] < 5000000 && $img4['error'] == 0) {
                    move_uploaded_file($img4['tmp_name'], $filePath4);
                }
            }
        } else $fileNew4 = "loadimg.gif";

        if ($_FILES['img5']['name'] != "") {
            $img5 = $_FILES['img5'];
            $extension5 = explode('.', $img5['name']);
            $fileActExt5 = strtolower(end($extension5));
            $fileNew5 = "e_" . rand() . "." . $fileActExt5;
            $filePath5 = '../img/imgHerb/' . $fileNew5;

            if (in_array($fileActExt5, $allow)) {
                if ($img5['size'] > 0 && $img5['size'] < 5000000 && $img5['error'] == 0) {
                    move_uploaded_file($img5['tmp_name'], $filePath5);
                }
            }
        } else $fileNew5 = "loadimg.gif";

        if ($_FILES['img6']['name'] != "") {
            $img6 = $_FILES['img6'];
            $extension6 = explode('.', $img6['name']);
            $fileActExt6 = strtolower(end($extension6));
            $fileNew6 = "f_" . rand() . "." . $fileActExt6;
            $filePath6 = '../img/imgHerb/' . $fileNew6;

            if (in_array($fileActExt6, $allow)) {
                if ($img6['size'] > 0 && $img6['size'] < 5000000 && $img6['error'] == 0) {
                    move_uploaded_file($img6['tmp_name'], $filePath6);
                }
            }
        } else $fileNew6 = "loadimg.gif";

        /* echo "<pre> print_r($nameShow) </pre>"; */

        $pdosql = "INSERT INTO herbname (nameShow, herbImg, scienceName, familyHerb, commonName, localName) VALUES (:herb_name, :herbImg, :science_name, :fam, :com, :loca);";
        $pdosql .= "INSERT INTO detail(leaves, flower, fruit, haulm, rootHerb, propagating, feature) VALUES(:leaves, :flower, :fruit, :haulm, :rootHerb, :propagating, :feature);";
        $pdosql .= "INSERT INTO statuss(feature_leaves, feature_flower, feature_fruit, feature_haulm, feature_rootHerb) VALUES(:sw1, :sw2, :sw3, :sw4, :sw5);";
        $pdosql .= "INSERT INTO imgfeature(leavesx, flowerx, fruitx, haulmx, rootHerbx) VALUES(:leavesx, :flowerx, :fruitx, :haulmx, :rootHerbx);";

        $stmt = $conn->prepare($pdosql);
        $stmt->bindParam(':herb_name', $nameShow, PDO::PARAM_STR);
        $stmt->bindParam(":herbImg", $fileNew1);
        $stmt->bindParam(':science_name', $scienceName, PDO::PARAM_STR);
        $stmt->bindParam(':fam', $familyHerb, PDO::PARAM_STR);
        $stmt->bindParam(':com', $commonName, PDO::PARAM_STR);
        $stmt->bindParam(':loca', $localName, PDO::PARAM_STR);

        $stmt->bindParam(':leaves', $leaves, PDO::PARAM_STR);
        $stmt->bindParam(':flower', $flower, PDO::PARAM_STR);
        $stmt->bindParam(':fruit', $fruit, PDO::PARAM_STR);
        $stmt->bindParam(':haulm', $haulm, PDO::PARAM_STR);
        $stmt->bindParam(':rootHerb', $rootHerb, PDO::PARAM_STR);
        $stmt->bindParam(':propagating', $propagating, PDO::PARAM_STR);
        $stmt->bindParam(':feature', $feature, PDO::PARAM_STR);

        $stmt->bindParam(':sw1', $sw1, PDO::PARAM_BOOL);
        $stmt->bindParam(':sw2', $sw2, PDO::PARAM_BOOL);
        $stmt->bindParam(':sw3', $sw3, PDO::PARAM_BOOL);
        $stmt->bindParam(':sw4', $sw4, PDO::PARAM_BOOL);
        $stmt->bindParam(':sw5', $sw5, PDO::PARAM_BOOL);

        $stmt->bindParam(":leavesx", $fileNew2);
        $stmt->bindParam(":flowerx", $fileNew3);
        $stmt->bindParam(":fruitx", $fileNew4);
        $stmt->bindParam(":haulmx", $fileNew5);
        $stmt->bindParam(":rootHerbx", $fileNew6);

        $result = $stmt->execute();
        // sweet alert 
        if (isset($result)) {
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
            })
            </script>";
            header("refresh:1; url=index.php");
        } else {
            echo    "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'ไม่สามารถเพิ่มข้อมูลได้',
                            'error'
                        )
                    })
                    </script>";
            header("refresh:2; url=index.php");
        }
    }


    if ($_POST['action'] == "editherb") {
        $herbID = $_GET['herbID'];
        $nameShow = $_POST['herb_name'];
        $scienceName = $_POST['science_name'];
        $familyHerb = $_POST['family_herb'];
        $commonName = $_POST['common_name'];
        $localName = $_POST['local_name'];

        $leaves = $_POST['feature_leaves'];
        $flower = $_POST['feature_flower'];
        $fruit = $_POST['feature_fruit'];
        $haulm = $_POST['feature_haulm'];
        $rootHerb = $_POST['feature_rootHerb'];
        $propagating = $_POST['propagated'];
        $feature = $_POST['features'];

        $keep1 = $_POST['image1'];
        $keep2 = $_POST['image2'];
        $keep3 = $_POST['image3'];
        $keep4 = $_POST['image4'];
        $keep5 = $_POST['image5'];
        $keep6 = $_POST['image6'];

        if (isset($_POST['sw1'])) $sw1 = 1;
        else $sw1 = 0;
        if (isset($_POST['sw2'])) $sw2 = 1;
        else $sw2 = 0;
        if (isset($_POST['sw3'])) $sw3 = 1;
        else $sw3 = 0;
        if (isset($_POST['sw4'])) $sw4 = 1;
        else $sw4 = 0;
        if (isset($_POST['sw5'])) $sw5 = 1;
        else $sw5 = 0;

        $allow = array('jpg', 'jpeg', 'png');

        if ($_FILES['img1']['name'] != "") {
            $img1 = $_FILES['img1'];
            $extension1 = explode('.', $img1['name']);
            $fileActExt1 = strtolower(end($extension1));
            $fileNew1 = "a_" . rand() . "." . $fileActExt1;
            $filePath1 = '../img/imgHerb/' . $fileNew1;

            if (in_array($fileActExt1, $allow)) {
                if ($img1['size'] > 0 && $img1['size'] < 5000000 && $img1['error'] == 0) {
                    move_uploaded_file($img1['tmp_name'], $filePath1);
                }
            }
        } else $fileNew1 = $keep1;

        if ($_FILES['img2']['name'] != "") {
            $img2 = $_FILES['img2'];
            $extension2 = explode('.', $img2['name']);
            $fileActExt2 = strtolower(end($extension2));
            $fileNew2 = "b_" . rand() . "." . $fileActExt2;
            $filePath2 = '../img/imgHerb/' . $fileNew2;

            if (in_array($fileActExt2, $allow)) {
                if ($img2['size'] > 0 && $img2['size'] < 5000000 && $img2['error'] == 0) {
                    move_uploaded_file($img2['tmp_name'], $filePath2);
                }
            }
        } else $fileNew2 = $keep2;

        if ($_FILES['img3']['name'] != "") {
            $img3 = $_FILES['img3'];
            $extension3 = explode('.', $img3['name']);
            $fileActExt3 = strtolower(end($extension3));
            $fileNew3 = "c_" . rand() . "." . $fileActExt3;
            $filePath3 = '../img/imgHerb/' . $fileNew3;

            if (in_array($fileActExt3, $allow)) {
                if ($img3['size'] > 0 && $img3['size'] < 5000000 && $img3['error'] == 0) {
                    move_uploaded_file($img3['tmp_name'], $filePath3);
                }
            }
        } else $fileNew3 = $keep3;

        if ($_FILES['img4']['name'] != "") {
            $img4 = $_FILES['img4'];
            $extension4 = explode('.', $img4['name']);
            $fileActExt4 = strtolower(end($extension4));
            $fileNew4 = "d_" . rand() . "." . $fileActExt4;
            $filePath4 = '../img/imgHerb/' . $fileNew4;

            if (in_array($fileActExt4, $allow)) {
                if ($img4['size'] > 0 && $img4['size'] < 5000000 && $img4['error'] == 0) {
                    move_uploaded_file($img4['tmp_name'], $filePath4);
                }
            }
        } else $fileNew4 = $keep4;

        if ($_FILES['img5']['name'] != "") {
            $img5 = $_FILES['img5'];
            $extension5 = explode('.', $img5['name']);
            $fileActExt5 = strtolower(end($extension5));
            $fileNew5 = "e_" . rand() . "." . $fileActExt5;
            $filePath5 = '../img/imgHerb/' . $fileNew5;

            if (in_array($fileActExt5, $allow)) {
                if ($img5['size'] > 0 && $img5['size'] < 5000000 && $img5['error'] == 0) {
                    move_uploaded_file($img5['tmp_name'], $filePath5);
                }
            }
        } else $fileNew5 = $keep5;

        if ($_FILES['img6']['name'] != "") {
            $img6 = $_FILES['img6'];
            $extension6 = explode('.', $img6['name']);
            $fileActExt6 = strtolower(end($extension6));
            $fileNew6 = "f_" . rand() . "." . $fileActExt6;
            $filePath6 = '../img/imgHerb/' . $fileNew6;

            if (in_array($fileActExt6, $allow)) {
                if ($img6['size'] > 0 && $img6['size'] < 5000000 && $img6['error'] == 0) {
                    move_uploaded_file($img6['tmp_name'], $filePath6);
                }
            }
        } else $fileNew6 = $keep6;

        $stmt = $conn->prepare("UPDATE herbname SET nameShow=:herb_name, herbImg=:herbImg, scienceName=:scien, familyHerb=:fam, commonName=:com, localName=:loca WHERE herbID=:herbID;");
        $stmt->bindParam(':herbID', $herbID, PDO::PARAM_INT);
        $stmt->bindParam(':herb_name', $nameShow, PDO::PARAM_STR);
        $stmt->bindParam(':herbImg', $fileNew1, PDO::PARAM_STR);
        $stmt->bindParam(':scien', $scienceName, PDO::PARAM_STR);
        $stmt->bindParam(':fam', $familyHerb, PDO::PARAM_STR);
        $stmt->bindParam(':com', $commonName, PDO::PARAM_STR);
        $stmt->bindParam(':loca', $localName, PDO::PARAM_STR);
        $result1 = $stmt->execute();

        $stmt = $conn->prepare("UPDATE detail SET leaves=:leaves, flower=:flower, fruit=:fruit, haulm=:haulm, rootHerb=:roots, propagating=:pro, feature=:fea  WHERE herbID=:herbID;");
        $stmt->bindParam(':herbID', $herbID, PDO::PARAM_INT);
        $stmt->bindParam(':leaves', $leaves, PDO::PARAM_STR);
        $stmt->bindParam(':flower', $flower, PDO::PARAM_STR);
        $stmt->bindParam(':fruit', $fruit, PDO::PARAM_STR);
        $stmt->bindParam(':haulm', $haulm, PDO::PARAM_STR);
        $stmt->bindParam(':roots', $rootHerb, PDO::PARAM_STR);
        $stmt->bindParam(':pro', $propagating, PDO::PARAM_STR);
        $stmt->bindParam(':fea', $feature, PDO::PARAM_STR);
        $result2 = $stmt->execute();
        
        $stmt = $conn->prepare("UPDATE statuss SET feature_leaves=:fele, feature_flower=:feflo, feature_fruit=:fefru, feature_haulm=:fehau, feature_rootHerb=:fero WHERE herbID=:herbID;");
        $stmt->bindParam(':herbID', $herbID, PDO::PARAM_INT);
        $stmt->bindParam(':fele', $sw1, PDO::PARAM_BOOL);
        $stmt->bindParam(':feflo', $sw2, PDO::PARAM_BOOL);
        $stmt->bindParam(':fefru', $sw3, PDO::PARAM_BOOL);
        $stmt->bindParam(':fehau', $sw4, PDO::PARAM_BOOL);
        $stmt->bindParam(':fero', $sw5, PDO::PARAM_BOOL);
        $result3 = $stmt->execute();

        $stmt = $conn->prepare("UPDATE  imgfeature SET leavesx=:leavesx, flowerx=:flox, fruitx=:frux, haulmx=:haux, rootHerbx=:rootx WHERE herbID=:herbID;");
        $stmt->bindParam(':herbID', $herbID, PDO::PARAM_INT);
        $stmt->bindParam(':leavesx', $fileNew2, PDO::PARAM_STR);
        $stmt->bindParam(':flox', $fileNew3, PDO::PARAM_STR);
        $stmt->bindParam(':frux', $fileNew4, PDO::PARAM_STR);
        $stmt->bindParam(':haux', $fileNew5, PDO::PARAM_STR);
        $stmt->bindParam(':rootx', $fileNew6, PDO::PARAM_STR);
        $result4 = $stmt->execute();

        if (!$result1 || !$result2 || !$result3 || !$result4) {
            echo    "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'ไม่สามารถแก้ไขข้อมูลได้',
                            'error'
                        )
                    })
                    </script>";
            header("refresh:2; url=index.php");
        } else {
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'แก้ไขสำเร็จ!!',
                    showConfirmButton: false,
                    timer: 1500
                  })
            })
            </script>";
            header("refresh:1; url=index.php");
        }
    }

    

    $conn = null; //close connect db

} else {
    exit(header("Location: ../dev/index.php"));
}
?>