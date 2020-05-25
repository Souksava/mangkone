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
    $emp_id = $_SESSION['emp_id'];
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ຄິດໄລ່ OT</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="salary.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ຄິດໄລ່ OT
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
    <div class="container font12b">
        <div class="table-responsive">  
            <table class="table table-striped" style="width: 1300px;">
                <tr>
                    <th style="width: 20px;">#</th>
                    <th style="width: 140px;">ຊື່ພະນັກງານ</th>
                    <th style="width: 150px;">ວັນທີເຮັດວຽກລ່ວງເວລາ</th>
                    <th style="width: 180px;">ປະເພດ OT</th>
                    <th style="text-align: left;">ເນື້ອໃນ</th>
                    <th style="width: 80px;">ເວລາເລີ່ມ</th>
                    <th style="width: 80px;">ເວລາສິ້ນສຸດ</th>
                    <th style="width: 80px;">ລວມເວລາ</th>
                    <th style="width: 100px;">ລວມເປັນເງິນ</th>
                    <th style="width: 120px;">ສະຖານະ</th>
                    <th style="width: 230px;">ເຄື່ອງມື</th>
                </tr>
        <?php
            $sqlsearch = "select ot_id,emp_name,note,date_ot,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,amount,l.status from  ot l left join employees e on l.emp_id=e.emp_id where l.status='ຍັງບໍ່ອະນຸມັດ' order by date_ot desc;";
            $resultsearch = mysqli_query($link,$sqlsearch);
            $No_ = 0;
            while($rowsearch = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
        ?>
        <tr>
            <td><?php echo $No_ += 1; ?></td>
            <td><?php echo $rowsearch['emp_name'] ?></td>
            <td><?php echo $rowsearch['date_ot'] ?></td>
            <td><?php echo $rowsearch['ot_type'] ?></td>
            <td><?php echo $rowsearch['note'] ?></td>
            <td><?php echo $rowsearch['time_start'] ?></td>
            <td><?php echo $rowsearch['time_end'] ?></td>
            <td><?php echo $rowsearch['newtime'] ?></td>
            <td><?php echo $rowsearch['amount'] ?></td>
            <td><?php echo $rowsearch['status'] ?></td>
            <td>
                <form action="ot.php" method="POST" id="formot">
                   <div class="form-group">
                        <input type="hidden" name="ot_id" value="<?php echo $rowsearch['ot_id']; ?>">
                        <input type="number" min="0" name="amount" class="form-control" placeholder="ລວມຍອດເງິນ" style="width: 110px;">
                        <button class="btn btn-primary" name="btnSave" style="width: 60px;">
                            ບັນທຶກ
                        </button>
                   </div>
                </form>
            </td>
        </tr>
        <?php
                }
            if(isset($_POST['btnSave'])){
                $ot_id = $_POST['ot_id'];
                $amount = $_POST['amount'];
                if(trim($amount) == ""){
                    echo"<script>";
                    echo"alert('ກະລຸນາປ້ອນຈຳນວນເງິນ');";
                    echo"window.location.href='ot.php';";
                    echo"</script>";
                }
                else{
                    $sql = "update ot set amount='$amount' where ot_id='$ot_id';";
                    $result = mysqli_query($link,$sql);
                    if(!$result){
                        echo"<script>";
                        echo"alert('ເພີ່ມຈຳນວນເງິນບໍ່ສຳເລັດ');";
                        echo"window.location.href='ot.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ເພີ່ມຈຳນວນເງິນສຳເລັດ');";
                        echo"window.location.href='ot.php';";
                        echo"</script>";
                    }
                }
            }
        ?>
            </table>
        </div>
    </div>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
