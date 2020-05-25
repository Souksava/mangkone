<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
    require '../../ConnectDB/connectDB.php';
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ແກ້ໄຂຂໍ້ມູນ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Supplier.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນຜູ້ສະໜອງ
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
    <!-- head -->
      <div class="clearfix"></div><br>
    <?php
        $id = $_GET['sup_id'];
        $sqlget = "select * from supplier where sup_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="UpdateSup.php" id="formupdate" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="hidden" name="sup_id" value="<?php echo $row['sup_id']; ?>">
                            <input type="text" class="form-control"  value="<?php echo $row['company']; ?>" placeholder="ຊື່ບໍລິສັດ/ຮ້ານ" name="company">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="text" class="form-control" value="<?php echo $row['address']; ?>" placeholder="ທີ່ຕັ້ງ" name="address">
                        </div>  
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="text" class="form-control" placeholder="ເບີໂທລະສັບຕິດຕໍ່" name="tel" value="<?php echo $row['tel']; ?>">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="text" class="form-control" placeholder="ເບີແຟັກ" name="fax" value="<?php echo $row['fax']; ?>">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="email" class="form-control" placeholder="ທີ່ຢູ່ອີເມວ" name="email" value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="date" class="form-control" name="end_promise" value="<?php echo $row['end_promise']; ?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="file" class="form-control" name="img_path">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <select name="type" id="" class="form-control">
                                <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                                <option value="Tool">Tool</option>
                                <option value="Internet">Internet</option>
                            </select>
                        </div>
                        <div class="col-xs-12" align="center">
                            <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $sup_id = $_POST['sup_id'];
            $company = $_POST['company'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            $end_promise = $_POST['end_promise'];
         if($_FILES['img_path']['name'] == ""){
            $sql2 = "update supplier set company='$company',tel='$tel',fax='$fax',address='$address',email='$email',type='$type',end_promise='$end_promise' where sup_id='$sup_id';";
            $result2 = mysqli_query($link,$sql2);
            if(!$result2)
            {
                echo"<script>";
                echo"alert('Can not to update data please checking your input again..!');";
                echo"window.location.href='Supplier.php';";
                echo"</script>";
            }
            else{    
                echo"<script>";
                echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                echo"window.location.href='Supplier.php';";
                echo"</script>";
            }          
         }
         else{
            $sqlsec = "select img_path from supplier where sup_id='$sup_id';";
            $resultsec = mysqli_query($link, $sqlsec);
            $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
            $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
            if(file_exists($path) && !empty($data2['img_path'])){
                unlink($path);
            }
            //ສິ້ນສຸດ
            //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
            $ext = pathinfo(basename($_FILES["img_path"]["name"]), PATHINFO_EXTENSION);
            $new_image_name = "img_".uniqid().".".$ext;
            $image_path = "../../Stock/Management/images/";
            $upload_path = $image_path.$new_image_name;
            move_uploaded_file($_FILES["img_path"]["tmp_name"], $upload_path);
            $pro_img = $new_image_name;
            $sql = "update supplier set company='$company',tel='$tel',fax='$fax',address='$address',email='$email',type='$type',end_promise='$end_promise',img_path='$pro_img' where sup_id='$sup_id';";
            $result = mysqli_query($link,$sql);
            if(!$result)
            {
                echo"<script>";
                echo"alert('Can not to update data please checking your input again..!');";
                echo"window.location.href='Supplier.php';";
                echo"</script>";
            }
            else{    
                echo"<script>";
                echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                echo"window.location.href='Supplier.php';";
                echo"</script>";
            }          
         }
        }
    ?>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
