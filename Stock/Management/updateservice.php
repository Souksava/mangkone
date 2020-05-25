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
    <title>ແກ້ໄຂຂໍ້ມູນ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="service.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນບໍລິການ
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
    <?php
        $id = $_GET['service_id'];
        $sqlget = "select * from service where service_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="updateservice.php" method="POST" id="formupdate">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <input type="hidden" name="service_id" value="<?php echo $row['service_id']; ?>">
                            <input type="text" class="form-control" name="service_name" value="<?php echo $row['service_name']; ?>" placeholder="ຊື່ບໍລິການ">
                        </div>
                        <div class="col-xs-12" align="center">
                            <button type="submit" name="btnUpdate" class="btn btn-success" style="width: 300px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
        if(isset($_POST['btnUpdate'])){
            $service_id = $_POST['service_id'];
            $service_name = $_POST['service_name'];
            $sqlckservice = "select service_name from service where service_name='$service_name';";
            $resultckservice = mysqli_query($link, $sqlckservice);
            if(mysqli_num_rows($resultckservice) > 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນນີ້ໄດ້ ເນື່ອງຈາກຊື່ບໍລິການນີ້ມີຢູ່ແລ້ວ, ກະລຸນາໃສ່ຊື່ບໍລິການທີ່ແຕກຕ່າງ');";
                echo"window.location.href='service.php';";
                echo"</script>";
            }
            else{
                $sqlupdate = "update service set service_name='$service_name' where service_id='$service_id';";
                $resultupdate = mysqli_query($link, $sqlupdate);
                if(!$resultupdate){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');";
                    echo"window.location.href='service.php';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='service.php';";
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
