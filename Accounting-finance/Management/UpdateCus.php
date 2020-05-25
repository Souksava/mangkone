
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
    <title>ແກ້ໄຂຂໍ້ມູນລູກຄ້າ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Customers.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນລູກຄ້າ
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
            $id = $_GET['cus_id'];
            $sqlget = "select * from customers where cus_id = '$id'";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
      ?>
      <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="UpdateCus.php" method="POST" id="formupdate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ຊື່ບໍລິສັດ</label><br>
                            <input type="hidden" name="cus_id" value="<?php echo $row['cus_id'];?>"> 
                            <input type="text" class="form-control" name="company" value="<?php echo $row['company'];?>" placeholder="ຊື່ບໍລິສັດ">
                        </div>  
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ທີ່ຕັ້ງ</label><br>
                            <input type="text" class="form-control" placeholder="ທີ່ຕັ້ງບໍລິສັດ" name="address" value="<?php echo $row['address'];?>">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ເບີໂທຕິດຕໍ່</label><br>
                            <input type="text" class="form-control" placeholder="ເບີໂທຕິດຕໍ່" name="tel" value="<?php echo $row['tel'];?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ເບີແຟັກ</label><br>
                            <input type="text" class="form-control" placeholder="ເບີແຟັກ" name="fax" value="<?php echo $row['fax'];?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ທີ່ຢູ່ອີເມວ</label><br>
                            <input type="email" class="form-control" placeholder="ທີ່ຢູ່ອີເມວ" name="email" value="<?php echo $row['email'];?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ວັນທີໝົດສັນຍາ</label><br>
                            <input type="date" class="form-control" name="end_promise" value="<?php echo $row['end_promise'];?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ວັນທີວາງບິນ</label><br>
                            <input type="date" class="form-control" name="invoice_date" value="<?php echo $row['invoice_date'];?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ສັນຍາຫຼັກຖານ</label><br>
                            <input type="file" class="form-control" name="img_path" value="<?php echo $row['img_path'];?>">
                        </div>
                        <div class="col-xs-12" align="center">
                            <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນລູກຄ້າ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <?php
          if(isset($_POST['btnUpdate'])){
            $cus_id = $_POST['cus_id'];
            $company = $_POST['company'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $end_promise = $_POST['end_promise'];
            $invoice_date = $_POST['invoice_date'];
            if(trim($invoice_date) == ""){
                $invoice_date = "0000-00-00";
            }
            if($_FILES['img_path']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
            {
                // ຖ້າຟາຍເປັນຄ່າວ່າງໃຫ້ທຳການອັບເດດຊື່ເປັນໂຕເກົ່າ
                $sqlimg = "select img_path from customers where cus_id='$cus_id';";
                $resultimg = mysqli_query($link, $sqlimg);
                $data = mysqli_fetch_array($resultimg, MYSQLI_ASSOC);
                $pro_image = $data['img_path'];
                // ສິນສຸດ
                $sql = "update customers set company='$company',address='$address',tel='$tel',fax='$fax',email='$email',end_promise='$end_promise',img_path='$pro_image',invoice_date='$invoice_date' where cus_id ='$cus_id';";
                $result = mysqli_query($link, $sql);
                     if(!$result)
                         {
                           echo"<script>";
                           echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້ ກະລຸນາກວດສອບຂໍ້ມູນອີກຄັ້ງ');";
                           echo"window.location.href='Customers.php';";
                          echo"</script>";
                          }
                        else{
                            echo"<script>";
                            echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                            echo"window.location.href='Customers.php';";
                            echo"</script>";
                        }
            } 
            else{
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select img_path from customers where cus_id='$cus_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                if(file_exists($path) && !empty($data2['img_path'])){
                    unlink($path);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
                //ສິນສຸດການຕັ້ງຊື່

           
                 $sql = "update customers set company='$company',address='$address',tel='$tel',fax='$fax',email='$email',end_promise='$end_promise',img_path='$pro_image',invoice_date='$invoice_date' where cus_id='$cus_id';";
                 $result1 = mysqli_query($link, $sql);
                 if(!$result1)
                 {
                    echo"<script>";
                    echo"alert('Can not to Update data please checking your input data');";
                    echo"window.location.href='Customers.php';";
                    echo"</script>";
                 }
                 else{
                     
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='Customers.php';";
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
