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
    $billno = $_GET['billno'];
    $sqlseen = "update orders set seen2='SEEN' where status='ອະນຸມັດ' and billno='$billno';";
    $resultseen = mysqli_query($link,$sqlseen);
    $sqlseen2 = "update orders set seen2='SEEN' where status='ບໍ່ອະນຸມັດ' and billno='$billno';";
    $resultseen2 = mysqli_query($link,$sqlseen2);

?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍລະອຽດ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="accept.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍລະອຽດ
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
    <?php
        $sqlget = "select billno,company,amount,emp_name,upper(emp_surname) as emp_surname,dateorder,e.tel as emp_tel,e.email as emp_email,s.address,s.tel,s.email,timeorder,o.status,o.img_path from orders o join supplier s on o.sup_id=s.sup_id join employees e on o.emp_id=e.emp_id where billno='$billno';";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
        $sqlcompany = "select * from company;";
        $resultcompany = mysqli_query($link,$sqlcompany);
        $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <form action="Report_Order.php" method="POST" id="form1">
    <div class="container font14">
        <div class="row">
            <div style="float: left;">
                <label>ເລກທີບິນສັ່ງຊື້: <?php echo $rowget['billno'];?></label><br>
                <label>ວັນທີສັ່ງຊື້: <?php echo $rowget['dateorder'];?></label><br>
                <label>ເວລາ: <?php echo $rowget['timeorder'];?></label><br>
                    <input type="hidden" name="billno" value="<?php echo $rowget['billno'] ?>">
                    <input type="hidden" name="emp_name" value="<?php echo $rowget['emp_name'] ?>">
                    <input type="hidden" name="emp_surname" value="<?php echo $rowget['emp_surname'] ?>">
                    <input type="hidden" name="company" value="<?php echo $rowget['company'] ?>">
                    <input type="hidden" name="sup_id" value="<?php echo $rowget['sup_id'] ?>">
                    <input type="hidden" name="address" value="<?php echo $rowget['address'] ?>">
                    <input type="hidden" name="tel" value="<?php echo $rowget['tel'] ?>">
                    <input type="hidden" name="email" value="<?php echo $rowget['email'] ?>">
                    <input type="hidden" name="emp_tel" value="<?php echo $rowget['emp_tel'] ?>">
                    <input type="hidden" name="emp_email" value="<?php echo $rowget['emp_email'] ?>">
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
                    </button> <br>
               
            </div>
            <div style="float: right;" align="right">
                <label>ຜູ້ສະໜອງ: <?php echo $rowget['company'];?></label><br>
                <label>ຜູ້ສັ່ງຊື້: <?php echo $rowget['emp_name'];?></label><br>
                <label>ສະຖານະ: <?php echo $rowget['status'];?></label><br>
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" alt="" width="40px" height="40px" alt="" class="img-circle" /><br>
                </a>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="margin-left: 0px;">
                        <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="100%"  class="imagelist" />
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                <select name="rate" class="form-control" id="">
                    <option value="">ເລືອກສະກຸນເງິນ</option>
                    <option value="LAK">LAK</option>
                    <option value="THB">THB</option>
                    <option value="USD">USD</option>
                </select>
            </div>
        </div>
    </div><br>
    </form>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="info">
                    <th>#</th>
                    <th>ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ປະເພດ</th>
                    <th>ຈຳນວນ</th>
                    <th>ຫົວໜ່ວຍ</th>
                    <th>ລາຄາ</th>
                    <th>ລວມ</th>
                </tr>
                <?php
                $sql = "select o.pro_id,pro_name,cate_name,qty,unit_name,o.price,qty*o.price as total from products p join orderdetail o on p.pro_id=o.pro_id join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id where billno='$billno';";
                $result = mysqli_query($link, $sql);
                $no_ = 0;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                <tr>
                        <td><?php echo $no_ = $no_ + 1;?></td>
                        <td><?php echo $row['pro_id'];?></td>
                        <td><?php echo $row['pro_name'];?></td>
                        <td><?php echo $row['cate_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo $row['unit_name'];?></td>
                        <td><?php echo number_format($row['price'],2);?></td>
                        <td><?php echo number_format($row['total'],2);?></td>
                </tr>
                <?php
                }
                
                $sqltotal = "select sum(qty*price) as total from orderdetail where billno='$billno';";
                $resulttotal = mysqli_query($link, $sqltotal);
                $rowtotal = mysqli_fetch_array($resulttotal, MYSQLI_ASSOC);
                ?>
                <tr class="font26 warning">
                    <td colspan="4" align="right"><b>Total:</b></td>
                    <td colspan="4"> <?php echo number_format($rowtotal['total'],2); mysqli_close($link);?></td>
                </tr>
            </table>
        </div>
    </div>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
