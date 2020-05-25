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
                <a href="rate.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນເລດເງິນ
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
        $id = $_GET['rate_id'];
        $sqlget = "select * from rate where rate_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="updaterate.php" method="POST" id="formupdate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="hidden" name="rate_id" value="<?php echo $row['rate_id']; ?>">
                            <input type="number" min="1" class="form-control" name="rate_buy" value="<?php echo $row['rate_buy']; ?>" placeholder="ຊື້">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="number" min="1" class="form-control" name="rate_sell" value="<?php echo $row['rate_sell']; ?>" placeholder="ຂາຍ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="text" min="1" class="form-control" name="ac_no" value="<?php echo $row['ac_no']; ?>" placeholder="ເລກທີບັນຊີ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="file" min="1" class="form-control" name="img_path" >
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group" align="center">
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
            $rate_id = $_POST['rate_id'];
            $rate_buy = $_POST['rate_buy'];
            $rate_sell = $_POST['rate_sell'];
            $ac_no = $_POST['ac_no'];
            if($_FILES['img_path']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
            {
                $sqlupdate = "update rate set rate_buy='$rate_buy',rate_sell='$rate_sell',ac_no='$ac_no' where rate_id='$rate_id';";
                $resultupdate = mysqli_query($link, $sqlupdate);
                if(!$resultupdate)
                {
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້ ກະລຸນາກວດສອບຂໍ້ມູນອີກຄັ້ງ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
            }
            else{
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select img_path from rate where rate_id='$rate_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                if(file_exists($path) && !empty($data2['img_path'])){
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
                 $sql = "update rate set rate_buy='$rate_buy',rate_sell='$rate_sell',ac_no='$ac_no',img_path='$pro_image' where rate_id='$rate_id';";
                 $result1 = mysqli_query($link, $sql);
                 if(!$result1)
                 {
                    echo"<script>";
                    echo"alert('Can not to Update data please checking your input data');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                 }
                 else{
                     
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='rate.php';";
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
