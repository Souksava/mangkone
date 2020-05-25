<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
        echo"<meta http-equiv='refresh' content='1;URL=../../../Check/logout.php'>";
    }
    else{}
    require '../../../ConnectDB/connectDB.php';
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
    <title>ລາຍງານບົດສະຫຼຸບບັນຊີປະຈຳປີ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../../image/ICO.ico">
    <link rel="stylesheet" href="../../../css/Style.css">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="../Report.php">
                    <img src="../../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ລາຍງານບົດສະຫຼຸບບັນຊີປະຈຳປີ</b>
            </div>
            <div class="tapbar" align="right">
              <a href="../../../Check/Logout.php">
                  <img src="../../../image/Close.png" width="30px">
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
                <a href="report_yearly_1.php" class="font16">
                     <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>ໃບດຸນດຽງກ່ອນການປັບປຸງ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="report_yearly_2.php" class="font16">
                     <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>ໃບດຸນດຽງພາຍຫຼັງການປັບປຸງ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frm_cr_po.php" class="font16">
                     <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                     <b>ໃບດຸນດຽງກ່ອນການປັບປຸງ(ລາຍຮັບ-ລາຍຈ່າຍ)</b>
                </a>
            </div>
        </div>
        <div class="row "><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frm_cr_po_detail.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ໃບລາຍງານຜົນໄດ້ຮັບ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frm_cr_po_detail2.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ລາຍລະອຽດ ໃບລາຍງານຜົນໄດ້ຮັບ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="report_sup.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ສະຫຼຸບຊັບສົມບັດ - ຊັບສິນ</b>
                </a>
            </div>
        </div>
        <div class="row "><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="supplier_end.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ລາຍລະອຽດ ສະຫຼຸບຊັບສົມບັດ - ຊັບສິນ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmOT.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ສະຫຼຸບຊັບສົມບັດ - ໜີ້ສິນ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmSalary.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ລາຍລະອຽດ ສະຫຼຸບຊັບສົມບັດ - ໜີ້ສິນ</b>
                </a>
            </div>
        </div>
        <div class="row "><br><br>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="frmAccno.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ໃບດຸນດຽງພາຍຫຼັງການປັບປຸງປີກ່ອນ</b>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4" align="center">
                <a href="lastyear.php" class="font16">
                    <img src="../../../image/Report.png" width="140px" class="img-responsive" ><br>
                   <b>ບັນທຶກໃບດຸນດ່ຽງປີກ່ອນ</b>
                </a>
            </div>
        </div>
    </div><br>
       
      </div>

      <!-- body -->
  </body>
  <script src="../../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../../js/bootstrap.js" type="javascript"></script>
  <script src="../../../js/production_jQuery331.js"></script>
  <script src="../../../js/style.js"></script>
</html>
