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
    <title>ລາຍງານການສັ່ງຊື້ສິນຄ້າ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Report.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍງານການສັ່ງຊື້ສິນຄ້າ
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
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ລາຍງານການສັ່ງຊື້ສິນຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
    <div class="container font12">
    <div class="container font12b">
        <div align="center">
            <h3>ສິນຄ້າທີ່ຍັງບໍ່ທັນມາ</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 40px">#</th>
                    <th style="width: 80px">ເລກທີບິນ</th>
                    <th style="width: 60px">ຜູ້ສັ່ງຊື້</th>
                    <th style="width: 120px">ຜຸ້ສະໜອງ</th>
                    <th style="width: 130px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 150px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 150px">ປະເພດ</th>
                    <th style="width: 150px">ຈຳນວນ</th>
                    <th style="width: 150px">ລາຄາ</th>
                    <th style="width: 80px">ລວມ</th>
                    <th style="width: 160px">ວັນທີ</th>
                    <th style="width: 80px">ເວລາ</th>
                    <th style="width: 80px">ສະຖານະ</th>
                    <th style="width: 100px">ຮູບສິນຄ້າ</th>
                <?php
                    $sqlsearch = "select o.billno,emp_name,company,d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total,dateorder,timeorder,o.status,p.img_path,unit_name,cate_name from orderdetail d left join orders o on d.billno=o.billno left join products p on d.pro_id=p.pro_id left join employees e on o.emp_id=e.emp_id left join supplier s on o.sup_id=s.sup_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id left join imports i on o.billno=i.billno where o.status='ອະນຸມັດ' and o.billno != i.billno ";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['billno']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['cate_name'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo number_format($row['price'],2);?> LAK</td>
                    <td><?php echo number_format($row['total'],2);?> LAK</td>
                    <td><?php echo $row['dateorder'];?></td>
                    <td><?php echo $row['timeorder'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
   
   
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
