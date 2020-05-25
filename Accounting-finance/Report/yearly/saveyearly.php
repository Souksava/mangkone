<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
        echo"<meta http-equiv='refresh' content='1;URL=../../../Check/logout.php'>";
    }
    else{}
    require '../../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y",$datenow);
    $Time = date("H:i:s",$datenow);
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ຍອດຍົກປີກ່ອນ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../../image/ICO.ico">
    <link rel="stylesheet" href="../../../css/Style.css">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="lastyear.php">
                    <img src="../../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ຍອດຍົກປີກ່ອນ</b>
            </div>
            <div class="tapbar" align="right">
              <a href="../../../Check/Logout.php">
                  <img src="../../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br><br>
      <!-- body -->
    <div class="container font16">
        <form action="saveyearly.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row ">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ເລືອກເລກທີບັນຊີ</label>
                    <select name="acc_id" class="form-control" id="">
                        <option value="">ເລືອກເລກທີບັນຊີ</option>
                        <?php
                            $sqlacc_no = "select * from acc_no a left join acc_unit u on a.unit_id=u.unit_id left join acc_property p on u.ppy_id=p.ppy_id where ppy_name!='ລາຍຈ່າຍ' and ppy_name!='ລາຍຮັບ' order by acc_name asc;";
                            $resultacc_no = mysqli_query($link, $sqlacc_no);
                            while($rowacc_no = mysqli_fetch_array($resultacc_no, MYSQLI_NUM)){
                                echo" <option value='$rowacc_no[0]'>$rowacc_no[1]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ວັນທີ ຫຼື ປີ</label><br>
                    <input type="date" class="form-control" name="year_date">
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ໜີ້</label><br>
                    <input type="number" min="0" class="form-control" name="po_price" placeholder="ໜີ້">
                </div>
                <div class="col-xs-12 col-sm-6 form-group" >
                    <label>ມີ</label><br>
                    <input type="number" min="0" class="form-control" name="re_price" placeholder="ມີ">
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
            $acc_id = $_POST['acc_id'];
            $year_date = $_POST['year_date'];
            $po_price = $_POST['po_price'];
            $re_price = $_POST['re_price'];
            $sqlck = "select * from listyearly where acc_id='$acc_id' and year(year_date)=date_format('$year_date','%Y');";
            $resultck = mysqli_query($link,$sqlck);
            if($po_price == ""){
                $po_price = "0";
            }
            if($re_price == ""){
                $re_price = "0";
            }
            if(trim($acc_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກເລກທີບັນຊີ');";
                echo"window.location.href='saveyearly.php';";
                echo"</script>";
            }
            elseif(trim($year_date) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກວັນທີ');";
                echo"window.location.href='saveyearly.php';";
                echo"</script>";
            }
            elseif(mysqli_num_rows($resultck) > 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ໄດ້ເພີ່ມແລ້ວ');";
                echo"window.location.href='saveyearly.php';";
                echo"</script>";
            }
            else{
                $sql = "insert into listyearly(po_price,re_price,acc_id,year_date) values('$po_price','$re_price','$acc_id','$year_date');";
                $result = mysqli_query($link,$sql);
            }
            
        }
    ?>
    <div class="container font14">
        <hr width="90%" />
        <form action="saveyearly.php" method="POST" id="formsave">
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1200px;">
                    <tr class="warning">
                        <th colspan="9" style="text-align: center;font-size: 18px;"><b>ລາຍການ</b></th>
                    </tr>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th style="width: 50px;">ເລກທີບັນຊີ</th>
                        <th style="width: 100px;">ເນື້ອໃນລາຍການ</th>
                        <th style="width: 80px;">ໜີ້</th>
                        <th style="width: 80px;">ມີ</th>
                        <th style="width: 80px;">ວັນທີ</th>
                        <th style="width: 30px;">ເຄື່ອງມື</th>
                        
                    </tr>
                    <tr>
                    <?php
                        $sqlshow = "select id,y.acc_id,acc_name,year_date,po_price,re_price from listyearly y left join acc_no a on y.acc_id=a.acc_id;";
                        $resultshow = mysqli_query($link,$sqlshow);
                        $NO_ = 0;
                        while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                            $NO_ = $NO_ + 1;
                    ?>
                        <td><?php echo $NO_?></td>
                        <td><?php echo $rowshow['acc_id'] ?></td>
                        <td><?php echo $rowshow['acc_name'] ?></td>
                        <td><?php echo number_format($rowshow['po_price'],2) ?></td>
                        <td><?php echo number_format($rowshow['re_price'],2) ?></td>
                        <td><?php echo $rowshow['year_date']; ?></td>
                        <td>
                            <a href="del.php?id=<?php echo $rowshow['id'];?>">
                                <img src="../../../image/Delete.png" alt="" width="18px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(po_price) as po_amount,sum(re_price) as re_amount from listyearly;";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="3" style="text-align: right;font-size: 26px;"><b>ຍອດລວມ:</b></th>
                        <th colspan="2" style="text-align: center;font-size: 26px;"><b>ໜີ້: <?php echo number_format($rowamount['po_amount'],2); ?></b></th>
                        <th colspan="2" style="text-align: center;font-size: 26px;"><b>ມີ: <?php echo number_format($rowamount['re_amount'],2); ?></b></th>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກ
            </button>
                <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" align="center">ຢືນຢັນ</h4>
                        </div>
                        <div class="modal-body" align="center">
                            ທ່ານຕ້ອງການຈະບັນທຶກ ຫຼື ບໍ່ ?
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
        $sqlck2 = "select l.acc_id,acc_name,year(l.year_date) as year from listyearly l left join yearly y on l.year_date=y.year_date left join acc_no a on l.acc_id=a.acc_id where year(l.year_date) = year(y.year_date)";
        $resultck2 = mysqli_query($link,$sqlck2);
        $rowck = mysqli_fetch_array($resultck2,MYSQLI_ASSOC);
        $acc_idck = $rowck['acc_id'];
        $acc_nameck = $rowck['acc_name'];
        $year = $rowck['year'];
        if(mysqli_num_rows($resultck2) > 0){
            echo"<script>";
            echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກເລກທີບັນຊີ $acc_idck $acc_nameck ໃນປີ $year ເຄີຍເພີ່ມແລ້ວກະລຸນາເພີ່ມປີທີ່ແຕກຕ່າງ');";
            echo"window.location.href='saveyearly.php';";
            echo"</script>";
        }
       else{
            $sqlsave = "insert into yearly(po_price,re_price,acc_id,year_date) select po_price,re_price,acc_id,year_date from listyearly;";
            $resultsave = mysqli_query($link,$sqlsave);
            if(!$resultsave){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                echo"window.location.href='saveyearly.php';";
                echo"</script>";
            }
            else{
                echo"<script>";
                echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                echo"window.location.href='saveyearly.php';";
                echo"</script>";
                $sqlclear = "delete from listyearly;";
                $resultclear = mysqli_query($link,$sqlclear);
            }
       }
    }

    ?>
      <!-- body -->
  </body>
        <script src="../../../js/production_jQuery331.js"></script>
        <script src="../../../js/bootstrap.min.js"></script>
        <script src="../../../js/Style.js"></script>
</html>
