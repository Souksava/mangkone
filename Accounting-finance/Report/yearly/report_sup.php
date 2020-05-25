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
    <title>ໃບສະຫຼຸບຊັບສົມບັດ - ຊັບສິນ</title>
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
                <b>ໃບສະຫຼຸບຊັບສົມບັດ - ຊັບສິນ</b>
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
        <form action="report_sup.php" method="POST" id="form1">
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
            </div>
            <div align="center" class="col-xs-12 col-sm-6 col-md-4 form-group">
                <h3>ໃບສະຫຼຸບຊັບສົມບັດ - ຊັບສິນ</h3>
            </div>
            <div align="right" class="col-xs-12 col-sm-6 col-md-4 form-group">
                <form action="Report_sup_r.php" method="POST" id="form1">
                    <input type="hidden" name="year" value="<?php echo $this_Year ?>">
                    <button type="submit" name="btnall" class="btn btn-primary">
                        <img src="../../../image/Print.png" width="28px">
                    </button> 
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table width="100%">
                <tr height="30px">
                    <th rowspan="2" style="text-align: center;">ລາຍການ</th>   
                    <th rowspan="2" style="text-align: center;">ປີກ່ອນ</th>   
                    <th colspan="3" style="text-align: center;">ປີນີ້ ສະຫຼຸບບັນຊີ &nbsp;&nbsp;&nbsp;&nbsp; ວັນທີ 31/12/<?php echo $this_Year ?></th> 
                </tr>
                <tr height="30px">
                    <th style="text-align: center;">ມູນຄ່າເດີມ</th>       
                    <th style="text-align: center;">ຫຼຸ້ຍຫ້ຽນ</th> 
                    <th style="text-align: center;">ມູນຄ່າ ຍັງເຫຼືອ</th> 
                </tr>
                <!-- i -->
                <?php
                    $sql_sup1 = "select u.unit_id,unit_name,sum(po_price) as po_price,sum(re_price) as re_price,sum(p.qty*(p.price*p.rate)) as po_total,sum(c.qty*(c.price*c.rate)) as re_total,sum(vat) as vat,i.re_date,o.po_date,y.year_date
                    from acc_unit u left join acc_property t on u.ppy_id=t.ppy_id left join acc_no a on u.unit_id=a.unit_id left join yearly y on a.acc_id=y.acc_id left join podetail p on a.acc_id=p.acc_id left join cash_receipt c on a.acc_id=c.acc_id left join receipt i on 
                    c.re_id=i.re_id left join po o on p.po_id=o.po_id where ppy_name='ຊັບສິນຄົງທີ່' group by u.unit_id order by u.ppy_id asc;";
                    $resultsup_1 = mysqli_query($link,$sql_sup1);
                    $sum_sup1 = 0;
                    $sum_sup_this_po1 = 0;
                    $sum_sup_this_re1 = 0;
                    while($row_sup1 = mysqli_fetch_array($resultsup_1,MYSQLI_ASSOC)){
                            $sum_sup1 = $sum_sup1 + $row_sup1['po_price'];
                            $unit_id = $row_sup1['unit_id'];
                            $sql_sup1_detail = "
                            select a.acc_id,acc_name,po_price,re_price,sum(p.qty*(p.price*p.rate)) as po_total,sum(c.qty*(c.price*c.rate)) as re_total,sum(vat) as vat,i.re_date,o.po_date,year_date
                            from acc_no a left join yearly y on a.acc_id=y.acc_id left join podetail p on a.acc_id=p.acc_id left join cash_receipt c on a.acc_id=c.acc_id left join receipt i on 
                            c.re_id=i.re_id left join po o on p.po_id=o.po_id left join acc_unit u on a.unit_id=u.unit_id left join acc_property t on u.ppy_id=t.ppy_id where a.unit_id='$unit_id' group by a.acc_id order by a.acc_id;
                            ";
                            $resultsup_1_detail = mysqli_query($link,$sql_sup1_detail);
                            while($row_sup1_detail = mysqli_fetch_array($resultsup_1_detail,MYSQLI_ASSOC)){
                                 if($row_sup1_detail['po_price'] == null){
                                    $row_sup1_detail['po_price'] = 0;
                                }
                                if($row_sup1_detail['re_price'] == null){
                                    $row_sup1_detail['re_price'] = 0;
                                }
                                if($row_sup1_detail['po_total'] == null){
                                    $row_sup1_detail['po_total'] = 0;
                                }
                                if($row_sup1_detail['re_total'] == null){
                                    $row_sup1_detail['re_total'] = 0;
                                }
                                $last_year2 = $row_sup1_detail['re_price'] - $row_sup1_detail['po_price'];
                                $this_year2 = ($row_sup1_detail['re_total'] + $row_sup1_detail['vat']) - $row_sup1_detail['po_total'];
                                $total_re = $last_year2 + $this_year2;
                                if($total_re > 0){
                                    $sum_sup_this_re1 = $sum_sup_this_re1 + $total_re;
                                }
                                $last_year = $row_sup1_detail['po_price'] - $row_sup1_detail['re_price'];
                                $this_year = $row_sup1_detail['po_total'] - ($row_sup1_detail['re_total'] + $row_sup1_detail['vat']);
                                $total_po = $last_year + $this_year;
                                if($total_po > 0){
                                    $sum_sup_this_po1 = $sum_sup_this_po1 + $total_po; 

                                }
                            }
                    }
                ?>
                <!-- i -->
                <tr>
                    <td><b>I. ຊັບສິນຄົງທີ່</b></td>
                    <td align="right"><b><?php echo number_format($sum_sup1);?></b></td>
                    <td align="right"><b><?php echo number_format($sum_sup_this_po1); ?></b></td>
                    <td align="right"><b><?php echo number_format($sum_sup_this_re1);?></b></td>
                    <td align="right">
                        <b>
                            <?php 
                                $sum_sup_this_2 = $sum_sup_this_po1 - $sum_sup_this_re1;
                                if($sum_sup_this_2 < 0){
                                    echo "(".number_format(abs($sum_sup_this_2)).")";
                                }
                                else{
                                    echo number_format($sum_sup_this_2);
                                }
                            ?>
                        </b>
                    </td>
                </tr>
                <?php
                    $sql_sup1 = "select u.unit_id,unit_name,sum(po_price) as po_price,sum(re_price) as re_price,sum(p.qty*(p.price*p.rate)) as po_total,sum(c.qty*(c.price*c.rate)) as re_total,sum(vat) as vat,i.re_date,o.po_date,y.year_date
                    from acc_unit u left join acc_property t on u.ppy_id=t.ppy_id left join acc_no a on u.unit_id=a.unit_id left join yearly y on a.acc_id=y.acc_id left join podetail p on a.acc_id=p.acc_id left join cash_receipt c on a.acc_id=c.acc_id left join receipt i on 
                    c.re_id=i.re_id left join po o on p.po_id=o.po_id where ppy_name='ຊັບສິນຄົງທີ່' group by u.unit_id order by u.ppy_id asc;";
                    $resultsup_1 = mysqli_query($link,$sql_sup1);
                    while($row_sup1 = mysqli_fetch_array($resultsup_1,MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row_sup1['unit_name'] ?></td>
                    <td align="right"><?php echo number_format($row_sup1['po_price']) ?></td>
                    <td align="right"><?php echo "0" ?></td>
                    <td align="right"><?php echo "0" ?></td>
                    <td align="right"><?php echo "0" ?></td>
                </tr>
                    <?php
                        $unit_id = $row_sup1['unit_id'];
                        $sql_sup1_detail = "
                        select a.acc_id,acc_name,po_price,re_price,sum(p.qty*(p.price*p.rate)) as po_total,sum(c.qty*(c.price*c.rate)) as re_total,sum(vat) as vat,i.re_date,o.po_date,year_date
                        from acc_no a left join yearly y on a.acc_id=y.acc_id left join podetail p on a.acc_id=p.acc_id left join cash_receipt c on a.acc_id=c.acc_id left join receipt i on 
                        c.re_id=i.re_id left join po o on p.po_id=o.po_id left join acc_unit u on a.unit_id=u.unit_id left join acc_property t on u.ppy_id=t.ppy_id where a.unit_id='$unit_id' group by a.acc_id order by a.acc_id;
                        ";
                        $resultsup_1_detail = mysqli_query($link,$sql_sup1_detail);
                        while($row_sup1_detail = mysqli_fetch_array($resultsup_1_detail,MYSQLI_ASSOC)){
                        if($row_sup1_detail['po_price'] == null){
                            $row_sup1_detail['po_price'] = 0;
                        }
                        if($row_sup1_detail['re_price'] == null){
                            $row_sup1_detail['re_price'] = 0;
                        }
                        if($row_sup1_detail['po_total'] == null){
                            $row_sup1_detail['po_total'] = 0;
                        }
                        if($row_sup1_detail['re_total'] == null){
                            $row_sup1_detail['re_total'] = 0;
                        }              
                        
                    ?>
                    <tr>
                        <td><?php echo $row_sup1_detail['acc_id'] ?>: <?php echo $row_sup1_detail['acc_name'] ?></td>
                        <td align="right"><?php echo number_format($row_sup1_detail['po_price']) ?></td>
                        <td align="right">
                            <?php 
                                $last_year = $row_sup1_detail['po_price'] - $row_sup1_detail['re_price'];
                                $this_year = $row_sup1_detail['po_total'] - ($row_sup1_detail['re_total'] + $row_sup1_detail['vat']);
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
                                $last_year2 = $row_sup1_detail['re_price'] - $row_sup1_detail['po_price'];
                                $this_year2 = ($row_sup1_detail['re_total'] + $row_sup1_detail['vat']) - $row_sup1_detail['po_total'];
                                $total_re = $last_year2 + $this_year2;
                                if($total_re > 0){
                                    echo number_format($total_re);
                                }
                                else{
                                    echo"0";
                                }
                            ?>
                        </td>
                        <td align="right">0</td>
                    </tr>
                <?php
                        }
                    }
                ?>
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
