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
    <title>ລາຍງານເລກບັນຊີ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Report.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍງານເລກບັນຊີ
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
      <div class="container font16">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ລາຍງານເລກບັນຊີ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div>
    <div class="clearfix"></div><br>
    <?php
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <form action="Report_acc.php" method="POST" id="form1">
            <input type="hidden" name="company" value="<?php echo $company ?>">
            <input type="hidden" name="com_name" value="<?php echo $rowcompany['com_name'] ?>">
            <input type="hidden" name="com_address" value="<?php echo $rowcompany['address'] ?>">
            <input type="hidden" name="com_tel" value="<?php echo $rowcompany['tel'] ?>">
            <input type="hidden" name="com_fax" value="<?php echo $rowcompany['fax'] ?>">
            <input type="hidden" name="slogan" value="<?php echo $rowcompany['slogan'] ?>">
            <input type="hidden" name="tax_id" value="<?php echo $rowcompany['tax_id'] ?>">
            <input type="hidden" name="logo" value="<?php echo $rowcompany['logo'] ?>">
            <input type="hidden" name="com_email" value="<?php echo $rowcompany['email'] ?>">
            <input type="hidden" name="website" value="<?php echo $rowcompany['website'] ?>">
            <button type="submit" name="btnall" class="btn btn-primary">
                <img src="../../image/Print.png" width="28px">
            </button> 
        </form>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1300px;">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 15px;">ເລກທີບັນຊີ</th>
                    <th style="width: 15px;">ຊື່ເລກທີບັນຊີ</th>
                </tr>
                <?php
                    $sqlsearch = "select * from acc_no;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['acc_id']; ?></td>
                    <td><?php echo $row['acc_name']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
