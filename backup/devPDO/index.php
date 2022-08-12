<?php
require_once('./db.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR HERB | Managment</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font.css">
    <link rel="stylesheet" href="../../herb/bootstrap/css/style.css">

    
    
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
                <div class="container-fluid">
                
                
                <?php
                if (isset($_SESSION['admin_login'])) { ?>
        
                    <div class="col-12 col-md-8 col-lg-12 flex-wrap">
                        <div class="card">
                            <div class="card-header"><i class="fa fa-table "></i> รายการข้อสมุนไพร</div>
                            <div class="card-body">

                                <div class="col-12 d-flex justify-content-end mb-2">
                                    <a href="./formEdit.php?action=createHerb" class="btn btn-primary"><i
                                            class="fa fa-plus" aria-hidden="true"></i>เพิ่มข้อมูลสมุนไพร</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bg-secondary table-hover my-2 align-middle" >
                                        <thead class="table-success">
                                            <tr >
                                                <th scope="col" class="herbid">HerbID</th>
                                                <th scope="col" class="nameherb">ชื่ออสมุนไพร</th>
                                                <th scope="col">ชื่อวิทยาศาสตร์พืชสมุนไพร</th>
                                                <th scope="col">วงศ์พืชสมุนไพร</th>
                                                <th scope="col">ชื่อสามัญพืชสมุนไพร</th>
                                                <th scope="col">ชื่อท้องถิ่นพืชสมุนไพร</th>
                                                <th scope="col">การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                            //คิวรี่ข้อมูลมาแสดงในตาราง
                                            $stmt = $conn->prepare("SELECT* FROM herbname");
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach($result as $row) {
                                            ?>
                                            <tr >
                                                <th scope="row"><?php echo $row['herbID']; ?></th>
                                                <td><?php echo $row['nameShow']; ?></td>
                                                <td><?php echo $row['scienceName']; ?></td>
                                                <td><?php echo $row['familyHerb']; ?></td>
                                                <td><?php echo $row['commonName']; ?></td>
                                                <td><?php echo $row['localName']; ?></td>

                                                <td><a href="./formEdit.php?herbID=<?php echo $row['herbID']?>"
                                                        class="btn btn-sm btn-warning" type="edit"><i
                                                            class="fa fa-pencil " aria-hidden="true"></i> แก้ไข</a>
                                                    <a href="./delete.php?herbID=<?php echo $row['herbID']?>"
                                                        class="btn btn-sm btn-danger mt-1 mx-1" type="delete">
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

                    <?php }  ?>                                
                </div>
            </main>

            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>                                    
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>                                    
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <script >
                var modal = document.getElementById('formloginHerb');

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                
                $(document).ready( function () {
                    $('#myTable').DataTable();
                });


                $.extend(true, $.fn.dataTable.defaults, {
                "language": {
                        "sProcessing": "กำลังดำเนินการ...",
                        "sLengthMenu": "แสดง_MENU_ แถว",
                        "sZeroRecords": "ไม่พบข้อมูล",
                        "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                        "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                        "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                        "sInfoPostFix": "",
                        "sSearch": "ค้นหา:",
                        "sUrl": "",
                        "oPaginate": {
                                        "sFirst": "เริ่มต้น",
                                        "sPrevious": "ก่อนหน้า",
                                        "sNext": "ถัดไป",
                                        "sLast": "สุดท้าย"
                        }
                }
            });
            $('.table').DataTable();
                
            </script>


</body>

</html>