<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 1){
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
    <title>Update Employee</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="employees.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Update Employee
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
    <!-- head -->
    <?php
        $id = $_GET['emp_id'];
        $sqlselect = "select emp_id,emp_name,emp_surname,gender,img_path,dob,address,tel,email,pass,a.auther_id,auther_name,salary,start_work,end_work,status from employees e join auther a on e.auther_id=a.auther_id where emp_id='$id';";
        $resultselect = mysqli_query($link,$sqlselect);
        $row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC);
    ?>
      <div class="clearfix"></div><br>
      <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <div class="row">
                    <form action="UpdateEmp.php" id="form1" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'];?>" />
                        <input type="text" name="emp_name" class="form-control" value="<?php echo $row['emp_name'] ?>" placeholder="Employee Name">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="text" class="form-control" name="emp_surname" value="<?php echo $row['emp_surname'] ?>" placeholder="Employee Surname">
                    </div>  
                    <div class="col-xs-12 col-sm-6 form-group">
                        <select name="gender" id="" class="form-control">
                            <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>" placeholder="Address">
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="text" class="form-control" name="tel" value="<?php echo $row['tel'] ?>" placeholder="Tel">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Email Address">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <select name="auther_id" id="" class="form-control">
                            <option value="<?php echo $row['auther_id']; ?>"><?php echo $row['auther_name']; ?></option>
                                <?php
                                    $auther_id = $row['auther_id'];
                                    $sqlauther = "select * from auther where auther_id != '$auther_id';";
                                    $resultauther = mysqli_query($link, $sqlauther);
                                    while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                        echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                    }
                                ?>
                        </select>
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group">
                        <select name="status" id="" class="form-control">
                            <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                            <option value="Active">Active</option>
                            <option value="Left">Left</option>
                            <option value="Tranning">Tranning</option>
                        </select>
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="password" class="form-control" name="pass" value="<?php echo $row['pass'];?>" placeholder="Password">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="number" class="form-control" name="salary" value="<?php echo $row['salary'];?>" placeholder="Salary">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="date" class="form-control" name="start_work" value="<?php echo $row['start_work'];?>" placeholder="Start Work">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="date" class="form-control" name="end_work" value="<?php echo $row['end_work'];?>" placeholder="Left Work">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group" align="left">
                        <label>Choose image</label>
                        <input type="file" name="imgs" />
                    </div>
                    <div class="col-xs-12" align="center">
                        <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນ
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $emp_id = $_POST['emp_id'];
            $emp_name = $_POST['emp_name'];
            $emp_surname = $_POST['emp_surname'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $auther = $_POST['auther_id'];
            $status = $_POST['status'];
            $salary = $_POST['salary'];
            $start = $_POST['start_work'];
            $end = $_POST['end_work'];
            if($_FILES['imgs']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
            {
                // ຖ້າຟາຍເປັນຄ່າວ່າງໃຫ້ທຳການອັບເດດຊື່ເປັນໂຕເກົ່າ
                $sqlimg = "select img_path from employees where emp_id='$emp_id';";
                $resultimg = mysqli_query($link, $sqlimg);
                $data = mysqli_fetch_array($resultimg, MYSQLI_ASSOC);
                $pro_image = $data['img_path'];
                // ສິນສຸດ
                $sql = "update employees set emp_name='$emp_name', emp_surname='$emp_surname',gender='$gender',dob='$dob',address='$address',tel='$tel',email='$email',pass='$pass',auther_id='$auther',status='$status',img_path='$pro_image',salary='$salary',start_work='$start',end_work='$end' where emp_id ='$emp_id';";
                $result = mysqli_query($link, $sql);
                     if(!$result)
                         {
                           echo"<script>";
                           echo"alert('Can not to Update data please checking your input data');";
                           echo"window.location.href='employees.php';";
                          echo"</script>";
                          }
                        else{
                            echo"<script>";
                            echo"alert('Update date successfuly');";
                            echo"window.location.href='employees.php';";
                            echo"</script>";
                        }
            } 
            else{
                 //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                 $sqlsec = "select img_path from employees where emp_id='$emp_id';";
                 $resultsec = mysqli_query($link, $sqlsec);
                 $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                 $path = __DIR__.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                 if(file_exists($path) && !empty($data2['img_path'])){
                     unlink($path);
                 }
                 //ສິ້ນສຸດ
                 //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                 $ext = pathinfo(basename($_FILES['imgs']['name']), PATHINFO_EXTENSION);
                 $new_image_name = 'img_'.uniqid().".".$ext;
                 $image_path = "images/";
                 $upload_path = $image_path.$new_image_name;
                 move_uploaded_file($_FILES['imgs']['tmp_name'], $upload_path);
                 $pro_image = $new_image_name;
                 //ສິນສຸດການຕັ້ງຊື່
                 $sql = "update employees set emp_name='$emp_name', emp_surname='$emp_surname',gender='$gender',dob='$dob',address='$address',tel='$tel',email='$email',pass='$pass',auther_id='$auther',status='$status',img_path='$pro_image',salary='$salary',start_work='$start',end_work='$end' where emp_id ='$emp_id';";
                 $result1 = mysqli_query($link, $sql);
                 if(!$result1)
                 {
                    echo"<script>";
                    echo"alert('Can not to Update data please checking your input data');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                 }
                 else{
                     
                    echo"<script>";
                    echo"alert('Update date successfuly');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                 }
            }
        }
     
    ?>


    
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
