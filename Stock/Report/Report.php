<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 1){
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
    <title>ລາຍງານ</title>
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
                ລາຍງານ
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
      <!-- body -->
      <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmProduct.php" class="font16">
                     <img src="../../image/product.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານຂໍ້ມູນສິນຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmStock.php" class="font16">
                     <img src="../../image/product.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານສະຕ໋ອກສິນຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmCustomer.php" class="font16" >
                     <img src="../../image/Customer.png" width="145px" class="img-responsive" ><br>
                     <b>ລາຍງານຂໍ້ມູນລູກຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmSupplier.php" class="font16">
                     <img src="../../image/Supplier.png" width="145px" class="img-responsive"><br>
                     <b>ລາຍງານຂໍ້ມູນຜູ້ສະໜອງ</b>
                </a>
            </div>
          
        </div><br>
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmOrder.php" class="font16">
                     <img src="../../image/order.png" width="145px" class="img-responsive" ><br>
                     <b>ລາຍງານການສັ່ງຊື້</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmImport.php" class="font16">
                     <img src="../../image/import.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານການນຳເຂົ້າສິນຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmOrder2.php" class="font16" >
                     <img src="../../image/order.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານສິນຄ້າຍັງບໍ່ທັນມາ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmDistribute.php" class="font16" >
                     <img src="../../image/Distribute.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານການເບີກຈ່າຍສິນຄ້າ</b>
                </a>
            </div>
        </div>
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmRecover.php" class="font16" >
                     <img src="../../image/Distribute.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານສິນຄ້າໝົດສັນຍາ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="frmClaim.php" class="font16" >
                     <img src="../../image/Distribute.png" width="140px" class="img-responsive" ><br>
                     <b>ລາຍງານສິນຄ້າສົ່ງເຄມ</b>
                </a>
            </div>
        </div>
      </div>

      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/bootstrap.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
