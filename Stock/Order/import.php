
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
    <title>ນຳເຂົ້າສິນຄ້າ</title>
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
                ນຳເຂົ້າສິນຄ້າ
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
        <form action="import.php" method="POST" id="form1">
            <div class="row" align="center">
                <div class="col-md-12 form-group">
                    <input type="text" name="billno" class="form-control" placeholder="Bill Of Order">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" name="btnshow" class="btn btn-info" style="width: 90%;">
                        ສະແດງລາຍການ
                    </button>
                </div>
            </div>
        </form>
        <hr width="90%" />
    </div>
    <?php 
      if(isset($_POST['btnshow'])){
        $bill = $_POST['billno'];
        $sqlget = "select billno,emp_name,company,amount,dateorder,timeorder,o.status from orders o join employees e on o.emp_id=e.emp_id join supplier s on o.sup_id=s.sup_id where billno='$bill';";
        $resultget = mysqli_query($link,$sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
      
    ?>
    <div class="container font14">
        <div class="row" style="float: left; width: 50%;text-align: left">
            <label>ເລກທີບິນ: <?php echo $rowget['billno'];?></label><br>
            <label>ວັນທີສັ່ງຊື້: <?php echo $rowget['dateorder'];?></label><br>
            <label>ເວລາ: <?php echo $rowget['timeorder'];?></label>
        </div>
        <div class="row" style="float: left; width: 50%;text-align: right">
            <label>ຜູ້ສະໜອງ: <?php echo $rowget['company'];?></label><br>
            <label>ຜູ້ສັ່ງຊື້: <?php echo $rowget['emp_name'];?></label><br>
            <label>ສະຖານະ: <?php echo $rowget['status'];?></label><br>
        </div>
        <table class="table table-striped">
            <tr class="info">
                <th>ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ</th>
                <th>ຊື່ສິນຄ້າ</th>
                <th>ປະເພດ</th>
                <th>ຈຳນວນ</th>
                <th>ຫົວໜ່ວຍ</th>
                <th>ລາຄາ</th>
                <th>ລວມ</th>
                <th></th>
            </tr>
        <?php
            $sql = "select No_,o.billno,company,o.pro_id,pro_name,cate_name,o.qty,unit_name,o.price,o.qty*o.price as total from orderdetail o join products p on o.pro_id=p.pro_id join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id join orders d on o.billno=d.billno join supplier s on d.sup_id=s.sup_id where o.billno='$bill';";
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        ?>
            <tr>
                <td><?php echo $row['pro_id'];?></td>
                <td><?php echo $row['pro_name'];?></td>
                <td><?php echo $row['cate_name'];?></td>
                <td><?php echo $row['qty'];?></td>
                <td><?php echo $row['unit_name'];?></td>
                <td><?php echo number_format($row['price'],2);?></td>
                <td><?php echo number_format($row['total'],2);?></td>
                <td align="right">
                    <a href="import2.php?No_=<?php echo $row['No_'];?>" class="btn btn-success">
                        ນຳເຂົ້າສິນຄ້າດ້ວຍເງິນ(ກີບ)
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </a>
                    <a href="import_baht.php?No_=<?php echo $row['No_'];?>" class="btn btn-warning">
                        ນຳເຂົ້າສິນຄ້າດ້ວຍເງິນ(ບາດ)
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        <?php
            }
            mysqli_close($link);
        ?>
        </table>
    </div>
    <?php
            
      }
    ?>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
