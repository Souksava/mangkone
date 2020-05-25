<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 1){
        echo"<meta http-equiv='refresh' content='1;URL=../Check/logout.php'>";
    }
    else{}
    require '../ConnectDB/connectDB.php';
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
    <title>ໜ້າຫຼັກ</title>
    <LINK REL="SHORTCUT ICON" HREF="../image/ICO.ico">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
               <b><?php echo $_SESSION['emp_name']; ?></b>
            </div>
            <div align="center" class="tapbar">
                <b>Mangkone Techonogy</b>
            </div>
            <div class="tapbar" align="right">
              <a href="../Check/Logout.php">
                  <img src="../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br>
      <!-- body -->
      <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Management/management.php" class="font16">
                     <img src="../image/management.jpg" width="140px" class="img-responsive" ><br>
                     <b>ຈັດການຂໍ້ມູນຫຼັກ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Order/Order.php" class="font16">
                    <img src="../image/order.png" width="140px" class="img-responsive" ><br>
                    <?php 
                        $sqlck = "select count(*) as ck from orders where status='ອະນຸມັດ' and seen2='NOTSEEN';";
                        $resultck = mysqli_query($link,$sqlck);
                        $rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
                        $sqlck2 = "select count(*) as ck from orders where status='ບໍ່ອະນຸມັດ' and seen2='NOTSEEN';";
                        $resultck2 = mysqli_query($link,$sqlck2);
                        $rowck2 = mysqli_fetch_array($resultck2, MYSQLI_ASSOC);

                     ?>
                   <b>ສັ່ງຊື້ ແລະ ນຳເຂົ້າ</b>&nbsp&nbsp<span class="badge2"><?php echo $rowck['ck']; ?></span>
                   <span class="badge"><?php echo $rowck2['ck']; ?></span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Distribute/frmdistribute.php" class="font16">
                     <img src="../image/Distribute.png" width="180px" class="img-responsive">
                     <b>ເບີກຈ່າຍສິນຄ້າ</b>
                </a>
            </div>
        </div><br>
        <div class="row font16">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center"><br>
                <a href="Quotation/quotation.php" class="font16">
                     <img src="../image/quotation.png" width="125px" class="img-responsive" ><br>
                    <b> ໃບສະເໜີລາຄາ<br>(Quotation)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center"><br>
                <a href="OT/ot.php" class="font16">
                     <img src="../image/OT.png" width="125px" class="img-responsive" ><br>
                    <b> ຟອມສະເໜີວຽກລ່ວງເວລາ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center"><br>
                <a href="Report/Report.php" class="font16">
                     <img src="../image/Report.png" width="170px" class="img-responsive" ><br>
                    <b> ລາຍງານ</b>
                </a>
            </div>
           
        </div><br>
        <div class="row font16">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Change/change.php" class="font16">
                     <img src="../image/key.jpg" width="140px" class="img-responsive"><br>
                     <b>ປ່ຽນລະຫັດຜ່ານ</b>
                </a>
            </div>
        </div>
      </div>

      <!-- body -->
  </body>
  <script src="../js/bootstrap.min.js" type="javascript"></script>
  <script src="../js/bootstrap.js" type="javascript"></script>
  <script src="../js/production_jQuery331.js"></script>
  <script src="../js/style.js"></script>
</html>
