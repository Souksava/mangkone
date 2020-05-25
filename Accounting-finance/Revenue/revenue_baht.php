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
    $sqlbill = "select max(re_id) as bill from receipt;";
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
    <title>ບັນຊີລາຍຮັບ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Revenue.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ບັນຊີລາຍຮັບເງິນບາດ</b>
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
        <form action="revenue_baht.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row"  align="left">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເລກທີບິນ</label><br>
                    <input type="text" class="form-control" name="re_bill" placeholder="ເລກທີບິນ">
                    <input type="hidden" value="<?php echo $bill ?>" name="re_id">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ວັນທີ</label><br>
                    <input type="date" class="form-control" name="cash_date">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຊື່ລາຍການ</label><br>
                    <input type="text" class="form-control" name="cash_name" placeholder="ຊື່ລາຍການ">
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
                                $sqlaccno = "select * from acc_no a left join acc_unit u on a.unit_id=u.unit_id left join acc_property p on u.ppy_id=p.ppy_id where ppy_name='ລາຍຮັບ' order by acc_name asc;";
                                $resultaccno = mysqli_query($link, $sqlaccno);
                                while($rowaccno = mysqli_fetch_array($resultaccno, MYSQLI_NUM)){
                                echo" <option value='$rowaccno[0]'>$rowaccno[1]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ໝາຍເຫດ</label><br>
                    <input type="text" class="form-control" name="note" placeholder="ໝາຍເຫດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຫຼັກຖານ</label><br>
                    <input type="file" class="form-control" name="img_path" />
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
            $re_id = $_POST['re_id'];
            $re_bill = $_POST['re_bill'];
            $cash_date = $_POST['cash_date'];
            $cash_name = $_POST['cash_name'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $vat = ($qty*$price) * 0.10;
            $acc_id = $_POST['acc_id'];
            $note = $_POST['note'];
           
            if(trim($cash_name) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ຊື່ລາຍການ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            elseif(trim($qty) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            elseif(trim($price) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລາຄາ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            elseif(trim($acc_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກເລກທີບັນຊີ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            elseif($cash_date == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກວັນທີລາຍການ');";
                echo"window.location.href='revenue_us.php';";
                echo"</script>";
            }
            else{
                $sqlckpo = "select * from listcash_receipt where rate_id='LAK' or rate_id='USD';";
                $resultreven = mysqli_query($link,$sqlckpo);
                if(mysqli_num_rows($resultreven) > 0){
                    echo"<script>";
                    echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການລົງບັນຊີລາຍຮັບສະກຸນເງິນກີບ ຫຼື ໂດລາຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີລາຍຮັບໃນສະກຸນເງິນບາດ ຫຼື ໂດລາຈະເສັດສິ້ນຈຶ່ງສາມາດເຮັດບັນຊີລາຍຮັບສະກຸນເງິນກີບໄດ້');";
                    echo"window.location.href='revenue_baht.php';";
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
                    $sql = "insert into listcash_receipt(re_id,cash_name,qty,price,cash_date,bill,acc_id,rate_id,rate,img_path,note) values('$re_id','$cash_name','$qty','$price','$cash_date','$re_bill','$acc_id','$rate_id','$rate_name','$pro_img','$note');";
                    $result = mysqli_query($link,$sql);
                }
            }
            
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="revenue_baht.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group" ><br>
                    <h4><b>ເລກທີບັນຊີລາຍຮັບ: <?php echo $bill ?></b></h4>
                    <input type="hidden" name="cash_id" value="<?php echo $bill ?>">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group" >
                    <label>ລູກຄ້າ</label><br>
                    <select name="cus_id" id="" class="form-control">
                        <option value="">ເລືອກລູກຄ້າ</option>
                        <?php
                            $sqlcus = "select * from customers;";
                            $resultcus = mysqli_query($link, $sqlcus);
                            while($rowcus = mysqli_fetch_array($resultcus, MYSQLI_NUM)){
                                echo" <option value='$rowcus[0]'>$rowcus[1]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group" >
                    <label>ເລກທີບິນລາຍຮັບ</label><br>
                    <input type="text" name="bill_" class="form-control" placeholder="ເລກທີບິນລາຍຮັບ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group" >
                    <label>ວັນທີລົງບັນຊີ</label><br>
                    <input type="date" name="re_date" class="form-control">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1500px;">
                    <tr class="warning">
                        <th colspan="14" style="text-align: center;font-size: 18px;"><b>ລາຍການບັນຊີລາຍຮັບເງິນກີບ</b></th>
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
                        <th>ຫຼັກຖານ</th>
                        <th>ເລກທີບັນຊີ</th>
                        <th>ເຄື່ອງມື</th>
                        
                    </tr>
                    <tr>
                    <?php
                        $sqlshow = "select cash_id,re_id,cash_name,qty,price,qty*price as total,vat,cash_date,note,bill,acc_name,l.acc_id,rate_id,rate,img_path from listcash_receipt l left join acc_no a on l.acc_id=a.acc_id where rate_id='THB';";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                    ?>
                        <td><?php echo $NO_ += 1;?></td>
                        <td><?php echo $rowshow['bill'] ?></td>
                        <td><?php echo $rowshow['cash_date'] ?></td>
                        <td><?php echo $rowshow['cash_name'] ?></td>
                        <td><?php echo $rowshow['qty'] ?></td>
                        <td><?php echo number_format($rowshow['price'],2); ?></td>
                        <td><?php echo number_format($rowshow['total'],2); ?></td>
                        <td><?php echo $rowshow['note'] ?></td>
                        <td>
                            <img src="../../Stock/Management/images/<?php echo $rowshow['img_path']; ?>" width="40px" height="40px" class="img-circle" alt="" />
                        </td>
                        <td><?php echo $rowshow['acc_name']; ?></td>
                        <td>
                            <a href="del_revenue_baht.php?cash_id=<?php echo $rowshow['cash_id'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(qty*price) as amount from listcash_receipt where rate_id='THB';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="9" style="text-align: right;font-size: 26px;"><b>ມູນຄ່າລວມ:</b></th>
                        <th colspan="5" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount'],2); ?> ບາດ</b>
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
                            ທ່ານຕ້ອງການຈະບັນທຶກບັນຊີລາຍຮັບ ຫຼື ບໍ່ ?
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
            $cash_id = $_POST['cash_id'];
            $amount = $_POST['amount'];
            $cus_id = $_POST['cus_id'];
            $emp_id = $_SESSION['emp_id'];
            $bill_ = $_POST['bill_'];
            $re_date = $_POST['re_date'];
            if(trim($amount) == 0){
                echo"<script>";
                echo"alert('ກະລຸນາເພີ່ມລາຍການບັນຊີລາຍຮັບ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            elseif(trim($cus_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກລູກຄ້າ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            elseif(trim($bill_) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນເລກທີບິນລາຍຮັບ');";
                echo"window.location.href='revenue_baht.php';";
                echo"</script>";
            }
            else{
                $sqlsavepo = "insert into receipt(re_id,emp_id,cus_id,re_date,baht_amount,bill) values('$cash_id','$emp_id','$cus_id','$re_date','$amount','$bill_');";
                $resultsavepo = mysqli_query($link,$sqlsavepo);
                if(!$resultsavepo){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                    echo"window.location.href='revenue_kip.php';";
                    echo"</script>";
                }
                else{
                    $sqlpodetail = "insert into cash_receipt(re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,img_path,note) select re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,img_path,note from listcash_receipt";
                    $resultpodetail = mysqli_query($link,$sqlpodetail);
                    if(!$resultpodetail){
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                        echo"window.location.href='revenue_baht.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlclear = "delete from listcash_receipt;";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"alert('ບັນທຶກສຳເລັດ');";
                        echo"window.location.href='revenue_baht.php';";
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
