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
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $Time = date("H:i:s",$datenow);
    $sqlbill = "select max(quo_id) as bill from quotation;";
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
    <title>Quotation Rate THB</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="quo_internet.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>Quotation Rate THB</b>
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
        <form action="quotation_in_baht.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row ">
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ແພັກເກັດອິນເຕີເນັດ</label><br>
                    <select name="pro_id" id="" class="form-control">
                       <option value="">ເລືອກແພັກເກັດ</option>
                       <?php
                                $sqlaccppy = "select * from acc_product;";
                                $resultaccppy = mysqli_query($link, $sqlaccppy);
                                while($rowaccppy = mysqli_fetch_array($resultaccppy, MYSQLI_NUM)){
                                echo" <option value='$rowaccppy[0]'>$rowaccppy[1]</option>";
                            }
                        ?>
                   </select>
                    <input type="hidden" name="quo_id" value="<?php echo $bill; ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ຈຳນວນ</label><br>
                    <input type="number" min="1" class="form-control" name="qty" placeholder="ຈຳນວນ">
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ລາຄາ</label><br>
                    <input type="number" min="0" class="form-control" name="price" placeholder="ລາຄາ">
                </div>
                <div class="col-xs-12 col-sm-6 form-group" >
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
        </form>
    </div>
    <?php
        if(isset($_POST['btnadd'])){
            $pro_id = $_POST['pro_id'];
            $quo_id = $_POST['quo_id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $note = $_POST['note'];
            if(trim($pro_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກແພັກເກັດ');";
                echo"window.location.href='quotation_in_baht.php';";
                echo"</script>";
            }
            elseif(trim($qty) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ຈຳນວນແພັກເກັດ');";
                echo"window.location.href='quotation_in_baht.php';";
                echo"</script>";
            }
            elseif(trim($price) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ລາຄາ');";
                echo"window.location.href='quotation_in_baht.php';";
                echo"</script>";
            }
            else{
                $sqlck = "select * from listquotationdetail where rate_id = 'LAK' or rate_id = 'USD';";
                $resultck = mysqli_query($link,$sqlck);
                $sqlckqty = "select * from listquotationdetail where pro_id = '$pro_id';";
                $resultqty = mysqli_query($link,$sqlckqty);
               if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກໃນຂະນະນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງເຮັດໃບ Quotation ຢູ່');";
                    echo"window.location.href='quotation_in_baht.php';";
                    echo"</script>";
               }
               elseif(mysqli_num_rows($resultqty) > 0){
                    $sqlupdate = "update listquotationdetail set qty=qty+'$qty' where pro_id='$pro_id';";
                    $resultupdate = mysqli_query($link,$sqlupdate);
                    echo"<script>";
                    echo"window.location.href='quotation_in_baht.php';";
                    echo"</script>";
                    $sqlgetvat = "select (qty*price)*0.10 as vat from listquotationdetail where pro_id='$pro_id';";
                    $resultgetvat = mysqli_query($link,$sqlgetvat);
                    $rowgetvat = mysqli_fetch_array($resultgetvat,MYSQLI_ASSOC);
                    $vat = $rowgetvat['vat'];
                    $sqlvat = "update listquotation set vat='$vat' where pro_id='$pro_id';";
                    $resultvat = mysqli_query($link,$sqlvat);
                }
               else{
                    $vat = ($price * $qty) * 0.10;
                    $sqladd = "insert into listquotationdetail(pro_id,qty,price,vat,quo_id,rate_id,note,acc_id) values('$pro_id','$qty','$price','$vat','$quo_id','THB','$note','71410000');";
                    $resultadd = mysqli_query($link,$sqladd);
                }
            }
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="quotation_in_baht.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <h4><b>ເລກທີໃບລາຍຈ່າຍ: <?php echo $bill ?></b></h4>
                    <input type="hidden" name="quo_id" value="<?php echo $bill ?>">
                </div>
                 <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <input type="number" min="0" name="discount" class="form-control" placeholder="ສ່ວນຫຼຸດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" align="right" >
                        <select name="cus_id" id="" class="form-control">
                       <option value="">ເລືອກລູກຄ້າ</option>
                       <?php
                                $sqlaccppy = "select * from customers;";
                                $resultaccppy = mysqli_query($link, $sqlaccppy);
                                while($rowaccppy = mysqli_fetch_array($resultaccppy, MYSQLI_NUM)){
                                echo" <option value='$rowaccppy[0]'>$rowaccppy[1]</option>";
                            }
                        ?>
                   </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="warning">
                        <th colspan="7" style="text-align: center;font-size: 18px;"><b>ລາຍການໃບສະເໜີ</b></th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>ຊື່ລາຍການ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາ</th>
                        <th>ລວມ</th>
                        <th>ໝາຍເຫດ</th>
                        <th>ເຄື່ອງມື</th>
                    </tr>
                    <tr>
                    <?php
                        $sqlshow = "select quodet_id,pro_name,qty,l.price,qty*l.price as total,note from listquotationdetail l left join acc_product p on l.pro_id=p.pro_id where rate_id='THB';";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                            $NO_ = $NO_ + 1;
                    ?>
                        <td><?php echo $NO_?></td>
                        <td><?php echo $rowshow['pro_name'] ?></td>
                        <td><?php echo $rowshow['qty'] ?></td>
                        <td><?php echo number_format($rowshow['price'],2); ?></td>
                        <td><?php echo number_format($rowshow['total'],2); ?></td>
                        <td><?php echo $rowshow['note'] ?></td>
                        <td>
                            <a href="delete_in_baht.php?quodet_id=<?php echo $rowshow['quodet_id'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(qty*price) as amount from listquotationdetail where rate_id='THB';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="4" style="text-align: right;font-size: 18px;"><b>Amount</b></th>
                        <th colspan="3" style="text-align: center;font-size: 18px;"><b><?php echo number_format($rowamount['amount'],2); ?> ບາດ</b>
                            <input type="hidden" name="amount" value="<?php echo $rowamount['amount']; ?>">
                        </th>
                    </tr>
                    <tr class="danger">
                        <?php $showvat = $rowamount['amount'] * 0.10; ?>
                        <th colspan="4" style="text-align: right;font-size: 18px;"><b>VAT 10%</b></th>
                        <th colspan="3" style="text-align: center;font-size: 18px;"><b><?php echo number_format($showvat,2); ?> ບາດ</b>
                            <input type="hidden" name="vat" value="<?php echo $rowamount['amount'] * 0.10; ?>">
                        </th>
                    </tr>
                    <tr class="danger">
                        <?php $newamount =  ($rowamount['amount'] * 0.10) + $rowamount['amount']; ?>
                        <th colspan="4" style="text-align: right;font-size: 18px;"><b>Amount</b></th>
                        <th colspan="3" style="text-align: center;font-size: 18px;"><b><?php echo number_format($newamount,2); ?> ບາດ</b>
                            <input type="hidden" name="newamount" value="<?php echo $newamount;?>">
                        </th>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກລາຍການ 
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
            $vat2 = $_POST['vat'];
            $discouont = $_POST['discount'];
            $amount = $_POST['newamount'] - $discouont; 
            $emp_id = $_SESSION['emp_id'];
            $quo_id2 = $_POST['quo_id'];
            $cus_id = $_POST['cus_id'];
           if(trim($cus_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກລູກຄ້າ');";
                echo"window.location.href='quotation_in_baht.php';";
                echo"</script>";
           }
           elseif($discouont > $_POST['newamount']){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນສ່ວນລົດໃຫ້ນ້ອຍກ່ວາລາຄາລວມ');";
                echo"window.location.href='quotation_in_baht.php';";
                echo"</script>";
           }
           elseif($amount == 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດລົດລາຄາໄດ້ ເນື່ອງຈາກຈຳນວນສ່ວນລົດແມ່ນເທົ່າກັບຈຳນວນລວມ');";
                echo"window.location.href='quotation_in_baht.php';";
                echo"</script>";
            }
            else{
                $sqlsave = "insert into quotation(quo_id,emp_id,baht_amount,in_date,in_time,cus_id) values('$quo_id2','$emp_id','$amount','$Date','$Time','$cus_id');";
                $resultsave = mysqli_query($link,$sqlsave);
                if(!$resultsave){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                    echo"window.location.href='quotation_in_baht.php';";
                    echo"</script>";
                }
                else {
                    $sqlsave2 = "insert into quotationdetail(pro_id,qty,price,vat,quo_id,rate_id,note,acc_id) select pro_id,qty,price,vat,quo_id,rate_id,note,acc_id from listquotationdetail;";
                    $resultsave2 = mysqli_query($link,$sqlsave2);
                    if(!$resultsave2){
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                        echo"window.location.href='quotation_in_baht.php';";
                        echo"</script>";
                    }else {
                        $sqlclear = "delete from listquotationdetail;";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='quotation_in_baht.php';";
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
