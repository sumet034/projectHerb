<?php
require_once('./db.php');
/* if (isset($_REQUEST['btn_insert'])) {
  try {
      $name = $_REQUEST['txt_name'];

      $image_file = $_FILES['txt_file']['name'];
      $type = $_FILES['txt_file']['type'];
      $size = $_FILES['txt_file']['size'];
      $temp = $_FILES['txt_file']['tmp_name'];

      $path = "upload/" . $image_file; // set upload folder path

      if (empty($name)) {
          $errorMsg = "Please Enter name";
      } else if (empty($image_file)) {
          $errorMsg = "please Select Image";
      } else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
          if (!file_exists($path)) { // check file not exist in your upload folder path
              if ($size < 5000000) { // check file size 5MB
                  move_uploaded_file($temp, 'upload/'.$image_file); // move upload file temperory directory to your upload folder
              } else {
                  $errorMsg = "Your file too large please upload 5MB size"; // error message file size larger than 5mb
              }
          } else {
              $errorMsg = "File already exists... Check upload filder"; // error message file not exists your upload folder path
          }
      } else {
          $errorMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
      }

      if (!isset($errorMsg)) {
          $insert_stmt = $db->prepare('INSERT INTO tbl_file(name, image) VALUES (:fname, :fimage)');
          $insert_stmt->bindParam(':fname', $name);
          $insert_stmt->bindParam(':fimage', $image_file);

          if ($insert_stmt->execute()) {
              $insertMsg = "File Uploaded successfully...";
              header('refresh:2;index.php');
          }
      }

  } catch(PDOException $e) {
      $e->getMessage();
  }
} */

