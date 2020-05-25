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
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $Time = date("H:i:s",$datenow);
    $sqlbill = "select max(purchase_id) as bill from purchase_order;";
    $resultbill = mysqli_query($link,$sqlbill);
    $rowbill = mysqli_fetch_array($resultbill, MYSQLI_ASSOC);
    $bill = $rowbill['bill'] + 1;
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Purchase Order</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="po.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>Purchase Order</b>
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br><br>
      <!-- body -->
    <div class="container font16">
        <form action="frmpo.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເລກທີບິນ</label><br>
                    <input type="text"  class="form-control" name="billno" placeholder="ເລກທີບິນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ວັນທີ</label><br>
                    <input type="date" class="form-control" name="po_date">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຊື່ລາຍການ</label><br>
                    <input type="text" class="form-control" name="pdet_name" placeholder="ຊື່ລາຍການ">
                    <input type="hidden" name="purchase_id" value="<?php echo $bill; ?>">
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຈຳນວນ</label><br>
                    <input type="number" min="1" class="form-control" name="qty" placeholder="ຈຳນວນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ລາຄາ</label><br>
                    <input type="number" min="0" class="form-control" name="price" placeholder="ລາຄາ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ໝາຍເຫດ</label><br>
                    <input type="text" class="form-control" name="note" placeholder="ໝາຍເຫດ">
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary" name="btnadd" style="width: 150px;margin-left: 20px;">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp 
                   ເພີ່ມລາຍການ
                </button>
            </div>
        </from>
    </div>
    <?php
        if(isset($_POST['btnadd'])){
            $billno = $_POST['billno'];
            $po_date = $_POST['po_date'];
            if(trim($po_date) == ""){
                $po_date = "0000-00-00";
            }
            $purchase_id = $_POST['purchase_id'];
            $pdet_namea = $_POST['pdet_name'];
            $qtya = $_POST['qty'];
            $pricea = $_POST['price'];
            $note = $_POST['note'];
            if(trim($pdet_namea) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ຊື່ລາຍການ');";
                echo"window.location.href='pokip.php';";
                echo"</script>";
            }
            elseif(trim($qtya) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='pokip.php';";
                echo"</script>";
            }
            elseif(trim($pricea) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລາຄາ');";
                echo"window.location.href='pokip.php';";
                echo"</script>";
            }
            else{
                $sql = "insert into listpurchasedetail(pdet_name,qty,price,note,purchase_id,billno,po_date) values('$pdet_namea','$qtya','$pricea','$note','$purchase_id','$billno','$po_date');";
                $result = mysqli_query($link,$sql);
            }
            
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="frmpo.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group" >
                    <h4><b>ເລກທີໃບລາຍຈ່າຍ: <?php echo $bill ?></b></h4>
                    <input type="hidden" name="purchase_id" value="<?php echo $bill ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group" align="right">
                   <select name="rate_id" id="" class="form-control">
                       <option value="">ເລືອກສະກຸນເງິນ</option>
                       <?php
                                $sqlaccppy = "select * from rate;";
                                $resultaccppy = mysqli_query($link, $sqlaccppy);
                                while($rowaccppy = mysqli_fetch_array($resultaccppy, MYSQLI_NUM)){
                                echo" <option value='$rowaccppy[0]'>$rowaccppy[0]</option>";
                            }
                        ?>
                   </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1300px;">
                    <tr class="warning">
                        <th colspan="9" style="text-align: center;font-size: 18px;"><b>ລາຍການໃບສະເໜີ</b></th>
                    </tr>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th style="width: 150px;">ເລກທີບິນ</th>
                        <th style="width: 90px;">ວັນທີ</th>
                        <th style="width: 300px;">ຊື່ລາຍການ</th>
                        <th style="width: 50px;">ຈຳນວນ</th>
                        <th style="width: 150px;">ລາຄາ</th>
                        <th style="width: 200px;">ລວມ</th>
                        <th style="width: 200px;">ໝາຍເຫດ</th>
                        <th style="width: 30px;">ເຄື່ອງມື</th>
                        
                    </tr>
                    <tr>
                    <?php
                        $sqlshow = "select pdet_id,pdet_name,qty,price,qty*price as total,note,billno,po_date from listpurchasedetail;";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                            $NO_ = $NO_ + 1;
                    ?>
                        <td><?php echo $NO_?></td>
                        <td><?php echo $rowshow['billno'] ?></td>
                        <td><?php echo $rowshow['po_date'] ?></td>
                        <td><?php echo $rowshow['pdet_name'] ?></td>
                        <td><?php echo $rowshow['qty'] ?></td>
                        <td><?php echo number_format($rowshow['price'],2); ?></td>
                        <td><?php echo number_format($rowshow['total'],2); ?></td>
                        <td><?php echo $rowshow['note'] ?></td>
                        <td>
                            <a href="deletepo.php?pdet_id=<?php echo $rowshow['pdet_id'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(qty*price) as amount from listpurchasedetail;";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="5" style="text-align: right;font-size: 26px;"><b>ລວມລາຍຈ່າຍ:</b></th>
                        <th colspan="4" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount'],2); ?></b>
                            <input type="hidden" name="amount" value="<?php echo $rowamount['amount']; ?>">
                        </th>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກລາຍການ PO
            </button>
                <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" align="center">ຢືນຢັນ</h4>
                        </div>
                        <div class="modal-body" align="center">
                            ທ່ານຕ້ອງການຈະບັນທຶກບັນຊີລາຍຈ່າຍ ຫຼື ບໍ່ ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnSave" class="btn btn-primary">ບັນທຶກ</button>
                        </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnSave'])){
            $purchase_id2 = $_POST['purchase_id'];
            $rate = $_POST['rate_id'];
            $amount = $_POST['amount'];
            $emp_id = $_SESSION['emp_id'];
            if(trim($amount) == 0){
                echo"<script>";
                echo"alert('ກະລຸນາເພີ່ມລາຍການບັນຊີລາຍຈ່າຍ');";
                echo"window.location.href='frmpo.php';";
                echo"</script>";
            }
            elseif(trim($rate) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກສະກຸນເງິນ');";
                echo"window.location.href='frmpo.php';";
                echo"</script>";
            }
            else{
                $sqlsavepo = "insert into purchase_order(purchase_id,emp_id,amount,rate_id,po_date) values('$purchase_id2','$emp_id','$amount','$rate','$Date')";
                $resultsavepo = mysqli_query($link,$sqlsavepo);
                if(!$resultsavepo){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                    echo"window.location.href='frmpo.php';";
                    echo"</script>";
                }
                else{
                    $sqlpodetail = "insert into purchasedetail(pdet_name,qty,price,note,purchase_id,billno,po_date) select pdet_name,qty,price,note,purchase_id,billno,po_date from listpurchasedetail;";
                    $resultpodetail = mysqli_query($link,$sqlpodetail);
                    if(!$resultpodetail){
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                        echo"window.location.href='frmpo.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlclear = "delete from listpurchasedetail;";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"alert('ບັນທຶກລາຍຈ່າຍສຳເລັດ');";
                        echo"window.location.href='frmpo.php';";
                        echo"</script>";
                    }
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
