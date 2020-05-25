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
    <title>ອະນຸມັດ OT</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="ot.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ອະນຸມັດ OT
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
    <div class="container font16">
        <div class="row" align="left">
            <form action="acceptot.php" method="POST" id="form1">
                <div class="col-md-12 col-sm-6 col-md-4 form-group">
                    ວັນທີສ້າງຟອມ OT
                    <input type="date" class="form-control" name="date_ot">
                </div>
                <div class="col-md-12 col-sm-6 col-md-4 form-group"><br>
                    <button type="submit" class="btn btn-warning" name="btnSearch" style="width: 20%;">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        ຄົ້ນຫາ
                    </button>
                </div>
            </form>
        </div>
        <hr width="90%" />
    </div>
    <div class="container font12b">
        <div class="table-responsive">  
        <?php
            if(isset($_POST['btnSearch'])){
        ?>
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
                    <th style="width: 30px;">ເຄື່ອງມື</th>
                </tr>
        <?php
            $date_ot = date_create($_POST['date_ot']);
            $date_ot = date_format($date_ot, 'Y-m')."%";
            $sqlsearch = "select ot_id,emp_name,note,date_ot,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,amount,l.status from  ot l left join employees e on l.emp_id=e.emp_id where l.emp_id='$emp_id' and date_ot like '$date_ot';";
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
            <td><?php echo $rowsearch['amount'] ?> $</td>
            <td><?php echo $rowsearch['status'] ?></td>
            <td>
                <a href="deleteOT.php?ot_id=<?php echo $rowsearch['ot_id']; ?>">
                    <img src="../../image/Delete.png" alt="" width="20px">
                </a>
            </td>
        </tr>
        <?php
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
