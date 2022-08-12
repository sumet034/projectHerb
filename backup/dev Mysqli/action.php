<?php
include('../dev/db.php');

if (isset($_POST)) {  
    // EDIT FORM HERB
      

    if ($_POST['action'] == "createHerb"){
      //$herbImg = $_POST['herbImg'];
      $science_name = $_POST['science_name'];
      $family_herb = $_POST['family_herb'];
      $common_name = $_POST['common_name'];
      $local_name = $_POST['local_name'];
      //$query = "INSERT INTO herbname(title, description) VALUES ('$science_name', '$family_herb')";
      $query = "INSERT INTO herbname (scienceName, familyHerb, commonName, localName) VALUES ('$science_name', '$family_herb', '$common_name', '$local_name')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Query Failed.");
        
      }
    
      $_SESSION['message'] = 'createHerb Successfully';
      $_SESSION['message_type'] = 'success';
      $_SESSION['management'] = 'createHerb';
      header('Location: ../dev/index.php');
    }

    if ($_POST['action'] == "editherb"){
      

      if (isset($_POST['update'])) {
        
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

    }
    
  

}else {
  exit(header("Location: ../dev/index.php"));}
?>