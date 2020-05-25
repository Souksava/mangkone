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
    <title>Auther</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="auther.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>Auther</b>
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
            $id = $_GET['auther_id'];
            $sql = "select auther_id,auther_name,a.dept_id,dept_name from auther a left join department d on a.dept_id=d.dept_id where a.auther_id='$id';";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      ?>
    <div class="container font16">
        <form action="updateauther.php" method="POST" id="form1">
            <div class="row">
               <div class="col-xs-12 form-group">
                    <input type="hidden" name="auther_id" value="<?php echo $row['auther_id']; ?>">
                    <input type="text" class="form-control" name="auther_name" value="<?php echo $row['auther_name']; ?>" placeholder="Department Name">
               </div>
               <div class="col-xs-12 form-group">
                    <select name="dept_id" id="" class="form-control">
                        <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></option>
                            <?php
                            $dept_id2 = $row['dept_id'];
                            $sqlauther = "select * from department where dept_id != '$dept_id2';";
                            $resultauther = mysqli_query($link, $sqlauther);
                            while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                            echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                }
                            ?>
                    </select>
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
            $auther_name = $_POST['auther_name'];
            $auther_id = $_POST['auther_id'];
            if(trim($auther_id) == ""){
                echo"<script>";
                echo"alert('Update data fail');";
                echo"window.location.href='auther.php';";
                echo"</script>";
            }
            else if(trim($auther_name) == ""){
                echo"<script>";
                echo"alert('Updata data fail');";
                echo"window.location.href='auther.php';";
                echo"</script>";
            }
            else{
               
                    $sqlupdate = "update auther set auther_name='$auther_name',dept_id='$dept_id' where auther_id = '$auther_id';";
                    $resultupdate = mysqli_query($link,$sqlupdate);
                    if(!$resultupdate){
                        echo"<script>";
                        echo"alert('Update data fail');";
                        echo"window.location.href='auther.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('Update data successfully..!');";
                        echo"window.location.href='auther.php';";
                        echo"</script>";
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
