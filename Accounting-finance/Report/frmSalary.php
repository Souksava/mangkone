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
    <title>ລາຍງານເງິນເດືອນ</title>
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
            ລາຍງານເງິນເດືອນ
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
                    <b>ລາຍງານເງິນເດືອນ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
    <div class="container font12b">
        <div class="row">
            <form action="frmSalary.php" method="POST" id="fomrsearch">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>ແຕ່ວັນທີ</label><br>
                    <input type="date" class="form-control" name="date1" >
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>ຫາວັນທີ</label><br>
                    <input type="date" class="form-control" name="date2" >
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group"><br>
                    <button class="btn btn-primary" name="btn">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-success" name="btnall">
                        ລາຍການທັງໝົດ
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div><br>
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
            <form action="Report_salary.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
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
                    <th style="width: 10px;">#</th>
                    <th style="width: 20px;">ເລກທີ</th>
                    <th style="width: 80px;">ຜູ້ລົງບັນຊີ</th>
                    <th style="width: 80px;">ມູນຄ່າ</th>
                    <th style="width: 80px;">ລົງວັນທີ</th>
                    <th style="width: 30px;">ປະຈຳເດືອນ</th>
                    <th style="width: 60px;">ສະຖານະ</th>
                    <th style="width: 50px;">ພາບຫຼັກຖານ</th>
                </tr>
                <?php
                    $sqlsearch = "select sry_id,emp_name,amount,sal_date,sal_mon,s.status,s.img_path from salary s left join employees e on s.emp_id=e.emp_id where sal_date between '$date1' and '$date2' and s.status='ອະນຸມັດ';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['sry_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['sal_date']; ?></td>
                    <td><?php echo $row['sal_mon'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(amount) as amount from salary where sal_date between '$date1' and '$date2' and status='ອະນຸມັດ';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                <tr class="font26">
                    <td colspan="4" align="right">ລວມມູນຄ່າ:</td>
                    <td colspan="4" align="right"> <?php echo number_format($rowkip['amount'],2); ?> USD</td>
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
            <form action="Report_salary.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
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
                    <th style="width: 10px;">#</th>
                    <th style="width: 20px;">ເລກທີ</th>
                    <th style="width: 80px;">ຜູ້ລົງບັນຊີ</th>
                    <th style="width: 80px;">ມູນຄ່າ</th>
                    <th style="width: 80px;">ລົງວັນທີ</th>
                    <th style="width: 30px;">ປະຈຳເດືອນ</th>
                    <th style="width: 60px;">ສະຖານະ</th>
                    <th style="width: 50px;">ພາບຫຼັກຖານ</th>
                </tr>
                <?php
                     $sqlsearch = "select sry_id,emp_name,amount,sal_date,sal_mon,s.status,s.img_path from salary s left join employees e on s.emp_id=e.emp_id where s.status='ອະນຸມັດ';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['sry_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['sal_date']; ?></td>
                    <td><?php echo $row['sal_mon'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(amount) as amount from salary where status='ອະນຸມັດ';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                <tr class="font26">
                    <td colspan="4" align="right">ລວມມູນຄ່າ:</td>
                    <td colspan="4" align="right"> <?php echo number_format($rowkip['amount'],2); ?> USD</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
