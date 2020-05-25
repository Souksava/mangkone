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
    <title>ເບີກຈ່າຍເງິນເດືອນ</title>
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
                <b>ເບີກຈ່າຍເງິນເດືອນ</b>
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
                <a href="ot.php" class="font16">
                     <img src="../../image/OT.png" width="155px" class="img-responsive" ><br>
                     <b>ຄິດໄລ່ OT</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmsalary.php" class="font16">
                     <img src="../../image/salary.png" width="155px" class="img-responsive" ><br>
                     <b>ເບີກຈ່າຍເງິນເດືອນ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="accept.php" class="font16">
                     <img src="../../image/accept.png" width="155px" class="img-responsive" ><br>
                     <?php 
                        $sqlck = "select count(*) as ck from salary where status='ອະນຸມັດ' and seen2='NOTSEEN';";
                        $resultck = mysqli_query($link,$sqlck);
                        $rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
                        $sqlck2 = "select count(*) as ck from salary where status='ບໍ່ອະນຸມັດ' and seen2='NOTSEEN';";
                        $resultck2 = mysqli_query($link,$sqlck2);
                        $rowck2 = mysqli_fetch_array($resultck2, MYSQLI_ASSOC);
                     ?>
                     <b>ອະນຸມັດ</b>&nbsp&nbsp<span class="badge2"><?php echo $rowck['ck'] ?></span>
                    <span class="badge"><?php echo $rowck2['ck']; ?></span>
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
