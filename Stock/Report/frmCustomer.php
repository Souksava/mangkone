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
    <title>ລາຍງານລູກຄ້າ</title>
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
                ລາຍງານລູກຄ້າ
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
                    <b>ລາຍງານລູກຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
    <div class="container font12">
        <div class="row">
            <form action="frmCustomer.php" method="POST" id="fomrsearch">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <input type="text" class="form-control" name="company" placeholder="ລະຫັດລູກຄ້າ ຫຼື ຊື່ບໍລິສັດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <button class="btn btn-primary" name="btn">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-success" name="btnall">
                        ລູກຄ້າທັງໝົດ
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div><br>
    <?php
        if(isset($_POST['btn'])){
            $company = "%".$_POST['company']."%";
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_customer.php" method="POST" id="form1">
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
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../image/Print.png" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1300px;">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 15px;">ລະຫັດ</th>
                    <th style="width: 150px;">ຊື່ບໍລິສັດ</th>
                    <th style="width: 300px;">ທີ່ຕັ້ງບໍລິສັດ</th>
                    <th style="width: 120px;">ເບີໂທຕິດຕໍ່</th>
                    <th style="width: 120px;">ແຟັກ</th>
                    <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                    <th style="width: 100px;">ວັນທີໝົດສັນຍາ</th>
                    <th style="width: 80px;">ໃບສັນຍາ</th>
                </tr>
                <?php
                    $sqlsearch = "select * from customers where cus_id like '$company' or company like '$company';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['cus_id']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['fax'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['end_promise'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                        <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
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
            $company = "%".$_POST['company']."%";
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_customer.php" method="POST" id="form1">
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
            <table class="table table-striped" style="width: 1300px;">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 15px;">ລະຫັດ</th>
                    <th style="width: 150px;">ຊື່ບໍລິສັດ</th>
                    <th style="width: 300px;">ທີ່ຕັ້ງບໍລິສັດ</th>
                    <th style="width: 120px;">ເບີໂທຕິດຕໍ່</th>
                    <th style="width: 120px;">ແຟັກ</th>
                    <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                    <th style="width: 100px;">ວັນທີໝົດສັນຍາ</th>
                    <th style="width: 80px;">ໃບສັນຍາ</th>
                </tr>
                <?php
                     $sqlsearch = "select * from customers;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['cus_id']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['fax'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['end_promise'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                        <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
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
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
