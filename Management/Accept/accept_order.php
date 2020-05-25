
<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 3){
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
    <title>Accept</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="accept.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Accept Order
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
                $sql = "select billno,company,amount,emp_name,dateorder,timeorder,o.status from orders o join supplier s on o.sup_id=s.sup_id join employees e on o.emp_id=e.emp_id where o.status='ຍັງບໍ່ອະນຸມັດ';";
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
                    <a href="accept_order_detail.php?billno=<?php echo $row['billno'] ?>">
                        <img src="../../image/info.png" alt="" width="20px">&nbsp&nbsp
                    </a>
                </td>
            </tr>
            <?php
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
