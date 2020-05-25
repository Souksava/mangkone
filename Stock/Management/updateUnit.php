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
                <a href="CateAndUnit.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ
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
        $id = $_GET['unit_id'];
        $sqlget = "select * from unit where unit_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="updateUnit.php" method="POST" id="formupdate">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <input type="hidden" name="unit_id" value="<?php echo $row['unit_id']; ?>">
                            <input type="text" class="form-control" name="unit_name" value="<?php echo $row['unit_name']; ?>" placeholder="ຊື່ຫົວໜ່ວຍສິນຄ້າ">
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
            $unit_id = $_POST['unit_id'];
            $unit_name = $_POST['unit_name'];
            $sqlckunit = "select unit_name from unit where unit_name='$unit_name';";
            $resultckunit = mysqli_query($link, $sqlckunit);
            if(mysqli_num_rows($resultckunit) > 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້ ເນື່ອງຈາກຫົວໜ່ວຍສິນຄ້ານີ້ມີຢູ່ແລ້ວ, ກະລຸນາໃສ່ຫົວໜ່ວຍສິນຄ້າອື່ນທີ່ແຕກຕ່າງ');";
                echo"window.location.href='CateAndUnit.php';";
                echo"</script>";
            }
            else{
                $sqlupdate = "update Unit set unit_name='$unit_name' where unit_id='$unit_id';";
                $resultupdate = mysqli_query($link, $sqlupdate);
                if(!$resultupdate){
                    echo"<script>";
                    echo"alert('Can not Update Data');";
                    echo"window.location.href='CateAndUnit.php';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='CateAndUnit.php';";
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
