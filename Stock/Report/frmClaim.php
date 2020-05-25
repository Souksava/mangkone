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
    <title>ລາຍງານການສົ່ງເຄມສິນຄ້າ</title>
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
                ລາຍງານການສົ່ງເຄມສິນຄ້າ
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
                    <b>ລາຍງານການສົ່ງເຄມສິນຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div> 
      <div class="container font14">
            <div class="row">
                <form action="frmClaim.php" method="POST" id="fomrsearch">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ແຕ່ວັນທີ</label>
                        <input type="date" class="form-control" name="date1" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ຫາວັນທີ</label>
                        <input type="date" class="form-control" name="date2" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ຄົ້ນຫາດ້ວຍຜູ້ສະໜອງ</label>
                        <select name="sup_id" id="" class="form-control">
                             <option value="">-- ເລືອກຜູ້ສະໜອງ --</option>
                            <?php
                                $sqlcus1 = "select * from supplier;";
                                $resultcus1 = mysqli_query($link, $sqlcus1);
                                while($rowcus1 = mysqli_fetch_array($resultcus1, MYSQLI_NUM)){
                                    echo" <option value='$rowcus1[0]'>$rowcus1[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ຄົ້ນຫາດ້ວຍພະນັກງານ</label>
                        <select name="emp_id" id="" class="form-control">
                            <option value="">-- ເລືອກພະນັກງານ --</option>
                            <?php
                                $sqlemp = "select * from employees;";
                                $resultemp = mysqli_query($link, $sqlemp);
                                while($rowemp = mysqli_fetch_array($resultemp, MYSQLI_NUM)){
                                    echo" <option value='$rowemp[0]'>$rowemp[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                        <label>ສະຖານະການເຄມ</label>
                        <select name="status" id="" class="form-control">
                            <option value="">-- ເລືອກສະຖານະການເຄມ --</option>
                            <option value="Claim">ສິນຄ້າສົ່ງເຄມ</option>
                            <option value="Claimed">ສິນຄ້າເຄມແລ້ວ</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group"><br>
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
            $emp_id = $_POST['emp_id'];
            $sup_id = $_POST['sup_id'];
            $status = $_POST['status'];
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div>
            <form action="Report_claim.php" method="POST" id="form1">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
                <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
                <input type="hidden" name="sup_id" value="<?php echo $sup_id ?>">
                <input type="hidden" name="status" value="<?php echo $status ?>">
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
                    <th style="width: 60px">ວັນທີສົ່ງເຄມ</th>
                    <th style="width: 60px">ເວລາ</th>
                    <th style="width: 120px">ຜູ້ສົ່ງເຄມ</th>
                    <th style="width: 60px">ວັນທີເຄມແລ້ວ</th>
                    <th style="width: 120px">ຜູ້ຮັບສິນຄ້າ</th>
                    <th style="width: 120px">ຜູ້ສະໜອງ</th>
                    <th style="width: 120px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 80px">ປະເພດສິນຄ້າ</th>
                    <th style="width: 100px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 100px">Serial</th>
                    <th style="width: 100px">Mac Address</th>
                    <th style="width: 50px">ຈຳນວນ</th>
                    <th style="width: 100px">ສະຖານະການເຄມ</th>
                    <th style="width: 100px">ໝາຍເຫດ</th>
                    <th style="width: 50px">ຮູບສິນຄ້າ</th>
                </tr>
                <?php
                    $sqlsearch = "select dateclaim,timeclaim,dateback,e.emp_name,d.emp_name as emp_name2,company,pro_name,cate_name,unit_name,d.pro_id,d.serial,d.mac_address,d.qty,d.moreinfo,d.status,p.img_path from claim d left join products p on d.pro_id=p.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id left join employees e on d.emp_id=e.emp_id left join supplier s on d.sup_id=s.sup_id where dateclaim between '$date1' and '$date2' or d.emp_id='$emp_id' or d.sup_id='$sup_id' or d.status='$status';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['dateclaim']; ?></td>
                    <td><?php echo $row['timeclaim']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['dateback'];?></td>
                    <td><?php echo $row['emp_name2'];?></td>
                    <td><?php echo $row['company'];?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['cate_name'];?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['moreinfo'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select count(*) as amount from claim where dateclaim between '$date1' and '$date2' or emp_id='$emp_id' or sup_id='$sup_id' or status='$status';";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                <tr class="font26">
                    <td colspan="11" align="right">ຈຳນວນລາຍການ:</td>
                    <td colspan="5" align="right"> <?php echo $rowkip['amount']; ?> ລາຍການ</td>
                </tr>
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
            <form action="Report_claim.php" method="POST" id="form1">
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
                    <th style="width: 60px">ວັນທີສົ່ງເຄມ</th>
                    <th style="width: 60px">ເວລາ</th>
                    <th style="width: 120px">ຜູ້ສົ່ງເຄມ</th>
                    <th style="width: 60px">ວັນທີເຄມແລ້ວ</th>
                    <th style="width: 120px">ຜູ້ຮັບສິນຄ້າ</th>
                    <th style="width: 120px">ຜູ້ສະໜອງ</th>
                    <th style="width: 120px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 80px">ປະເພດສິນຄ້າ</th>
                    <th style="width: 100px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 100px">Serial</th>
                    <th style="width: 100px">Mac Address</th>
                    <th style="width: 50px">ຈຳນວນ</th>
                    <th style="width: 100px">ສະຖານະການເຄມ</th>
                    <th style="width: 100px">ໝາຍເຫດ</th>
                    <th style="width: 50px">ຮູບສິນຄ້າ</th>
                </tr>
                <?php
                    $sqlsearch = "select dateclaim,timeclaim,dateback,e.emp_name,d.emp_name as emp_name2,company,pro_name,cate_name,unit_name,d.pro_id,d.serial,d.mac_address,d.qty,d.moreinfo,d.status,p.img_path from claim d left join products p on d.pro_id=p.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id left join employees e on d.emp_id=e.emp_id left join supplier s on d.sup_id=s.sup_id;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['dateclaim']; ?></td>
                    <td><?php echo $row['timeclaim']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['dateback'];?></td>
                    <td><?php echo $row['emp_name2'];?></td>
                    <td><?php echo $row['company'];?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['cate_name'];?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['qty'];?> <?php echo $row['unit_name'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['moreinfo'];?></td>
                    <td>
                        <a href="../Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlkip = "select count(*) as amount from claim";
                    $resultkip = mysqli_query($link,$sqlkip);
                    $rowkip = mysqli_fetch_array($resultkip, MYSQLI_ASSOC);
                ?>
                 <tr class="font26">
                    <td colspan="11" align="right">ຈຳນວນລາຍການ:</td>
                    <td colspan="5" align="right"> <?php echo $rowkip['amount']; ?> ລາຍການ</td>
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
