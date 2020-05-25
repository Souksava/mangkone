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
    <title>ສັ່ງຊື້</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="frmOrder.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ສັ່ງຊື້
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
        $id = $_GET['pro_id'];
        $sqlbill = "select max(billno) as bill from orders";
        $resultbill = mysqli_query($link, $sqlbill);
        $rowbill = mysqli_fetch_array($resultbill, MYSQLI_ASSOC);
    ?>
    <div class="container font16" align="center">
        <form action="frmorder2.php" method="POST" id="formAdd">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <input type="hidden" name="bill" value="<?php echo $rowbill['bill'] + 1; ?>">    
                    <input type="text" class="form-control" name="pro_id" value="<?php echo $id; ?>" autofocus placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <input type="number" min="1" class="form-control" name="qty" placeholder="ຈຳນວນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <input type="number" min="1" class="form-control" name="price" placeholder="ລາຄາ">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" name="btnAdd" class="btn btn-info" style="width: 90%;">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        ເພີ່ມລາຍການສັ່ງຊື້
                    </button>
                </div>
            </div>
        </form>
        <hr width="90%" />
    </div>
    <div class="container font14">
        <form action="frmorder2.php" method="POST" id="formSave">
            <div class="row">
                <div class="col-xs-12 col-sm-6  form-group">
                    <label>ເລກທີບິນ: <?php echo $rowbill['bill'] + 1; ?></label>
                    <input type="hidden" name="bill" value="<?php echo $rowbill['bill'] + 1; ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <select name="sup_id" id="" class="form-control">
                        <option value="">ເລືອກຜູ້ສະໜອງ</option>
                        <?php
                            $sqlsup = "select * from supplier where type='Tool';";
                            $resultsup = mysqli_query($link, $sqlsup);
                            while($rowsup = mysqli_fetch_array($resultsup, MYSQLI_NUM)){
                                echo" <option value='$rowsup[0]'>$rowsup[1]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <?php
                if(isset($_POST['btnAdd'])){
                   $pro_id = $_POST['pro_id'];
                   $qty = $_POST['qty'];
                   $sup_id = $_POST['sup_id'];
                   $bill = $_POST['bill'];
                   $price = $_POST['price'];
                    $sqlckid = "select pro_id from products where pro_id='$pro_id';";
                    $resultckid = mysqli_query($link, $sqlckid);
                    if(trim($pro_id) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາປ້ອນລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ');";
                        echo"window.location.href='frmorder2.php';";
                        echo"</script>";
                    }
                    elseif(trim($qty) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາປ້ອນຈຳນວນສັ່ງຊື້');";
                        echo"window.location.href='frmorder2.php';";
                        echo"</script>";
                    }
                    elseif(trim($price) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາປ້ອນລາຄາ');";
                        echo"window.location.href='frmorder2.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultckid) == 0){
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດເພີ່ມລາຍການສິນຄ້າໄດ້ ເນື່ອງຈາກລະຫັດສິນຄ້ານີ້ບໍ່ມີໃນລະບົບ');";
                        echo"window.location.href='frmorder2.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlckidlist = "select * from listorder where pro_id='$pro_id';";
                        $resultckidlist = mysqli_query($link, $sqlckidlist);
                        if(mysqli_num_rows($resultckidlist) > 0){
                           $sqlupdate = "update listorder set qty=qty+'$qty' where pro_id='$pro_id';";
                           $resultupdate = mysqli_query($link,$sqlupdate);
                        }
                        else{
                            $sqladd = "insert into listorder(pro_id,qty,price,bill) values('$pro_id','$qty','$price','$bill');";
                            $resultadd = mysqli_query($link, $sqladd);
                        }
                    }
                }
                    $sqlselect = "select l.pro_id,pro_name,cate_name,unit_name,qty,l.price,l.qty*l.price as total,img_path from listorder l join products p on p.pro_id = l.pro_id join category c on p.cate_id = c.cate_id join unit u on p.unit_id = u.unit_id;";
                    $resultselect = mysqli_query($link,$sqlselect);
                    while($rowselect = mysqli_fetch_array($resultselect, MYSQLI_ASSOC)){
                
              
            ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="form-group">
                                <img src="../Management/images/<?php echo $rowselect['img_path']; ?>" class="img-circle imagelist" width="80px" height="80px"> 
                                <div style="margin-left: 90px">
                                    <a href="deletefrmorder.php?pro_id=<?php echo $rowselect['pro_id'];?>" style="z-index: 3;position: absolute; margin-left: 87%">
                                        <img src="../../image/Delete.png" width="30px">
                                    </a>
                                    <label>
                                        ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ: <?php echo $rowselect['pro_id']; ?> <br>
                                        ຊື່: <?php echo $rowselect['pro_name']; ?> ປະເພດ:<?php echo $rowselect['cate_name']; ?> <br> 
                                        ຈຳນວນ: <?php echo $rowselect['qty']; ?> <?php echo $rowselect['unit_name']; ?> ລາຄາ: <?php echo number_format($rowselect['price'],2); ?><br>
                                        ລວມ: <?php echo number_format($rowselect['total'],2); ?>
                                    </label><br>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            <?php
                }
                mysqli_close();
            ?>
           <?php
                $sqlsum = "select sum(qty*price) as amount from listorder;";
                $resultsum = mysqli_query($link,$sqlsum);
                $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
           ?>
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning">
                    <div class="row font26">
                       <div align="center">
                           <b>ລວມທັງໝົດ: <?php echo number_format($rowsum['amount'],2); ?></b>
                           <input type="hidden" name="amount" value="<?php echo $rowsum['amount']; ?>">
                       </div>
                    </div>
                </li>
            </ul>
            
            <div class="row">
                <div class="col-md-12 form-group" align="center">
                    <button type="button" class="btn btn-warning" style="width: 90%;" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        ບັນທຶກການສັ່ໍງຊື້
                    </button>

                    <!-- Modal -->
                    <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" align="center">ຢືນຢັນ</h4>
                                </div>
                                <div class="modal-body">
                                    ທ່ານຕ້ອງການຈະບັນທຶກການສັ່ງຊື້ ຫຼື ບໍ່ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ບໍ່</button>
                                    <button type="submit" name="btnSave" class="btn btn-primary">ບັນທຶກ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php 
        if(isset($_POST['btnSave'])){
            $billno = $_POST['bill'];
            $sup_id = $_POST['sup_id'];
            $emp_id = $_SESSION['emp_id'];
            $amount = $_POST['amount'];
            date_default_timezone_set("Asia/Bangkok");
            $datenow = time();
            $Date = date("Y-m-d",$datenow);
            $Time = date("H:i:s",$datenow);
            if(trim($sup_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກຜູ້ສະໜອງ');";
                echo"window.location.href='frmorder2.php';";
                echo"</script>";
            }
            else{
                $sqlsave = "insert into orders(billno,emp_id,sup_id,amount,dateorder,timeorder,status,seen1,seen2) values('$billno','$emp_id','$sup_id','$amount','$Date','$Time','ຍັງບໍ່ອະນຸມັດ','NOTSEEN','NOTSEEN');";
                $resultsave = mysqli_query($link,$sqlsave);
                if(!$resultsave){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='frmOrder.php';";
                    echo"</script>";
                }
                else{
                    $sqlsave2 = "insert into orderdetail(pro_id,qty,price,billno) select pro_id,qty,price,bill from listorder where bill = (select max(bill) from listorder);";
                    $resultsave2 = mysqli_query($link,$sqlsave2);
                    $sqlclear = "delete from listorder;";
                    $resultclear = mysqli_query($link,$sqlclear);
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='frmOrder.php';";
                    echo"</script>";
                }
            }
        }
    ?>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
