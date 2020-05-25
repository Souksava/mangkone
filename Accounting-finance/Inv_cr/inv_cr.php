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
    <title>Invoice And Receipt</title>
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
                <b>Invoice And Receipt</b>
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
                <a href="invoice_internet.php" class="font16">
                     <img src="../../image/invoice.png" width="155px" class="img-responsive" ><br>
                     <b>Invoice <br>(INTERNET)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="invoice_product.php" class="font16">
                     <img src="../../image/invoice.png" width="155px" class="img-responsive" ><br>
                     <b>Invoice <br>(Product)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="faem_invoice.php" class="font16">
                     <img src="../../image/faem.png" width="155px" class="img-responsive" ><br>
                     <b>ແຟ້ມ Invoice</b>
                </a>
            </div>
        </div>
        <div class="row "><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="receipt_internet.php" class="font16">
                     <img src="../../image/receipt.png" width="155px" class="img-responsive" ><br>
                     <b>ໃບເກັບເງິນອິນເຕີເນັດ <br>(Cash Receipt internet)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="receipt_product.php" class="font16">
                     <img src="../../image/receipt.png" width="155px" class="img-responsive" ><br>
                     <b>ໃບເກັບເງິນສິນຄ້າ <br>(Cash Receipt product)</b>
                </a>
            </div>
            <!-- <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="receipt_quotation_in.php" class="font16">
                     <img src="../../image/receipt.png" width="155px" class="img-responsive" ><br>
                     <b>ໃບເກັບເງິນສະເໜີລາຄາອິນເຕີເນັດ <br>(Quotation Receipt internet)</b>
                </a>
            </div> -->
        </div>
        <!-- <div class="row "><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="receipt_quotation_pro.php" class="font16">
                     <img src="../../image/receipt.png" width="155px" class="img-responsive" ><br>
                     <b>ໃບເກັບເງິນສະເໜີລາຄາສິນຄ້າ <br>(Quotation Receipt internet)</b>
                </a>
            </div>
        </div> -->
    </div>
       
     

      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/bootstrap.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
