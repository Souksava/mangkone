<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 4){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/Logout.php'>";
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
    <title>Update Salary</title>
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
                <b>Update Salary</b>
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
    <div class="container font16">
        <form action="Updatesalary.php" method="POST" id="form1">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>Employee</label>
                    <select name="emp_id" id="" class="form-control">
                        <option value="">Choose Employee</option>
                            <?php
                                $sqlauther = "select * from employees;";
                                $resultauther = mysqli_query($link, $sqlauther);
                                while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                    echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                }
                            ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>New Salary</label>
                    <input type="number" min="0" name="salary" class="form-control" placeholder="New Salary">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group"><br>
                    <button type="submit" class="btn btn-warning" name="btnUpdate" style="width: 150px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp Update Salary
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $emp_id = $_POST['emp_id'];
            $salary = $_POST['salary'];
            if(trim($emp_id) == ""){
                echo"<script>";
                echo"alert('Please choose Employee');";
                echo"window.location.href='Updatesalary.php';";
                echo"</script>";
            }
            elseif(trim($salary) == ""){
                echo"<script>";
                echo"alert('Please input salary');";
                echo"window.location.href='Updatesalary.php';";
                echo"</script>";
            }
            else{
                $sqlget = "select salary from employees where emp_id='$emp_id';";
                $resultget = mysqli_query($link,$sqlget);
                $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
                $oldsalary = $row['salary'];
                $sqlupdate = "update employees set salary='$salary' where emp_id='$emp_id';";
                $resultupdate = mysqli_query($link,$sqlupdate);
                if(!$resultupdate){
                    echo"<script>";
                    echo"alert('Update new salary fail');";
                    echo"window.location.href='Updatesalary.php';";
                    echo"</script>";
                }
                else{
                    $sql = "insert into chsalary(emp_id,old_salary,new_salary,date_ch) values('$emp_id','$oldsalary','$salary','$Date');";
                    $result = mysqli_query($link,$sql);
                   if(!$result){
                        echo"<script>";
                        echo"alert('Update new salary fail');";
                        echo"window.location.href='Updatesalary.php';";
                        echo"</script>";
                   }
                   else{
                        echo"<script>";
                        echo"alert('Update New Salary Successfully..!');";
                        echo"window.location.href='Updatesalary.php';";
                        echo"</script>";
                   }
                }
            }
        }
    ?>
    <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
