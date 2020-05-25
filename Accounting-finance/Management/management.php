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
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
?>
<!Doctype html>  
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ຈັດການຂໍ້ມູນຫຼັກ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="../Main.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ຈັດການຂໍ້ມູນຫຼັກ</b>
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br><br>
      <!-- body -->
    <div class="container font16">
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Customers.php" class="font16">
                     <img src="../../image/Supplier.png" width="140px" class="img-responsive" ><br>
                     <b>ຈັດການຂໍ້ມູນລູກຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Supplier.php" class="font16">
                     <img src="../../image/Employees.png" width="140px" class="img-responsive" ><br>
                     <b>ຈັດການຂໍ້ມູນຜູ້ສະໜອງ (ອິນເຕີເນັດ)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="acc_no.php" class="font16">
                     <img src="../../image/acc_no.png" width="140px" class="img-responsive" ><br>
                     <b>ຈັດການເລກທີບັນຊີ</b>
                </a>
            </div>
        </div>
        <div class="row"><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="acc_unit.php" class="font16">
                     <img src="../../image/accc_unit.png" width="140px" class="img-responsive" ><br>
                     <b>ຈັດການໝວດບັນຊີ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="acc_property.php" class="font16">
                     <img src="../../image/property.png" width="140px" class="img-responsive" ><br>
                     <b>ຈັດການໝວດຊັບສົມບັດ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="acc_product.php" class="font16">
                     <img src="../../image/internet2.png" width="140px" class="img-responsive" >
                     <b>ຈັດການຂໍ້ມູນສິນຄ້າ (ອິນເຕີເນັດ)</b>
                </a>
            </div>
        </div>
        <div class="row"><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="rate.php" class="font16">
                    <img src="../../image/rate.png" width="140px" class="img-responsive" ><br>
                    <b>ຈັດການສະກຸນເງິນ (Rate)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="company.php" class="font16">
                    <img src="../../image/company.png" width="140px" class="img-responsive" ><br>
                    <b>ຈັດການຂໍ້ມູນວິສາຫະກິດ <br>(ບໍລິສັດ)</b>
                </a>
            </div>
        </div>
    </div>
       
     

      <!-- body -->
  </body>
  
</html>
