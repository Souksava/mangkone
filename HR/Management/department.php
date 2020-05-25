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
    <title>Department</title>
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
                <b>Department</b>
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
        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>Department</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="department.php" method="POST" id="form1">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Add Department</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="dept_name" placeholder="Department Name">
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" name="btnDept" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnDept'])){
                            $dept_name = $_POST['dept_name'];
                            $sqlck = "select * from department where dept_name='$dept_name';";
                            $resultck = mysqli_query($link,$sqlck);
                            if(trim($dept_name) == ""){
                                echo"<script>";
                                echo"alert('Please input department name');";
                                echo"window.location.href='department.php';";
                                echo"</script>";
                            }
                            else if(mysqli_num_rows($resultck) > 0){
                                echo"<script>";
                                echo"alert('This department name: $dept_name is same, please input different department name');";
                                echo"window.location.href='department.php';";
                                echo"</script>";
                            }
                            else{
                                $sql = "insert into department(dept_name) values('$dept_name');";
                                $result = mysqli_query($link, $sql);
                                if(!$result){
                                    echo"<script>";
                                    echo"alert('Save Data Fail');";
                                    echo"window.location.href='department.php';";
                                    echo"</script>";
                                }
                                else
                                {
                                    echo"<script>";
                                    echo"alert('Save data successfully..!');";
                                    echo"window.location.href='department.php';";
                                    echo"</script>";
                                }
                            }
                        }
                    ?>
                </div>
            </div> 
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="department.php" id="fomrsearch" method="POST">
                <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="Search">
                <button class="btn btn-primary" type="submit" name="btnSearch">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </form>
        </div>
    </div>
    <div class="container font16">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Department ID</th>
                        <th>Department Name</th>
                        <th></th>
                    </tr>
                    <?php
                        $search = "%".$_POST['search']."%";
                        $sqldep = "select * from department where dept_id like '$search' or dept_name like '$search';";
                        $resultdep = mysqli_query($link,$sqldep);
                        while($row = mysqli_fetch_array($resultdep, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $row['dept_id']; ?></td>
                        <td><?php echo $row['dept_name']; ?></td>
                        <td>
                            <a href="updatedept.php?dept_id=<?php echo $row['dept_id'];?>">
                                <img src="../../image/Edit.png" width="20px">
                            </a>
                            <a href="deletedept.php?dept_id=<?php echo $row['dept_id']; ?>">
                                <img src="../../image/Delete.png" alt="" width="20px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }

                    ?>
                </table>
            </div>
        </div>
    </div>
       
     

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
