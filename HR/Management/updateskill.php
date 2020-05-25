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
    <title>Update Employee Skill</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="emp_skill.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Edit Employee Skill
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
        $id = $_GET['skill_id'];
        $sqlselect = "select skill_id,s.emp_id,emp_name,course_name,course_start,course_end,certificate from emp_skill s left join employees e on s.emp_id=e.emp_id where skill_id='$id';";
        $resultselect = mysqli_query($link,$sqlselect);
        $row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC);
    ?>
      <div class="clearfix"></div><br>
      <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <div class="row">
                    <form action="updateskill.php" id="formupdate" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="hidden" name="skill_id" value="<?php echo $row['skill_id'];?>" />
                        <select name="emp_id" id="" class="form-control">
                            <option value="<?php echo $row['emp_id']; ?>"><?php echo $row['emp_name']; ?></option>
                                <?php
                                    $emp_id = $row['emp_id'];
                                    $sqlauther = "select * from employees where emp_id != '$emp_id';";
                                    $resultauther = mysqli_query($link, $sqlauther);
                                    while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                        echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="text" class="form-control" name="course_name" value="<?php echo $row['course_name'] ?>" placeholder="Course Name">
                    </div>  
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>Date of Start Course</label>
                        <input type="date" name="course_start" class="form-control" value="<?php echo $row['course_start']; ?>">
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>Date of Course End</label>
                        <input type="date" class="form-control" name="course_end" value="<?php echo $row['course_end'] ?>">
                    </div> 
                    <div class="col-xs-12 col-sm-6 form-group" align="left">
                        <label>Certificate</label>
                        <input type="file" name="img_path" class="form-control" />
                    </div>
                    <div class="col-xs-12" align="center">
                        <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp Update Data
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $skill_id = $_POST['skill_id'];
            $emp_id = $_POST['emp_id'];
            $course_name = $_POST['course_name'];
            $course_start = $_POST['course_start'];
            $course_end = $_POST['course_end'];
            if($_FILES['img_path']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
            {
                $sql = "update emp_skill set emp_id='$emp_id',course_name='$course_name',course_start='$course_start',course_end='$course_end' where skill_id='$skill_id';";
                $result = mysqli_query($link, $sql);
                     if(!$result)
                         {
                           echo"<script>";
                           echo"alert('Can not to Update data please checking your input data');";
                           echo"window.location.href='emp_skill.php';";
                          echo"</script>";
                          }
                        else{
                            echo"<script>";
                            echo"alert('Update data successfuly');";
                            echo"window.location.href='emp_skill.php';";
                            echo"</script>";
                        }
            } 
            else{
                 //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                 $sqlsec = "select ceritificate from emp_skill where skill_id='$skill_id';";
                 $resultsec = mysqli_query($link, $sqlsec);
                 $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                 $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['ceritificate'];
                 if(file_exists($path) && !empty($data2['ceritificate'])){
                     unlink($path);
                 }
                 //ສິ້ນສຸດ
                 //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                 $ext = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                 $new_image_name = 'img_'.uniqid().".".$ext;
                 $image_path = "../../Stock/Management/images/";
                 $upload_path = $image_path.$new_image_name;
                 move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path);
                 $pro_image = $new_image_name;
                 //ສິນສຸດການຕັ້ງຊື່
                 $sql = "update emp_skill set emp_id='$emp_id',course_name='$course_name',course_start='$course_start',course_end='$course_end',certificate='$pro_image' where skill_id='$skill_id';";
                 $result1 = mysqli_query($link, $sql);
                 if(!$result1)
                 {
                    echo"<script>";
                    echo"alert('Can not to Update data please checking your input data');";
                    echo"window.location.href='emp_skill.php';";
                    echo"</script>";
                 }
                 else{
                     
                    echo"<script>";
                    echo"alert('Update data successfuly');";
                    echo"window.location.href='emp_skill.php';";
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
