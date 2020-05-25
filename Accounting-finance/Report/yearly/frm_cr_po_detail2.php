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
    <title>ລາຍລະອຽດ "ໃບລາຍງານຜົນໄດ້ຮັບ"</title>
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
                <b>ລາຍລະອຽດ "ໃບລາຍງານຜົນໄດ້ຮັບ"</b>
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
        <form action="frm_cr_po_detail2.php" method="POST" id="form1">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <input type="number" class="form-control" name="year" min="0" placeholder="20XX">
                </div>
                <button class="btn btn-primary" name="btnYear">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    <br>
    <?php
        if(isset($_POST['btnYear'])){
            // echo $date_this1 = $_POST['date_this1'];
            // echo $date_this2 = $_POST['date_this2'];
            // echo $date_last1 = date("Y-m-d", strtotime("-1 year", strtotime($date_this1)));
            // echo $date_last2 =  date("Y-m-d", strtotime("-1 year", strtotime($date_this2)));
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
                ນະຄອນຫຼວງວຽງຈັນ ສປປ ລາວ <br><br>
                ໄລຍະ 01/<?php echo $this_Year ?> ຫາ 12/<?php echo $this_Year ?>
            </div>
            <div align="center" class="col-xs-12 col-sm-6 col-md-4 form-group">
                <h3>ລາຍລະອຽດ "ໃບລາຍງານຜົນໄດ້ຮັບ"</h3>
            </div>
            <div align="right" class="col-xs-12 col-sm-6 col-md-4 form-group">
                <br><br><br><br>
                ປິດບັນຊີ ວັນທີ: 31/12/<?php echo $this_Year ?>
                <form action="Report_cr_po_detail2.php" method="POST" id="form1">
                    <input type="hidden" name="year" value="<?php echo $this_Year ?>">
                    <button type="submit" name="btnall" class="btn btn-primary">
                        <img src="../../../image/Print.png" width="28px">
                    </button> 
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table style="width: 100%">
                <tr height="30px">
                    <th rowspan="2" style="text-align: center;">ຊື່ລາຍການ</th>   
                    <th rowspan="2" style="text-align: center;">ປີກ່ອນ</th>   
                    <th rowspan="2" style="text-align: center;">ປີນີ້, ສະຫຼຸບບັນຊີ<br>ວັນທີ 31/12/<?php echo $this_Year ?></th> 
                    <th colspan="2" style="text-align: center;">ຕົ້ນທຶນທາງກົງ</th>    
                </tr>
                <tr height="30px">
                    <th style="text-align: center;">ຂອງ ຜ/ພ ທີ່ໄດ້ຂາຍ</th>       
                    <th style="text-align: center;">ຂອງສິນຄ້າທີ່ໄດ້ຂາຍ</th> 
                </tr>
                <?php
                    $sqlre = "select * from yearly_revenue_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                    $resultre = mysqli_query($link,$sqlre);
                    while($rowre = mysqli_fetch_array($resultre,MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $rowre['unit_name'] ?></td>
                    <td align="right"><?php echo number_format($rowre['re_price']) ?></td>
                    <td align="right"><?php echo number_format($rowre['re_total']) ?></td>
                    <td></td>
                    <td></td>
                </tr>
                    <?php
                        $unit_re = $rowre['unit_id'];
                        $sqlredetail = "select * from yearly_revenuedetail_view where unit_id='$unit_re' and (year(re_date)='$this_Year' or year(year_date)='$last_Year') order by acc_id asc;";
                        $resultredetail = mysqli_query($link,$sqlredetail);
                        while($rowredetail = mysqli_fetch_array($resultredetail,MYSQLI_ASSOC)){
                    ?>
                <tr>
                    <td>
                        <?php echo $rowredetail['acc_id'] ?>: <?php echo $rowredetail['acc_name'] ?>
                    </td>
                    <td align="right"><?php echo number_format($rowredetail['re_price']) ?></td>
                    <td align="right"><?php echo number_format($rowredetail['re_total']) ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                        }
                    }
                    $sqlsumre = "select sum(re_price) as re_price,sum(re_total) as re_total from yearly_revenue_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                    $resultsumre = mysqli_query($link,$sqlsumre);
                    $rowsumre = mysqli_fetch_array($resultsumre,MYSQLI_ASSOC);
                    $sqlsumpo = "select sum(po_price) as po_price,sum(po_total) as po_total from yearly_po_view where year(po_date)='$this_Year' or year(year_date)='$last_Year';";
                    $resultsumpo = mysqli_query($link,$sqlsumpo);
                    $rowsumpo = mysqli_fetch_array($resultsumpo,MYSQLI_ASSOC);

                ?>
                <tr>
                    <td><b>I. ລວມຍອດລາຍຮັບ</b></td>
                    <td align="right"><b><?php echo number_format($rowsumre['re_price']) ?></b></td>
                    <td align="right"><b><?php echo number_format($rowsumre['re_total']) ?></b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <?php
                    $sqlpo = "select * from yearly_po_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                    $resultpo = mysqli_query($link,$sqlpo);
                    while($rowpo = mysqli_fetch_array($resultpo,MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $rowpo['unit_name'] ?></td>
                    <td align="right"><?php echo number_format($rowpo['po_price']) ?></td>
                    <td align="right"><?php echo number_format($rowpo['po_total']) ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                        $unit_po = $rowpo['unit_id'];
                        $sqlpodetail = "select * from yearly_podetail_view where unit_id='$unit_po' and (year(po_date)='$this_Year' or year(year_date)='$last_Year') order by acc_id asc;";
                        $resultpodetail = mysqli_query($link,$sqlpodetail);
                        while($rowpodetail = mysqli_fetch_array($resultpodetail,MYSQLI_ASSOC)){
                    ?>
                <tr>
                    <td>
                        <?php echo $rowpodetail['acc_id'] ?>: <?php echo $rowpodetail['acc_name'] ?>
                    </td>
                    <td align="right"><?php echo number_format($rowpodetail['po_price']) ?></td>
                    <td align="right"><?php echo number_format($rowpodetail['po_total']) ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td><b>II. ລວມຍອດລາຍຈ່າຍ</b></td>
                    <td align="right"><b><?php echo number_format($rowsumpo['po_price']) ?></b></td>
                    <td align="right"><b><?php echo number_format($rowsumpo['po_total']) ?></b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr>
                    <td><b>(*) - ໃນນັ້ນມູນຄ່າຍັງເຫຼືອໃນບັນຊີຂອງອົງປະກອບທີ່ໄດ້ຂາຍ</b></td>
                    <td align="right"><b>0</b></td>
                    <td align="right"><b>0</b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr>
                    <td><b>:................................</b></td>
                    <td align="right"><b>0</b></td>
                    <td align="right"><b>0</b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr>
                    <td><b>ໃຫ້ເພີ່ມ ຫຼື ຫຼຸດ</b></td>
                    <td align="right"><b>0</b></td>
                    <td align="right"><b>0</b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr>
                    <td><b>ດັດແກ້ລາຍຈ່າຍ</b></td>
                    <td align="right"><b>0</b></td>
                    <td align="right"><b>0</b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <tr>
                    <td><b>III. ລວມລາຍຈ່າຍຕົວຈິງ</b></td>
                    <td align="right"><b><?php echo number_format($rowsumpo['po_price']) ?></b></td>
                    <td align="right"><b><?php echo number_format($rowsumpo['po_total']) ?></b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                <?php 
                    $totalThisYear = $rowsumre['re_total'] - $rowsumpo['po_total'];
                    $totalLastyear = $rowsumre['re_price'] - $rowsumpo['po_price'];
                    $totalThisYear2 = $rowsumre['re_total'] - $rowsumpo['po_total'];
                    $totalLastyear2 = $rowsumre['re_price'] - $rowsumpo['po_price'];
                    if($totalThisYear < 0){
                        $totalThisYear = "(".number_format(abs($totalThisYear)).")";
                    }
                    else{
                        $totalThisYear = number_format($totalThisYear);
                    }
                    if($totalLastyear < 0){
                        $totalLastyear = "(".number_format(abs($totalLastyear)).")";
                    }
                    else{
                        $totalLastyear = number_format($totalLastyear);
                    }
                ?>
                <tr>
                    <td>    
                            <div style="float: left;width:80%;">
                                <b>ຜົນໄດ້ຮັບ ( I-III )</b>
                            </div>   
                        <?php 
                            $company = $totalThisYear2 + $totalLastyear2;
                            if($company < 0 ){
                                echo "<div style='float: left'>( ຂາດທຶນ )</div>";
                            }
                            else{
                                echo "<div style='float: left'>( ກຳໄລ )</div>";
                            }
                        ?>
                    </td>
                    <td align="right"><b><?php echo $totalLastyear ?></b></td>
                    <td align="right"><b><?php echo $totalThisYear ?></b></td>
                    <td><b></b></td>
                    <td><b></b></td>
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
