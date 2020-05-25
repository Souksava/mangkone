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
    <title>ການເຄື່ອນໄຫວໃນປີ(ມີ)</title>
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
                <b>ການເຄື່ອນໄຫວໃນປີ(ມີ)</b>
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
        <form action="year_cr.php" method="POST" id="form1" enctype="multipart/form-data">
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
                    <input type="hidden" value="<?php echo $bill ?>" name="re_id">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເນື້ອໃນ</label><br>
                    <input type="text" class="form-control" name="cash_name" placeholder="ເນື້ອໃນ">
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
            $re_id = $_POST['re_id'];
            $cash_name = $_POST['cash_name'];
            $price = $_POST['price'];
            $acc_id = $_POST['acc_id'];
            $sqlck = "select * from listcash_receipt where acc_id='$acc_id';";
            $resultck = mysqli_query($link,$sqlck);
            if(trim($cash_name) == ""){
                $cash_name = "-";
             }
            if(mysqli_num_rows($resultimp) > 0){
                echo"<script>";
                echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການນຳສິນຄ້າເຂົ້າສາງຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການນຳເຂົ້າສິນຄ້າຈະເສັດສິ້ນຈຶ່ງສາມາດເຮັດບັນຊີລາຍຈ່າຍໄດ້');";
                echo"window.location.href='year_cr.php';";
                echo"</script>";
            }
            elseif(trim($price) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນມູນຄ່າເງິນ');";
                echo"window.location.href='year_cr.php';";
                echo"</script>";
            }
            elseif(trim($acc_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກເລກທີບັນຊີ');";
                echo"window.location.href='year_cr.php';";
                echo"</script>";
            }
            else{
                    $sqlckpo = "select * from listcash_receipt where rate_id='THB' or rate_id='USD';";
                    $resultreven = mysqli_query($link,$sqlckpo);
                    $sqlck = "select * from listcash_receipt where acc_id='$acc_id';";
                    $resultck = mysqli_query($link,$sqlck);
                    if(mysqli_num_rows($resultck) > 0){
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ມີຢູ່ແລ້ວ');";
                        echo"window.location.href='year_cr.php';";
                        echo"</script>";
                    }
                    elseif(mysqli_num_rows($resultreven) > 0){
                        echo"<script>";
                        echo"alert('ກະລຸນາລໍຖ້າ ເນື່ອງຈາກຕອນນີ້ມີຜູ້ໃຊ້ລະບົບກຳລັງທຳການລົງບັນຊີລາຍຮັບສະກຸນເງິນບາດ ຫຼື ໂດລາຢູ່ໃນຕອນນີ້, ກະລຸນາລໍຖ້າຈົນກວ່າການລົງບັນຊີລາຍຮັບໃນສະກຸນເງິນບາດ ຫຼື ໂດລາຈະເສັດສິ້ນຈຶ່ງສາມາດເຮັດບັນຊີລາຍຮັບສະກຸນເງິນກີບໄດ້');";
                        echo"window.location.href='year_cr.php';";
                        echo"</script>";
                    }
                    else{
                        $sql = "insert into listcash_receipt(re_id,cash_name,qty,price,cash_date,bill,acc_id,rate_id,rate,img_path,note) values('$re_id','$cash_name','1','$price','0000-00-00','0','$acc_id','LAK','1','-','-');";
                        $result = mysqli_query($link,$sql);
                        echo"<script>";
                        echo"window.location.href='year_cr.php';";
                        echo"</script>";
                    }

            }
            
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="year_cr.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group" ><br>
                    <h4><b>ເລກທີ: <?php echo $bill ?></b></h4>
                    <input type="hidden" name="re_id" value="<?php echo $bill ?>">
                </div>
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ວັນທີລົງບັນຊີ</label><br>
                    <input type="date" name="re_date" class="form-control">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1200px;">
                    <tr class="warning">
                        <th colspan="14" style="text-align: center;font-size: 18px;"><b>ລາຍການບັນຊີລາຍຮັບເງິນກີບ</b></th>
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
                        $sqlshow = "select cash_id,re_id,cash_name,qty*price as total,acc_name,l.acc_id from listcash_receipt l left join acc_no a on l.acc_id=a.acc_id where rate_id='LAK';";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                    ?>
                        <td><?php echo $NO_ += 1;?></td>
                        <td><?php echo $rowshow['acc_name'] ?></td>
                        <td><?php echo $rowshow['cash_name'] ?></td>
                        <td><?php echo number_format($rowshow['total'],2); ?></td>
                        <td>
                            <a href="del_cr.php?cash_id=<?php echo $rowshow['cash_id'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(qty*price) as amount from listcash_receipt where rate_id='LAK';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="3" style="text-align: right;font-size: 26px;"><b>ມູນຄ່າລວມ:</b></th>
                        <th colspan="2" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount'],2); ?> ກີບ</b>
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
            $re_id2 = $_POST['re_id'];
            $amount = $_POST['amount'];
            $emp_id = $_SESSION['emp_id'];
            $re_date = $_POST['re_date'];
            $sqlcus = "select * from customers where company='ທົ່ວໄປ';";
            $resultcus = mysqli_query($link,$sqlcus);
            $rowcus = mysqli_fetch_array($resultcus,MYSQLI_ASSOC);
            $cus_id = $rowcus['cus_id'];
           
            $sqlck2 = "select l.acc_id,acc_name,year(p.re_date) as year from listcash_receipt l left join cash_receipt y on l.acc_id=y.acc_id left join receipt p on y.re_id=p.re_id  left join acc_no a on l.acc_id=a.acc_id where date_format('$re_date','%Y') = year(p.re_date)";
            $resultck2 = mysqli_query($link,$sqlck2);
            $rowck = mysqli_fetch_array($resultck2,MYSQLI_ASSOC);
            $acc_idck = $rowck['acc_id'];
            $acc_nameck = $rowck['acc_name'];
            $year = $rowck['year'];
            if(trim($amount) == 0){
                echo"<script>";
                echo"alert('ກະລຸນາເພີ່ມລາຍການບັນຊີລາຍຮັບ');";
                echo"window.location.href='year_cr.php';";
                echo"</script>";
            }
            elseif(trim($re_date) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກວັນທີລົງບັນຊີ');";
                echo"window.location.href='year_cr.php';";
                echo"</script>";
            }
            else if(mysqli_num_rows($resultck2) > 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກເລກທີບັນຊີ $acc_idck $acc_nameck ໃນປີ $year ເຄີຍເພີ່ມແລ້ວກະລຸນາເພີ່ມປີທີ່ແຕກຕ່າງ');";
                echo"window.location.href='year_cr.php';";
                echo"</script>";
            }
            else{
                $sqlsavepo = "insert into receipt(re_id,emp_id,cus_id,re_date,kip_amount) values('$re_id2','$emp_id','$cus_id','$re_date','$amount');";
                $resultsavepo = mysqli_query($link,$sqlsavepo);
                if(!$resultsavepo){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                    echo"window.location.href='year_cr.php';";
                    echo"</script>";
                }
                else{
                    $sqlpodetail = "insert into cash_receipt(re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,img_path,note) select re_id,cash_name,qty,price,vat,cash_date,bill,acc_id,rate_id,rate,img_path,note from listcash_receipt";
                    $resultpodetail = mysqli_query($link,$sqlpodetail);
                    if(!$resultpodetail){
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນຜິດພາດ');";
                        echo"window.location.href='year_cr.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlclear = "delete from listcash_receipt;";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='year_cr.php';";
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
