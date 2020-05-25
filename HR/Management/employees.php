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
    <title>Employees</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="management.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Employees
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
            $auther = $_POST['auther_id'];
            $start = $_POST['start_work'];
            $end = $_POST['end_work'];
            $salary = $_POST['salary'];
            $status = $_POST['status'];
            $pass = $_POST['pass'];
            if(trim($end) == ""){
                $end = "0000-00-00";
            }
            if(trim($emp_id) == ""){
                echo"<script>";
                echo"alert('Please input Employee ID');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($emp_name) == ""){
                echo"<script>";
                echo"alert('Please input Employee Name');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($gender) == ""){
                echo"<script>";
                echo"alert('Please choose Gender');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($email) == ""){
                echo"<script>";
                echo"alert('Please input Email address');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($auther) == ""){
                echo"<script>";
                echo"alert('Please choose employee auther');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($status) == ""){
                echo"<script>";
                echo"alert('Please choose privilege');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($salary) == ""){
                echo"<script>";
                echo"alert('Please input salary');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            elseif(trim($start) == ""){
                echo"<script>";
                echo"alert('Please choose date of start work');";
                echo"window.location.href='employees.php';";
                echo"</script>";
            }
            else{
                $sqlckid = "select emp_id from employees where emp_id='$emp_id';";
                $resultckid = mysqli_query($link, $sqlckid);
                $sqlckemail = "select email from employees where email='$email';";
                $resultckemail = mysqli_query($link, $sqlckemail);
                if(mysqli_num_rows($resultckid) > 0){
                    echo"<script>";
                    echo"alert('Can not add employee because this employee ID had in database, please input new employee ID');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                elseif(mysqli_num_rows($resultckemail) > 0){
                    echo"<script>";
                    echo"alert('Can not add employee because this employee email had in database, please input new employee email');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else{
                    $ext = pathinfo(basename($_FILES["imgs"]["name"]), PATHINFO_EXTENSION);
                    $new_image_name = "img_".uniqid().".".$ext;
                    $image_path = "../../Stock/Management/images/";
                    $upload_path = $image_path.$new_image_name;
                    move_uploaded_file($_FILES["imgs"]["tmp_name"], $upload_path);
                    $pro_img = $new_image_name;
                    $sql = "insert into employees(emp_id,emp_name,emp_surname,gender,dob,address,tel,email,pass,auther_id,salary,start_work,end_work,status,img_path) values('$emp_id','$emp_name','$emp_surname','$gender','$dob','$address','$tel','$email','$pass','$auther','$salary','$start','$end','$status','$pro_img');";
                    $result = mysqli_query($link, $sql);
                    if(!$result)
                    {
                        echo"<script>";
                        echo"alert('Can not to save data please checking your input again..!');";
                        echo"window.location.href='employees.php';";
                        echo"</script>";
                    }
                    else{    
                        echo"<script>";
                        echo"alert('Save Date Successfuly');";
                        echo"window.location.href='employees.php';";
                        echo"</script>";
                    }
        
                }
            }

        }
      ?>
      <div class="container font16">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>Employees Data</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="employees.php" id="form1" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Add Employee</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="emp_id" placeholder="Employee ID*">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="emp_name" placeholder="Employee Name*">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="emp_surname" placeholder="Surname">
                                            </div>  
                                            <div class="col-xs-12 form-group">
                                                <select name="gender" id="" class="form-control">
                                                    <option value="">Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" class="form-control">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="text" name="address" class="form-control" placeholder="Address">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="tel" placeholder="Tel or Phone">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email Address*">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <select name="auther_id" id="" class="form-control">
                                                    <option value="">Choose Auther</option>
                                                    <?php
                                                        $sqlauther = "select * from auther;";
                                                        $resultauther = mysqli_query($link, $sqlauther);
                                                        while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                                        echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Left">Left</option>
                                                    <option value="Tranning">Tranning</option>
                                                </select>
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="number" class="form-control" name="salary" placeholder="salary">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <label>Start Work</label>
                                                <input type="date" class="form-control" name="start_work" placeholder="Start">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <label>Left Work</label>
                                                <input type="date" class="form-control" name="end_work" placeholder="Left Work">
                                            </div>
                                            <div class="col-xs-12 form-group" name="img" align="center">
                                                <label>Choose image</label>
                                                <input type="file" class="form-control" name="imgs" id="imgs" />
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btnsave" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
      </div> 
      <div class="container">
            <div class="row">
                <form action="employees.php" id="fomrsearch" method="POST">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="Search">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
      </div>
      <div class="clearfix"></div><br>
    <div class="container font12b" >
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th style="width: 300px;">Address</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>auther</th>
                    <th>Salary</th>
                    <th>Start Work</th>
                    <th>Left Work</th>
                    <th>Status</th>
                    <th>image</th>
                    <th>Tool</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlselect = "select emp_id,emp_name,emp_surname,gender,img_path,dob,address,tel,email,md5(pass) as pass,auther_name,salary,start_work,end_work,status from employees e join auther a on e.auther_id=a.auther_id where e.emp_id like'$search' or e.emp_name like'$search' or e.emp_surname like'$search' or e.gender like'$search';";
                    $resultselect = mysqli_query($link,$sqlselect);
                    while($row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_surname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pass']; ?></td>
                    <td><?php echo $row['auther_name']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['start_work']; ?></td>
                    <td><?php echo $row['end_work']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                    </td>
                    <td>
                        <a href="UpdateEmp.php?emp_id=<?php echo $row['emp_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deleteEmp.php?emp_id=<?php echo $row['emp_id']; ?>">
                            <img src="../../image/Delete.png" alt="" width="20px">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    mysqli_close($link);
                ?>
            </table>
        </div>
    </div>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
