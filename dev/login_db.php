<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

require_once('./db.php');

session_start();

if (isset($_POST['btn_login'])) {
    $email = $_POST['login'];
    $password = $_POST['password'];
    if (empty($email)) {
        $_SESSION['warning'] = "กรุณาการอกข้อมูลให้ครบถ้วน";
        echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'กรุณาการอกข้อมูลให้ครบถ้วน',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                              document.location.href = 'index.php';
                            }
                        })
                    })
                    </script>";
    } else if (empty($password)) {
        $_SESSION['warning'] = "กรุณาการอกข้อมูลให้ครบถ้วน";
        echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เกิดข้อผิดพลาด',
                            'กรุณาการอกข้อมูลให้ครบถ้วน',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                              document.location.href = 'index.php';
                            }
                        })
                    })
                    </script>";
    } else if ($email and $password) {
        try {
            $stmt = $conn->prepare("SELECT addminID, Email, pass, nameStd, surnameStd, idStd, role FROM accountpm WHERE Email = :uemail AND pass = :upassword ");
            $stmt->bindParam(":uemail", $email);
            $stmt->bindParam(":upassword", $password);

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $dbemail = $row['Email'];
                $dbpassword = $row['pass'];
                $dbrole = $row['role'];
                $dbnameUser = $row['nameStd'] . " " . $row['surnameStd'] . " " . $row['idStd'];
                $adId = $row['addminID'];
            }
            if ($email != null and $password != null) {
                if ($stmt->rowCount() > 0) {
                    if ($email == $dbemail and $password == $dbpassword) {
                        switch ($dbrole) {
                            case 'admin':
                                $_SESSION['admin_login'] = $dbnameUser;
                                $_SESSION['success'] = "เข้าสู่ระบบ";
                                $_SESSION['adid'] = $adId;
                                echo "<script>
                                        $(document).ready(function() {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'เข้าสู่ระบบ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        })
                                        </script>";
                                header("refresh:2; url=index.php");
                                break;
                            case 'employee':
                                $_SESSION['employee_login'] = $email;
                                $_SESSION['success'] = "พนักงานเข้าสู่ระบบ";
                                header("location: employee/employee_page.php");
                                break;
                            case 'user':
                                $_SESSION['user_login'] = $email;
                                $_SESSION['success'] = "ผู้ใช้เข้าสู่ระบบ";
                                header("location: user/user_page.php");
                                break;
                            default:
                                $_SESSION['warning'] = "อีเมลหรือรหัสผ่านผิดพลาด";
                                echo "<script>
                                        $(document).ready(function() {
                                            Swal.fire(
                                                'เกิดข้อผิดพลาด',
                                                'อีเมลหรือรหัสผ่านผิดพลาด!!',
                                                'info'
                                            ).then((result) => {
                                                if (result.isConfirmed) {
                                                  document.location.href = 'index.php';
                                                }
                                              })
                                        })
                                        </script>";
                        }
                    }
                } else {
                    $_SESSION['error'] = "ไม่มีข้ออมูลผู้ใช้ในระบบ";
                    echo "<script>
                                $(document).ready(function() {
                                    Swal.fire(
                                        'เกิดข้อผิดพลาด',
                                        'ไม่มีช้อมูลผู้ใช้ในระบบ',
                                        'error'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
                                          document.location.href = 'index.php';
                                        }
                                    })
                                })
                                </script>";
                }
            } /* if (isset($_SESSION['success'])){
                    unset($_SESSION['success']);
                    header("location: ./index.php");
                } */
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>