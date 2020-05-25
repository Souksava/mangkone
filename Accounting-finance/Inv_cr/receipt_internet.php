
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
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Receipt Internet</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="inv_cr.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Receipt Internet
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
        <form action="receipt_internet.php" method="POST" id="form1">
            <div class="row" align="center">
                <div class="col-md-12 form-group">
                    <input type="text" name="invoice" class="form-control" placeholder="ເລກທີບິນ Invoice">
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
        $invoice = $_POST['invoice'];
        $sqlget = "select voice_id,i.emp_id,emp_name,kip_amount,baht_amount,us_amount,in_date,in_time,i.cus_id,company,i.img_path from invoice i left join employees e on i.emp_id=e.emp_id left join customers c on i.cus_id=c.cus_id where voice_id='$invoice';";
        $resultget = mysqli_query($link,$sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
      
    ?>
    <div class="container font14">
        <div class="row" style="float: left; width: 50%;text-align: left">
            <label>ເລກທີ Invoice: <?php echo $rowget['voice_id'];?></label><br>
            <label>ວັນທີສ້າງ Invoice: <?php echo $rowget['in_date'];?></label><br>
            <label>ເວລາ: <?php echo $rowget['in_time'];?></label>
        </div>
        <div class="row" style="float: left; width: 50%;text-align: right">
            <label>ລູກຄ້າ: <?php echo $rowget['company'];?></label><br>
            <label>ຜູ້ສ້າງ Invoice: <?php echo $rowget['emp_name'];?></label><br>
            <a href="#" data-toggle="modal" data-target="#myModal2">
                <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
            </a>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="margin-left: 0px;">
                    <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="100%"  class="imagelist" />
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <tr class="info">
                <th>#</th>
                <th>ຊື່ສິນຄ້າ</th>
                <th>ຈຳນວນ</th>
                <th>ລາຄາ</th>
                <th>ລວມ</th>
                <th>ໝາຍເຫດ</th>
            </tr>
            <?php
                $sqltotal = "select kip_amount,baht_amount,us_amount from invoice where voice_id='$invoice';";
                $resulttotal = mysqli_query($link,$sqltotal);
                $rowtotal = mysqli_fetch_array($resulttotal,MYSQLI_ASSOC);
                $kip_amount = $rowtotal['kip_amount'];
                $baht_amount = $rowtotal['baht_amount'];
                $us_amount = $rowtotal['us_amount'];
                $amountTotal = $kip_amount + $baht_amount + $us_amount;
                $sqldis = "select (sum(d.qty*d.price) - ((sum((d.qty*d.price) + vat) - (sum((d.qty*d.price) + vat) - '$amountTotal')) / 1.1)) / count(d.qty) as discount from invoicedetail d left join invoice i on d.voice_id=i.voice_id left join products p on d.pro_id=p.pro_id where d.voice_id='$invoice';";
                $resultdis = mysqli_query($link,$sqldis);
                $rowdis = mysqli_fetch_array($resultdis,MYSQLI_ASSOC);
                $discount = $rowdis['discount'];
                $sql = "select indet_id,pro_name,d.qty,d.price - ('$discount' / d.qty) as price,(d.price - ('$discount' / d.qty)) * d.qty as total,((d.price - ('$discount' / d.qty)) * d.qty) * 0.10 as vat,d.voice_id,rate_id,note from invoicedetail d left join invoice i on d.voice_id=i.voice_id left join acc_product p on d.pro_id=p.pro_id where d.voice_id='$invoice';";
                $result = mysqli_query($link,$sql);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
                <tr>
                    <td><?php echo $No_ = $No_ + 1;?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['note'];?></td>
                </tr>
            <?php
                }
                $sqlsum = "select sum((d.price - ('$discount' / d.qty)) * d.qty) as amount,(sum((d.price - ('$discount' / d.qty)) * d.qty)) * 0.10 as vat,(sum((d.price - ('$discount' / d.qty)) * d.qty)) + ((sum((d.price - ('$discount' / d.qty)) * d.qty)) * 0.10) as newamount,rate_id from invoicedetail d left join invoice i on d.voice_id=i.voice_id where d.voice_id='$invoice' group by d.voice_id;";
                $resultsum = mysqli_query($link,$sqlsum);
                $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
            ?>
            <tr class="font26 danger">
                <td colspan="3" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="3" align="right"> <?php echo number_format($rowsum['amount'],2);?> <?php echo $rowsum['rate_id']; mysqli_close($link);?></td>
            </tr>
            <tr class="font26 danger">
                <td colspan="3" align="right"><b>VAT:</b></td>
                <td colspan="3" align="right"> <?php echo number_format($rowsum['vat'],2);?> <?php echo $rowsum['rate_id']; mysqli_close($link);?></td>
            </tr>
            <tr class="font26 danger">
                <td colspan="3" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="3" align="right"> <?php echo number_format($rowsum['newamount'],2);?> <?php echo $rowsum['rate_id']; mysqli_close($link);?></td>
            </tr>
            <tr>
                <td colspan="9">
                   <form action="receipt_internet.php" method="POST" id="formSave">
                        <button type="button" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກເຂົ້າບັນຊີລາຍຮັບ
                        </button>
                        <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel" align="center">ຢືນຢັນ</h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        ທ່ານຕ້ອງການຈະບັນທຶກເຂົ້າບັນຊີລາຍຮັບ ຫຼື ບໍ່ ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                        <input type="hidden" name="voice_id" value="<?php echo $invoice; ?>">
                                        <input type="hidden" name="rate_id" value="<?php echo $rowsum['rate_id']; ?>">
                                        <input type="hidden" name="newamount" value="<?php echo $rowsum['newamount']; ?>">
                                        <input type="hidden" name="cus_id" value="<?php echo $rowget['cus_id'];?>">
                                        <input type="hidden" name="emp_id" value="<?php echo $rowget['emp_id'];?>">
                                        <input type="hidden" name="in_date" value="<?php echo $rowget['in_date'];?>">
                                        <input type="hidden" name="discount" value="<?php echo $discount ?>">
                                        <button type="submit" name="btnSave" class="btn btn-primary">ບັນທຶກ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </form>
                </td>
            </tr>
        </table>
    </div>
    <?php
      }
    if(isset($_POST['btnSave'])){
        $voice_id = $_POST['voice_id'];
        $rate_id = $_POST['rate_id'];
        $amount = $_POST['newamount'];
        $cus_id = $_POST['cus_id'];
        $emp_id = $_POST['emp_id'];
        $in_date = $_POST['in_date'];
        $discount2 = $_POST['discount'];
        $sqlrate = "select * from rate where rate_id='$rate_id';";
        $resultrate = mysqli_query($link,$sqlrate);
        $rowrate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
        $rate = $rowrate['rate_buy'];
        $sqlck = "select * from listcash_receipt;";
        $resultck = mysqli_query($link,$sqlck);
       

        if(mysqli_num_rows($resultck) > 0){
            echo"<script>";
            echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ກຳລັງລົງບັນຊີລາຍຮັບຢູ່');";
            echo"window.location.href='receipt_internet.php';";
            echo"</script>";
        }
        else if(trim($amount) == 0){
            echo"<script>";
            echo"alert('ກະລຸນາປ້ອນເລກທີ invoice ໃຫ້ຖືກຕ້ອງ');";
            echo"window.location.href='receipt_internet.php';";
            echo"</script>";
        }
        else{
            $sqlno = "select max(re_id) as bill from receipt;";
            $resultno = mysqli_query($link, $sqlno);
            $rowno = mysqli_fetch_array($resultno,MYSQLI_ASSOC);
            $bill = $rowno['bill'] + 1;
            if($rate_id == "LAK"){
                $insertreceipt = "insert into receipt(re_id,emp_id,cus_id,re_date,kip_amount,bill) value('$bill','$emp_id','$cus_id','$in_date','$amount','$voice_id');";
                $resultinsertreceipt = mysqli_query($link,$insertreceipt);
                if(!$resultinsertreceipt){
                    echo"<script>";
                    echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບບໍ່ສຳເລັດ');";
                    echo"window.location.href='receipt_internet.php';";
                    echo"</script>";
                }
                else{
                    $sqlsave = "insert into cash_receipt(re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,barcode) select '$bill' as re_id,pro_name,i.qty,i.price - ('$discount2' / i.qty) as price,((i.price - ('$discount2' / i.qty)) * i.qty) * 0.10 as vat,'$in_date' as cash_date,voice_id,acc_id,rate_id,'$rate',i.pro_id from invoicedetail i left join acc_product p on i.pro_id=p.pro_id where voice_id='$voice_id';";
                    $resultsave = mysqli_query($link, $sqlsave);
                    if(!$resultsave){
                        echo"<script>";
                        echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບບໍ່ສຳເລັດ');";
                        echo"window.location.href='receipt_internet.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບສຳເລັດ');";
                        echo"window.location.href='receipt_internet.php';";
                        echo"</script>";
                    }
                }
            }
            elseif($rate_id == "USD"){
                $insertreceipt2 = "insert into receipt(re_id,emp_id,cus_id,re_date,us_amount,bill) value('$bill','$emp_id','$cus_id','$in_date','$amount','$voice_id');";
                $resultinsertreceipt2 = mysqli_query($link,$insertreceipt2);
                if(!$resultinsertreceipt2){
                    echo"<script>";
                    echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບບໍ່ສຳເລັດ');";
                    echo"window.location.href='receipt_internet.php';";
                    echo"</script>";
                }
                else{
                    $sqlsave2 = "insert into cash_receipt(re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,barcode) select '$bill' as re_id,pro_name,i.qty,i.price - ('$discount2' / i.qty) as price,((i.price - ('$discount2' / i.qty)) * i.qty) * 0.10 as vat,'$in_date' as cash_date,voice_id,acc_id,rate_id,'$rate',i.pro_id from invoicedetail i left join acc_product p on i.pro_id=p.pro_id where voice_id='$voice_id';";
                    $resultsave2 = mysqli_query($link, $sqlsave2);
                    if(!$resultsave2){
                        echo"<script>";
                        echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບບໍ່ສຳເລັດ');";
                        echo"window.location.href='receipt_internet.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບສຳເລັດ');";
                        echo"window.location.href='receipt_internet.php';";
                        echo"</script>";
                    }
                }
            }
            else{
                $insertreceipt3 = "insert into receipt(re_id,emp_id,cus_id,re_date,baht_amount,bill) value('$bill','$emp_id','$cus_id','$in_date','$amount','$voice_id');";
                $resultinsertreceipt3 = mysqli_query($link,$insertreceipt3);
                if(!$resultinsertreceipt3){
                    echo"<script>";
                    echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບບໍ່ສຳເລັດ');";
                    echo"window.location.href='receipt_internet.php';";
                    echo"</script>";
                }
                else{
                    $sqlsave3 = "insert into cash_receipt(re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,barcode) select '$bill' as re_id,pro_name,i.qty,i.price - ('$discount2' / i.qty) as price,((i.price - ('$discount2' / i.qty)) * i.qty) * 0.10 as vat,'$in_date' as cash_date,voice_id,acc_id,rate_id,'$rate',i.pro_id from invoicedetail i left join acc_product p on i.pro_id=p.pro_id where voice_id='$voice_id';";
                    $resultsave3 = mysqli_query($link, $sqlsave3);
                    if(!$resultsave3){
                        echo"<script>";
                        echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບບໍ່ສຳເລັດ');";
                        echo"window.location.href='receipt_internet.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ບັນທຶກເຂົ້າບັນຊີລາຍຮັບສຳເລັດ');";
                        echo"window.location.href='receipt_internet.php';";
                        echo"</script>";
                    }
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
