<?php
require_once('./db.php');
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



?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR HERB | Management</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-12 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between imglogo">
            <a href="index.php"><img src="../img/web/LOGO_ourherb.png" alt="logoOURHERB" width="45%" height="100%"></a>
            <button class="navbar-toggler d-lg-none collapsed mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <?php
        if (isset($_SESSION['admin_login'])) { ?>
            <div class="col-12 col-md-5 col-lg-1 d-flex align-items-center justify-content-sm-center mt-3 me-lg-3 mt-md-0 mx-sm-auto ">
                <a href="./logout.php" class="btn btn-secondary ">ออกจากระบบ</a>
            </div>
        <?php }  ?>

        <?php
        if (!isset($_SESSION['admin_login'])) { ?>
            <div class="col-12 col-md-5 col-lg-2 d-flex align-items-center justify-content-sm-center mt-3 mt-md-0">
                <span class="mx-2">โปรดล็อคอินเข้าสู่ระบบ</span>
                <a onclick="document.getElementById('formloginHerb').style.display='block'" class="btn bg-btn-herb mx-1">เข้าสู่ระบบ</a>
            </div>
        <?php }  ?>
        <div id="formloginHerb" class="modal">
            <form action="../dev/login_db.php" method="post" class="form-horizontal my-5 modal-content">
                <div class="text-center mx-auto d-block mt-5">
                    <span onclick="document.getElementById('formloginHerb').style.display='none'" class="close mt-1" title="Close Modal">&times;</span>
                    <img src="../img/web/ourherb150.png" alt="Avatar" width="90%" height="90%">
                </div>
                <div class="col-10 mx-auto">
                    <label for="email" class="form-label mt-2">อีเมล</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="login" placeholder="ใส่อีเมลของคุณ">
                    </div>
                </div>
                <div class="col-10 mx-auto">
                    <label for="password" class="form-label mt-2">รหัสผ่าน</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="ใส่รหัสผ่านของคุณ">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-10 mx-auto mt-3 mb-5">
                        <input type="submit" name="btn_login" class="btn btn-success" style="width: 100%;" value="เข้าสู่ระบบ">
                        <a href="index.php?page=regis" name="btn_regis" class="btn btn-warning mt-2" style="width: 100%;">สมัครสมาชิก</a>
                    </div>
                </div>
            </form>
        </div>

    </nav>
    <div class="container-fluid">
        <!-- Button trigger modal -->
        <?php if (!isset($_SESSION['admin_login'])) {
            if (isset($_GET['page']) && $_GET['page'] == 'regis') { ?>
                <center>
                    <h1 class="fontlogin bg-lighr text-dark rounded-pill my-5 p-4 shadow">สมัครสมาชิก</h1>
                </center>
            <?php } else { ?>
                <center>
                    <h1 class="fontlogin bg-danger rounded-pill my-5 text-white p-4 shadow">ล็อคอินก่อนใช้งาน</h1>
                </center>
            <?php } ?>

        <?php } ?>

        <?php if (isset($_SESSION['warning'])) : echo "<script>";
            $errorMsg = $_SESSION['warning'];
            echo "Swal.fire(
                '$errorMsg',
                '',
                'warning'
                )";
            echo "</script>";
            unset($_SESSION['warning']);
        endif ?>
        <?php if (isset($_SESSION['error'])) : echo "<script>";
            $errorMsg = $_SESSION['error'];
            echo "Swal.fire(
                '$errorMsg',
                '',
                'error'
                )";
            echo "</script>";
            unset($_SESSION['error']);
        endif ?>

        <?php
        if (isset($_SESSION['admin_login'])) {
            if (isset($_GET['herbID'])) {
                require_once('../dev//page/formEdit.php');
            } else if (isset($_GET['action']) && $_GET['action'] == 'createHerb') {
                require_once('../dev/page/formEdit.php');
            } else if (isset($_GET['page']) && $_GET['page'] == 'feedback') {
                require_once('../dev/page/feedback.php');
            } else if (isset($_GET['page']) && $_GET['page'] == 'edit_regis') {
                require_once('../dev/page/regis.php');
            } else {
                require_once('../dev/page/listedit.php');
            }
        } else if (isset($_GET['page']) && $_GET['page'] == 'regis') {
            require_once('../dev/page/regis.php');
        }
        ?>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="../bootstrap/js//script.js"></script>
</body>

</html>