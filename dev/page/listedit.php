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
                <li class="breadcrumb-item active" aria-current="page">รายการข้อมูลสมุนไพร</li>
            </ol>
        </nav>
        <div class="container-fluid">
            <div class="col-12 col-md-12 col-lg-12 flex-wrap">
                <div class="col-12 d-flex justify-content-end mb-2">
                    <a href="./index.php?action=createHerb" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>เพิ่มพืชสมุนไพร</a>
                </div>
                <div class="card">
                    <div class="card-header"><i class="fa fa-table "></i> รายการข้อสมุนไพร</div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="myTable" class="table table-striped table-bg-secondary table-hover my-2 align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">HerbID</th>
                                        <th scope="col">ชื่อสมุนไพร</th>
                                        <th class="d-mobile" scope="col">รูปสมุนไพร</th>
                                        <th class="d-tablet" scope="col">ชื่อวิทยาศาสตร์พืชสมุนไพร</th>
                                        <th class="d-tablet" scope="col">วงศ์พืชสมุนไพร</th>
                                        <th scope="col">การจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //คิวรี่ข้อมูลมาแสดงในตาราง

                                    $stmt = $conn->prepare("SELECT* FROM herbname");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach ($result as $row) {  
                                    ?>
                                        <tr>
                                            <th scope="row" width="8%"><?php echo $row['herbID']; ?></th>
                                            <td width="10%"><?php echo $row['nameShow']; ?></td>
                                            <td class="d-mobile" width="30%">
                                                <div class="sizeimg ">
                                                    <!-- <a href="../../../herb/img/imgHerb/<?= $row['herbImg']; ?>"> -->
                                                    <img width="100%" id="myImg" data-img="<?= $row['herbImg']; ?>" src="../../../herb/img/imgHerb/<?= $row['herbImg']; ?>" class="rounded" alt="รูป <?= $row['nameShow']; ?>">
                                                    <!-- </a> -->
                                                </div>
                                            </td>
                                            <td class="d-tablet" width="15%"><?php echo $row['scienceName']; ?></td>
                                            <td class="d-tablet" width="15%"><?php echo $row['familyHerb']; ?></td>

                                            <td width="20%"><a href="./index.php?herbID=<?php echo $row['herbID'] ?>" class="btn btn-sm btn-warning" type="edit" onclick="show_feature()"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
                                                <a data-id="<?= $row['herbID']; ?>" href="?delete=<?= $row['herbID']; ?>" class="btn btn-sm btn-danger mt-1 mx-1 delete-btn"><i class="fa fa-trash " aria-hidden="true"></i> ลบ</a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>