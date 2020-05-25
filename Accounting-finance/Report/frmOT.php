
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
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍງານ OT</title>
    <LINK REL="SHORTC UT ICON" HREF="../../image/ICO.ico">
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
                ລາຍງານ OT
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
        </div>
    </div> <br>
    <div class="container font14">
            <div class="row">
                <form action="frmOT.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ແຕ່ວັນທີ</label>
                        <input type="date" class="form-control" name="date1" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ຫາວັນທີ</label>
                        <input type="date" class="form-control" name="date2" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group"><br>
                        <button class="btn btn-primary" name="btn">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-success" name="btnall">
                            OT ທັງໝົດ
                        </button>
                    </div>
                </form>
            </div>
    </div>
    <div class="clearfix"></div><br>
      <!-- body -->
      <?php
        if(isset($_POST['btn'])){
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_ot.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
                <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
                <input type="hidden" name="cus_id" value="<?php echo $cus_id ?>">
                <input type="hidden" name="com_name" value="<?php echo $rowcompany['com_name'] ?>">
                <input type="hidden" name="com_address" value="<?php echo $rowcompany['address'] ?>">
                <input type="hidden" name="com_tel" value="<?php echo $rowcompany['tel'] ?>">
                <input type="hidden" name="com_fax" value="<?php echo $rowcompany['fax'] ?>">
                <input type="hidden" name="slogan" value="<?php echo $rowcompany['slogan'] ?>">
                <input type="hidden" name="tax_id" value="<?php echo $rowcompany['tax_id'] ?>">
                <input type="hidden" name="logo" value="<?php echo $rowcompany['logo'] ?>">
                <input type="hidden" name="com_email" value="<?php echo $rowcompany['email'] ?>">
                <input type="hidden" name="website" value="<?php echo $rowcompany['website'] ?>">
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../image/Print.png" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1200px;">
                <tr>
                    <th style="width: 20px;">#</th>
                    <th style="width: 80px;">ຊື່ພະນັກງານ</th>
                    <th style="width: 100px;">ວັນທີເຮັດວຽກລ່ວງເວລາ</th>
                    <th style="width: 120px;">ປະເພດ OT</th>
                    <th style="text-align: left; width: 180px;">ເນື້ອໃນ</th>
                    <th style="width: 60px;">ເວລາເລີ່ມ</th>
                    <th style="width: 60px;">ເວລາສິ້ນສຸດ</th>
                    <th style="width: 60px;">ລວມເວລາ</th>
                    <th style="width: 100px;">ລວມເປັນເງິນ</th>
                    <th style="width: 80px;">ສະຖານະ</th>
                <?php
                     $sqlsearch = "select ot_id,emp_name,note,date_ot,amount,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,l.status from ot l left join employees e on l.emp_id=e.emp_id where date_ot between '$date1' and '$date2' and l.status='ອະນຸມັດ';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['emp_name'] ?></td>
                    <td><?php echo $row['date_ot'] ?></td>
                    <td><?php echo $row['ot_type'] ?></td>
                    <td><?php echo $row['note'] ?></td>
                    <td><?php echo $row['time_start'] ?></td>
                    <td><?php echo $row['time_end'] ?></td>
                    <td><?php echo $row['newtime'] ?></td>
                    <td><?php echo number_format($row['amount'],2) ?> USD</td>
                    <td><?php echo $row['status'] ?></td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(amount) as amount from ot where date_ot between '$date1' and '$date2' and status='ອະນຸມັດ';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="7" align="right">ລວມມູນຄ່າ:</td>
                    <td colspan="4" align="right"> <?php echo $rowkip['amount']; ?> USD</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
    <?php
        if(isset($_POST['btnall'])){
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_ot.php" method="POST" id="form1">
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
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1200px;">
                <tr>
                    <th style="width: 20px;">#</th>
                    <th style="width: 80px;">ຊື່ພະນັກງານ</th>
                    <th style="width: 100px;">ວັນທີເຮັດວຽກລ່ວງເວລາ</th>
                    <th style="width: 120px;">ປະເພດ OT</th>
                    <th style="text-align: left; width: 180px;">ເນື້ອໃນ</th>
                    <th style="width: 60px;">ເວລາເລີ່ມ</th>
                    <th style="width: 60px;">ເວລາສິ້ນສຸດ</th>
                    <th style="width: 60px;">ລວມເວລາ</th>
                    <th style="width: 100px;">ລວມເປັນເງິນ</th>
                    <th style="width: 80px;">ສະຖານະ</th>
                </tr>
                <?php
                    $sqlsearch = "select ot_id,emp_name,note,date_ot,amount,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,l.status from ot l left join employees e on l.emp_id=e.emp_id where l.status='ອະນຸມັດ';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['emp_name'] ?></td>
                    <td><?php echo $row['date_ot'] ?></td>
                    <td><?php echo $row['ot_type'] ?></td>
                    <td><?php echo $row['note'] ?></td>
                    <td><?php echo $row['time_start'] ?></td>
                    <td><?php echo $row['time_end'] ?></td>
                    <td><?php echo $row['newtime'] ?></td>
                    <td><?php echo number_format($row['amount'],2) ?> USD</td>
                    <td><?php echo $row['status'] ?></td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(amount) as amount from ot where status='ອະນຸມັດ';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="7" align="right">ລວມມູນຄ່າ:</td>
                    <td colspan="4" align="right"> <?php echo $rowkip['amount']; ?> USD</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
