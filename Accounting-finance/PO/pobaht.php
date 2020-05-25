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
    $sqlbill = "select max(po_id) as bill from po;";
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
    <title>ບັນຊີລາຍຈ່າຍ</title>
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
                <b>ບັນຊີລາຍຈ່າຍເງິນບາດ</b>
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
        <form action="pobaht.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row"  align="left">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເລກທີບິນ</label><br>
                    <input type="text" class="form-control" name="bill_" placeholder="ເລກທີບິນ">
                    <input type="hidden" value="<?php echo $bill ?>" name="po_id">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ວັນທີ</label><br>
                    <input type="date" class="form-control" name="po_datea">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຊື່ລາຍການ</label><br>
                    <input type="text" class="form-control" name="pdet_name" placeholder="ຊື່ລາຍການ">
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
                    <label>ເລກທີບັນຊີ</label><br>
                    <select name="acc_id" id="" class="form-control">
                        <option value="">ເລືອກເລກທີບັນຊີ</option>
                        <?php
                                $sqlaccno = "select * from acc_no a left join acc_unit u on a.unit_id=u.unit_id left join acc_property p on u.ppy_id=p.ppy_id where ppy_name='ລາຍຈ່າຍ' order by acc_name asc;";
                                $resultaccno = mysqli_query($link, $sqlaccno);
                                while($rowaccno = mysqli_fetch_array($resultaccno, MYSQLI_NUM)){
                                echo" <option value='$rowaccno[0]'>$rowaccno[1]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຫຼັກຖານ</label><br>
                    <input type="file" class="form-control" name="img_path" />
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເລກທີບິນ PO</label><br>
                    <input type="number" min="1" class="form-control" name="bill_po" placeholder="ເລກທີບິນ PO">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
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
            $po_id = $_POST['po_id'];
            $billa = $_POST['bill_'];
            $po_datea = $_POST['po_datea'];
            $pdet_namea = $_POST['pdet_name'];
            $qtya = $_POST['qty'];
            $pricea = $_POST['price'];
            $acc_ida = $_POST['acc_id'];
            $bill_po = $_POST['bill_po'];
            $note = $_POST['note'];
            if(trim($note) == ""){
                $note = "-";
            }
            if(trim($bill_po) == ""){
                $bill_po = "0";
            }
            if(trim($po_datea) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກວັນທີ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            elseif(trim($pdet_namea) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ຊື່ລາຍການ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            elseif(trim($qtya) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            elseif(trim($pricea) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລາຄາ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            elseif(trim($acc_ida) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກເລກທີບັນຊີ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            else{
                    $sqlckimp = "select * from listimp;";
                    $resultimp = mysqli_query($link,$sqlckimp);
                    $sqlckpo = "select * from listpodetail where rate_id='LAK' or rate_id='USD';";
                    $resultpo = mysqli_query($link,$sqlckpo);
                    $sqlcksa = "select * from listsalarydetail";
                    $resultsa = mysqli_query($link,$sqlcksa);
                    if(mysqli_num_rows($resultimp) > 0){
                        echo"<script>";
                        echo"alert('ຂໍອະໄພ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການນຳສິນຄ້າເຂົ້າສາງຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການນຳເຂົ້າສິນຄ້າຈະເສັດສິ້ນຈຶ່ງສາມາດເຮັດບັນຊີລາຍຈ່າຍໄດ້');";
                        echo"window.location.href='pobaht.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultpo) > 0){
                        echo"<script>";
                        echo"alert('ຂໍອະໄພ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການລົງບັນຊີລາຍຈ່າຍເງິນບາດ ຫຼື ເງິນໂດລ້າຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີລາຍຈ່າຍເງິນກີບ ຫຼື ເງິນໂດລ້າຈະເສັດສິ້ນຈຶ່ງສາມາດລົງບັນລາຍຈ່າຍເງິນບາດໄດ້');";
                        echo"window.location.href='pobaht.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultsa) > 0){
                        echo"<script>";
                        echo"alert('ຂໍອະໄພ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງລົງບັນຊີເບີກຈ່າຍເງິນເດືອນຢູ່ ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີເບີກຈ່າຍເງິນເດືອນຈະເສັດສິ້ນຈຶ່ງສາມາດລົງບັນລາຍຈ່າຍເງິນບາດໄດ້');";
                        echo"window.location.href='pobaht.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlrate = "select * from rate where rate_id='THB';";
                        $resultrate = mysqli_query($link,$sqlrate);
                        $rate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
                        $rate_id = $rate['rate_id'];
                        $rate_name = $rate['rate_buy'];
                        $ext = pathinfo(basename($_FILES["img_path"]["name"]), PATHINFO_EXTENSION);
                        $new_image_name = "img_".uniqid().".".$ext;
                        $image_path = "../../Stock/Management/images/";
                        $upload_path = $image_path.$new_image_name;
                        move_uploaded_file($_FILES["img_path"]["tmp_name"], $upload_path);
                        $pro_img = $new_image_name;
                        $sql = "insert into listpodetail(bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate,img_path,purchase_id,note) values('$billa','$po_datea','$pdet_namea','$qtya','$pricea','$acc_ida','$po_id','$rate_id','$rate_name','$pro_img','$bill_po','$note');";
                        $result = mysqli_query($link,$sql);
                      
                    }

            }
            
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="pobaht.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" ><br>
                    <h4><b>ເລກທີໃບລາຍຈ່າຍ: <?php echo $bill ?></b></h4>
                    <input type="hidden" name="po_id" value="<?php echo $bill ?>">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ສະຖານະການຈ່າຍ</label>
                   <select name="status" id="" class="form-control">
                       <option value="">ເລືອກສະຖານະລາຍຈ່າຍ</option>
                       <option value="PAID">PAID</option>
                       <option value="CREDIT">CREDIT</option>
                   </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ວັນທີລົງບັນຊີ</label>
                    <input type="date" name="po_date" class="form-control">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1500px;">
                    <tr class="warning">
                        <th colspan="14" style="text-align: center;font-size: 18px;"><b>ລາຍການບັນຊີລາຍຈ່າຍເງິນບາດ</b></th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>ເລກທີບິນ</th>
                        <th>ວັນທີ</th>
                        <th>ຊື່ລາຍການ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາ</th>
                        <th>ລວມ</th>
                        <th>ໝາຍເຫດ</th>
                        <th>POເລກທີ</th>
                        <th>ຫຼັກຖານ</th>
                        <th>ເລກທີບັນຊີ</th>
                        <th>ເຄື່ອງມື</th>
                        
                    </tr>
                    <tr>
                    <?php
                        $sqlshow = "select * from listpodetail_view where rate_id='THB';";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                           
                    ?>
                        <td><?php echo $NO_ += 1;?></td>
                        <td><?php echo $rowshow['bill'] ?></td>
                        <td><?php echo $rowshow['po_date'] ?></td>
                        <td><?php echo $rowshow['pdet_name'] ?></td>
                        <td><?php echo $rowshow['qty'] ?></td>
                        <td><?php echo number_format($rowshow['price'],2); ?></td>
                        <td><?php echo number_format($rowshow['total'],2); ?></td>
                        <td><?php echo $rowshow['note'] ?></td>
                        <td><?php echo number_format($rowshow['purchase_id']); ?></td>
                        <td>
                            <img src="../../Stock/Management/images/<?php echo $rowshow['img_path']; ?>" width="40px" alt="" height="40px" class="img-circle" />
                        </td>
                        <td><?php echo $rowshow['acc_name']; ?></td>
                        <td>
                            <a href="deletepobaht.php?no_=<?php echo $rowshow['no_'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(total) as amount from listpodetail_view where rate_id='THB';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="9" style="text-align: right;font-size: 26px;"><b>ລວມລາຍຈ່າຍ:</b></th>
                        <th colspan="5" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount']); ?> ບາດ</b>
                            <input type="hidden" name="amount" value="<?php echo $rowamount['amount']; ?>">
                        </th>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກບັນຊີລາຍຈ່າຍ
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
            $po_id2 = $_POST['po_id'];
            $amount = $_POST['amount'];
            $status = $_POST['status'];
            $emp_id = $_SESSION['emp_id'];
            $po_date = $_POST['po_date'];
            if(trim($amount) == 0){
                echo"<script>";
                echo"alert('ກະລຸນາເພີ່ມລາຍການບັນຊີລາຍຈ່າຍ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            elseif(trim($status) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກສະຖານະລາຍຈ່າຍ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            elseif(trim($po_date) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກວັນທີລົງບັນຊີ');";
                echo"window.location.href='pobaht.php';";
                echo"</script>";
            }
            else{
                $sqlsavepo = "insert into po(po_id,emp_id,baht_amount,po_date,po_time,status) values('$po_id2','$emp_id','$amount','$po_date','$Time','$status');";
                $resultsavepo = mysqli_query($link,$sqlsavepo);
                if(!$resultsavepo){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                    echo"window.location.href='pobaht.php';";
                    echo"</script>";
                }
                else{
                    $sqlpodetail = "insert into podetail(bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate,img_path,purchase_id,note) select bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate,img_path,purchase_id,note from listpodetail; ";
                    $resultpodetail = mysqli_query($link,$sqlpodetail);
                    if(!$resultpodetail){
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                        echo"window.location.href='pobaht.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlclear = "delete from listpodetail;";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"alert('ບັນທຶກລາຍຈ່າຍສຳເລັດ');";
                        echo"window.location.href='pobaht.php';";
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
