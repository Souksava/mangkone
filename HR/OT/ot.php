
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
    <title>Accept OT</title>
    <LINK REL="SHORTC UT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="../Main.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Accept OT
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
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1300px;">
                <tr class="warning">
                    <th style="width: 20px;">#</th>
                    <th style="width: 140px;">ຊື່ພະນັກງານ</th>
                    <th style="width: 150px;">ວັນທີເຮັດວຽກລ່ວງເວລາ</th>
                    <th style="width: 180px;">ປະເພດ OT</th>
                    <th style="text-align: left; width: 230px;">ເນື້ອໃນ</th>
                    <th style="width: 80px;">ເວລາເລີ່ມ</th>
                    <th style="width: 80px;">ເວລາສິ້ນສຸດ</th>
                    <th style="width: 80px;">ລວມເວລາ</th>
                    <th style="width: 120px;">ລວມເປັນເງິນ</th>
                    <th style="width: 100px;">ສະຖານະ</th>
                    <th style="width: 120px;">ເຄື່ອງມື</th>
                </tr>
                <?php
                      $sqlselect = "select ot_id,emp_name,note,date_ot,amount,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,l.status from ot l left join employees e on l.emp_id=e.emp_id where l.status='ຍັງບໍ່ອະນຸມັດ' and amount != '';";
                      $resultselect = mysqli_query($link,$sqlselect);
                      $No_ = 0;
                      while($rowselect = mysqli_fetch_array($resultselect, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $rowselect['emp_name'] ?></td>
                    <td><?php echo $rowselect['date_ot'] ?></td>
                    <td><?php echo $rowselect['ot_type'] ?></td>
                    <td><?php echo $rowselect['note'] ?></td>
                    <td><?php echo $rowselect['time_start'] ?></td>
                    <td><?php echo $rowselect['time_end'] ?></td>
                    <td><?php echo $rowselect['newtime'] ?></td>
                    <td><?php echo number_format($rowselect['amount'],2) ?> USD</td>
                    <td><?php echo $rowselect['status'] ?></td>
                    <td>
                        <a href="ot.php?id=<?php echo $rowselect['ot_id'] ?>">
                            <img src="../../image/mistake.png" alt="" width="30px">&nbsp
                        </a>
                        <a href="ot.php?id2=<?php echo $rowselect['ot_id'] ?>">
                            <img src="../../image/True.png" alt="" width="25px">
                        </a>
                    </td>
                </tr>
               <?php
                      }
                      if(isset($_GET['id'])){
                            $ot_id = $_GET['id'];
                            $sql = "update ot set status='ບໍ່ອະນຸມັດ' where ot_id='$ot_id';";
                            $result = mysqli_query($link,$sql);
                            if(!$result){
                                echo"<script>";
                                echo"alert('ປະຕິເສດ OT ຜິດພາດ');";
                                echo"window.location.href='ot.php';";
                                echo"</script>";
                            }
                            else {
                                echo"<script>";
                                echo"alert('ປະຕິເສດ OT ສຳເລັດ');";
                                echo"window.location.href='ot.php';";
                                echo"</script>";
                            }
                      }
                      if(isset($_GET['id2'])){
                        $ot_id = $_GET['id2'];
                        $sql = "update ot set status='ອະນຸມັດ' where ot_id='$ot_id';";
                        $result = mysqli_query($link,$sql);
                        if(!$result){
                            echo"<script>";
                            echo"alert('ອະນຸມັດ OT ຜິດພາດ');";
                            echo"window.location.href='ot.php';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"alert('ອະນຸມັດ OT ສຳເລັດ');";
                            echo"window.location.href='ot.php';";
                            echo"</script>";
                        }
                  }
                      
               ?>
            </table>
        </div>
    </div>
  
      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
