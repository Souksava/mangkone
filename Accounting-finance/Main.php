<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
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

      <div class="clearfix"></div><br><br>
      <!-- body -->
    <div class="container font16">
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Management/management.php" class="font16">
                     <img src="../image/management.jpg" width="180px" class="img-responsive" ><br>
                     <b>ຈັດການຂໍ້ມູນຫຼັກ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="PO2/po.php" class="font16">
                    <img src="../image/po2.png" width="175px" class="img-responsive" ><br>
                   <b>Purchase Order</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="PO/po.php" class="font16">
                    <img src="../image/po.png" width="175px" class="img-responsive" ><br>
                   <b>ບັນຊີລາຍຈ່າຍ</b>
                </a>
            </div>
        </div>
        <div class="row "><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Inv_cr/inv_cr.php" class="font16">
                     <img src="../image/invoice.png" width="180px" class="img-responsive" ><br>
                     <b>Invoice and Receipt</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Revenue/Revenue.php" class="font16">
                     <img src="../image/Revenue.png" width="180px" class="img-responsive" ><br>
                     <b>ບັນຊີລາຍຮັບ (Revenue)</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="OT/ot.php" class="font16">
                    <img src="../image/OT.png" width="165px" class="img-responsive" ><br>
                    <b>OT</b>
                </a>
            </div>
        </div>
        <div class="row"><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Salary/salary.php" class="font16">
                    <img src="../image/salary.png" width="135px" class="img-responsive" ><br>
                   <?php 
                        $sqlck = "select count(*) as ck from salary where status='ອະນຸມັດ' and seen2='NOTSEEN';";
                        $resultck = mysqli_query($link,$sqlck);
                        $rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
                        $sqlck2 = "select count(*) as ck from salary where status='ບໍ່ອະນຸມັດ' and seen2='NOTSEEN';";
                        $resultck2 = mysqli_query($link,$sqlck2);
                        $rowck2 = mysqli_fetch_array($resultck2, MYSQLI_ASSOC);
                     ?>
                    <b>ເບີກຈ່າຍເງິນເດືອນ</b>&nbsp&nbsp<span class="badge2"><?php echo $rowck['ck'] ?></span>
                    <span class="badge"><?php echo $rowck2['ck']; ?></span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Year/year.php" class="font16">
                     <img src="../image/Revenue.png" width="130px" class="img-responsive"><br>
                     <b>ຍອດການເຄື່ອນໄຫວໃນປີ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Report/Report.php" class="font16">
                    <img src="../image/Report.png" width="175px" class="img-responsive" ><br>
                    <?php 
                        $sqlck = "select count(datediff(end_promise,'$Date')<=30) as ck from customers  where datediff(end_promise,'$Date')<=30;";
                        $resultck = mysqli_query($link,$sqlck);
                        $rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
                        $sqlck2 = "select count(datediff(end_promise,'$Date')<=30) as ck from supplier  where datediff(end_promise,'$Date')<=30 and type='Internet';";
                        $resultck2 = mysqli_query($link,$sqlck2);
                        $rowck2 = mysqli_fetch_array($resultck2, MYSQLI_ASSOC);
                        $sqlck3 = "select count(datediff(invoice_date,'$Date')<=15) as ck from customers  where datediff(invoice_date,'$Date')<=15;";
                        $resultck3 = mysqli_query($link,$sqlck3);
                        $rowck3 = mysqli_fetch_array($resultck3, MYSQLI_ASSOC);
                     ?>
                   <b>ລາຍງານ</b>&nbsp&nbsp<span class="badge"><?php echo $rowck['ck'] + $rowck2['ck'] + $rowck3['ck']; ?></span>
                </a>
            </div>
        </div>
        <div class="row"><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Change/change.php" class="font16">
                     <img src="../image/key.jpg" width="130px" class="img-responsive"><br>
                     <b>ປ່ຽນລະຫັດຜ່ານ</b>
                </a>
            </div>
        </div>
    </div>
      <!-- body -->
  </body>
        <script src="../js/production_jQuery331.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/Style.js"></script>
</html>
