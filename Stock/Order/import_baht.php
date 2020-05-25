
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
    <title>ນຳເຂົ້າສິນຄ້າ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="import.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ນຳເຂົ້າສິນຄ້າ(ບາດ)
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
        $No_ = $_GET['No_'];
        $sqlget = "select pro_id,qty,d.billno,d.sup_id,company,o.price from orderdetail o join orders d on o.billno=d.billno join supplier s on d.sup_id=s.sup_id where no_='$No_';";
        $resultget = mysqli_query($link,$sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
        $sup_ids = $rowget['sup_id'];
      ?>
    <div class="container font16" align="center">
        <form action="import_baht.php" method="POST" id="form1">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group"> 
                <input type="text" name="pro_id" value="<?php echo $rowget['pro_id']; ?>" id="" class="form-control" placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="text" name="serial" value="" id="" class="form-control" placeholder="ໝາຍເລກ Serial">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="text" name="mac_address" value="" id="" class="form-control" placeholder="ໝາຍເລກ Mac Address">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="number" name="qty" value="<?php echo $rowget['qty']; ?>" min="1" id="" class="form-control" placeholder="ຈຳນວນ">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="number" name="price" value="<?php echo $rowget['price']; ?>" min="0" id="" class="form-control" placeholder="ລາຄາ">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="text" name="note" value="" min="0" id="" class="form-control" placeholder="ໝາຍເຫດ">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="number" name="billno" value="<?php echo $rowget['billno']; ?>" min="0" id="" class="form-control" placeholder="ເລກທີບິນສັ່ງຊື້">
                </div>
                <div class="col-xs-12 col-sm-6 form-group"> 
                    <input type="text" name="billimp" value="" min="0" id="" class="form-control" placeholder="ເລກທີບິນນຳເຂົ້າສິນຄ້າ">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <select name="sup_id" id="" class="form-control">
                        <option value="<?php echo $rowget['sup_id']; ?>"><?php echo $rowget['company']; ?></option>
                        <?php
                            $sqlsup = "select * from supplier where sup_id != '$sup_ids' and type='Tool';";
                            $resultsup = mysqli_query($link, $sqlsup);
                            while($rowsup = mysqli_fetch_array($resultsup, MYSQLI_NUM)){
                            echo" <option value='$rowsup[0]'>$rowsup[1]</option>";
                            }
                        ?> 
                    </select>
                </div> 
                <div class="col-xs-12 form-group">
                <button type="submit" name="btnAdd" class="btn btn-info" style="width: 90%;">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        ນຳເຂົ້າສິນຄ້າ
                </button>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnAdd'])){
            $sqlpo = "select max(po_id) as po_bill from po;";
            $resultpo = mysqli_query($link, $sqlpo);
            $po = mysqli_fetch_array($resultpo, MYSQLI_ASSOC);
            $newpo = $po['po_bill'] + 1;
            $pro_id = $_POST['pro_id'];
            $serial = $_POST['serial'];
            $mac_address = $_POST['mac_address'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $note = $_POST['note'];
            $billno = $_POST['billno'];
            $billimp = $_POST['billimp'];
            $sup_id = $_POST['sup_id'];
            $emp_id = $_SESSION['emp_id'];
            date_default_timezone_set("Asia/Bangkok");
            $datenow = time();
            $Date = date("Y-m-d",$datenow);
            $Time = date("H:i:s",$datenow);
            if(trim($pro_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($serial) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ໝາຍເລກ serial');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($mac_address) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນ Mac Address');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($qty) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນການນຳເຂົ້າ');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($price) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລາຄາ');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($billno) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນເລກທີບິນສັ່ງຊື້');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($billimp) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນເລກທີບິນນຳເຂົ້າສິນຄ້າ');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            elseif(trim($sup_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກຜູ້ສະໜອງ');";
                echo"window.location.href='import_baht.php';";
                echo"</script>";
            }
            else{
                $sqlserial = "select * from listimp where serial = '$serial';";
                $resultserial = mysqli_query($link,$sqlserial);
                $sqlpro = "select * from stock where pro_id='$pro_id' and serial='$serial';";
                $resultpro = mysqli_query($link,$sqlpro);
                $sqlbill = "select * from orders where billno='$billno' and status='ອະນຸມັດ';";
                $resultbill = mysqli_query($link,$sqlbill);
                if(mysqli_num_rows($resultserial) > 0){
                    echo"<script>";
                    echo"alert('ໝາຍເລກ Serial ຊ້ຳກັນກະລຸນາໃສ່ໝາຍເລກ Serial ໃໝ່');";
                    echo"window.location.href='import_baht.php';";
                    echo"</script>";
                }
                elseif(mysqli_num_rows($resultpro) > 0){
                    echo"<script>";
                    echo"alert('ໝາຍເລກ Serial ຊ້ຳກັນກະລຸນາໃສ່ໝາຍເລກ Serial ໃໝ່');";
                    echo"window.location.href='import_baht.php';";
                    echo"</script>";
                }
                elseif(mysqli_num_rows($resultbill) == 0){
                    echo"<script>";
                    echo"alert('ຂໍອະໄພບໍ່ສາມາດນຳເຂົ້າສິນຄ້າໄດ້ ເນື່ອງຈາກບິນສັ່ງຊື້ຍັງບໍ່ທັນໄດ້ອະນຸມັດ, ກະລຸນາປ້ອນບິນສັ່ງຊື້ທີ່ອະນຸມັດແລ້ວ');";
                    echo"window.location.href='import_baht.php';";
                    echo"</script>";
                }
                else {
                    $sqlckbaht = "select * from listimp where rate_id='LAK';";
                    $resultbaht = mysqli_query($link,$sqlckbaht);
                    $sqlckpo = "select * from listpodetail;";
                    $resultpo = mysqli_query($link,$sqlckpo);
                    $sqlcksa = "select * from listsalarydetail";
                    $resultsa = mysqli_query($link,$sqlcksa);
                    $sqlmac = "select * from stock where mac_address='$mac_address';";
                    $resultmac = mysqli_query($link,$sqlmac);
                    if(mysqli_num_rows($resultbaht) > 0){
                        echo"<script>";
                        echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການນຳສິນຄ້າເຂົ້າສາງໃນສະກຸນເງິນກີບຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການນຳເຂົ້າສິນຄ້າໃນສະກຸນເງິນກີບຈະເສັດສິ້ນຈຶ່ງສາມາດນຳເຂົ້າສິນຄ້າໃນສະກຸນເງິນບາດໄດ້');";
                        echo"window.location.href='import_baht.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultpo) > 0){
                        echo"<script>";
                        echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການລົງບັນຊີລາຍຈ່າຍຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີລາຍຈ່າຍຈະເສັດສິ້ນຈຶ່ງສາມາດນຳເຂົ້າສິນຄ້າໃນສະກຸນເງິນບາດໄດ້');";
                        echo"window.location.href='import_baht.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultsa) > 0){
                        echo"<script>";
                        echo"alert('ຂໍອະໄພ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງລົງບັນຊີເບີກຈ່າຍເງິນເດືອນຢູ່ ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີເບີກຈ່າຍເງິນເດືອນຈະເສັດສິ້ນຈຶ່ງສາມາດນຳເຂົ້າສິນຄ້າໄດ້');";
                        echo"window.location.href='import_baht.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultmac) == 0){
                        echo"<script>";
                        echo"alert('ໝາຍ Mac Address ນີ້ມີຢູ່ແລ້ວກະລຸນາໃສ່ໝາຍເລກ Mac Address ທີ່ແຕກຕ່າງ');";
                        echo"window.location.href='import_baht.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlrate = "select * from rate where rate_id='THB';";
                        $resultrate = mysqli_query($link,$sqlrate);
                        $rate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
                        $rate_id = $rate['rate_id'];
                        $rate_name = $rate['rate_buy'];
                        $sqladd = "insert into listimp(billimp,billno,sup_id,emp_id,pro_id,serial,mac_address,qty,price,dateimp,timeimp,moreinfo,rate_id,rate,acc_id,po_id) values('$billimp','$billno','$sup_id','$emp_id','$pro_id','$serial','$mac_address','$qty','$price','$Date','$Time','$note','$rate_id','$rate_name','69100000','$newpo');";
                        $resultadd = mysqli_query($link,$sqladd);
                        if(!$resultadd){
                            echo"<script>";
                            echo"alert('ບໍ່ສາມາດນຳເຂົ້າສິນຄ້າໄດ້');";
                            echo"window.location.href='import_baht.php';";
                            echo"</script>";
                        }
                        else {
                            $sqlstock = "insert into stock(pro_id,serial,mac_address,qty,moreinfo) values('$pro_id','$serial','$mac_address','$qty','$note');";
                            $resultstock = mysqli_query($link,$sqlstock);
                        }
                    }
                 
                }
            }

        }
    ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped" >
              <tr class="info">
                  <th>ລະຫັດສິນຄ້າ</th>
                  <th>Serial</th>
                  <th>Mac_Address</th>
                  <th>ຊື່ສິນຄ້າ</th>
                  <th>ປະເພດ</th>
                  <th>ຈຳນວນ</th>
                  <th>ຫົວໜ່ວຍ</th>
                  <th>ລາຄາ</th>
                  <th>ລວມ</th>
                  <th>ເລກທີບິນສັ່ງຊື້</th>
                  <th>ເລກທີບິນນຳເຂົ້າ</th>
                  <th>ຜູ້ສະໜອງ</th>
                  <th>ໝາຍເຫດ</th>
                  <th></th>
              </tr>
              <?php 
                $sqlsec = "select l.No_,billimp,l.billno,company,mac_address,emp_name,l.pro_id,pro_name,unit_name,cate_name,serial,l.qty,l.price,l.qty*l.price as total,l.moreinfo from listimp l join products p on l.pro_id=p.pro_id join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id join supplier s on l.sup_id=s.sup_id join employees e on l.emp_id=e.emp_id where rate_id='THB';";
                $resultsec = mysqli_query($link,$sqlsec);
                while($row = mysqli_fetch_array($resultsec, MYSQLI_ASSOC)){
              ?>
              <tr>
                  <td><?php echo $row['pro_id'];?></td>
                  <td><?php echo $row['serial'];?></td>
                  <td><?php echo $row['mac_address'];?></td>
                  <td><?php echo $row['pro_name'];?></td>
                  <td><?php echo $row['cate_name'];?></td>
                  <td><?php echo $row['qty'];?></td>
                  <td><?php echo $row['unit_name'];?></td>
                  <td><?php echo number_format($row['price']);?></td>
                  <td><?php echo number_format($row['total']);?></td>
                  <td><?php echo $row['billno'];?></td>
                  <td><?php echo $row['billimp'];?></td>
                  <td><?php echo $row['company'];?></td>
                  <td><?php echo $row['moreinfo'];?></td>
                  <td align="center">
                      <a href="Deleteimport_baht.php?No_=<?php echo $row['No_'];?>">
                          <img src="../../image/Delete.png" alt="" width="24px">
                      </a>
                  </td>
              </tr>
              <?php 
                }
                $sqlsum = "select sum(qty*price) as Total from listimp where rate_id='THB';";
                $resultsum = mysqli_query($link, $sqlsum);
                $total = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
              
                ?>
                <tr>
                    <td colspan="8" align="right" class="font26"><b>ລວມທັງໝົດ</b> </td>
                    <td colspan="6" align="center" class="font26"><b><?php echo number_format($total['Total']); ?> ບາດ</b> </td>
                </tr>
            </table>
        </div>
        <div class="row" align="center">
            <div class="col-xs-12 form-group">
                <button type="button" name="btnSave" class="btn btn-warning" style="width: 90%;" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                    ບັນທຶກການນຳເຂົ້າ
                </button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ຄຳຢືນຢັນ</h4>
                    </div>
                    <div class="modal-body">
                        ທ່ານຕ້ອງການບັນທຶກການນຳເຂົ້າ ຫຼື ບໍ່ ?
                    </div>
                    <div class="modal-footer">
                        <form action="import_baht.php" method="POST" id="formsave">
                            <input type="hidden" name="total" value="<?php echo $total['Total']; ?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ບໍ່</button>
                            <button type="submit" name="btnSave" class="btn btn-primary">ບັນທຶກ</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['btnSave'])){
            $sumimp = $_POST['total'];
            $emp_id = $_SESSION['emp_id'];
            date_default_timezone_set("Asia/Bangkok");
            $datenow = time();
            $Date = date("Y-m-d",$datenow);
            $Time = date("H:i:s",$datenow);
            $sqlpo = "select max(po_id) as po_bill from po;";
            $resultpo = mysqli_query($link, $sqlpo);
            $po = mysqli_fetch_array($resultpo, MYSQLI_ASSOC);
            $newpo = $po['po_bill'] + 1;
            $sqlinsert = "insert into po(po_id,emp_id,baht_amount,po_date,po_time,status) values('$newpo','$emp_id','$sumimp','$Date','$Time','PAID');";
            $resultinsert = mysqli_query($link,$sqlinsert);
            $sqldetail = "insert into podetail(bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate) select billimp,dateimp,pro_name,l.qty,l.price,acc_id,po_id,rate_id,rate from listimp l join products p on l.pro_id=p.pro_id;";
            $resultdetail = mysqli_query($link,$sqldetail);
            $sqlsave = "insert into imports(billimp,billno,sup_id,emp_id,pro_id,serial,mac_address,qty,price,dateimp,timeimp,moreinfo,rate_id,rate) select billimp,billno,sup_id,emp_id,pro_id,serial,mac_address,qty,price,dateimp,timeimp,moreinfo,rate_id,rate from listimp;";
            $resultsave = mysqli_query($link,$sqlsave);
            if(!$resultsave){
                echo"<script>";
                echo"alert('ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ');";
                echo"window.location.href='import2.php';";
                echo"</script>";
            }
            else {
                $sqlclear = "delete from listimp";
                $resultclear = mysqli_query($link,$sqlclear);
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='import.php';";
                    echo"</script>";
            }
        }
        mysqli_close($link);
    ?>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
