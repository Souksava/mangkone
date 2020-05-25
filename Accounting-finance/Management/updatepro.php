<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
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
                <a href="acc_product.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນສິນຄ້າ
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
        $id = $_GET['pro_id'];
        $sqlget = "select * from acc_product where pro_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="updatepro.php" method="POST" id="formupdate">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                            <input type="text" class="form-control" name="pro_name" value="<?php echo $row['pro_name']; ?>" placeholder="ຊື່ສິນຄ້າ">
                        </div>
                        <div class="col-xs-12 form-group">
                            <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>" placeholder="ລາຄາເງິນກີບ">
                        </div>
                        <div class="col-xs-12 form-group">
                            <input type="number" class="form-control" name="price_baht" value="<?php echo $row['price_baht']; ?>" placeholder="ລາຄາເງິນບາດ">
                        </div>
                        <div class="col-xs-12 form-group">
                            <input type="number" class="form-control" name="price_us" value="<?php echo $row['price_us']; ?>" placeholder="ລາຄາໂດລາ">
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
            $pro_id = $_POST['pro_id'];
            $pro_name = $_POST['pro_name'];
            $price = $_POST['price'];
            $price_baht = $_POST['price_baht'];
            $price_us = $_POST['price_us'];
            $sqlckcate = "select pro_name from acc_product where pro_name='$pro_name';";
            $resultckcate = mysqli_query($link, $sqlckcate);
            // if(mysqli_num_rows($resultckcate) > 0){
            //     echo"<script>";
            //     echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນນີ້ໄດ້ ເນື່ອງຈາກຊື່ສິນຄ້ານີ້ມີຢູ່ແລ້ວ, ກະລຸນາໃສ່ຊື່ສິນຄ້າທີ່ແຕກຕ່າງ');";
            //     echo"window.location.href='acc_product.php';";
            //     echo"</script>";
            // }
            // else{
                $sqlupdate = "update acc_product set pro_name='$pro_name',price='$price',price_baht='$price_baht',price_us='$price_us' where pro_id='$pro_id';";
                $resultupdate = mysqli_query($link, $sqlupdate);
                if(!$resultupdate){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');";
                    echo"window.location.href='acc_product.php';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='acc_product.php';";
                    echo"</script>";
                }
            //}
        }
    ?>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
