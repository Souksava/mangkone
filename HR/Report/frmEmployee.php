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
    <title>ລາຍງານຂໍ້ມູນພະນັກງານ</title>
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
                Report Employees
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
                    <b>Report Employees</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
      <div class="container font14">
            <div class="row">
                <form action="frmEmployee.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group"><br>
                        <input type="text" name="search" class="form-control" placeholder="Employee ID, Name, Surname, Gender, Auther">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group"><br>
                        <button class="btn btn-primary" name="btn">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-success" name="btnall">
                            ພະນັກງານທັງໝົດ
                        </button>
                    </div>
                </form>
            </div>
      </div>
    <div class="clearfix"></div><br>
    <?php
        if(isset($_POST['btn'])){
            $search = $_POST['search'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_employee.php" method="POST" id="form1">
                <input type="hidden" name="search" value="<?php echo $search ?>">
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
                    <th style="width: 100px">Employee ID</th>
                    <th style="width: 100px">Name</th>
                    <th style="width: 100px">Surname</th>
                    <th style="width: 60px">Gender</th>
                    <th style="width: 100px">Date of Birth</th>
                    <th style="width: 350px">Address</th>
                    <th style="width: 130px">Tel</th>
                    <th style="width: 120px">Email</th>
                    <th style="width: 150px">Auther</th>
                    <th style="width: 80px">Salary</th>
                    <th style="width: 80px">Start Work</th>
                    <th style="width: 80px">End work</th>
                    <th style="width: 80px">Status</th>
                    <th style="width: 50px">Image</th>
                <?php
                    $sqlsearch = "select emp_id,emp_name,upper(emp_surname) as emp_surname,gender,dob,address,tel,email,auther_name,salary,start_work,end_work,status,img_path from employees e left join auther a on e.auther_id=a.auther_id where emp_id='$search' or emp_name='$search' or emp_surname='$search' or gender='$search' or auther_name='$search' order by emp_id asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_surname']; ?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['tel'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['auther_name'];?></td>
                    <td><?php echo number_format($row['salary'],2);?> USD</td>
                    <td><?php echo $row['start_work'];?></td>
                    <td><?php echo $row['end_work'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(salary) as amount from employees e left join auther a on e.auther_id=a.auther_id where emp_id='$search' or emp_name='$search' or emp_surname='$search' or gender='$search' or auther_name='$search';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                <tr class="font26">
                    <td colspan="11" align="right">ຈຳນວນລາຍການ:</td>
                    <td colspan="5" align="right"> <?php echo $rowkip['amount']; ?> ລາຍການ</td>
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
            <form action="Report_employee.php" method="POST" id="form1">
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
                    <th style="width: 100px">Employee ID</th>
                    <th style="width: 100px">Name</th>
                    <th style="width: 100px">Surname</th>
                    <th style="width: 60px">Gender</th>
                    <th style="width: 100px">Date of Birth</th>
                    <th style="width: 350px">Address</th>
                    <th style="width: 130px">Tel</th>
                    <th style="width: 120px">Email</th>
                    <th style="width: 150px">Auther</th>
                    <th style="width: 80px">Salary</th>
                    <th style="width: 80px">Start Work</th>
                    <th style="width: 80px">End work</th>
                    <th style="width: 80px">Status</th>
                    <th style="width: 50px">Image</th>
                </tr>
                <?php
                    $sqlsearch = "select emp_id,emp_name,upper(emp_surname) as emp_surname,gender,dob,address,tel,email,auther_name,salary,start_work,end_work,status,img_path from employees e left join auther a on e.auther_id=a.auther_id order by emp_id asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_surname']; ?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['tel'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['auther_name'];?></td>
                    <td><?php echo number_format($row['salary'],2);?> USD</td>
                    <td><?php echo $row['start_work'];?></td>
                    <td><?php echo $row['end_work'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(salary) as amount from employees";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="11" align="right">ລວມທັງໝົດ:</td>
                    <td colspan="5" align="right"> <?php echo number_format($rowkip['amount'],2); ?> USD</td>
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
