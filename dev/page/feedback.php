<?php
$stmt = $conn->prepare("SELECT* FROM rateStar");
$stmt->execute();
$rate = $stmt->fetch(PDO::FETCH_ASSOC);
//ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
if ($stmt->rowCount() < 1) {
    header('Location: ../dev/index.php');
}

$ratefive = $rate['ratefive'];
$ratefour = $rate['ratefour'];
$ratethree = $rate['ratethree'];
$ratetwo = $rate['ratetwo'];
$rateone = $rate['rateone'];
$rateSum = (($ratefive * 5) + ($ratefour * 4) + ($ratethree * 3) + ($ratetwo * 2) + ($rateone * 1)) / ($ratefive + $ratefour + $ratethree + $ratetwo + $rateone);
?>
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
                    <a class="nav-link text-dark" href="index.php"><i class="fa-regular fa-comment"></i><span class="ml-2"> ข้อเสนอและความพึงพอใจ</span></a>
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
                <li class="breadcrumb-item active" aria-current="page">ข้อเสนอและความพึงพอใจ</li>
            </ol>
        </nav>
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="cards col-12 col-lg-6 mx-auto">
                    <h3 class="card-titles">ความพึงพอใจ</h3>
                    <div class="card-rating">
                        <div class="ratings">
                            <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
                            <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
                            <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
                            <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
                            <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star2.svg" alt="">
                        </div>
                        <div class="card-rating-text"><?= number_format($rateSum, 1); ?> จาก 5</div>
                    </div>
                    <p class="rating-count">คะแนนความพึงพอใจทั้งหมด</p>
                    <div class="rating-percents">
                        <div class="rating-percent" style="--ratefive: <?= $ratefive ?>%;">
                            <span class="rating-no">5 ดาว</span>
                            <div class="rating-progress"></div>
                            <span class="rating-percent-no"><?= $ratefive ?></span>
                        </div>
                        <div class="rating-percent" style="--ratefour: <?= $ratefour ?>%;">
                            <span class="rating-no">4 ดาว</span>
                            <div class="rating-progress"></div>
                            <span class="rating-percent-no"><?= $ratefour ?></span>
                        </div>
                        <div class="rating-percent" style="--ratethree: <?= $ratethree ?>%;">
                            <span class="rating-no">3 ดาว</span>
                            <div class="rating-progress"></div>
                            <span class="rating-percent-no"><?= $ratethree ?></span>
                        </div>
                        <div class="rating-percent" style="--ratetwo: <?= $ratetwo ?>%;">
                            <span class="rating-no">2 ดาว</span>
                            <div class="rating-progress"></div>
                            <span class="rating-percent-no"><?= $ratetwo ?></span>
                        </div>
                        <div class="rating-percent" style="--rateone: <?= $rateone ?>%;">
                            <span class="rating-no">1 ดาว</span>
                            <div class="rating-progress"></div>
                            <span class="rating-percent-no"><?= $rateone ?></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                <div class="container">
                    <div class="row ">
                        <?php
                        //คิวรี่ข้อมูลมาแสดงในตาราง
                        $stmt = $conn->prepare("SELECT* FROM feedHerb order by feedID desc");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                            $feed = $row['feedStar'];
                            if ($feed == 5) {
                                $feed = "ดีเยี่ยม";
                            } elseif ($feed == 4) {
                                $feed = "ดีมาก";
                            } elseif ($feed == 3) {
                                $feed = "ปานกลาง";
                            } elseif ($feed == 3) {
                                $feed = "พอใช้";
                            } elseif ($feed == 1 || $feed == 0) {
                                $feed = "ปรับปรุง";
                            }
                        ?>
                            <div class="d-flex  flex-wrap flex-lg-nowrap bg-777 border border-1 shadow g-3">
                                <div class="row g-0">
                                    <div class="col-lg-12 pe-2">
                                        <div class="sizeimgfeed">
                                            <img width="100%"  data-img="<?= $row['feedImg']; ?>" src="../../../herb/img/imgFeed/<?= $row['feedImg']; ?>" class="rounded" alt="รูป <?= $row['feedImg']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9 mx-2 ">
                                    <div class="row col-12 col-md-12 col-lg-12">
                                        <div class="px-3">
                                            <h5>เวลา <?= $row['time_at']; ?></h4>
                                                <p>ความพึงพอใจ <?= $feed ?></p>
                                        </div>
                                        <p class="px-3"><?= $row['feedTxt']; ?></p>
                                        <span class="link-success p-3" id="feedImg" data-feed="<?= $row['feedImg']; ?>"><i class="fa-regular fa-image"></i> ดูรูปภาพ</span>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>


                    </div>
                </div>
            </div>

        </div>



    </main>
</div>