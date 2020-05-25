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
    <title>Employees Skill</title>
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
                Employees Skill
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
            $course_name = $_POST['course_name'];
            $course_start = $_POST['course_start'];
            $course_end = $_POST['course_end'];
            if(trim($emp_id) == ""){
                echo"<script>";
                echo"alert('Please Choose Employee');";
                echo"window.location.href='emp_skill.php';";
                echo"</script>";
            }
            elseif(trim($course_name) == ""){
                echo"<script>";
                echo"alert('Please input Course Name');";
                echo"window.location.href='emp_skill.php';";
                echo"</script>";
            }
            elseif(trim($course_start) == ""){
                echo"<script>";
                echo"alert('Please Choose Date of Start Course');";
                echo"window.location.href='emp_skill.php';";
                echo"</script>";
            }
            elseif(trim($course_end) == ""){
                echo"<script>";
                echo"alert('Please Choose Date of End Course');";
                echo"window.location.href='emp_skill.php';";
                echo"</script>";
            }
            else{
                    $ext = pathinfo(basename($_FILES["img_path"]["name"]), PATHINFO_EXTENSION);
                    $new_image_name = "img_".uniqid().".".$ext;
                    $image_path = "../../Stock/Management/images/";
                    $upload_path = $image_path.$new_image_name;
                    move_uploaded_file($_FILES["img_path"]["tmp_name"], $upload_path);
                    $pro_img = $new_image_name;
                    $sql = "insert into emp_skill(emp_id,course_name,course_start,course_end,certificate) values('$emp_id','$course_name','$course_start','$course_end','$pro_img');";
                    $result = mysqli_query($link, $sql);
                    if(!$result)
                    {
                        echo"<script>";
                        echo"alert('Can not to save data please checking your input again..!');";
                        echo"window.location.href='emp_skill.php';";
                        echo"</script>";
                    }
                    else{    
                        echo"<script>";
                        echo"alert('Save Date Successfuly');";
                        echo"window.location.href='emp_skill.php';";
                        echo"</script>";
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
                    <form action="emp_skill.php" id="form1" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Add Employee Skill</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">  
                                                <select name="emp_id" id="" class="form-control">
                                                    <option value="">Choose Employees</option>
                                                    <?php
                                                        $sqlauther = "select * from employees;";
                                                        $resultauther = mysqli_query($link, $sqlauther);
                                                        while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                                        echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="course_name" placeholder="Course Name">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <label>Date of Start Course</label>
                                                <input type="date" class="form-control" name="course_start">
                                            </div>  
                                            <div class="col-xs-12 form-group">
                                                <label>Date of End Course</label>
                                                <input type="date" name="course_end" class="form-control">
                                            </div> 
                                            <div class="col-xs-12 form-group" name="img" align="center">
                                                <label>Choose Certificate</label>
                                                <input type="file" class="form-control" name="img_path" />
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
                <form action="emp_skill.php" id="fomrsearch" method="POST">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="Search Employee Name, Course">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
      </div>
      <div class="clearfix"></div><br>
    <div class="container font12b" >
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1280px;">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname Name</th>
                    <th>Course Name</th>
                    <th>Course Start</th>
                    <th>Course End</th>
                    <th>Certificate</th>
                    <th>Tool</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlselect = "select skill_id,s.emp_id,emp_name,emp_surname,course_name,course_start,course_end,certificate from emp_skill s join employees e on s.emp_id=e.emp_id where e.emp_id like'$search' or e.emp_name like'$search' or e.emp_surname like'$search' or e.gender like'$search' order by emp_name;";
                    $resultselect = mysqli_query($link,$sqlselect);
                    while($row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1 ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_surname']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['course_start']; ?></td>
                    <td><?php echo $row['course_end']; ?></td>
                    <td>
                        <img src="../../Stock/Management/images/<?php echo $row['certificate']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                    </td>
                    <td>
                        <a href="updateskill.php?skill_id=<?php echo $row['skill_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deleteskill.php?skill_id=<?php echo $row['skill_id']; ?>">
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
