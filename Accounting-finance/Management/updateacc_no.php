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
                <a href="acc_no.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນເລກທີບັນຊີ
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
        $id = $_GET['acc_id'];
        $sqlget = "select acc_id,acc_name,a.unit_id,unit_name,u.ppy_id,ppy_name from acc_no a left join acc_unit u on a.unit_id=u.unit_id left join acc_property p on u.ppy_id=p.ppy_id where acc_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="updateacc_no.php" method="POST" id="formupdate">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ຊື່ເລກທີບັນຊີ</label><br>
                            <input type="hidden" name="acc_id" value="<?php echo $row['acc_id']; ?>">
                            <input type="text" class="form-control" name="acc_name" value="<?php echo $row['acc_name']; ?>" placeholder="ຊື່ເລກບັນຊີ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ໝວດບັນຊີ</label><br>
                            <select name="unit_id" id="" class="form-control">
                                <option value="<?php echo $row['unit_id'] ?>"><?php echo $row['unit_name'] ?></option>
                                <?php
                                    $unit_id2 = $row['unit_id'];
                                    $sqlaccppy = "select unit_id,unit_name,ppy_name from acc_unit u left join acc_property p on u.ppy_id=p.ppy_id where unit_id != '$unit_id2' order by unit_name asc;";
                                    $resultaccppy = mysqli_query($link, $sqlaccppy);
                                    while($rowaccppy = mysqli_fetch_array($resultaccppy, MYSQLI_NUM)){
                                        echo" <option value='$rowaccppy[0]'>$rowaccppy[1] ( $rowaccppy[2] )</option>";
                                    }
                                ?>
                            </select>
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
            $acc_id = $_POST['acc_id'];
            $acc_name = $_POST['acc_name'];
            $unit_id = $_POST['unit_id'];
            if(trim($acc_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນເລກທີບັນຊີ');";
                echo"window.location.href='acc_no.php';";
                echo"</script>";
            }
            else if(trim($acc_name) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຊື່ເລກຊີບັນຊີ');";
                echo"window.location.href='acc_no.php';";
                echo"</script>";
            }
            else if(trim($unit_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກໝວດບັນຊີ');";
                echo"window.location.href='acc_no.php';";
                echo"</script>";
            }
            else{
                $sqlupdate = "update acc_no set acc_name='$acc_name',unit_id='$unit_id' where acc_id='$acc_id';";
                $resultupdate = mysqli_query($link, $sqlupdate);
                if(!$resultupdate){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='acc_no.php';";
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
