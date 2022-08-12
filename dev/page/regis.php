<?php
if (isset($_SESSION['adid'])) {
    $adID = $_SESSION['adid'];
    $stmt = $conn->prepare("SELECT * FROM accountpm WHERE addminID=$adID");
    $stmt->execute();
    $regis = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php if (!isset($_SESSION['admin_login'])) { ?>
    <div class="row">
        <main class="d-flex mx-auto col-lg-5 col-md-12">
            <?php if (isset($_GET['page']) && $_GET['page'] == 'regis') : ?>
                <form action="./action.php" method="post" enctype="multipart/form-data" class="was-validated shadow px-1">
                    <input type="hidden" name="action" value="register">
                    <div class="">
                        <div class="row col-12 mx-auto was-validated">
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label mt-1">อีเมล</label>
                                <input type="text" class="form-control is-valid mb-1" name="email_regis" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="ourherb@gmail.com" required>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label mt-1">รหัสผ่าน</label>
                                <input type="password" class="form-control is-valid mb-1" name="pass_regis" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  placeholder="Aa1234!" required>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label mt-1">ชื่อ</label>
                                <input type="text" class="form-control is-valid mb-1" name="name_regis" placeholder="สมศรี" required>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label mt-1">นามสกุล</label>
                                <input type="text" class="form-control is-valid mb-1" name="last_regis" placeholder="มีนา" required>
                            </div>

                            <div class="col-12 px-2">
                                <label class="form-label mt-1">รหัสนักศึกษา</label>
                                <input type="text" class="form-control is-valid mb-1" name="idstd_regis" placeholder="11623046xxxx-x" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success col-12  my-3" >บันทึก</button>

                    </div>

                </form>
            <?php endif; ?>
        </main>
    </div>
    <?php } else if (isset($_SESSION['admin_login'])) {
    if (isset($_GET['page']) && $_GET['page'] == 'edit_regis') : ?>
        <div class="row">
            <nav id="sidebar" class="col-md-12 col-lg-2 d-lg-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <?php
                        if (isset($_SESSION['admin_login'])) { ?>
                            <li class="nav-item">
                                <span class="ms-3"> <?php echo $_SESSION['admin_login']; ?></span>
                            </li>
                        <?php }  ?>

                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="index.php"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="ml-2"> รายการช้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?page=feedback"><i class="fa-regular fa-comment"></i><span class="ml-2"> ข้อเสนอและความพึงพอใจ</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?page=edit_regis"><i class="fa-regular fa-edit"></i><span class="ml-2"> แก้ไขข้อมูลโปรไฟล์</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="../index.php"><i class="fa-solid fa-user-group"></i><span class="ml-2"> เว็บแอปผู้ใช้งานทั่วไป</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-12 col-md-12 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php">รายการข้อมูลสมุนไพร</a></li>
                        <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลโปรไฟล์</li>
                    </ol>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <main class="d-flex mx-auto col-lg-6 col-md-12">
                            <?php if (isset($_GET['page']) && $_GET['page'] == 'edit_regis') : ?>
                                <form action="./action.php" method="post" enctype="multipart/form-data" class="was-validated shadow px-1">
                                    <input type="hidden" name="action" value="edit_regis">
                                    <input type="hidden" name="adid" value="<?= $adID ?>">
                                    <div class="row col-12 mx-auto was-validated">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label mt-1">อีเมล</label>
                                            <input type="text" class="form-control is-valid mb-1" name="email_regis" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="ourherb@gmail.com" value="<?= $regis['Email'] ?>" required>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label mt-1">รหัสผ่าน</label>
                                            <input type="password" class="form-control is-valid mb-1" name="pass_regis" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Aa1234!" value="<?= $regis['pass'] ?>" required>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label mt-1">ชื่อ</label>
                                            <input type="text" class="form-control is-valid mb-1" name="name_regis" placeholder="สมศรี" value="<?= $regis['nameStd'] ?>" required>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label mt-1">นามสกุล</label>
                                            <input type="text" class="form-control is-valid mb-1" name="last_regis" placeholder="มีนา" value="<?= $regis['surnameStd'] ?>" required>
                                        </div>

                                        <div class="col-12 px-2">
                                            <label class="form-label mt-1">รหัสนักศึกษา</label>
                                            <input type="text" class="form-control is-valid mb-1" name="idstd_regis" placeholder="11623046xxxx-x" value="<?= $regis['idStd'] ?>" required>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-success col-12  my-3"  >บันทึก</button>


                                </form>

                            <?php endif; ?>
                        </main>
                    </div>

                </div>
            </main>
        </div>

<?php endif;
}  ?>