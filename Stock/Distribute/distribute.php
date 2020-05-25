
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
    <title>ການເບີກຈ່າຍສິນຄ້າ</title>
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
                ເບີກຈ່າຍສິນຄ້າ
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
        <div class="row" align="center">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmdistribute.php" class="font16">
                     <img src="../../image/Berk.ico" width="140px" class="img-responsive" ><br>
                     <b>ເບີກຈ່າຍສິນຄ້າ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="reback.php" class="font16" >
                     <img src="../../image/Recover.png" width="140px" class="img-responsive" ><br>
                     <b>ສິນຄ້າໝົດສັນຍາ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" align="center">
                <a href="credit.php" class="font16">
                     <img src="../../image/claim.png" width="180px" class="img-responsive"><br>
                     <b>ສິນຄ້າສົ່ງເຄມ</b>
                </a>
            </div>
        </div><br>
      </div>

      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/bootstrap.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
