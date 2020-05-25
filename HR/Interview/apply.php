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
    <title>apply</title>
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
                <b>apply</b>
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
    <div class="container font16">
        <form action="apply.php" method="POST" id="form1">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Name</label><br>
                    <input type="text" name="app_name" class="form-control" id="" placeholder="Name">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Surname</label><br>
                    <input type="text" name="app_surname" class="form-control" id="" placeholder="Surname">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Gender</label><br>
                    <select name="gender" id="" class="form-control">
                        <option value="">Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Date of Birth</label><br>
                    <input type="date" name="dob" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Address</label><br>
                    <input type="text" name="address" class="form-control" id="" placeholder="Address">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Tel</label><br>
                    <input type="text" name="tel" class="form-control" id="" placeholder="Tel">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>email</label><br>
                    <input type="email" name="email" class="form-control" id="" placeholder="Email Address">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Auther Apply</label><br>
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
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>University\College</label><br>
                    <input type="text" name="school" class="form-control" id="" placeholder="University\College">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Salary</label><br>
                    <input type="number" min="0"  name="salary" class="form-control" id="" placeholder="Salary">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <select name="rate_id" id="" class="form-control">
                        <option value="">Choose Rate</option>
                        <option value="LAK">LAK</option>
                        <option value="THB">THB</option>
                        <option value="USD">USD</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Experience</label><br>
                    <input type="text" name="experience" class="form-control" id="" placeholder="Experience">
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>Can Start to Work</label><br>
                    <input type="date" name="can_start" class="form-control" id="">
                </div>
                <div class="col-xs-12" align="left">
                    <button type="submit" class="btn btn-warning" name="btnsave" style="width: 300px;">
                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp Save data
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
       if(isset($_POST['btnsave'])){
           $app_id = $_POST['app_id'];
           $app_name = $_POST['app_name'];
           $app_surname = $_POST['app_surname'];
           $gender = $_POST['gender'];
           $dob = $_POST['dob'];
           $address = $_POST['address'];
           $tel = $_POST['tel'];
           $email = $_POST['email'];
           $auther_id = $_POST['auther_id'];
           $school = $_POST['school'];
           $salary = $_POST['salary'];
           $experience = $_POST['experience'];
           $can_start = $_POST['can_start'];
           $rate_id = $_POST['rate_id'];
           if(trim($app_name) == ""){
                echo"<script>";
                echo"alert('Please input name');";
                echo"window.location.href='apply.php';";
                echo"</script>";
           }
           elseif(trim($gender) == ""){
            echo"<script>";
            echo"alert('Please choose gender');";
            echo"window.location.href='apply.php';";
            echo"</script>";
           }
           elseif(trim($tel) == ""){
            echo"<script>";
            echo"alert('Please input tel');";
            echo"window.location.href='apply.php';";
            echo"</script>";
           }
           elseif(trim($auther_id) == ""){
            echo"<script>";
            echo"alert('Please choose auther');";
            echo"window.location.href='apply.php';";
            echo"</script>";
           }
           elseif(trim($salary) == ""){
            echo"<script>";
            echo"alert('Please input salary');";
            echo"window.location.href='apply.php';";
            echo"</script>";
           }
           elseif(trim($rate_id) == ""){
            echo"<script>";
            echo"alert('Please Choose Rate');";
            echo"window.location.href='apply.php';";
            echo"</script>";
           }
           else{
               $sql = "insert into applyemp(app_name,app_surname,gender,dob,address,tel,email,auther_id,school,salary,experience,can_start,date_apply,rate_id) values('$app_name','$app_surname','$gender','$dob','$address','$tel','$email','$auther_id','$school','$salary','$experience','$can_start','$Date','$rate_id');";
               $result = mysqli_query($link,$sql);
               if(!$result){
                    echo"<script>";
                    echo"alert('Save data fail');";
                    echo"window.location.href='apply.php';";
                    echo"</script>";  
               }
               else{
                    echo"<script>";
                    echo"alert('Save data success');";
                    echo"window.location.href='apply.php';";
                    echo"</script>";
               }
           }
       }
    ?>
    <br><br>
    <div class="container font14">
        <div class="row">
            <form action="apply.php" id="fomrsearch" method="POST">
                <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="Search">
                <button class="btn btn-primary" type="submit">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th style="width: 300px;">Address</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Auther</th>
                    <th>University\College</th>
                    <th>Salary</th>
                    <th style="width: 150px;">Experience</th>
                    <th style="width: 80px;">Can_start_work</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlshow = "select app_id,app_name,rate_id,app_surname,gender,dob,address,tel,email,auther_name,school,salary,experience,can_start from applyemp a left join auther r on a.auther_id=r.auther_id where app_name like '$search' or app_surname like '$search' or gender like '$search' or auther_name like '$search';";
                    $resultshow = mysqli_query($link,$sqlshow);
                    while($row = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                ?>
                    <td><?php echo $row['app_id']; ?></td>
                    <td><?php echo $row['app_name']; ?></td>
                    <td><?php echo $row['app_surname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['auther_name']; ?></td>
                    <td><?php echo $row['school']; ?></td>
                    <td><?php echo number_format($row['salary'],2); ?> <?php echo $row['rate_id'] ?></td>
                    <td><?php echo $row['experience']; ?></td>
                    <td><?php echo $row['can_start']; ?></td>
                    <td>
                        <a href="deleteapply.php?app_id=<?php echo $row['app_id'];?>">
                            <img src="../../image/delete.png" width="30px">
                        </a>
                    </td>
                    <td>
                        <a href="importemp.php?app_id=<?php echo $row['app_id'];?>" class="btn btn-success">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
