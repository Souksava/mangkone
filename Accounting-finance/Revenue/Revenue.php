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
    <title>ບັນຊີລາຍຮັບ</title>
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
                <b>ບັນຊີລາຍຮັບ</b>
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
        <div class="row "><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="revenue_kip.php" class="font16">
                     <img src="../../image/kip.png" width="165px" class="img-responsive" ><br>
                     <b>ບັນຊີລາຍຮັບເງິນກີບ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="revenue_baht.php" class="font16">
                     <img src="../../image/baht.png" width="140px" class="img-responsive" ><br>
                     <b>ບັນຊີລາຍຮັບເງິນບາດ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="revenue_us.php" class="font16">
                     <img src="../../image/dollar.png" width="140px" class="img-responsive" ><br>
                     <b>ໃບັນຊີລາຍຮັບເງິນໂດລ້າ<b>
                </a>
            </div>
        </div>
        <div class="row "><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="faem.php" class="font16">
                     <img src="../../image/faem.png" width="140px" class="img-responsive" ><br>
                     <b>ແຟ້ມບັນຊີລາຍຮັບ</b>
                </a>
            </div>
        </div>
    </div>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
