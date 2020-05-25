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
    $po_id = $_GET['po_id'];
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍລະອຽດ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="faem.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍລະອຽດລາຍຈ່າຍ
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
    <?php
       
        $sqlget = "select p.po_id,p.emp_id,emp_name,kip_amount,baht_amount,us_amount,p.po_date,po_time,p.status,p.img_path from po p left join employees e on p.emp_id=e.emp_id where p.po_id='$po_id';";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font14">
        <div class="row">
            <div style="float: left;">
                <label>ເລກທີໃບລາຍຈ່າຍ: <?php echo $rowget['po_id'];?></label><br>
                <label>ວັນທີລົງບັນຊີ: <?php echo $rowget['po_date'];?></label><br>
                <label>ເວລາ: <?php echo $rowget['po_time'];?></label><br>
            </div>
            <div style="float: right;" align="right">
                <label>ຜູ້ລົງບັນຊີ: <?php echo $rowget['emp_name'];?></label><br>
                <label>ສະຖານະການຈ່າຍ: <?php echo $rowget['status'];?></label><br>
                <a href="#" data-toggle="modal" data-target="#myModal2">
                    <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                </a>
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="margin-left: 0px;">
                        <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="100%"  class="imagelist" />
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container font14">
        <table class="table table-striped">
            <tr class="info">
                <th>ເລກທີບິນ</th>
                <th>ວັນທີ</th>
                <th>ຊື່ລາຍການ</th>
                <th>ຈຳນວນ</th>
                <th>ລາຄາ</th>
                <th>ລວມ</th>
                <th>ໝາຍເຫດ</th>
                <th>ພາບຫຼັກຖານ</th>
            </tr>
            <?php
               $sql = "select bill,po_date,pdet_name,qty,price,qty*price as total,rate_id,img_path,po_id,note from podetail where po_id='$po_id';";
               $result = mysqli_query($link, $sql);
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                    <td><?php echo $row['bill'];?></td>
                    <td><?php echo $row['po_date'];?></td>
                    <td><?php echo $row['pdet_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['note'];?></td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>  
                    </td>
            </tr>
            <?php
               }
               $sqltotal = "select sum(qty*price) as amount,rate_id from podetail where po_id='$po_id';";
               $resulttotal = mysqli_query($link, $sqltotal);
               $rowtotal = mysqli_fetch_array($resulttotal, MYSQLI_ASSOC);
            ?>
            <tr class="font26 danger">
                <td colspan="4" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="4"> <?php echo number_format($rowtotal['amount'], 2); mysqli_close($link);?> <?php echo $rowtotal['rate_id'];?></td>
            </tr>
        </table>
    </div>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
