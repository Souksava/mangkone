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
                <a href="department.php">
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
      <?php
            $id = $_GET['dept_id'];
            $sql = "select * from department where dept_id='$id';";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      ?>
    <div class="container font16">
        <form action="updatedept.php" method="POST" id="form1">
            <div class="row">
               <div class="col-xs-12 form-group">
                    <input type="hidden" name="dept_id" value="<?php echo $row['dept_id']; ?>">
                    <input type="text" class="form-control" name="dept_name" value="<?php echo $row['dept_name']; ?>" placeholder="Department Name">
               </div>
               <div class="col-xs-12" align="center">
                    <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp Update Data
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $dept_id = $_POST['dept_id'];
            $dept_name = $_POST['dept_name'];
            if(trim($dept_id) == ""){
                echo"<script>";
                echo"alert('Update data fail');";
                echo"window.location.href='department.php';";
                echo"</script>";
            }
            else if(trim($dept_name) == ""){
                echo"<script>";
                echo"alert('Updata data fail');";
                echo"window.location.href='department.php';";
                echo"</script>";
            }
            else{
                $sqlck = "select * from department where dept_name='$dept_name';";
                $resultck = mysqli_query($link, $sqlck);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"alert('Can not to update this department because this department is same');";
                    echo"window.location.href='department.php';";
                    echo"</script>";
                }
                else{
                    $sqlupdate = "update department set dept_name='$dept_name' where dept_id = '$dept_id';";
                    $resultupdate = mysqli_query($link,$sqlupdate);
                    if(!$resultupdate){
                        echo"<script>";
                        echo"alert('Update data fail');";
                        echo"window.location.href='department.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('Update data successfully..!');";
                        echo"window.location.href='department.php';";
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
