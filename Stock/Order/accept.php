
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
    <title>ອະນຸມັດ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Order.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ອະນຸມັດການສັ່ງຊື້
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
        <form action="accept.php" method="POST" id="form1">
            <div class="row" align="center">
                <div class="col-md-12 col-sm-6 form-group">
                    <input type="text" class="form-control" name="bill" placeholder="ເລກທີບິນ">
                </div>
                <div class="col-md-12 col-sm-6 form-group">
                    <label>ວັນທີສັ່ງຊື້</label><br>
                    <input type="date" name="dateorder" class="form-control">
                </div>
                <div class="col-md-12 form-group">
                    <select name="status" id="" class="form-control">
                        <option value="">ເລືອກສະຖານະການສັ່ງຊື້</option>
                        <option value="ອະນຸມັດ">ອະນຸມັດ</option>
                        <option value="ຍັງບໍ່ອະນຸມັດ">ຍັງບໍ່ອະນຸມັດ</option>
                        <option value="ບໍ່ອະນຸມັດ">ບໍ່ອະນຸມັດ</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" name="btnshow" class="btn btn-warning" style="width: 90%;">
                        ສະແດງໃບບິນ
                    </button>
                </div>
            </div>
        </form>
        <hr width="90%" />
    </div>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped">
            <tr class="warning">
                <th>
                    ເລກທີບິນ
                </th>
                <th>
                    ຜູ້ສະໜອງ
                </th>
                <th>
                    ລວມ
                </th>
                <th>
                    ຜູ້ສັ່ງຊື້
                </th>
                <th>
                    ວັນທີ
                </th>
                <th>
                    ເວລາ
                </th>
                <th>
                    ສະຖານະ
                </th>
                <th></th>
            </tr>
            <?php
                if(isset($_POST['btnshow'])){
                   $bill = $_POST['bill'];
                   $date = $_POST['dateorder'];
                   $status = $_POST['status'];  
                   if(trim($date) == ""){
                       $date = "0000-00-00";
                   }
                    $sql = "select billno,company,amount,emp_name,dateorder,timeorder,o.status from orders o join supplier s on o.sup_id=s.sup_id join employees e on o.emp_id=e.emp_id where o.status='$status' or dateorder='$date' or billno='$bill';";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['billno'] ?></td>
                <td><?php echo $row['company'] ?></td>
                <td><?php echo number_format($row['amount'],2) ?></td>
                <td><?php echo $row['emp_name'] ?></td>
                <td><?php echo $row['dateorder'] ?></td>
                <td><?php echo $row['timeorder'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                    <a href="Showorder.php?billno=<?php echo $row['billno'] ?>">
                        <img src="../../image/info.png" alt="" width="25px">&nbsp&nbsp
                    </a>
                    <a href="delorder.php?billno=<?php echo $row['billno'] ?>">
                        <img src="../../image/Delete.png" alt="" width="25px">
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
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
