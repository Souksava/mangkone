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
    <title>ລາຍງານການນຳເຂົ້າສິນຄ້າ</title>
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
                ລາຍງານການນຳເຂົ້າສິນຄ້າ
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
                    <b>ລາຍງານການນຳເຂົ້າສິນຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
      <div class="container font12">
            <div class="row">
                <form action="frmImport.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <input type="date" class="form-control" name="date1" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <input type="date" class="form-control" name="date2" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <button class="btn btn-primary" name="btn">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-success" name="btnall">
                            ສິນຄ້າທັງໝົດ
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
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_import.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
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
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 40px">#</th>
                    <th style="width: 80px">ບິນນຳເຂົ້າ</th>
                    <th style="width: 60px">ບິນສັ່ງຊື້</th>
                    <th style="width: 120px">ພະນັກງານ</th>
                    <th style="width: 130px">ຜຸ້ສະໜອງ</th>
                    <th style="width: 150px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 150px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 150px">Serial</th>
                    <th style="width: 150px">Mac Address</th>
                    <th style="width: 80px">ຈຳນວນ</th>
                    <th style="width: 140px">ລາຄາ</th>
                    <th style="width: 160px">ລວມ</th>
                    <th style="width: 80px">ວັນທີນຳເຂົ້າ</th>
                    <th style="width: 80px">ເວລາ</th>
                    <th style="width: 80px">ສະກຸນເງິນ</th>
                    <th style="width: 100px">ໝາຍເຫດ</th>
                    <th style="width: 50px">ຮູບພາບ</th>
                <?php
                    $sqlsearch = "select billimp,billno,company,emp_name,pro_name,i.pro_id,serial,mac_address,qty,i.price,qty*i.price as total,dateimp,timeimp,moreinfo,rate_id,p.img_path,rate,unit_name from imports i left join products p on i.pro_id=p.pro_id left join employees e on i.emp_id=e.emp_id left join supplier s on i.sup_id=s.sup_id left join unit u on p.unit_id=u.unit_id where dateimp between '$date1' and '$date2' order by dateimp asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['billimp']; ?></td>
                    <td><?php echo $row['billno']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['dateimp'];?></td>
                    <td><?php echo $row['timeimp'];?></td>
                    <td><?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['moreinfo'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(qty*price) as amount from imports where dateimp between '$date1' and '$date2' and rate_id='LAK';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
                    $sqlbaht = "select sum(qty*price) as amount from imports where dateimp between '$date1' and '$date2' and rate_id='THB';";
                    $resultbaht = mysqli_query($link,$sqlbaht);
                    $rowbaht = mysqli_fetch_array($resultbaht,MYSQLI_ASSOC);
                ?>
                <tr class="font26">
                    <td colspan="12" align="right">ລວມເງິນກີບ:</td>
                    <td colspan="5" align="right"> <?php echo number_format($rowkip['amount'],2); ?> LAK</td>
                </tr>
                <tr class="font26">
                    <td colspan="12" align="right">ລວມເງິນບາດ:</td>
                    <td colspan="5" align="right"> <?php echo number_format($rowbaht['amount'],2); ?> THB</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
    <?php
        if(isset($_POST['btnall'])){
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_import.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
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
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 40px">#</th>
                    <th style="width: 80px">ບິນນຳເຂົ້າ</th>
                    <th style="width: 60px">ບິນສັ່ງຊື້</th>
                    <th style="width: 120px">ພະນັກງານ</th>
                    <th style="width: 130px">ຜຸ້ສະໜອງ</th>
                    <th style="width: 150px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 150px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 150px">Serial</th>
                    <th style="width: 150px">Mac Address</th>
                    <th style="width: 80px">ຈຳນວນ</th>
                    <th style="width: 140px">ລາຄາ</th>
                    <th style="width: 160px">ລວມ</th>
                    <th style="width: 80px">ວັນທີນຳເຂົ້າ</th>
                    <th style="width: 80px">ເວລາ</th>
                    <th style="width: 80px">ສະກຸນເງິນ</th>
                    <th style="width: 100px">ໝາຍເຫດ</th>
                    <th style="width: 50px">ຮູບພາບ</th>
                </tr>
                <?php
                    $sqlsearch = "select billimp,billno,company,emp_name,pro_name,i.pro_id,serial,mac_address,qty,i.price,qty*i.price as total,dateimp,timeimp,moreinfo,rate_id,p.img_path,rate,unit_name from imports i left join products p on i.pro_id=p.pro_id left join employees e on i.emp_id=e.emp_id left join supplier s on i.sup_id=s.sup_id left join unit u on p.unit_id=u.unit_id order by dateimp asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['billimp']; ?></td>
                    <td><?php echo $row['billno']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['dateimp'];?></td>
                    <td><?php echo $row['timeimp'];?></td>
                    <td><?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['moreinfo'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select sum(qty*price) as amount from imports where rate_id='LAK';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
                    $sqlbaht = "select sum(qty*price) as amount from imports where rate_id='THB';";
                    $resultbaht = mysqli_query($link,$sqlbaht);
                    $rowbaht = mysqli_fetch_array($resultbaht,MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="12" align="right">ລວມເງິນກີບ:</td>
                    <td colspan="5" align="right"> <?php echo number_format($rowkip['amount'],2); ?> LAK</td>
                </tr>
                <tr class="font26">
                    <td colspan="12" align="right">ລວມເງິນບາດ:</td>
                    <td colspan="5" align="right"> <?php echo number_format($rowbaht['amount'],2); ?> THB</td>
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
