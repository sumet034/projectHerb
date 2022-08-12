<?php
include('../dev/db.php');
   
  $science_name = '';
  $family_herb = '';
  $common_name = '';
  $local_name = '';

if  (isset($_GET['herbID'])) {
  
  $herbID = $_GET['herbID'];
  $query = "SELECT * FROM herbname WHERE herbID=$herbID";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $science_name = $row['scienceName'];
    $family_herb = $row['familyHerb'];
    $common_name = $row['commonName'];
    $local_name = $row['localName'];
  }
}

/*if (isset($_POST['update'])) {
  
  $herbID = $_GET['herbID'];
  $science_name = $_POST['science_name'];
  $family_herb = $_POST['family_herb'];
  $common_name = $_POST['common_name'];
  $local_name = $_POST['local_name'];

  $query = "UPDATE herbname set scienceName = '$science_name', familyHerb = '$family_herb', commonName = '$common_name', localName = '$local_name' WHERE herbID=$herbID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../dev/index.php');
}

*/



/*<?php if(isset($_GET['action']) && $_GET['action'] == 'editherb'):?>     
                        <?php endif;?> */

?>

