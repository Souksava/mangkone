<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 1){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}

?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ຈັດກນຂໍ້ມູນຫຼັກ</title>
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
                ຈັດກນຂໍ້ມູນຫຼັກ
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
    <div class="container" > 
      <div class="row" >
            <div class="col-xs-12 col-sm-6 col-md-4 "  align="center">
                <a href="Supplier.php" class="font16">
                     <img src="../../image/Supplier.png" width="140px" class="img-responsive"><br>
                     <b>ຈັດການຂໍ້ມູນຜູ້ສະໜອງ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 " align="center">
                <a href="CateAndUnit.php" class="font16">
                     <img src="../../image/Category.png" width="183px" class="img-responsive" ><br>
                     <b>ຈັດການຂໍ້ມູນປະເພດ ແລະ ຫົວໜ່ວຍສິນຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Product.php" class="font16">
                     <img src="../../image/product.png" width="130px" class="img-responsive" ><br>
                     <b>ຈັດການຂໍ້ມູນສິນຄ້າ</b>
                </a>
            </div>
      </div><br>
      <div class="row" >
            <div class="col-xs-12 col-sm-6 col-md-4 "  align="center">
                <a href="service.php" class="font16">
                     <img src="../../image/service.png" width="140px" class="img-responsive"><br>
                     <b>ບໍລິການ<br>(Service)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 " align="center">
                <a href="productdetail.php" class="font16">
                     <img src="../../image/Berk.ico" width="140px" class="img-responsive" ><br>
                     <b>ລາຍລະອຽດສິນຄ້າ<br>(Product Spec)</b>
                </a>
            </div>
      </div><br>
    </div>

      <!-- body -->
  </body>
  
  <script src="../../js/bootstrap.js" type="javascript"></script>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js" type="javascript"></script>
  <script src="../../js/Style.js"></script>
</html>
