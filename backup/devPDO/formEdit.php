<?php require_once('../dev/db.php');
if (isset($_GET['herbID'])) {
    $stmt = $conn->prepare("SELECT* FROM herbname WHERE herbID=?");
    $stmt->execute([$_GET['herbID']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
    if ($stmt->rowCount() < 1) {
        header('Location: ../dev/index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR HERB | Edit</title>
    <link rel="stylesheet" href="../bootstrap/css/font.css">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    
</head>

<body>


<?php require_once('../dev/db.php');?>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <img src="../img/web/LOGO_ourherb.png" alt="logoOURHERB"  width="45%" height="45%">
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        

        <?php
        if (isset($_SESSION['admin_login'])) { ?>
        <div class="col-12 col-md-5 col-lg-3 d-flex align-items-center justify-content-sm-center mt-3 mt-md-0">
            <span>ยินดีตอนรับ <?php echo $_SESSION['admin_login'];?></span>
            <a href="./logout.php" class="btn btn-secondary mx-1">ออกจากระบบ</a>   
        </div>
            
        <?php }  ?>
        

        
        <?php
        if (!isset($_SESSION['admin_login'])) { ?>
        <div class="col-12 col-md-5 col-lg-2 d-flex align-items-center justify-content-sm-center mt-3 mt-md-0">
        <span class="mx-2">โปรดล็อคอินเข้าสู่ระบบ</span>
            <a  onclick="document.getElementById('formloginHerb').style.display='block'" class="btn bg-btn-herb mx-1">เข้าสู่ระบบ</a>  
        </div>
            
        <?php }  ?> 

       <div id="formloginHerb" class="modal">
            <form action="../dev/login_db.php" method="post" class="form-horizontal my-5 modal-content">
                <div class="text-center mx-auto d-block mt-5">
                    <span onclick="document.getElementById('formloginHerb').style.display='none'" class="close mt-1" title="Close Modal">&times;</span>
                    <img src="../img/web/ourherb150.png" alt="Avatar"  width="90%" height="90%">
                </div>
                
                <div class="col-10 mx-auto">
                <label for="email" class="form-label">อีเมล</label>
                    <input type="text" class="form-control" name="login"  required placeholder="ใส่อีเมลของคุณ">
                </div>

                <div class="col-10 mx-auto">
                <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="password"  required placeholder="ใส่รหัสผ่านของคุณ">
                </div>

                

                <div class="form-group">
                    <div class="col-10 mx-auto mt-3 mb-5">
                        <input type="submit" name="btn_login" class="btn btn-success" style="width: 100%;" value="Login">
                    </div>
                </div>

               

            </form>
        </div>
        
    </nav>
    <div class="container-fluid">
    
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="#"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="ml-2"> รายการช้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="ml-2"> การจัดการข้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i><span class="ml-2"> ข้อเสนอและความพึงพอใจ</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php">รายการข้อสมุนไพร</a></li>
                        <li class="breadcrumb-item active" aria-current="page">การจัดการข้อมูลสมุนไพร</li>
                    </ol>
                </nav>
                
                <?php if (isset($_GET['action']) && $_GET['action'] == 'createHerb') : ?>
            <form action="./action.php" method="post">
                    <input type="hidden" name="action" value="createHerb">

                <div class="d-flex  flex-wrap flex-sm-column flex-md-row">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://via.placeholder.com/345x345" alt="" srcset="" class="rounded mx-auto d-block"> <br>
                            <label for="imgShow" class="form-label ">รูปภาพรวมสมุนไพร</label>
                            <input type="file" name="Myfile" class="form-control " aria-label="imgShow">
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-9 mx-2">
                        <div class="row col-12 col-md-6 col-lg-12 mx-2">
                            <h2>เพิ่มข้อมูลสมุนไพร</h2>
                            <label for="herb_name" class="form-label">ชื่อพืชสมุนไพร</label>
                            <textarea class="form-control is-invalid"  name="herb_name" rows="1" placeholder="ชื่อพืชสมุนไพร" ></textarea>
                            <label for="science_name" class="form-label">ชื่อวิทยาศาสตร์พืชสมุนไพร</label>
                            <textarea class="form-control"  name="science_name" rows="1" placeholder="ชื่อวิทยาศาสตร์พืชสมุนไพร"></textarea>
                            <label for="family_herb" class="form-label">วงศ์พืชสมุนไพร</label>
                            <textarea class="form-control"  name="family_herb" rows="1" placeholder="วงศ์พืชสมุนไพร"></textarea>
                            <label for="common_name" class="form-label">ชื่อสามัญพืชสมุนไพร</label>
                            <textarea class="form-control input-sm "  name="common_name" rows="1" placeholder="ชื่อสามัญพืชสมุนไพร"></textarea>
                            <label for="local_name" class="form-label">ชื่อท้องถิ่นพืชสมุนไพร</label>
                            <textarea class="form-control input-sm "  name="local_name" rows="1" placeholder="ชื่อท้องถิ่นพืชสมุนไพร"></textarea>
                        </div>
                    </div>
                </div>
                 
                <div class="row mt-5 ">
                    <h1><i class="fa fa-envira" aria-hidden="true"></i> ลักษณะพฤกษศาสตร์พืชสมุนไพร</h1><hr>
                        <div class="col-12 my-2">
                            <div id="leaves" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของใบสมุนไพร"> <br>
                                <h3 class="mx-3 ">ลักษณะของใบสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_leaves" class="form-label mt-3">ลักษณะของใบสมุนไพร</label>
                                <textarea name="feature_leaves" class="form-control mb-2" rows="4" placeholder="ลักษณะของใบสมุนไพร"></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div id="flower" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของดอกสมุนไพร"> <br>
                                <h3 class="mx-3 ">ลักษณะของดอกสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_flower" class="form-label mt-3">ลักษณะของดอกสมุนไพร</label>
                                <textarea name="feature_flower" class="form-control mb-2" rows="4" placeholder="ลักษณะของดอกสมุนไพร"></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div id="fruit" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของผลสมุนไพร"> <br>
                                <h3 class="mx-3 ">ลักษณะของผลสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_fruit" class="form-label mt-3">ลักษณะของผลสมุนไพร</label>
                                <textarea name="feature_fruit" class="form-control mb-2" rows="4" placeholder="ลักษณะของผลสมุนไพร"></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div id="haulm" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของลำต้นสมุนไพร"><br>
                                <h3 class="mx-3 ">ลักษณะของลำต้นสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_haulm" class="form-label mt-3">ลักษณะของลำต้นสมุนไพร</label>
                                <textarea name="feature_haulm" class="form-control mb-2" rows="4" placeholder="ลักษณะของลำต้นสมุนไพร"></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div id="rootHerb" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของรากสมุนไพร"><br>
                                <h3 class="mx-3 ">ลักษณะของรากสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_rootHerb" class="form-label mt-3">ลักษณะของรากสมุนไพร</label>
                                <textarea name="feature_rootHerb" class="form-control mb-2" rows="4" placeholder="ลักษณะของรากสมุนไพร"></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <h2><i class="fa fa-envira" aria-hidden="true"></i> การเพราะปลูกและการขยายพันธุ์</h2>
                            <div class="bg-details">
                                <textarea name="propagated" class="form-control input-sm " type="textarea" rows="4" placeholder="การเพราะปลูกและการขยายพันธุ์"></textarea>
                            </div>
                            <h2><i class="fa fa-envira" aria-hidden="true"></i> สรรพคุณของพืชสมุนไพร</h2>
                            <div class="bg-details">
                                <textarea name="features" class="form-control input-sm " type="textarea" rows="4" placeholder="สรรพคุณของพืชสมุนไพร"></textarea>
                            </div>
                        </div><hr>
                </div> 
                    <button type="submit" class="btn btn-success mt-2 d-grid gap-2 col-6 mx-auto">บันทึก</button>
            </form><?php endif; ?>

            <?php if (isset($_GET['herbID']) && $_GET['herbID'] > '0') : ?>
                <form action="./action.php?herbID=<?php echo $_GET['herbID']; ?>" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="action" value="editherb">
                <div class="d-flex  flex-wrap flex-sm-column flex-md-row">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://via.placeholder.com/345x345" alt="" srcset="" class="rounded mx-auto d-block"> <br>
                            <label for="imgShow" class="form-label ">รูปภาพรวมสมุนไพร</label>
                            <input type="file" name="Myfile" class="form-control " aria-label="imgShow">
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-9 mx-2">
                        <div class="row col-12 col-md-6 col-lg-12 mx-2">
                       
                            <h3 class="text-center ">herbID : <span class="badge bg-info"><?php echo $_GET['herbID']; ?></span></h3>
                            <h2>แก้ไขข้อมูลสมุนไพร</h2>  
                            <label for="herb_name" class="form-label">ชื่อพืชสมุนไพร</label>
                            <textarea class="form-control is-invalid"  name="herb_name" rows="1" placeholder="ชื่อพืชสมุนไพร"><?=$row['nameShow'];?></textarea>
                            <label for="science_name" class="form-label">ชื่อวิทยาศาสตร์พืชสมุนไพร</label>
                            <textarea class="form-control"  name="science_name" rows="1" placeholder="ชื่อวิทยาศาสตร์พืชสมุนไพร"><?=$row['scienceName'];?></textarea>
                            <label for="family_herb" class="form-label">วงศ์พืชสมุนไพร</label>
                            <textarea class="form-control"  name="family_herb" rows="1" placeholder="วงศ์พืชสมุนไพร"><?=$row['familyHerb'];?></textarea>
                            <label for="common_name" class="form-label">ชื่อสามัญพืชสมุนไพร</label>
                            <textarea class="form-control input-sm "  name="common_name" rows="1" placeholder="ชื่อสามัญพืชสมุนไพร"><?=$row['commonName'];?></textarea>
                            <label for="local_name" class="form-label">ชื่อท้องถิ่นพืชสมุนไพร</label>
                            <textarea class="form-control input-sm "  name="local_name" rows="1" placeholder="ชื่อท้องถิ่นพืชสมุนไพร"><?=$row['localName'];?></textarea>
                        </div>
                    </div>
                </div>
                 
                <div class="row mt-5 ">
                    <h1><i class="fa fa-envira" aria-hidden="true"></i> ลักษณะพฤกษศาสตร์พืชสมุนไพร</h1><hr>  
                        <div class="col-12 my-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="feature_leaves" onclick="show_feature(0)" checked>
                                <label class="form-check-label" for="feature_leaves">แสดงลักษณะของใบสมุนไพร</label>
                            </div>
                            <div id="leaves" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของใบสมุนไพร"> <br>
                                <h3 class="mx-3 ">ลักษณะของใบสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_leaves" class="form-label mt-3">ลักษณะของใบสมุนไพร</label>
                                <textarea name="feature_leaves" class="form-control mb-2" rows="4" placeholder="ลักษณะของใบสมุนไพร"><?=$row['leaves'];?></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="feature_flower" onclick="show_feature(1)" checked>
                                <label class="form-check-label" for="feature_flower">แสดงลักษณะของดอกสมุนไพร</label>
                            </div>
                            <div id="flower" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของดอกสมุนไพร"> <br>
                                <h3 class="mx-3 ">ลักษณะของดอกสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_flower" class="form-label mt-3">ลักษณะของดอกสมุนไพร</label>
                                <textarea name="feature_flower" class="form-control mb-2" rows="4" placeholder="ลักษณะของดอกสมุนไพร"><?=$row['flower'];?></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="feature_fruit" onclick="show_feature(2)" checked>
                                <label class="form-check-label" for="feature_fruit">แสดงลักษณะของผลสมุนไพร</label>
                            </div>
                            <div id="fruit" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของผลสมุนไพร"> <br>
                                <h3 class="mx-3 ">ลักษณะของผลสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_fruit" class="form-label mt-3">ลักษณะของผลสมุนไพร</label>
                                <textarea name="feature_fruit" class="form-control mb-2" rows="4" placeholder="ลักษณะของผลสมุนไพร"><?=$row['fruit'];?></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="feature_haulm" onclick="show_feature(3)" checked>
                                <label class="form-check-label" for="feature_haulm">แสดงลักษณะของลำต้นสมุนไพร</label>
                            </div>
                            <div id="haulm" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของลำต้นสมุนไพร"><br>
                                <h3 class="mx-3 ">ลักษณะของลำต้นสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_haulm" class="form-label mt-3">ลักษณะของลำต้นสมุนไพร</label>
                                <textarea name="feature_haulm" class="form-control mb-2" rows="4" placeholder="ลักษณะของลำต้นสมุนไพร"><?=$row['haulm'];?></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="feature_rootHerb" onclick="show_feature(4)" checked>
                                <label class="form-check-label" for="feature_rootHerb">แสดงลักษณะของรากสมุนไพร</label>
                            </div>
                            <div id="rootHerb" class="free">
                                <img src="https://via.placeholder.com/345x345" class="rounded mx-auto d-block" alt="ลักษณะของรากสมุนไพร"><br>
                                <h3 class="mx-3 ">ลักษณะของรากสมุนไพร</h3>
                                <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                                <label for="feature_rootHerb" class="form-label mt-3">ลักษณะของรากสมุนไพร</label>
                                <textarea name="feature_rootHerb" class="form-control mb-2" rows="4" placeholder="ลักษณะของรากสมุนไพร"><?=$row['rootHerb'];?></textarea>
                            </div>
                        </div><hr>
                        <div class="col-12 my-2">
                            <h2><i class="fa fa-envira" aria-hidden="true"></i> การเพราะปลูกและการขยายพันธุ์</h2>
                            <div class="bg-details">
                                <textarea name="propagated" class="form-control input-sm " type="textarea" rows="4" placeholder="การเพราะปลูกและการขยายพันธุ์"><?=$row['propagating'];?></textarea>
                            </div>
                            <h2><i class="fa fa-envira" aria-hidden="true"></i> สรรพคุณของพืชสมุนไพร</h2>
                            <div class="bg-details">
                                <textarea name="features" class="form-control input-sm " type="textarea" rows="4" placeholder="สรรพคุณของพืชสมุนไพร"><?=$row['feature'];?></textarea>
                            </div>
                        </div><hr>
                </div> 
                    <button type="submit" class="btn btn-success mt-2 d-grid gap-2 col-6 mx-auto">บันทึก</button>
            </form> <?php endif; ?>
                            


            </main>
        </div>
        
    </div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
        function show_feature(x) { //  leaves flower fruit haulm rootHerb
            var checkBox = document.getElementById("feature_leaves");
            var checkBox1 = document.getElementById("feature_flower");
            var checkBox2 = document.getElementById("feature_fruit");
            var checkBox3 = document.getElementById("feature_haulm");
            var checkBox4 = document.getElementById("feature_rootHerb");
            var text = document.getElementById("leaves");
            var text1 = document.getElementById("flower");
            var text2 = document.getElementById("fruit");
            var text3 = document.getElementById("haulm");
            var text4 = document.getElementById("rootHerb");

            switch (this.x = x) {
                case 0:
                    if (checkBox.checked == true) {
                        text.style.display = "block";
                    } else {
                        text.style.display = "none";
                    }
                    break;
                case 1:
                    if (checkBox1.checked == true) {
                        text1.style.display = "block";
                    } else {
                        text1.style.display = "none";
                    }
                    break;
                case 2:
                    if (checkBox2.checked == true) {
                        text2.style.display = "block";
                    } else {
                        text2.style.display = "none";
                    }
                    break;
                case 3:
                    if (checkBox3.checked == true) {
                        text3.style.display = "block";
                    } else {
                        text3.style.display = "none";
                    }
                    break;
                case 4:
                    if (checkBox4.checked == true) {
                        text4.style.display = "block";
                    } else {
                        text4.style.display = "none";
                    }
                    break;
                default:
                    if (confirm("เกิดข้อผิดพลาดบางอย่าง")) {
                        this.txt = "You pressed OK!";
                    } else {
                        this.txt = "You pressed Cancel!";
                    }

            }

            return x;
        }
    </script>

</body>

</html>