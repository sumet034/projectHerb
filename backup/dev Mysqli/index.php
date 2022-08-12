<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR HERB | Managment</title>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font.css">

    <!-- <link rel="stylesheet" href="./css/adminstyle.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?php include('../dev/db.php');
     $sql = sprintf("SELECT * FROM herb WHERE herbname");
     $query = mysqli_query($conn,$sql); 
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
                            <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-list-alt"
                                    aria-hidden="true"></i><span class="ml-2"> รายการช้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span
                                    class="ml-2"> การจัดการข้อมูลสมุนไพร</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i><span
                                    class="ml-2"> ข้อเสนอและความพึงพอใจ</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="container-fluid">
                    <div class="col-12 col-md-8 col-lg-12 flex-wrap">
                        <div class="card">
                            <div class="card-header"><i class="fa fa-table "></i> รายการข้อสมุนไพร</div>
                            <div class="card-body">

                                <div class="col-12 d-flex justify-content-end">
                                    <a href="./formEdit.php?action=createHerb" class="btn btn-primary"><i class="fa fa-plus"
                                            aria-hidden="true"></i>เพิ่มข้อมูลสมุนไพร</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bg-secondary">
                                        <thead>
                                            <tr>
                                                <th scope="col">HerbID</th>
                                                <th scope="col">รูปภาพรวมสมุนไพร</th>
                                                <th scope="col">ชื่อวิทยาศาสตร์พืชสมุนไพร</th>
                                                <th scope="col">วงศ์พืชสมุนไพร</th>
                                                <th scope="col">ชื่อสามัญพืชสมุนไพร</th>
                                                <th scope="col">ชื่อท้องถิ่นพืชสมุนไพร</th>
                                                <th scope="col">การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM herbname";
                                            $result_tasks = mysqli_query($conn, $query);    
                                            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['herbID']; ?></th>
                                                <td><?php echo $row['herbImg']; ?></td>
                                                <td><?php echo $row['scienceName']; ?></td>
                                                <td><?php echo $row['familyHerb']; ?></td>
                                                <td><?php echo $row['commonName']; ?></td>
                                                <td><?php echo $row['localName']; ?></td>
                                                
                                                <td><a href="./formEdit.php?herbID=<?php echo $row['herbID'] ?>"  class="btn btn-sm btn-warning" type="edit"><i
                                                            class="fa fa-pencil " aria-hidden="true"></i> แก้ไข</a>
                                                    <a href="./delete.php?herbID=<?php echo $row['herbID']?>" class="btn btn-sm btn-danger" type="delete" >
                                                    <i class="fa fa-trash " aria-hidden="true"></i> ลบ</a>
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



            <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>