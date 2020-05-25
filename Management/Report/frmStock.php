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
    <title>ລາຍງານສິນຄ້າ</title>
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
                ລາຍງານສາງສິນຄ້າ
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
                    <b>ລາຍງານສາງສິນຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
      <div class="container font12">
            <div class="row">
                <form action="frmStock.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <input type="text" class="form-control" name="pro_id" placeholder="ລະຫັດສິນຄ້າ ຫຼື ຊື່ສິນຄ້າ">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <select name="cate_id" id="" class="form-control">
                            <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                                <?php
                                    $sqlcate = "select * from category;";
                                    $resultcate = mysqli_query($link, $sqlcate);
                                    while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                                        echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <select name="unit_id" id="" class="form-control">  
                            <option value="">ເລືອກຫົວໜ່ວຍສິນຄ້າ</option>       
                                <?php
                                    $sqlunit = "select * from unit;";
                                    $resultunit = mysqli_query($link, $sqlunit);
                                    while($rowunit = mysqli_fetch_array($resultunit, MYSQLI_NUM)){
                                        echo" <option value='$rowunit[0]'>$rowunit[1]</option>";
                                    }
                                ?>
                        </select>
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
            $pro_id = $_POST['pro_id'];
            $cate_id = $_POST['cate_id'];
            $unit_id = $_POST['unit_id'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_stock.php" method="POST" id="form1">
                <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                <input type="hidden" name="cate_id" value="<?php echo $cate_id ?>">
                <input type="hidden" name="unit_id" value="<?php echo $unit_id ?>">
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
                    <th>#</th>
                    <th>ລະຫັດສິນຄ້າ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ປະເພດສິນຄ້າ</th>
                    <th>Serial</th>
                    <th>Mac Address</th>
                    <th>ຈຳນວນ</th>
                    <th>ໝາຍເຫດ</th>
                    <th>ຮູບພາບ</th>
                </tr>
                <?php
                    $sqlsearch = "select p.pro_id,pro_name,unit_name,cate_name,price,price_baht,price_us,img_path,serial,mac_address,qty,moreinfo from stock s left join products p on p.pro_id=s.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id where s.pro_id='$pro_id' or pro_name='$pro_id' or p.cate_id='$cate_id' or p.unit_id='$unit_id' order by pro_name asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['pro_id']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['serial']; ?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo $row['moreinfo'];?></td>
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
            $pro_id = $_POST['pro_id'];
            $cate_id = $_POST['cate_id'];
            $unit_id = $_POST['unit_id'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_stock.php" method="POST" id="form1">
                <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                <input type="hidden" name="cate_id" value="<?php echo $cate_id ?>">
                <input type="hidden" name="unit_id" value="<?php echo $unit_id ?>">
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
                    <th>#</th>
                    <th>ລະຫັດສິນຄ້າ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ປະເພດສິນຄ້າ</th>
                    <th>Serial</th>
                    <th>Mac Address</th>
                    <th>ຈຳນວນ</th>
                    <th>ໝາຍເຫດ</th>
                    <th>ຮູບພາບ</th>
                </tr>
                <?php
                     $sqlsearch = "select p.pro_id,pro_name,unit_name,cate_name,price,price_baht,price_us,img_path,serial,mac_address,qty,moreinfo from stock s left join products p on p.pro_id=s.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id order by pro_name asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['pro_id']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['serial']; ?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo $row['moreinfo'];?></td>
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