if (isset($_POST['action'])) {  
    // EDIT FORM HERB
    /* <?php echo $science_name;?>
    <?php echo $family_herb;?>
    <?php echo $common_name;?>
    <?php echo $local_name;?> 

    <?php echo $scienceName;?>
    <?php echo $familyHerb;?>
    <?php echo $commonName;?>
    <?php echo $localName;?> 


    <?php echo($_REQUEST['action']=='createHerb')?"createHerb":"editherb";?>
    <?php if(isset($_GET['action']) && $_GET['action'] == 'createHerb'):?>
    <?php if (isset($_GET['herbID']) && $_GET['herbID'] > '0') : ?>
    <?php endif;?>    
    
    <?php if (isset($_GET['herbID']) && $_GET['herbID'] > '0') : ?>
                                <h3 class="text-center offset-4 col-2 ">herbID : <?php echo $_GET['herbID'] ?> </h3>
                                <form action="./action.php?herbID=<?php echo $_GET['herbID']; ?>" method="POST" >
                                    
                                    <!-- <a href="./action.php?update=1" type="submit" class="btn btn-success mt-2">บันทึก</a> -->
                                </form>
                            <?php endif; ?>  
    
    */ 

   

    // scienceName, familyHerb, commonName, localName
    // science_name family_herb  common_name local_name
    if ($_POST['action'] == "createHerb"){
        $nameShow = $_POST['herb_name'];
        $scienceName = $_POST['science_name'];
        $familyHerb = $_POST['family_herb'];
        $commonName = $_POST['common_name'];
        $localName = $_POST['local_name'];

        $leaves = $_POST['feature_leaves'];
        $flower = $_POST['feature_flower'];
        $fruit = $_POST['feature_fruit'];
        $haulm = $_POST['feature_haulm'];
        $rootHerb = $_POST['feature_rootHerb'];
        $propagating = $_POST['propagated'];
        $feature = $_POST['features'];
        
        //sql insert
        $stmt = $conn->prepare("INSERT INTO herbname (nameShow, scienceName, familyHerb, commonName, localName, leaves, flower, fruit, haulm, rootHerb, propagating, feature)
        VALUES (:herb_name, :science_name, :family_herb, :common_name, :local_name, :feature_leaves, :feature_flower, :feature_fruit, :feature_haulm, :feature_rootHerb, :propagated, :features)");
        $stmt->bindParam(':herb_name', $nameShow, PDO::PARAM_STR);
        $stmt->bindParam(':science_name', $scienceName, PDO::PARAM_STR);
        $stmt->bindParam(':family_herb', $familyHerb , PDO::PARAM_STR);
        $stmt->bindParam(':common_name', $commonName , PDO::PARAM_STR);
        $stmt->bindParam(':local_name', $localName , PDO::PARAM_STR);
        $stmt->bindParam(':feature_leaves', $leaves , PDO::PARAM_STR);
        $stmt->bindParam(':feature_flower', $flower , PDO::PARAM_STR);
        $stmt->bindParam(':feature_fruit', $fruit , PDO::PARAM_STR);
        $stmt->bindParam(':feature_haulm', $haulm , PDO::PARAM_STR);
        $stmt->bindParam(':feature_rootHerb', $rootHerb , PDO::PARAM_STR);
        $stmt->bindParam(':propagated', $propagating , PDO::PARAM_STR);
        $stmt->bindParam(':features', $feature , PDO::PARAM_STR);
        $result = $stmt->execute();
         // sweet alert 
         if($result){header('Location: ../dev/index.php');}
         
        }
       
    if ($_POST['action'] == "editherb"){
        $herbID = $_GET['herbID'];
        $nameShow = $_POST['herb_name'];
        $scienceName = $_POST['science_name'];
        $familyHerb = $_POST['family_herb'];
        $commonName = $_POST['common_name'];
        $localName = $_POST['local_name'];

        $leaves = $_POST['feature_leaves'];
        $flower = $_POST['feature_flower'];
        $fruit = $_POST['feature_fruit'];
        $haulm = $_POST['feature_haulm'];
        $rootHerb = $_POST['feature_rootHerb'];
        $propagating = $_POST['propagated'];
        $feature = $_POST['features'];

        //sql update
        $stmt = $conn->prepare("UPDATE  herbname SET nameShow=:herb_name, scienceName=:science_name, familyHerb=:family_herb, commonName=:common_name, localName=:local_name,
        leaves=:feature_leaves, flower=:feature_flower, fruit=:feature_fruit, haulm=:feature_haulm, rootHerb=:feature_rootHerb, propagating=:propagated, feature=:features WHERE herbID=:herbID");
        $stmt->bindParam(':herbID', $herbID , PDO::PARAM_INT);
        $stmt->bindParam(':herb_name', $nameShow, PDO::PARAM_STR);
        $stmt->bindParam(':science_name', $scienceName, PDO::PARAM_STR);
        $stmt->bindParam(':family_herb', $familyHerb , PDO::PARAM_STR);
        $stmt->bindParam(':common_name', $commonName , PDO::PARAM_STR);
        $stmt->bindParam(':local_name', $localName , PDO::PARAM_STR);

        $stmt->bindParam(':feature_leaves', $leaves, PDO::PARAM_STR);
        $stmt->bindParam(':feature_flower', $flower, PDO::PARAM_STR);
        $stmt->bindParam(':feature_fruit', $fruit , PDO::PARAM_STR);
        $stmt->bindParam(':feature_haulm', $haulm , PDO::PARAM_STR);
        $stmt->bindParam(':feature_rootHerb', $rootHerb , PDO::PARAM_STR);
        $stmt->bindParam(':propagated', $propagating , PDO::PARAM_STR);
        $stmt->bindParam(':features', $feature , PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->execute();

        if($result){header('Location: ../dev/index.php');}
        
         
    }

    /* leaves flower fruit haulm rootHerb propagating feature
    feature_leaves feature_flower feature_fruit feature_haulm feature_rootHerb propagated features */

    $conn = null; //close connect db

}else {
  exit(header("Location: ../dev/index.php"));}
?>