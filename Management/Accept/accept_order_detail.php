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
    $billno = $_GET['billno'];
    $sqlseen = "update orders set seen1='SEEN' where status='ຍັງບໍ່ອະນຸມັດ' and billno='$billno';";
    $resultseen = mysqli_query($link,$sqlseen);

?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order Detail</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="accept_order.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Order Detail
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
        $sqlget = "select billno,company,amount,emp_name,upper(emp_surname) as emp_surname,dateorder,e.tel as emp_tel,e.email as emp_email,s.address,s.tel,s.email,timeorder,o.status,o.img_path from orders o join supplier s on o.sup_id=s.sup_id join employees e on o.emp_id=e.emp_id where billno='$billno';";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font14">
        <div class="row">
            <div style="float: left;">
                <label>ເລກທີບິນສັ່ງຊື້: <?php echo $rowget['billno'];?></label><br>
                <label>ວັນທີສັ່ງຊື້: <?php echo $rowget['dateorder'];?></label><br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2" style="width: 128px;">
                        <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"> Accept</span> 
                </button> 
                <form action="accept_order_detail.php" method="POST" id="accept">
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Do you want to accept order ?</b></h4>
                                </div>
                                    <input type="hidden" class="form-control" name="billno" value="<?php echo $rowget['billno'];?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="btnAccept" class="btn btn-success">
                                        <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"> Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal3">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"> Not Accept</span> 
                </button> 
                <form action="accept_order_detail.php" method="POST" id="not">
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Do you want to cancel order ?</b></h4>
                                </div>
                                    <input type="hidden" class="form-control" name="billno" value="<?php echo $rowget['billno'];?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="btndelete" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"> Not Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div style="float: right;" align="right">
                <label>ຜູ້ສະໜອງ: <?php echo $rowget['company'];?></label><br>
                <label>ຜູ້ສັ່ງຊື້: <?php echo $rowget['emp_name'];?></label><br>
                <label>ສະຖານະ: <?php echo $rowget['status'];?></label><br>
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                </a>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="margin-left: 0px;">
                        <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="100%"  class="imagelist" />
                    </div>
                </div>
            </div>
        </div><br>
    </div><br>
    </form>
    <?php
       if(isset($_POST['btnAccept'])){
           $billnoAC = $_POST['billno'];
           $sqlac = "update orders set status='ອະນຸມັດ' where billno='$billnoAC';";
           $resultac = mysqli_query($link,$sqlac);
           if(!$resultac){
                echo"<script>";
                echo"alert('Can not to Accept this order');";
                echo"window.location.href='accept_order.php';";
                echo"</script>";
           }
           else{
                echo"<script>";
                echo"alert('Accept Order Success');";
                echo"window.location.href='accept_order.php';";
                echo"</script>";
           }
       }
       if(isset($_POST['btndelete'])){
            $billnoAC2 = $_POST['billno'];
            $sqlac2 = "update orders set status='ບໍ່ອະນຸມັດ' where billno='$billnoAC2';";
            $resultac2 = mysqli_query($link,$sqlac2);
            if(!$resultac2){
                echo"<script>";
                echo"alert('Can not to Not Accept this order');";
                echo"window.location.href='accept_order.php';";
                echo"</script>";
           }
           else{
                echo"<script>";
                echo"alert('Not Accept Order Success');";
                echo"window.location.href='accept_order.php';";
                echo"</script>";
           }
       }
    ?>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="info">
                    <th>#</th>
                    <th>ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ປະເພດ</th>
                    <th>ຈຳນວນ</th>
                    <th>ຫົວໜ່ວຍ</th>
                    <th>ລາຄາ</th>
                    <th>ລວມ</th>
                </tr>
                <?php
                $sql = "select o.pro_id,pro_name,cate_name,qty,unit_name,o.price,qty*o.price as total from products p join orderdetail o on p.pro_id=o.pro_id join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id where billno='$billno';";
                $result = mysqli_query($link, $sql);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                <tr>
                        <td><?php echo $no_ = $no_ + 1;?></td>
                        <td><?php echo $row['pro_id'];?></td>
                        <td><?php echo $row['pro_name'];?></td>
                        <td><?php echo $row['cate_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo $row['unit_name'];?></td>
                        <td><?php echo number_format($row['price'],2);?></td>
                        <td><?php echo number_format($row['total'],2);?></td>
                </tr>
                <?php
                }
                
                $sqltotal = "select sum(qty*price) as total from orderdetail where billno='$billno';";
                $resulttotal = mysqli_query($link, $sqltotal);
                $rowtotal = mysqli_fetch_array($resulttotal, MYSQLI_ASSOC);
                ?>
                <tr class="font26 warning">
                    <td colspan="4" align="right"><b>Total:</b></td>
                    <td colspan="4"> <?php echo number_format($rowtotal['total'],2); mysqli_close($link);?></td>
                </tr>
            </table>
        </div>
    </div>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
