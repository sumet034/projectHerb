<?php
require_once('dev/db.php');
session_start();
if (isset($_GET['herbID'])) {
    $stmt = $conn->prepare("SELECT * FROM herbname WHERE herbID=?");
    $stmt->execute([$_GET['herbID']]);
    $name = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT * FROM detail WHERE herbID=?");
    $stmt->execute([$_GET['herbID']]);
    $de = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT * FROM statuss WHERE herbID=?");
    $stmt->execute([$_GET['herbID']]);
    $tus = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tus['feature_leaves'] == 1) $chk1 = "checked";
    else $chk1 = '';
    if ($tus['feature_flower'] == 1) $chk2 = "checked";
    else $chk2 = '';
    if ($tus['feature_fruit'] == 1) $chk3 = "checked";
    else $chk3 = '';
    if ($tus['feature_haulm'] == 1) $chk4 = "checked";
    else $chk4 = '';
    if ($tus['feature_rootHerb'] == 1) $chk5 = "checked";
    else $chk5 = '';

    $stmt = $conn->prepare("SELECT * FROM imgfeature WHERE herbID=?");
    $stmt->execute([$_GET['herbID']]);
    $fe = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['q']) && $_GET['q'] != '') {

    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $q = "%{$_GET['q']}%";
    //คิวรี่ข้อมูลมาแสดงจากการค้นหา
    $stmt = $conn->prepare("SELECT * FROM herbname WHERE  commonName  LIKE '$q' or scienceName LIKE '$q' or nameShow LIKE '$q' or familyHerb LIKE '$q' or localName LIKE '$q' order by nameShow asc ;");
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (!$result) {
        $_SESSION['search'] = "error";
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM herbname order by nameShow asc");
    $stmt->execute();
    $result = $stmt->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR HERB | รายการช้อมูลสมุนไพร</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./bootstrap/css/style.css">
</head>

<body>

    <div class="container-fulid bg-light">
        <div class="container">
            <nav class="navbar navbar-light p-2">
                <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap  justify-content-between">
                    <a href="index.php"><img src="./img/web/LOGO_ourherb.png" alt="logoOURHERB" width="45%" height="100%"></a>
                    <!-- <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <form action="" class=" d-flex" method="get">
                        <input class="form-control form-control-dark" type="search" placeholder="Search" name="q">
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

            </nav>
        </div>
    </div>

    <!-- Header-->
    <header class="bg-success py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h2 class="text-white">แอปพลิเคชันค้นหาชื่อสมุนไพรไทยด้วยการประมวลผลภาพ</h2>
                <p>Application for searching Thai herbs Using Image Processing</p>
            </div>
        </div>
    </header>
    <!-- Section-->

    <section class="py-3">
        <?php if (isset($_SESSION['search'])) { ?>
            <div class="comtainer">
                <center class="bg-warning fs-2 pt-3 pb-2 col-12 col-md-8 mx-auto my-3 shadow">ไม่พบข้อมูล</center>
            </div>
        <?php unset($_SESSION['search']);
        } ?>

        <div class="container">
            <?php

            if (!isset($_GET['herbID'])) { ?>
                <div class="row g-2 row-cols-1 row-cols-sm-2 row-cols-lg-5 justify-content-center">
                    <?php
                    foreach ($result as $row) {
                    ?>
                        <div class="col-md-3">
                            <div class="card-sl">
                                <div class="card-size">
                                    <div class="card-image">
                                        <img src="./img/imgHerb/<?php echo $row['herbImg']; ?> " />
                                    </div>
                                </div>
                                <div class="px200">
                                    <div class="card-heading">
                                        <?php echo $row['nameShow']; ?>
                                    </div>
                                    <div class="card-text">
                                        <?php echo $row['commonName']; ?>
                                    </div>
                                </div>
                                <a href="index.php?herbID=<?php echo $row['herbID']; ?>" class="card-button">
                                    ดูข้อมูลเพิ่มเติม</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else if (isset($_GET['herbID'])) {
                require_once('./seemore.php');
            } ?>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-success">
        <div class="container">
            <p class="m-1 text-center text-white">Copyright &copy;
                โครงงานแอปพลิเคชันค้นหาชื่อสมุนไพรไทยด้วยการประมวลผลภาพ</p>
        </div>
    </footer>
    <a onclick="document.getElementById('feedherb').style.display='block'">
        <div class="d-flex flex-row-reverse me-5 me-sm-0 fixed-bottom">
            <div class="feedbox shadow" data-bs-toggle="modal" data-bs-target="#feedmodal">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fa-regular fa-comment-dots feedfix"></i>
                    </div>
                    <div class="flex-grow-1 ms-3 feedfont">
                        ข้อเสนอแนะ
                    </div>
                </div>
            </div>
        </div>
    </a>

    <div id="feedherb" class="modal">
        <form action="../herb/dev/action.php" method="post" enctype="multipart/form-data" class="form-horizontal my-5 modal-content">
            <input type="hidden" name="action" value="imageFeed">
            <div class="text-center mx-auto d-block mt-5">
                <span onclick="document.getElementById('feedherb').style.display='none'" class="close mt-1" title="Close Modal">&times;</span>
                <img src="img/web/ourherb150.png" alt="Avatar" width="90%" height="90%">
            </div>
            <div class="col-10 mx-auto">
                <label for="feedtxt" class="form-label mt-2">ข้อเสนอแนะและความพึงพอใจต่อการใช้งาน</label>
                <textarea class="form-control" name="feedtxt" rows="3" placeholder="แสดงความคิดเห็น"></textarea>
            </div>
            <div class="col-10 mx-auto">
                <label for="password" class="form-label mt-2">ประเมินความพึงพอใจ</label>
                <input class="rating rating--nojs" max="5" min="0" step="1" type="range" value="3" name="ratestar">
            </div>

            <div class="col-10 mx-auto">
                <label for="imgfeed" class="form-label ">รูปภาพประกอบ</label>
                <input type="file" class="form-control" name="imgfeed" id="imgfeed">
            </div>

            <div class="col-10 mx-auto">
                <img class="rounded mx-auto d-block px-2" id="feedpreview"> <br>
            </div>

            <div class="form-group">
                <div class="col-10 mx-auto mt-3 mb-5">
                    <input type="submit" name="btn_login" class="btn btn-success" style="width: 100%;" value="บันทึก">
                </div>
            </div>
        </form>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/bootstrap/js/script.js"></script>
</body>

</html>