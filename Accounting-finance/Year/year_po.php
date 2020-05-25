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
    <title>ການເຄື່ອນໄຫວໃນປີ(ໜີ້)</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="year.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ການເຄື່ອນໄຫວໃນປີ(ໜີ້)</b>
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
        <form action="year_po.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row"  align="left">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເລກທີບັນຊີ</label>
                    <select name="acc_id" id="" class="form-control">
                        <option value="">ເລືອກເລກທີບັນຊີ</option>
                        <?php
                                $sqlaccno = "select * from acc_no a left join acc_unit u on a.unit_id=u.unit_id left join acc_property p on u.ppy_id=p.ppy_id where ppy_name!='ລາຍຈ່າຍ' and ppy_name!='ລາຍຮັບ' order by acc_name asc;";
                                $resultaccno = mysqli_query($link, $sqlaccno);
                                while($rowaccno = mysqli_fetch_array($resultaccno, MYSQLI_NUM)){
                                echo" <option value='$rowaccno[0]'>$rowaccno[1]</option>";
                            }
                        ?>
                    </select>
                    <input type="hidden" value="<?php echo $bill ?>" name="po_id">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເນື້ອໃນ</label><br>
                    <input type="text" class="form-control" name="content" placeholder="ເນື້ອໃນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ມູນຄ່າ</label><br>
                    <input type="number" min="500" class="form-control" name="price" placeholder="ມູນຄ່າ">
                </div>
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
            $content = $_POST['content'];
            $pricea = $_POST['price'];
            $acc_ida = $_POST['acc_id'];
            if(trim($content) == ""){
                $content = "-";
            }
            if(trim($pricea) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນມູນຄ່າເງິນ');";
                echo"window.location.href='year_po.php';";
                echo"</script>";
            }
            elseif(trim($acc_ida) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກເລກທີບັນຊີ');";
                echo"window.location.href='year_po.php';";
                echo"</script>";
            }
            else{
                    $sqlckimp = "select * from listimp;";
                    $resultimp = mysqli_query($link,$sqlckimp);
                    $sqlckpo = "select * from listpodetail where rate_id='THB' or rate_id='USD';";
                    $resultpo = mysqli_query($link,$sqlckpo);
                    $sqlcksa = "select * from listsalarydetail";
                    $resultsa = mysqli_query($link,$sqlcksa);
                    $sqlck = "select * from listpodetail where acc_id='$acc_ida';";
                    $resultck = mysqli_query($link,$sqlck);
                    if(mysqli_num_rows($resultimp) > 0){
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ມີຢູ່ແລ້ວ');";
                        echo"window.location.href='year_po.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultpo) > 0){
                        echo"<script>";
                        echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການລົງບັນຊີລາຍຈ່າຍເງິນບາດ ຫຼື ເງິນໂດລ້າຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີລາຍຈ່າຍເງິນບາດ ຫຼື ເງິນໂດລ້າຈະເສັດສິ້ນຈຶ່ງສາມາດລົງບັນລາຍຈ່າຍເງິນກີບໄດ້');";
                        echo"window.location.href='year_po.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultsa) > 0){
                        echo"<script>";
                        echo"alert('ຂໍອະໄພ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງລົງບັນຊີເບີກຈ່າຍເງິນເດືອນຢູ່ ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີເບີກຈ່າຍເງິນເດືອນຈະເສັດສິ້ນຈຶ່ງສາມາດລົງບັນລາຍຈ່າຍເງິນກີບໄດ້');";
                        echo"window.location.href='year_po.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultck) > 0){
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ ເນື່ອງເລກທີບັນຊີນີ້ມີຢູ່ແລ້ວ');";
                        echo"window.location.href='year_po.php';";
                        echo"</script>";
                    }
                    else{
                        $sql = "insert into listpodetail(bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate,img_path,purchase_id,note) values('$billa','0000-00-00','$content','1','$pricea','$acc_ida','$po_id','LAK','1','-','0','-');";
                        $result = mysqli_query($link,$sql);
                        echo"<script>";
                        echo"window.location.href='year_po.php';";
                        echo"</script>";
                    }

            }
            
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="year_po.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group" ><br>
                    <h4><b>ເລກທີ: <?php echo $bill ?></b></h4>
                    <input type="hidden" name="po_id" value="<?php echo $bill ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ວັນທີລົງບັນຊີ</label>
                    <input type="date" name="po_date" class="form-control">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1200px;">
                    <tr class="warning">
                        <th colspan="14" style="text-align: center;font-size: 18px;"><b>ລາຍການ</b></th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>ເລກທີບັນຊີ</th>
                        <th>ເນື້ອໃນ</th>
                        <th>ມູນຄ່າ</th>
                        <th>ເຄື່ອງມື</th>
                        
                    </tr>
                    <tr>
                    <?php
                        $sqlshow = "select * from listpodetail_view where rate_id='LAK';";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                    ?>
                        <td><?php echo $NO_ += 1;?></td>
                        <td><?php echo $rowshow['acc_name'] ?></td>
                        <td><?php echo $rowshow['pdet_name'] ?></td>
                        <td><?php echo number_format($rowshow['total'],2); ?></td>
                        <td>
                            <a href="del_po.php?no_=<?php echo $rowshow['no_'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(total) as amount from listpodetail_view where rate_id='LAK';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="2" style="text-align: right;font-size: 26px;"><b>ມູນຄ່າລວມ:</b></th>
                        <th colspan="3" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount']); ?> ກີບ</b>
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
            $emp_id = $_SESSION['emp_id'];
            $po_date = $_POST['po_date'];
            $sqlck2 = "select l.acc_id,acc_name,year(p.po_date) as year from listpodetail l left join podetail y on l.acc_id=y.acc_id left join po p on y.po_id=p.po_id  left join acc_no a on l.acc_id=a.acc_id where date_format('$po_date','%Y') = year(p.po_date)";
            $resultck2 = mysqli_query($link,$sqlck2);
            $rowck = mysqli_fetch_array($resultck2,MYSQLI_ASSOC);
            $acc_idck = $rowck['acc_id'];
            $acc_nameck = $rowck['acc_name'];
            $year = $rowck['year'];
            if(trim($amount) == 0){
                echo"<script>";
                echo"alert('ກະລຸນາເພີ່ມລາຍການບັນຊີລາຍຈ່າຍ');";
                echo"window.location.href='year_po.php';";
                echo"</script>";
            }
            elseif(trim($po_date) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກວັນທີລົງບັນຊີ');";
                echo"window.location.href='year_po.php';";
                echo"</script>";
            }
            else if(mysqli_num_rows($resultck2) > 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກເລກທີບັນຊີ $acc_idck $acc_nameck ໃນປີ $year ເຄີຍເພີ່ມແລ້ວກະລຸນາເພີ່ມປີທີ່ແຕກຕ່າງ');";
                echo"window.location.href='year_po.php';";
                echo"</script>";
            }
            else{
                $sqlsavepo = "insert into po(po_id,emp_id,kip_amount,po_date,po_time,status) values('$po_id2','$emp_id','$amount','$po_date','$Time','PAID');";
                $resultsavepo = mysqli_query($link,$sqlsavepo);
                if(!$resultsavepo){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                    echo"window.location.href='year_po.php';";
                    echo"</script>";
                }
                else{
                    $sqlpodetail = "insert into podetail(bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate,img_path,purchase_id,note) select bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate,img_path,purchase_id,note from listpodetail; ";
                    $resultpodetail = mysqli_query($link,$sqlpodetail);
                    if(!$resultpodetail){
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                        echo"window.location.href='year_po.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlclear = "delete from listpodetail;";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"alert('ບັນທຶກລາຍຈ່າຍສຳເລັດ');";
                        echo"window.location.href='year_po.php';";
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
