<?php
$fea1 = $tus['feature_leaves'];
$fea2 = $tus['feature_flower'];
$fea3 = $tus['feature_fruit'];
$fea4 = $tus['feature_haulm'];
$fea5 = $tus['feature_rootHerb'];

$nameShow = $name['nameShow'];
$scienceName = $name['scienceName'];
$familyHerb = $name['familyHerb'];
$commonName = $name['commonName'];
$localName = $name['localName'];
if ($nameShow == "") {
    $nameShow = "ไม่พบข้อมูล";
}
if ($scienceName == "") {
    $scienceName = "ไม่พบข้อมูล";
}
if ($familyHerb == "") {
    $familyHerb = "ไม่พบข้อมูล";
}
if ($commonName == "") {
    $commonName = "ไม่พบข้อมูล";
}
if ($localName == "") {
    $localName = "ไม่พบข้อมูล";
}

$leaves = $de['leaves'];
$flower = $de['flower'];
$fruit = $de['fruit'];
$haulm = $de['haulm'];
$rootHerb = $de['rootHerb'];

if ($leaves == "") {
    $leaves = "ไม่พบข้อมูล";
}
if ($flower == "") {
    $flower = "ไม่พบข้อมูล";
}
if ($fruit == "") {
    $fruit = "ไม่พบข้อมูล";
}
if ($haulm == "") {
    $haulm = "ไม่พบข้อมูล";
}
if ($rootHerb == "") {
    $rootHerb = "ไม่พบข้อมูล";
}


$propagating = $de['propagating'];
$feature = $de['feature'];

if ($propagating == "") {
    $propagating = "ไม่พบข้อมูล";
}
if ($feature == "") {
    $feature = "ไม่พบข้อมูล";
}

$showimg = $name['herbImg'];

$leavesx = $fe['leavesx'];
$flowerx = $fe['flowerx'];
$fruitx = $fe['fruitx'];
$haulmx = $fe['haulmx'];
$rootHerbx = $fe['rootHerbx'];

?>
<div class="row">
    <main class="col-md-9 ml-sm-auto col-lg-10 px-auto py-4 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">รายการข้อมูลสมุนไพร</a></li>
                <li class="breadcrumb-item active " aria-current="page"><?= $nameShow ?></li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <img width="60%" src="./img/imgHerb/<?= $name['herbImg']; ?>" alt="รูปใบ <?= $nameShow ?>" class="rounded mx-auto d-block shadow"> <br>
                </div>
            </div>

            <div class="col-12  mx-2">
                <div class="row col-12  mx-2">
                    <!-- <p >ชื่อพืชสมุนไพร <?= $name['nameShow']; ?></p> -->
                    <p class="b">ชื่อวิทยาศาสตร์พืชสมุนไพร <span class="n"><?= $scienceName ?></span></p>
                    <p class="b">วงศ์พืชสมุนไพร <span class="n"><?= $familyHerb ?></span></p>
                    <p class="b">ชื่อสามัญพืชสมุนไพร <span class="n"><?= $commonName ?></span></p>
                    <p class="b">ชื่อท้องถิ่นพืชสมุนไพร <span class="n"><?= $localName ?></span></p>
                </div>
            </div>
        </div>

        <div class="row mt-5 ">
            <h1 class="b"><i class="fa-brands fa-pagelines"></i> ลักษณะพฤกษศาสตร์พืชสมุนไพร</h1>
            <hr>
            <?php if ($fea1 == 1) { ?>
                <div class="col-12 my-2">
                    <?php if($leavesx != "loadimg.gif"){ ?>
                    <div class="row">
                        <div class="col-12">
                            <img width="60%" src="./img/imgHerb/<?= $fe['leavesx']; ?>" alt="รูปใบ <?= $nameShow ?>" class="rounded mx-auto d-block shadow"> <br>
                        </div>
                    </div>
                    <?php }?>
                    <div id="leaves" class="free">
                        <h3 class="me-1 b">ลักษณะของใบสมุนไพร</h3>
                        <p><?= $leaves ?></p>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <?php if ($fea2 == 1) { ?>
                <div class="col-12 my-2">
                    <?php if($flowerx != "loadimg.gif"){ ?>
                    <div class="row">
                        <div class="col-12">
                            <img width="60%" src="./img/imgHerb/<?= $fe['flowerx']; ?>" alt="รูปดอก <?= $nameShow ?>" class="rounded mx-auto d-block shadow"> <br>
                        </div>
                    </div>
                    <?php }?>
                    <div id="flower" class="free">
                        <h3 class="me-1 b">ลักษณะของดอกสมุนไพร</h3>
                        <p> <?= $flower ?></p>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <?php if ($fea3 == 1) { ?>
                <div class="col-12 my-2">
                    <?php if($fruitx != "loadimg.gif"){ ?>
                    <div class="row">
                        <div class="col-12">
                            <img width="60%" src="./img/imgHerb/<?= $fe['fruitx']; ?>" alt="รูปผล <?= $nameShow ?>" class="rounded mx-auto d-block shadow"> <br>
                        </div>
                    </div>
                    <?php }?>
                    <div id="fruit" class="free">
                        <h3 class="me-1 b">ลักษณะของผลสมุนไพร</h3>
                        <p> <?= $fruit ?></p>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <?php if ($fea4 == 1) { ?>
                <div class="col-12 my-2">
                <?php if($haulmx != "loadimg.gif"){ ?>
                    <div class="row">
                        <div class="col-12">
                            <img width="60%" src="./img/imgHerb/<?= $fe['haulmx']; ?>" alt="รูปลำต้น <?= $nameShow ?>" class="rounded mx-auto d-block shadow"> <br>
                        </div>
                    </div>
                    <?php }?>
                    <div id="haulm" class="free">
                        <h3 class="me-1 b">ลักษณะของลำต้นสมุนไพร</h3>
                        <p> <?= $haulm ?></p>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <?php if ($fea5 == 1) { ?>
                <div class="col-12 my-2">
                <?php if($rootHerbx != "loadimg.gif"){ ?>
                    <div class="row">
                        <div class="col-12">
                            <img width="60%" src="./img/imgHerb/<?= $fe['rootHerbx']; ?>" alt="รูปราก <?= $nameShow ?>" class="rounded mx-auto d-block shadow"> <br>
                        </div>
                    </div>
                    <?php }?>
                    <div id="rootHerb" class="free">
                        <h3 class="me-1 b">ลักษณะของรากสมุนไพร</h3>
                        <p> <?= $rootHerb ?></p>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <div class="col-12 my-2">
                <h2><i class="fa-brands fa-envira b"></i> การเพาะปลูกและการขยายพันธุ์</h2>
                <div class="bg-details">
                    <p><?= $propagating ?></p>
                </div>
                <h2><i class="fa-brands fa-envira b"></i> สรรพคุณของพืชสมุนไพร</h2>
                <div class="bg-details">
                    <p><?= $feature ?></p>
                </div>
            </div>
            <hr>
        </div>
    </main>
</div>