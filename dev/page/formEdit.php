<?php



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
                    <a class="nav-link text-dark" aria-current="page" href="index.php"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="ml-2"> รายการช้อมูลสมุนไพร</span></a>
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
                <li class="breadcrumb-item active" aria-current="page">การจัดการข้อมูลสมุนไพร</li>
            </ol>
        </nav>

        <?php if (isset($_GET['action']) && $_GET['action'] == 'createHerb') : ?>
            <form action="./action.php" method="post" enctype="multipart/form-data" class="was-validated">
                <input type="hidden" name="action" value="createHerb">

                <div class="d-flex  flex-wrap flex-lg-nowrap ">
                    <div class="row g-0">
                        <div class="col-lg-12 pe-2">
                            <img class="rounded mx-auto d-block size-imgShow px-2" id="previewImg"> <br>
                            <label for="imgShow" class="form-label ">รูปของพืชสมุนไพร</label>
                            <input type="file" class="form-control img-herb" id="imgInput" name="img1" required>
                            <div class="invalid-feedback" for="imgShows">กรุณาเพิ่มรูปภาพพืชสมุนไพร</div>
                        </div>
                    </div>

                    <div class="col-lg-9 mx-2">
                        <div class="row col-12 col-md-12 col-lg-12">
                            <h2>เพิ่มพืชสมุนไพร</h2>
                            <label for="herb_name" class="form-label mt-1">ชื่อพืชสมุนไพร</label>
                            <textarea class="form-control is-valid n-herb" name="herb_name" rows="1" id="herb_name_invalid" placeholder="ชื่อพืชสมุนไพร" required></textarea>
                            <!-- <div id="herb_name_invalid" class="invalid-feedback">
                                กรุณากรอกชื่อพืชสมุนไพร
                            </div> -->

                            <label for="science_name" class="form-label mt-1">ชื่อวิทยาศาสตร์พืชสมุนไพร</label>
                            <textarea class="form-control" name="science_name" rows="1" placeholder="ชื่อวิทยาศาสตร์พืชสมุนไพร"></textarea>
                            <label for="family_herb" class="form-label mt-1">วงศ์พืชสมุนไพร</label>
                            <textarea class="form-control" name="family_herb" rows="1" placeholder="วงศ์พืชสมุนไพร"></textarea>
                            <label for="common_name" class="form-label mt-1">ชื่อสามัญพืชสมุนไพร</label>
                            <textarea class="form-control input-sm " name="common_name" rows="1" placeholder="ชื่อสามัญพืชสมุนไพร"></textarea>
                            <label for="local_name" class="form-label mt-1">ชื่อท้องถิ่นพืชสมุนไพร</label>
                            <textarea class="form-control input-sm " name="local_name" rows="1" placeholder="ชื่อท้องถิ่นพืชสมุนไพร"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 ">
                    <h1><i class="fa-solid fa-leaf"></i> ลักษณะพฤกษศาสตร์พืชสมุนไพร</h1>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="leaves" class="free">
                            <h3 class="mx-3 ">ลักษณะของใบสมุนไพร</h3>
                            <img id="pre_leaves" class="rounded mx-auto d-block"> <br>
                            <input type="file" name="img2" id="img2" class="form-control mt-1">
                            <label for="feature_leaves" class="form-label mt-3">ลักษณะของใบสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw1">
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของใบสมุนไพร</label>
                            </div>
                            <textarea name="feature_leaves" class="form-control mb-2" rows="4" placeholder="ลักษณะของใบสมุนไพร"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="flower" class="free">
                            <h3 class="mx-3 ">ลักษณะของดอกสมุนไพร</h3>
                            <img id="pre_flowerx" class="rounded mx-auto d-block" > <br>
                            <input type="file" name="img3" id="img3" class="form-control mt-1">
                            <label for="feature_flower" class="form-label mt-3">ลักษณะของดอกสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw2">
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของดอกสมุนไพร</label>
                            </div>
                            <textarea name="feature_flower" class="form-control mb-2" rows="4" placeholder="ลักษณะของดอกสมุนไพร"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="fruit" class="free">
                            <h3 class="mx-3 ">ลักษณะของผลสมุนไพร</h3>
                            <img id="pre_fruitx" class="rounded mx-auto d-block" > <br>
                            <input type="file" name="img4" id="img4" class="form-control mt-1">
                            <label for="feature_fruit" class="form-label mt-3">ลักษณะของผลสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw3">
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของผลสมุนไพร</label>
                            </div>
                            <textarea name="feature_fruit" class="form-control mb-2" rows="4" placeholder="ลักษณะของผลสมุนไพร"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="haulm" class="free">
                            <h3 class="mx-3 ">ลักษณะของลำต้นสมุนไพร</h3>
                            <img id="pre_haulmx" class="rounded mx-auto d-block" > <br>
                            <input type="file" name="img5" id="img5" class="form-control mt-1">
                            <label for="feature_haulm" class="form-label mt-3">ลักษณะของลำต้นสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw4">
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของลำต้นสมุนไพร</label>
                            </div>
                            <textarea name="feature_haulm" class="form-control mb-2" rows="4" placeholder="ลักษณะของลำต้นสมุนไพร"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="rootHerb" class="free">
                            <h3 class="mx-3 ">ลักษณะของรากสมุนไพร</h3>
                            <img id="pre_rootHerbx" class="rounded mx-auto d-block" > <br>
                            <input type="file" name="img6" id="img6" class="form-control mt-1">
                            <label for="feature_rootHerb" class="form-label mt-3">ลักษณะของรากสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw5">
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของรากสมุนไพร</label>
                            </div>
                            <textarea name="feature_rootHerb" class="form-control mb-2" rows="4" placeholder="ลักษณะของรากสมุนไพร"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <h2><i class="fa-brands fa-envira"></i> การเพราะปลูกและการขยายพันธุ์</h2>
                        <div class="bg-details">
                            <textarea name="propagated" class="form-control input-sm " type="textarea" rows="4" placeholder="การเพราะปลูกและการขยายพันธุ์"></textarea>
                        </div>
                        <h2><i class="fa-brands fa-envira"></i> สรรพคุณของพืชสมุนไพร</h2>
                        <div class="bg-details">
                            <textarea name="features" class="form-control input-sm " type="textarea" rows="4" placeholder="สรรพคุณของพืชสมุนไพร"></textarea>
                        </div>
                    </div>
                    <hr>
                </div>
                <button type="submit" class="btn btn-success mt-2 d-grid gap-2 col-12 col-md-5 mx-auto fixed-bottom">บันทึก</button>
            </form><?php endif; ?>

        <?php if (isset($_GET['herbID']) && $_GET['herbID'] > '0') : ?>
            <form action="./action.php?herbID=<?php echo $_GET['herbID']; ?>" method="post" enctype="multipart/form-data" class="was-validated">
                <input type="hidden" name="action" value="editherb">
                <div class="d-flex  flex-wrap flex-lg-nowrap">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-11">
                            <label for="imgShow" class="form-label ">รูปของพืชสมุนไพร</label>
                            <img id="previewImg" src="../img/imgHerb/<?= $name['herbImg']; ?>" alt="<?= $name['herbImg']; ?>" class="rounded mx-auto d-block size-imgShow px-2"> <br>
                            <input type="hidden" name="image1" id="imgInput2" value="<?= $name['herbImg']; ?>">
                            <input type="file" name="img1" id="imgInput" class="form-control ">
                            <div class="invalid-feedback">กรุณาเพิ่มรูปภาพพืชสมุนไพร</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-9 mx-2">
                        <div class="row col-12 col-md-12 col-lg-12">
                            <h3 class="text-center ">herbID : <span class="badge bg-info"><?php echo $_GET['herbID']; ?></span></h3>
                            <h2>แก้ไขข้อมูลสมุนไพร</h2>
                            <label for="herb_name" class="form-label mt-1">ชื่อพืชสมุนไพร</label>
                            <textarea class="form-control is-valid n-herb" name="herb_name" rows="1" placeholder="ชื่อพืชสมุนไพร" required><?= $name['nameShow']; ?></textarea>
                            <label for="science_name" class="form-label mt-1">ชื่อวิทยาศาสตร์พืชสมุนไพร</label>
                            <textarea class="form-control" name="science_name" rows="1" placeholder="ชื่อวิทยาศาสตร์พืชสมุนไพร"><?= $name['scienceName']; ?></textarea>
                            <label for="family_herb" class="form-label mt-1">วงศ์พืชสมุนไพร</label>
                            <textarea class="form-control" name="family_herb" rows="1" placeholder="วงศ์พืชสมุนไพร"><?= $name['familyHerb']; ?></textarea>
                            <label for="common_name" class="form-label mt-1">ชื่อสามัญพืชสมุนไพร</label>
                            <textarea class="form-control input-sm " name="common_name" rows="1" placeholder="ชื่อสามัญพืชสมุนไพร"><?= $name['commonName']; ?></textarea>
                            <label for="local_name" class="form-label mt-1">ชื่อท้องถิ่นพืชสมุนไพร</label>
                            <textarea class="form-control input-sm " name="local_name" rows="1" placeholder="ชื่อท้องถิ่นพืชสมุนไพร"><?= $name['localName']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <h1><i class="fa-solid fa-leaf"></i> ลักษณะพฤกษศาสตร์พืชสมุนไพร</h1>
                    <hr>
                    <div class="col-12 my-2">

                        <div id="leaves" class="free">
                            <h3 class="mx-3 ">ลักษณะของใบสมุนไพร</h3>
                            <img id="pre_leaves" src="../img/imgHerb/<?= $fe['leavesx']; ?>" class="rounded mx-auto d-block"  alt="ลักษณะของใบสมุนไพร"> <br>
                            <input type="hidden" name="image2" value="<?= $fe['leavesx'] ?>">
                            <input type="file" name="img2" id="img2" class="form-control mt-1">
                            <label for="feature_leaves" class="form-label mt-3">ลักษณะของใบสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw1" <?= $chk1 ?>>
                                <label class="form-check-label" for="feature_leaves">แสดงลักษณะของใบสมุนไพร</label>
                            </div>
                            <textarea name="feature_leaves" class="form-control mb-2" rows="4" placeholder="ลักษณะของใบสมุนไพร"><?= $de['leaves']; ?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="flower" class="free">
                            <h3 class="mx-3 ">ลักษณะของดอกสมุนไพร</h3>
                            <img id="pre_flowerx" src="../img/imgHerb/<?= $fe['flowerx']; ?>" class="rounded mx-auto d-block"  alt="ลักษณะของรากสมุนไพร"> <br>
                            <input type="hidden" name="image3" value="<?= $fe['flowerx'] ?>">
                            <input type="file" name="img3" id="img3" class="form-control mt-1">
                            <label for="feature_flower" class="form-label mt-3">ลักษณะของดอกสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw2" <?= $chk2 ?>>
                                <label class="form-check-label" for="feature_flower">แสดงลักษณะของดอกสมุนไพร</label>
                            </div>
                            <textarea name="feature_flower" class="form-control mb-2" rows="4" placeholder="ลักษณะของดอกสมุนไพร"><?= $de['flower']; ?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">

                        <div id="fruit" class="free">
                            <h3 class="mx-3 ">ลักษณะของผลสมุนไพร</h3>
                            <img id="pre_fruitx" src="../img/imgHerb/<?= $fe['fruitx']; ?>" class="rounded mx-auto d-block"  alt="ลักษณะของผลสมุนไพร"> <br>
                            <input type="hidden" name="image4" value="<?= $fe['fruitx'] ?>">
                            <input type="file" name="img4" id="img4" class="form-control mt-1">
                            <label for="feature_fruit" class="form-label mt-3">ลักษณะของผลสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw3" <?= $chk3 ?>>
                                <label class="form-check-label" for="feature_fruit">แสดงลักษณะของผลสมุนไพร</label>
                            </div>
                            <textarea name="feature_fruit" class="form-control mb-2" rows="4" placeholder="ลักษณะของผลสมุนไพร"><?= $de['fruit']; ?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">

                        <div id="haulm" class="free">
                            <h3 class="mx-3 ">ลักษณะของลำต้นสมุนไพร</h3>
                            <img id="pre_haulmx" src="../img/imgHerb/<?= $fe['haulmx']; ?>" class="rounded mx-auto d-block"  alt="ลักษณะของลำต้นสมุนไพร"> <br>
                            <input type="hidden" name="image5" value="<?= $fe['haulmx'] ?>">
                            <input type="file" name="img5" id="img5" class="form-control mt-1">
                            <label for="feature_haulm" class="form-label mt-3">ลักษณะของลำต้นสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw4" <?= $chk4 ?>>
                                <label class="form-check-label" for="feature_haulm">แสดงลักษณะของลำต้นสมุนไพร</label>
                            </div>
                            <textarea name="feature_haulm" class="form-control mb-2" rows="4" placeholder="ลักษณะของลำต้นสมุนไพร"><?= $de['haulm']; ?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <div id="rootHerb" class="free">
                            <h3 class="mx-3 ">ลักษณะของรากสมุนไพร</h3>
                            <img id="pre_rootHerbx" src="../img/imgHerb/<?= $fe['rootHerbx']; ?>" class="rounded mx-auto d-block" alt="ลักษณะของรากสมุนไพร"> <br>
                            <input type="hidden" name="image6" value="<?= $fe['rootHerbx'] ?>">
                            <input type="file" name="img6" id="img6" class="form-control mt-1">
                            <label for="feature_rootHerb" class="form-label mt-3">ลักษณะของรากสมุนไพร</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="sw5" <?= $chk5 ?>>
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของรากสมุนไพร</label>
                            </div>
                            <textarea name="feature_rootHerb" class="form-control mb-2" rows="4" placeholder="ลักษณะของรากสมุนไพร"><?= $de['rootHerb']; ?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-2">
                        <h2><i class="fa-brands fa-envira"></i> การเพราะปลูกและการขยายพันธุ์</h2>
                        <div class="bg-details">
                            <textarea name="propagated" class="form-control input-sm " type="textarea" rows="4" placeholder="การเพราะปลูกและการขยายพันธุ์"><?= $de['propagating']; ?></textarea>
                        </div>
                        <h2><i class="fa-brands fa-envira"></i> สรรพคุณของพืชสมุนไพร</h2>
                        <div class="bg-details">
                            <textarea name="features" class="form-control input-sm " type="textarea" rows="4" placeholder="สรรพคุณของพืชสมุนไพร"><?= $de['feature']; ?></textarea>
                        </div>
                    </div>
                    <hr>
                </div>
                <button type="submit" class="btn btn-success mt-2 d-grid gap-2 col-12 col-md-5 mx-auto fixed-bottom">บันทึก</button>
            </form> <?php endif; ?>


    </main>
</div>