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
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Report Update Salary</title>
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
                Report Update Salary
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
                    <b>Report Update Salary</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
      <div class="container font14">
            <div class="row">
                <form action="frmUpdatesalary.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>Date Update Salary</label><br>
                        <input type="date" name="date1" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>Date Update Salary</label><br>
                        <input type="date" name="date2" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>Employee ID, Name, Gender, Auther</label><br>
                        <input type="text" name="search" class="form-control" placeholder="Employee ID, Name, Gender, Auther">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group"><br>
                        <button class="btn btn-primary" name="btn">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-success" name="btnall">
                            All Employees
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
            <form action="Report_updatesalary.php" method="POST" id="form1">
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
                    <th style="width: 20px">#</th>
                    <th style="width: 30px">Employee ID</th>
                    <th style="width: 30px">Name</th>
                    <th style="width: 30px">Surname</th>
                    <th style="width: 30px">Gender</th>
                    <th style="width: 30px">Auther Name</th>
                    <th style="width: 60px">Old Salary</th>
                    <th style="width: 60px">New Salary</th>
                    <th style="width: 45px">Date</th>
                    <th style="width: 50px">Image</th>
                <?php
                    $sqlsearch = "select sry_id,c.emp_id,emp_name,emp_surname,gender,old_salary,new_salary,date_ch,auther_name,img_path from chsalary c left join employees e on c.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id where date_ch between '$date1' and '$date2' or c.emp_id='$search' or emp_name='$search' or gender='$search' or auther_name='$search' order by date_ch asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_surname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['auther_name'];?></td>
                    <td><?php echo number_format($row['old_salary'],2);?> USD</td>
                    <td><?php echo number_format($row['new_salary'],2);?> USD</td>
                    <td><?php echo $row['date_ch'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(old_salary) as old,sum(new_salary) as new from chsalary c left join employees e on c.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id where date_ch between '$date1' and '$date2' or c.emp_id='$search' or emp_name='$search' or gender='$search' or auther_name='$search';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="7" align="right">Total Old Salary:</td>
                    <td colspan="3" align="right"> <?php echo number_format($rowkip['old'],2); ?> USD</td>
                </tr>
                <tr class="font26">
                    <td colspan="7" align="right">Total New Salary:</td>
                    <td colspan="3" align="right"> <?php echo number_format($rowkip['new'],2); ?> USD</td>
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
            <form action="Report_updatesalary.php" method="POST" id="form1">
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
            <table class="table table-striped" style="width: 1300px;">
                <tr>
                    <th style="width: 20px">#</th>
                    <th style="width: 30px">Employee ID</th>
                    <th style="width: 30px">Name</th>
                    <th style="width: 30px">Surname</th>
                    <th style="width: 30px">Gender</th>
                    <th style="width: 30px">Auther Name</th>
                    <th style="width: 60px">Old Salary</th>
                    <th style="width: 60px">New Salary</th>
                    <th style="width: 45px">Date</th>
                    <th style="width: 50px">Image</th>
                </tr>
                <?php
                    $sqlsearch = "select sry_id,c.emp_id,emp_name,emp_surname,gender,old_salary,new_salary,date_ch,auther_name,img_path from chsalary c left join employees e on c.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_surname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['auther_name'];?></td>
                    <td><?php echo number_format($row['old_salary'],2);?> USD</td>
                    <td><?php echo number_format($row['new_salary'],2);?> USD</td>
                    <td><?php echo $row['date_ch'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(old_salary) as old_salary,sum(new_salary) as new_salary from chsalary;";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="7" align="right">Total Old Salary:</td>
                    <td colspan="3" align="right"> <?php echo number_format($rowkip['old_salary'],2); ?> USD</td>
                </tr>
                <tr class="font26">
                    <td colspan="7" align="right">Total New Salary:</td>
                    <td colspan="3" align="right"> <?php echo number_format($rowkip['new_salary'],2); ?> USD</td>
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
