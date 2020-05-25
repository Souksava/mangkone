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
    <title>import employee</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="interview.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>Import Employee</b>
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
    <?php
        $id = $_GET['app_id'];
        $sqlget = "select app_id,app_name,app_surname,gender,dob,address,tel,email,a.auther_id,auther_name,school,salary,experience,can_start from applyemp a join auther r on a.auther_id=r.auther_id where app_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget,MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <form action="importemp.php" method="POST" id="form1">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Employee ID</label><br>
                    <input type="text" name="emp_id" class="form-control" id="" placeholder="Employee ID">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Name</label><br>
                    <input type="text" name="emp_name" class="form-control" id="" placeholder="Name" value="<?php echo $row['app_name']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Surname</label><br>
                    <input type="text" name="emp_surname" class="form-control" id="" placeholder="Surname" value="<?php echo $row['app_surname']; ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Gender</label><br>
                    <select name="gender" class="form-control">
                        <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                        <option value="ຍິງ">ຍິງ</option>
                        <option value="ຊາຍ">ຊາຍ</option>
                    </select>
                </div>
            </div>
            <div class="row">
               
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Tel</label><br>
                    <input type="text" name="tel" class="form-control" id="" placeholder="Tel" value="<?php echo $row['tel'] ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Date of Birth</label><br>
                    <input type="date" name="dob" class="form-control" id="" value="<?php echo $row['dob'] ?>">
                </div>
            </div>
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>email</label><br>
                    <input type="email" name="email" class="form-control" id="" placeholder="Email Address" value="<?php echo $row['email'] ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Auther Apply</label><br>
                <select name="auther_id" id="" class="form-control">
                        <option value="<?php echo $row['auther_id'] ?>"><?php echo $row['auther_name']; ?></option>
                            <?php
                                $auther_id2 = $row['auther_id'];
                                $sqlauther = "select * from auther where auther_id != '$auther_id2';";
                                $resultauther = mysqli_query($link, $sqlauther);
                                while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                    echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                }
                            ?>
                </select>
                </div>
            </div>
            <div class="row">
               
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Salary</label><br>
                    <input type="number" min="0" name="salary" class="form-control" id="" placeholder="Salary" value="<?php echo $row['salary'] ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Address</label><br>
                    <input type="text" name="address" class="form-control" id="" placeholder="Address" value="<?php echo $row['address'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Start Work</label><br>
                    <input type="date" name="start_work" class="form-control" id="" >
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Status Work</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Status</option>
                        <option value="Active">Active</option>
                        <option value="Left">Left</option>
                        <option value="Tranning">Tranning</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" align="left">
                    <button type="submit" class="btn btn-warning" name="btnsave" style="width: 300px;">
                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp imort to employee
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
       if(isset($_POST['btnsave'])){
           $emp_id = $_POST['emp_id'];
           $emp_name = $_POST['emp_name'];
           $emp_surname = $_POST['emp_surname'];
           $gender = $_POST['gender'];
           $dob = $_POST['dob'];
           $address = $_POST['address'];
           $tel = $_POST['tel'];
           $email = $_POST['email'];
           $auther_id = $_POST['auther_id'];
           $salary = $_POST['salary'];
           $start_work = $_POST['start_work'];
           $status = $_POST['status'];
           $sqlID = "select * from employees where emp_id='$emp_id';";
           $resultID = mysqli_query($link,$sqlID);
           $sqlemail = "select * from employees where email='$email';";
           $resultemail = mysqli_query($link,$sqlemail);
           if(trim($emp_id) == ""){
            echo"<script>";
            echo"alert('Please input employee ID');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
            }
           elseif(trim($emp_name) == ""){
                echo"<script>";
                echo"alert('Please input employee name');";
                echo"window.location.href='importemp.php';";
                echo"</script>";
           }
           elseif(trim($emp_surname) == ""){
            echo"<script>";
            echo"alert('Please input employee surname');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
            }
           elseif(trim($gender) == ""){
            echo"<script>";
            echo"alert('Please choose gender');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
           }
           elseif(trim($tel) == ""){
            echo"<script>";
            echo"alert('Please input tel');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
           }
           elseif(trim($auther_id) == ""){
            echo"<script>";
            echo"alert('Please choose auther');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
           }
           elseif(trim($salary) == ""){
            echo"<script>";
            echo"alert('Please input salary');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
           }
           elseif(trim($start_work) == ""){
            echo"<script>";
            echo"alert('Please choose start work');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
           }
           elseif(trim($status) == ""){
            echo"<script>";
            echo"alert('Please choose status');";
            echo"window.location.href='importemp.php';";
            echo"</script>";
           }
           else{
              if(mysqli_num_rows($resultID) > 0){
                    echo"<script>";
                    echo"alert('This employee ID is same, please input new employee ID');";
                    echo"window.location.href='importemp.php';";
                    echo"</script>";
              }
              elseif(mysqli_num_rows($resultemail) > 0){
                echo"<script>";
                echo"alert('This employee email is same, please input new employee email');";
                echo"window.location.href='importemp.php';";
                echo"</script>";
            }
              else{
                    $sql = "insert into employees(emp_id,emp_name,emp_surname,gender,dob,address,tel,email,auther_id,salary,start_work,status) values('$emp_id','$emp_name','$emp_surname','$gender','$dob','$address','$tel','$email','$auther_id','$salary','$start_work','$status');";
                    $result = mysqli_query($link,$sql);
                    if(!$result){
                        echo"<script>";
                        echo"alert('Save data fail');";
                        echo"window.location.href='importemp.php';";
                        echo"</script>";  
                    }
                    else{
                        echo"<script>";
                        echo"alert('Save data success');";
                        echo"window.location.href='../Management/employees.php';";
                        echo"</script>";
                    }
              }
           }
       }
    ?>
    <br><br>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
