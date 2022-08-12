<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    require_once('./db.php');
    session_start();
    session_destroy();
    $conn = null;
    echo "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'ออกจากระบบแล้ว!!',
                showConfirmButton: false,
                timer: 1500
              })
        })
        </script>";
    header("refresh:2; url=index.php");
?>


