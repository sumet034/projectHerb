<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php 
        if (isset($_POST['btn_login'])) {
            $user = $_POST['login'];
            $pass = $_POST['password'];
        }
    ?>
                <form action="login.php" method="post">
                <div class="col-4 mx-auto">
                    <label for="logins" class=" control-label">อีเมล</label>
                    <input type="text" class="form-control" id="logins" name="login" placeholder="ใส่อีเมลของคุณ"required>
                    <div class="invalid-feedback" for="logins">กรุณาใส่อีเมลของคุณก่อน</div>
                </div>

                <div class="col-4 mx-auto">
                    <label for="pass" class=" control-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="ใส่รหัสผ่านของคุณ"required>
                    <div class="invalid-feedback" for="pass">กรุณาใส่รหัสผ่านของคุณก่อน</div>
                </div>

                <div class="form-group">
                    <div class="col-4 mx-auto mt-3">
                        <input type="submit" name="btn_login" class="btn btn-success" style="width: 100%;" value="ล็อคอินข้าสุ่ระบบ">
                    </div>
                </div>
                </form>
</body>
</html>