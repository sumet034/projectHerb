<?php 
    
    require_once('./db.php');

    session_start();

    if (isset($_POST['btn_login'])) {
        
        $email = $_POST['login']; 
        $password = $_POST['password']; 
        
       
            
        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if ($email AND $password ) {
            try {
                $stmt = $conn->prepare("SELECT Email, pass, nameStd, surnameStd, idStd, role FROM accountpm WHERE Email = :uemail AND pass = :upassword ");
                $stmt->bindParam(":uemail", $email);
                $stmt->bindParam(":upassword", $password);
                
                $stmt->execute(); 

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbemail = $row['Email'];
                    $dbpassword = $row['pass'];
                    $dbrole = $row['role'];
                    $dbnameUser = $row['nameStd']." ".$row['surnameStd'] ." ".$row['idStd'];

                }
                if ($email != null AND $password != null) {
                    if ($stmt->rowCount() > 0) {
                        if ($email == $dbemail AND $password == $dbpassword ) {
                            switch($dbrole) {
                                case 'admin':
                                    $_SESSION['admin_login'] = $dbnameUser;
                                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                                    header("location: ./index.php");
                                break;
                                case 'employee':
                                    $_SESSION['employee_login'] = $email;
                                    $_SESSION['success'] = "Employee... Successfully Login...";
                                    header("location: employee/employee_page.php");
                                break;
                                case 'user':
                                    $_SESSION['user_login'] = $email;
                                    $_SESSION['success'] = "User... Successfully Login...";
                                    header("location: user/user_page.php");
                                break;
                                default:
                                    $_SESSION['error'] = "อีเมลหรือรหัสผ่านผิดพลาด";
                                    sleep(0.15);
                                    header("location: index.php");
                            }
                        }
                    } else {
                        $_SESSION['error'] = "อีเมลหรือรหัสผ่านผิดพลาด ";
                        header("location: index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>