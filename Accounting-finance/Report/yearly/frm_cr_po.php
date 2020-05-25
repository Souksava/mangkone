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
    $Date = date("Y-m-d",$datenow);
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ໃບດຸນດຽງກ່ອນການປັບປຸງ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../../image/ICO.ico">
    <link rel="stylesheet" href="../../../css/Style.css">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <style type="text/css">
        table {
            border: 1px solid black; 
            border-collapse: collapse;
            width: 100%;
        }
        th {
            border: 1px solid black;
        }
        td {
            border-right: 1px solid black;
            padding: 5px;
        }
    </style>
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="report_yearly.php">
                    <img src="../../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ໃບດຸນດ່ຽງກ່ອນການປັບປຸງ</b>
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
    <div class="container font14">
        <form action="frm_cr_po.php" method="POST" id="form1">
            <div class="row">
                <input type="number" min="0" class="form-control" name="year" style="width: 300px;" pattern="[0-9]{4}" placeholder="20XX">
                <button class="btn btn-primary" name="btnYear">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    <br>
    <?php
        if(isset($_POST['btnYear'])){
        $this_Year = $_POST['year'];
        $last_Year = $this_Year - 1;
    ?>
        <div class="row">
            <div align="center" class="col-md-12">
                ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ <br>
                ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ <br>
                ========oooo========
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                ບໍລິສັດ ມັງກອນເຕັກໂນໂລຊີ ຈຳກັດ <br>
                ບ້ານ ຊຽງຍືນ ເມືອງ ຈັນທະບູລີ <br>
                ນະຄອນຫຼວງວຽງຈັນ ສປປ ລາວ <br>
                ໂທ: 021 240 069
            </div>
            <div align="center" class="col-xs-12 col-sm-6 col-md-4 form-group">
                <h3>ໃບດຸນດ່ຽງ ກ່ອນການ ປັບປຸງ</h3>
                ປະຈຳປີ <?php echo $this_Year ?><br>
                ໄລຍະ 01/<?php echo $this_Year ?> ຫາ 12/<?php echo $this_Year ?>
            </div>
            <div align="right" class="col-xs-12 col-sm-6 col-md-4 form-group">
                <br><br><br>
                ສະກຸນເງິນກີບ
                <form action="Report_cr_po.php" method="POST" id="form1">
                    <input type="hidden" name="year" value="<?php echo $this_Year ?>">
                    <button type="submit" name="btnall" class="btn btn-primary">
                        <img src="../../../image/Print.png" width="28px">
                    </button> 
                </form>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table width="100%">
                <tr height="30px">
                    <th rowspan="2" style="text-align: center;">ເລກທີບັນຊີ</th>   
                    <th rowspan="2" style="text-align: center;">ເນື້ອໃນລາຍການ</th>   
                    <th colspan="2" style="text-align: center;">ຍອດຍົກມາຕົ້ນປີ</th> 

                    <th colspan="2" style="text-align: center;">ການເຄື່ອນໄຫວໃນປີ</th>   

                    <th colspan="2" style="text-align: center;">ຍອດເຫຼືອທ້າຍຍົກໄປ</th> 
                
                </tr>
                <tr height="30px">
                    <th style="text-align: center;">ໜີ້</th>       
                    <th style="text-align: center;">ມີ</th> 
                    <th style="text-align: center;">ໜີ້</th>       
                    <th style="text-align: center;">ມີ</th> 
                    <th style="text-align: center;">ໜີ້</th>       
                    <th style="text-align: center;">ມີ</th> 
                </tr>
             
                <?php
                    $sql = "select * from yearly2_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    if($row['po_price'] == null){
                        $row['po_price'] = 0;
                    }
                    if($row['re_price'] == null){
                        $row['re_price'] = 0;
                    }
                    if($row['po_total'] == null){
                        $row['po_total'] = 0;
                    }
                    if($row['re_total'] == null){
                        $row['re_total'] = 0;
                    }
                ?>
                <tr>
                    <td><?php echo $row['acc_id'] ?></td>
                    <td><?php echo $row['acc_name'] ?></td>
                    <td align="right">0</td>
                    <td align="right">0</td>
                    <td align="right"><?php echo number_format($row['po_total']) ?></td>
                    <td align="right"><?php echo number_format(($row['re_total'] + $row['vat'])) ?></td>
                    <td align="right">
                        <?php 
                            $last_year = $row['po_price'] - $row['re_price'];
                            $this_year = $row['po_total'] - ($row['re_total'] + $row['vat']);
                            $total_po = $last_year + $this_year;
                            if($total_po > 0){
                                echo number_format($total_po);
                            }
                            else{
                                echo"0";
                            }
                        ?>
                    </td>
                    <td align="right">
                        <?php 
                            $last_year2 = $row['re_price'] - $row['po_price'];
                            $this_year2 = ($row['re_total'] + $row['vat']) - $row['po_total'];
                            $total_re = $last_year2 + $this_year2;
                            if($total_re > 0){
                                echo number_format($total_re);
                            }
                            else{
                                echo"0";
                            }
                        ?>
                    </td>
                </tr>
                    <?php
                        }
                        $sqlsum = "select sum(po_price) as po_price,sum(re_price) as re_price,sum(po_total) as po_total,sum(re_total) as re_total,sum(vat) as vat from yearly2_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                        $resultsum = mysqli_query($link,$sqlsum);
                        $rowsum = mysqli_fetch_array($resultsum,MYSQLI_ASSOC);
                    ?>
                <tr>
                    <th style="text-align: center;" colspan="2">ລວມ:</td>
                    <th style="text-align: right;" ><?php echo number_format($rowsum['po_price']) ?></th>
                    <th style="text-align: right;"><?php echo number_format($rowsum['re_price']) ?></th>
                    <th style="text-align: right;"> <?php echo number_format($rowsum['po_total']) ?></th>
                    <th style="text-align: right;"> <?php echo number_format(($rowsum['re_total'] + $rowsum['vat'])) ?></th>
                    <th style="text-align: right;">
                        <?php 
                            $sqlamount_po = "select * from yearly2_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                            $resultamount_po = mysqli_query($link,$sqlamount_po);
                            $amount_po = 0;
                            while($rowamount_po = mysqli_fetch_array($resultamount_po, MYSQLI_ASSOC)){
                                $last_year_po = $rowamount_po['po_price'] - $rowamount_po['re_price'];
                                $this_year_po = $rowamount_po['po_total'] - ($rowamount_po['re_total'] + $rowamount_po['vat']);
                                $total_po = $last_year_po + $this_year_po;
                                if($total_po > 0){
                                    $amount_po = $amount_po + $total_po;
                                }
                            }
                            echo number_format($amount_po);
                        ?>
                    </th>
                    <th style="text-align: right;">
                        <?php   
                            $sqlamount_re = "select * from yearly2_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                            $resultamount_re = mysqli_query($link,$sqlamount_re);
                            $amount_re = 0;
                            while($rowamount_re = mysqli_fetch_array($resultamount_re, MYSQLI_ASSOC)){
                                $last_year_re = $rowamount_re['re_price'] - $rowamount_re['po_price'];
                                $this_year_re = ($rowamount_re['re_total'] + $rowamount_re['vat']) - $rowamount_re['po_total'];
                                $total_re = $last_year_re + $this_year_re;
                                if($total_re > 0){
                                    $amount_re = $amount_re + $total_re;
                                }
                            }
                            echo number_format($amount_re);
                        ?>
                    </th>
                </tr>
            </table>
        </div>
        <?php
            }
        ?>
    </div><br>
      <!-- body -->
  </body>
  <script src="../../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../../js/bootstrap.js" type="javascript"></script>
  <script src="../../../js/production_jQuery331.js"></script>
  <script src="../../../js/style.js"></script>
</html>
