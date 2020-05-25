<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 3){
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
    <title>Report</title>
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
                <b>Report</b>
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
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmCustomer.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report Customer</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmSupplier_product.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report Supplier</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmPo.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>Report Purchase Order</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmReceipt.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>Report Revenue</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmEmployee.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report Employees</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmOrder.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>Report Orders</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmImport.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>Report Imports</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmRecover.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report Product Out of Contact</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="customer_end.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                    <?php 
                        $sqlck = "select count(datediff(end_promise,'$Date')<=30) as ck from customers  where datediff(end_promise,'$Date')<=30;";
                        $resultck = mysqli_query($link,$sqlck);
                        $rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
                     ?>
                   <b>Report the customer contact expire</b>&nbsp&nbsp<span class="badge"><?php echo $rowck['ck']; ?></span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <?php
                    $sqlck3 = "select count(datediff(invoice_date,'$Date')<=15) as ck from customers  where datediff(invoice_date,'$Date')<=15;";
                    $resultck3 = mysqli_query($link,$sqlck3);
                    $rowck3 = mysqli_fetch_array($resultck3, MYSQLI_ASSOC);
                ?>
                <a href="invoicealert.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>Report Date of Invoice</b>&nbsp&nbsp<span class="badge"><?php echo $rowck3['ck']; ?>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="supplier_end.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                    <?php 
                        $sqlck2 = "select count(datediff(end_promise,'$Date')<=30) as ck from supplier  where datediff(end_promise,'$Date')<=30 and type='Internet';";
                        $resultck2 = mysqli_query($link,$sqlck2);
                        $rowck2 = mysqli_fetch_array($resultck2, MYSQLI_ASSOC);
                     ?>
                   <b>Report the suppliers contact expire</b>&nbsp&nbsp<span class="badge"><?php echo $rowck2['ck']; ?></span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmStock.php" class="font16">
                    <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>Report Stock</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmOT.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report OT</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmSalary.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report Salary</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmUpdatesalary.php" class="font16">
                     <img src="../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>Report Update Salary</b>
                </a>
            </div>
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
