<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 3){
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
    <title>ລາຍງານລາຍຮັບ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Report.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍງານລາຍຮັບ
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
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ລາຍງານລາຍຮັບ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
    <div class="container font12b">
        <div class="row">
            <form action="frmReceipt.php" method="POST" id="fomrsearch">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>ແຕ່ວັນທີ</label>
                    <input type="date" class="form-control" name="date1">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>ຫາວັນທີ</label>
                    <input type="date" class="form-control" name="date2">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>ເລືອກສະກຸນເງິນ</label>
                    <select name="rate_id" class="form-control" id="">
                        <option value="">ເລືອກສະກຸນເງິນ</option>
                        <?php
                            $sqlauther2 = "select * from rate;";
                            $resultauther2 = mysqli_query($link, $sqlauther2);
                            while($rowauther2 = mysqli_fetch_array($resultauther2, MYSQLI_NUM)){
                                echo" <option value='$rowauther2[0]'>$rowauther2[0]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group"><br>
                    <button class="btn btn-primary" name="btn">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-success" name="btnall">
                        ລາຍຮັບທັງໝົດ
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div><br>
    <?php
        if(isset($_POST['btn'])){
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $rate_id = $_POST['rate_id'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_receipt.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
                <input type="hidden" name="rate_id" value="<?php echo $rate_id ?>">
                <input type="hidden" name="com_name" value="<?php echo $rowcompany['com_name'] ?>">
                <input type="hidden" name="com_address" value="<?php echo $rowcompany['address'] ?>">
                <input type="hidden" name="com_tel" value="<?php echo $rowcompany['tel'] ?>">
                <input type="hidden" name="com_fax" value="<?php echo $rowcompany['fax'] ?>">
                <input type="hidden" name="slogan" value="<?php echo $rowcompany['slogan'] ?>">
                <input type="hidden" name="tax_id" value="<?php echo $rowcompany['tax_id'] ?>">
                <input type="hidden" name="logo" value="<?php echo $rowcompany['logo'] ?>">
                <input type="hidden" name="com_email" value="<?php echo $rowcompany['email'] ?>">
                <input type="hidden" name="website" value="<?php echo $rowcompany['website'] ?>">
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../image/Print.png" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1500px;">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 80px;">ວັນທີລົງບັນຊີ</th>
                    <th style="width: 70px;">ບິນລາຍຮັບ</th>
                    <th style="width: 100px;">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 300px;">ລາຍການ</th>
                    <th style="width: 60px;">ຈຳນວນ</th>
                    <th style="width: 120px;">ລາຄາ</th>
                    <th style="width: 140px;">ລວມ</th>
                    <th style="width: 100px;">ໝາຍເຫດ</th>
                    <th style="width: 120px;">ເລກທີບັນຊີລາຍຮັບ</th>
                    <th style="width: 150px;">ລູກຄ້າ</th>
                    <th style="width: 80px;">ຜູ້ລົງບັນຊີ</th>
                </tr>
                <?php
                    $sqlsearch = "select r.re_id,re_date,c.bill,barcode,cash_name,c.qty,c.price,c.qty*c.price as total,c.rate_id,c.rate,c.img_path,c.note,company,emp_name from cash_receipt c left join receipt r on c.re_id=r.re_id left join employees e on r.emp_id=e.emp_id left join customers s on r.cus_id=s.cus_id where r.re_date between '$date1' and '$date2' or rate_id='$rate_id';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['re_date']; ?></td>
                    <td><?php echo $row['bill']; ?></td>
                    <td><?php echo $row['barcode']; ?></td>
                    <td><?php echo $row['cash_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id']; ?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id']; ?></td>
                    <td><?php echo $row['note'];?></td>
                    <td><?php echo $row['re_id'];?></td>
                    <td><?php echo $row['company'];?></td>
                    <td><?php echo $row['emp_name'];?></td>
                </tr>
                <?php
                    }
                    $sqlsum = "select sum(qty*price) as amount_kip,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt c left join receipt r on c.re_id=r.re_id where r.re_date between '$date1' and '$date2' and rate_id='LAK'";
                    $resultsum = mysqli_query($link,$sqlsum);
                    $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
                    $sqlsum2 = "select sum(qty*price) as amount_baht,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt c left join receipt r on c.re_id=r.re_id where r.re_date between '$date1' and '$date2' and rate_id='THB'";
                    $resultsum2 = mysqli_query($link,$sqlsum2);
                    $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
                    $sqlsum3 = "select sum(qty*price) as amount_us,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt c left join receipt r on c.re_id=r.re_id where r.re_date between '$date1' and '$date2' and rate_id='USD'";
                    $resultsum3 = mysqli_query($link,$sqlsum3);
                    $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
                    $sqlsum4 = "select sum(qty*price) as amount_us,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='$rate_id';";
                    $resultsum4 = mysqli_query($link,$sqlsum4);
                    $rowsum4 = mysqli_fetch_array($resultsum4, MYSQLI_ASSOC);
                    if(trim($rate_id) == ""){
                ?>
                 <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum['rate_id']; ?> <?php echo number_format($rowsum['amount_kip'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: (<?php echo $rowsum['rate_id']; ?>) </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum['rate_id']; ?> <?php echo number_format($rowsum['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum['rate_id']; ?> <?php echo number_format($rowsum['newamount'],2); ?></th>
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum2['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum2['rate_id']; ?> <?php echo number_format($rowsum2['amount_baht'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: (<?php echo $rowsum2['rate_id']; ?>) </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum2['rate_id']; ?> <?php echo number_format($rowsum2['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum2['rate_id']; ?> <?php echo number_format($rowsum2['newamount'],2); ?></th>
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum3['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum3['rate_id']; ?> <?php echo number_format($rowsum3['amount_us'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: (<?php echo $rowsum3['rate_id']; ?>) </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum3['rate_id']; ?> <?php echo number_format($rowsum3['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum3['rate_id']; ?> <?php echo number_format($rowsum3['newamount'],2); ?></th>
                </tr>
                <?php
                    }
                    else {       
                ?>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum4['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum4['rate_id']; ?> <?php echo number_format($rowsum4['amount_us'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: (<?php echo $rowsum4['rate_id']; ?>) </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum4['rate_id']; ?> <?php echo number_format($rowsum4['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum4['rate_id']; ?> <?php echo number_format($rowsum4['newamount'],2); ?></th>
                </tr>
                <?php 
                    }
                ?>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
       
    <?php
        if(isset($_POST['btnall'])){
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_receipt.php" method="POST" id="form1">
                <input type="hidden" name="company" value="<?php echo $company ?>">
                <input type="hidden" name="com_name" value="<?php echo $rowcompany['com_name'] ?>">
                <input type="hidden" name="com_address" value="<?php echo $rowcompany['address'] ?>">
                <input type="hidden" name="com_tel" value="<?php echo $rowcompany['tel'] ?>">
                <input type="hidden" name="com_fax" value="<?php echo $rowcompany['fax'] ?>">
                <input type="hidden" name="slogan" value="<?php echo $rowcompany['slogan'] ?>">
                <input type="hidden" name="tax_id" value="<?php echo $rowcompany['tax_id'] ?>">
                <input type="hidden" name="logo" value="<?php echo $rowcompany['logo'] ?>">
                <input type="hidden" name="com_email" value="<?php echo $rowcompany['email'] ?>">
                <input type="hidden" name="website" value="<?php echo $rowcompany['website'] ?>">
                <button type="submit" name="btnall" class="btn btn-primary">
                    <img src="../../image/Print.png" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1500px;">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 80px;">ວັນທີລົງບັນຊີ</th>
                    <th style="width: 70px;">ບິນລາຍຮັບ</th>
                    <th style="width: 100px;">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 300px;">ລາຍການ</th>
                    <th style="width: 60px;">ຈຳນວນ</th>
                    <th style="width: 120px;">ລາຄາ</th>
                    <th style="width: 140px;">ລວມ</th>
                    <th style="width: 100px;">ໝາຍເຫດ</th>
                    <th style="width: 120px;">ເລກທີບັນຊີລາຍຮັບ</th>
                    <th style="width: 150px;">ລູກຄ້າ</th>
                    <th style="width: 80px;">ຜູ້ລົງບັນຊີ</th>
                </tr>
                <?php
                    $sqlsearch = "select r.re_id,re_date,c.bill,barcode,cash_name,c.qty,c.price,c.qty*c.price as total,c.rate_id,c.rate,c.img_path,c.note,company,emp_name from cash_receipt c left join receipt r on c.re_id=r.re_id left join employees e on r.emp_id=e.emp_id left join customers s on r.cus_id=s.cus_id;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['re_date']; ?></td>
                    <td><?php echo $row['bill']; ?></td>
                    <td><?php echo $row['barcode']; ?></td>
                    <td><?php echo $row['cash_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id']; ?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id']; ?></td>
                    <td><?php echo $row['note'];?></td>
                    <td><?php echo $row['re_id'];?></td>
                    <td><?php echo $row['company'];?></td>
                    <td><?php echo $row['emp_name'];?></td>
                </tr>
                <?php
                    }
                    $sqlsum = "select sum(qty*price) as amount_kip,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='LAK'";
                    $resultsum = mysqli_query($link,$sqlsum);
                    $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
                    $sqlsum2 = "select sum(qty*price) as amount_baht,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='THB'";
                    $resultsum2 = mysqli_query($link,$sqlsum2);
                    $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
                    $sqlsum3 = "select sum(qty*price) as amount_us,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='USD'";
                    $resultsum3 = mysqli_query($link,$sqlsum3);
                    $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
                ?>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum['rate_id']; ?> <?php echo number_format($rowsum['amount_kip'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: <?php echo $rowsum['rate_id']; ?> </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum['rate_id']; ?> <?php echo number_format($rowsum['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum['rate_id']; ?> <?php echo number_format($rowsum['newamount'],2); ?></th>
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum2['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum2['rate_id']; ?> <?php echo number_format($rowsum2['amount_baht'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: <?php echo $rowsum2['rate_id']; ?> </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum2['rate_id']; ?> <?php echo number_format($rowsum2['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum2['rate_id']; ?> <?php echo number_format($rowsum2['newamount'],2); ?></th>
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ (<?php echo $rowsum3['rate_id']; ?>)</th>
                    <th colspan="6" style="text-align: right;"><?php echo $rowsum3['rate_id']; ?> <?php echo number_format($rowsum3['amount_us'],2); ?> </th>
                  
                </tr>
                <tr class="font26">
                    <th colspan="6" style="text-align: right;">VAT 10%: <?php echo $rowsum3['rate_id']; ?> </th>
                    <th colspan="3" style="text-align: right;">  <?php echo $rowsum3['rate_id']; ?> <?php echo number_format($rowsum3['vat'],2); ?></th>
                    <th colspan="3" style="text-align: right;"><?php echo $rowsum3['rate_id']; ?> <?php echo number_format($rowsum3['newamount'],2); ?></th>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
