<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 4){
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
    <title>Report Apply Job</title>
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
                Report Apply Job
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
                    <b>Report Apply Job</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
      <div class="container font14">
            <div class="row">
                <form action="frmApply.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ແຕ່ວັນທີ</label><br>
                        <input type="date" name="date1" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ຫາວັນທີ</label><br>
                        <input type="date" name="date2" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ຄົ້ນຫາດ້ວຍຊື່ ຫຼື ເພດ</label><br>
                        <input type="text" name="search" class="form-control" placeholder="Name, Gender, Auther">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group"><br>
                        <button class="btn btn-primary" name="btn">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-success" name="btnall">
                            ຜູ້ສະໝັກທັງໝົດ
                        </button>
                    </div>
                </form>
            </div>
      </div>
    <div class="clearfix"></div><br>
    <?php
        if(isset($_POST['btn'])){
            $search = $_POST['search'];
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_apply.php" method="POST" id="form1">
                <input type="hidden" name="search" value="<?php echo $search ?>">
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
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 40px">#</th>
                    <th style="width: 100px">Name</th>
                    <th style="width: 100px">Surname</th>
                    <th style="width: 60px">Gender</th>
                    <th style="width: 100px">Date of Birth</th>
                    <th style="width: 350px">Address</th>
                    <th style="width: 130px">Tel</th>
                    <th style="width: 120px">Email</th>
                    <th style="width: 130px">Auther</th>
                    <th style="width: 140px">University</th>
                    <th style="width: 150px">Salary</th>
                    <th style="width: 140px">Experience</th>
                    <th style="width: 80px">Can Start</th>
                    <th style="width: 80px">Date Apply</th>
                <?php
                    $sqlsearch = "select app_id,rate_id,app_name,app_surname,gender,dob,address,tel,email,auther_name,school,salary,experience,can_start,date_apply from applyemp p left join auther a on p.auther_id=a.auther_id where date_apply between '$date1' and '$date2' or app_name='$search' or gender='$search' or auther_name='$search' order by date_apply asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['app_name']; ?></td>
                    <td><?php echo $row['app_surname']; ?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['tel'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['auther_name'];?></td>
                    <td><?php echo $row['school'];?></td>
                    <td><?php echo number_format($row['salary'],2);?> <?php echo $row['rate_id']; ?></td>
                    <td><?php echo $row['experience'];?></td>
                    <td><?php echo $row['can_start'];?></td>
                    <td><?php echo $row['date_apply'];?></td>
                </tr>
                <?php
                    }
                    $sqlkip = "select count(*) as amount from applyemp p left join auther a on p.auther_id=a.auther_id where date_apply between '$date1' and '$date2' or app_name='$search' or gender='$search' or auther_name='$search';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="9" align="right">Counts:</td>
                    <td colspan="5" align="right"> <?php echo $rowkip['amount']; ?> LIST</td>
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
            <form action="Report_apply.php" method="POST" id="form1">
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
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 40px">#</th>
                    <th style="width: 100px">Name</th>
                    <th style="width: 100px">Surname</th>
                    <th style="width: 60px">Gender</th>
                    <th style="width: 100px">Date of Birth</th>
                    <th style="width: 350px">Address</th>
                    <th style="width: 130px">Tel</th>
                    <th style="width: 120px">Email</th>
                    <th style="width: 130px">Auther</th>
                    <th style="width: 140px">University</th>
                    <th style="width: 150px">Salary</th>
                    <th style="width: 140px">Experience</th>
                    <th style="width: 80px">Can Start</th>
                    <th style="width: 80px">Date Apply</th>
                </tr>
                <?php
                    $sqlsearch = "select app_id,rate_id,app_name,app_surname,gender,rate_id,dob,address,tel,email,auther_name,school,salary,experience,can_start,date_apply from applyemp p left join auther a on p.auther_id=a.auther_id order by date_apply asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['app_name']; ?></td>
                    <td><?php echo $row['app_surname']; ?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['tel'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['auther_name'];?></td>
                    <td><?php echo $row['school'];?></td>
                    <td><?php echo number_format($row['salary'],2);?> <?php echo $row['rate_id']; ?></td>
                    <td><?php echo $row['experience'];?></td>
                    <td><?php echo $row['can_start'];?></td>
                    <td><?php echo $row['date_apply'];?></td>
                </tr>
                <?php
                    }
                    $sqlkip = "select count(*) as amount from applyemp";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="9" align="right">Counts:</td>
                    <td colspan="5" align="right"> <?php echo $rowkip['amount']; ?> LIST</td>
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
