<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 4){
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
    <title>Main</title>
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
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Management/management.php" class="font16">
                     <img src="../image/management.jpg" width="170px" class="img-responsive" ><br>
                     <b>Manage Core Data</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Interview/interview.php" class="font16">
                    <img src="../image/interview.png" width="190px" class="img-responsive" ><br>
                   <b>Interview</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Updatesalary/Updatesalary.php" class="font16">
                    <img src="../image/salary.png" width="170px" class="img-responsive" ><br>
                   <b>Update Salary</b>
                </a>
            </div>
        </div>
        <div class="row"><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="OT/ot.php" class="font16">
                    <img src="../image/OT.png" width="130px" class="img-responsive" ><br>
                    <?php 
                        $sqlck = "select count(*) as ck from ot where status='ຍັງບໍ່ອະນຸມັດ' and amount != '';";
                        $resultck = mysqli_query($link,$sqlck);
                        $rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC);
                     ?>
                     <b>OT</b>&nbsp&nbsp<span class="badge"><?php echo $rowck['ck'] ?></span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="Report/Report.php" class="font16">
                    <img src="../image/Report.png" width="175px" class="img-responsive" ><br>
                   <b>Report</b>
                </a>
            </div>
        </div>
    </div><br>
       
      </div>

      <!-- body -->
  </body>
  <script src="../js/bootstrap.min.js" type="javascript"></script>
  <script src="../js/bootstrap.js" type="javascript"></script>
  <script src="../js/production_jQuery331.js"></script>
  <script src="../js/style.js"></script>
</html>
