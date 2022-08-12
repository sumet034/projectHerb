<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR HERB | Edit</title>
    <link rel="stylesheet" href="../bootstrap/css/font.css">

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?php 
    include('../dev/db.php');
    include('../dev/edit.php');
  
    ?>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                OUR HERB
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-6">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class="col-12 col-md-5 col-lg-4 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    สุเมธ หงษ์นาค
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">116230462034-4</a></li>
                    <li><a class="dropdown-item" href="#">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="ml-2"> รายการช้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="ml-2"> การจัดการข้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i><span class="ml-2"> ข้อเสนอและความพึงพอใจ</span></a>
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
                <div class="d-flex flex-wrap flex-sm-column flex-md-row">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://via.placeholder.com/345x345" alt="" srcset="" class="rounded mx-auto d-block"> <br>
                            <label for="imgShow" class="form-label mt-2">รูปภาพรวมสมุนไพร</label>
                            <input type="file" name="Myfile" class="form-control mt-1" aria-label="imgShow">
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                        </div>
                    </div>
                    
                    <div class="row col-12 col-md-6 col-lg-8 mx-1">
                        <div class="col-12 col-md-6 col-lg-12">
                        <?php if(isset($_GET['action']) && $_GET['action'] == 'createHerb'):?> 
                            <form action="./action.php" method="post" >
                                <h2 >createHerb</h2>
                                <input type="hidden" name="action" value="createHerb">
                                <label for="science_name" class="form-label">ชื่อวิทยาศาสตร์พืชสมุนไพร</label>
                                <textarea class="form-control is-invalid" type="textarea" name="science_name" rows="1" placeholder="ชื่อวิทยาศาสตร์พืชสมุนไพร"></textarea>
                                <label for="family_herb" class="form-label">วงศ์พืชสมุนไพร</label>
                                <textarea class="form-control" type="textarea" name="family_herb" rows="1"  placeholder="วงศ์พืชสมุนไพร"></textarea>
                                <label for="common_name" class="form-label" >ชื่อสามัญพืชสมุนไพร</label>
                                <textarea class="form-control input-sm " type="textarea" name="common_name" rows="1" placeholder="ชื่อสามัญพืชสมุนไพร"></textarea>
                                <label for="local_name" class="form-label">ชื่อท้องถิ่นพืชสมุนไพร</label>
                                <textarea class="form-control input-sm " type="textarea" name="local_name"  rows="1"  placeholder="ชื่อท้องถิ่นพืชสมุนไพร"></textarea>
                                <button type="submit"class="btn btn-success mt-2">บันทึก</button>
                                <!-- <a href="" class="btn btn-success mt-2">บันทึกชื่อวิทยาศาสตร์พืชสมุนไพร</a> -->
                            </form>
                        <?php endif;?>    

                        <?php if(isset($_GET['herbID']) && $_GET['herbID'] > '0'):?> 
                            <h3 class="text-center">herbID : <?php echo $_GET['herbID'] ?> </h3>
                            <form action="./action.php?herbID=<?php echo $_GET['herbID'];?>" method="POST" >
                                <h2>editherb</h2>
                                <input type="hidden" name="action" value="editherb">    
                                <label for="science_name" class="form-label">ชื่อวิทยาศาสตร์พืชสมุนไพร</label>
                                <textarea class="form-control is-invalid" type="textarea" name="science_name" rows="1" placeholder="ชื่อวิทยาศาสตร์พืชสมุนไพร"><?php echo $science_name;?></textarea>
                                <label for="family_herb" class="form-label">วงศ์พืชสมุนไพร</label>
                                <textarea class="form-control" type="textarea" name="family_herb" rows="1" placeholder="วงศ์พืชสมุนไพร"><?php echo $family_herb;?></textarea>
                                <label for="common_name" class="form-label">ชื่อสามัญพืชสมุนไพร</label>
                                <textarea name="common_name" class="form-control" rows="1" placeholder="ชื่อสามัญพืชสมุนไพร"><?php echo $common_name;?></textarea>
                                <label for="local_name" class="form-label">ชื่อท้องถิ่นพืชสมุนไพร</label>
                                <textarea class="form-control input-sm " type="textarea" name="local_name" rows="1"  placeholder="ชื่อท้องถิ่นพืชสมุนไพร"><?php echo $local_name;?></textarea>
                                <button type="submit"class="btn btn-success mt-2" name="update">บันทึก</button>
                                <!-- <a href="./action.php?update=1" type="submit" class="btn btn-success mt-2">บันทึก</a> -->
                            </form>
                        <?php endif;?>     
                        </div>
                       <!--  <div class="col-12 col-md-6 col-lg-12">
                            <form action="action.php" method="post">
                                <input type="hidden" name="action" value="family_herb">
                                <label for="family_herb" class="form-label">วงศ์พืชสมุนไพร</label>
                                <textarea class="form-control" type="textarea" name="" placeholder="วงศ์พืชสมุนไพร"></textarea>
                                <button type="submit"class="btn btn-success mt-2">บันทึกวงศ์พืชสมุนไพร</button>
                                <a href="" class="btn btn-success mt-2">บันทึกวงศ์พืชสมุนไพร</a>
                            </form>
                        </div>
                        
                        <div class="col-12 col-md-6 col-lg-10">
                            <form action="action.php" method="post">
                                <input type="hidden" name="action" value="common_name">
                                <label for="common_name" class="form-label">ชื่อสามัญพืชสมุนไพร</label>
                                <textarea class="form-control input-sm " type="textarea" placeholder="ชื่อสามัญพืชสมุนไพร"></textarea>
                                <button type="submit"class="btn btn-success mt-2">บันทึกชื่อสามัญพืชสมุนไพร</button>
                                <a href="" class="btn btn-success mt-2">บันทึกชื่อสามัญพืชสมุนไพร</a>
                            </form>
                        </div>
                        
                        <div class="col-12 col-md-6 col-lg-10">
                            <form action="action.php" method="post">
                                <input type="hidden" name="action" value="local_name">
                                <label for="local_name" class="form-label">ชื่อท้องถิ่นพืชสมุนไพร</label>
                                <textarea class="form-control input-sm " type="textarea" placeholder="ชื่อท้องถิ่นพืชสมุนไพร"></textarea>
                                <button type="submit"class="btn btn-success mt-2">บันทึกชื่อท้องถิ่นพืชสมุนไพร</button>
                                <a href="" class="btn btn-success mt-2">บันทึกชื่อท้องถิ่นพืชสมุนไพร</a>
                            </form>
                        </div> -->
                    </div> 
                </div>
                

                <div class="herb-details">
                    <h1 class="fa fa-envira"> ลักษณะพฤกษศาสตร์พืชสมุนไพร</h1>
                    <div class="container-img">
                        <img src="https://via.placeholder.com/345x345" alt="" srcset="">
                        <input type="file" d="openfile" name="Myfile" class="form-control" aria-label="file example" i
                            required>
                    </div>

                    <div class="bg-details">
                        <h2>ใบ</h2>
                        <textarea class="form-control input-sm " type="textarea" placeholder="ใบ"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>

                    <div class="container-img">
                        <img src="https://via.placeholder.com/345x345" alt="" srcset="">
                        <button class="btn btn-success" type="browse">เลือกรูป</button>
                    </div>
                    <div class="bg-details">
                        <h2>ดอก</h2>
                        <textarea class="form-control input-sm " type="textarea" placeholder="ดอก"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>

                    <div class="container-img">
                        <img src="https://via.placeholder.com/345x345" alt="" srcset="">
                        <button class="btn btn-success" type="browse">เลือกรูป</button>
                    </div>
                    <div class="bg-details">
                        <h2>ผล</h2>
                        <textarea class="form-control input-sm " type="textarea" placeholder="ผล"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>

                    <div class="container-img">
                        <img src="https://via.placeholder.com/345x345" alt="" srcset="">
                        <button class="btn btn-success" type="browse">เลือกรูป</button>
                    </div>
                    <div class="bg-details">
                        <h2>ลำต้น</h2>
                        <textarea class="form-control input-sm " type="textarea" placeholder="ลำต้น"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>

                    <div class="container-img">
                        <img src="https://via.placeholder.com/345x345" alt="" srcset="">
                        <button class="btn btn-success" type="browse">เลือกรูป</button>
                    </div>
                    <div class="bg-details">
                        <h2>ราก</h2>
                        <textarea class="form-control input-sm " type="textarea" placeholder="ราก"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>

                    <h1 class="fa fa-envira"> การเพราะปลูกและการขยายพันธุ์</h1>
                    <div class="bg-details">
                        <textarea class="form-control input-sm " type="textarea"
                            placeholder="การเพราะปลูกและการขยายพันธุ์"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>

                    <h1 class="fa fa-envira"> สรรพคุณของพืชสมุนไพร</h1>
                    <div class="bg-details">
                        <textarea class="form-control input-sm " type="textarea"
                            placeholder="สรรพคุณของพืชสมุนไพร"></textarea>
                        <button class="btn btn-success" type="save">บันทึก</button>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000]
            ]
        }, {
            low: 0,
            showArea: true
        });
    </script>
</body>

</html>