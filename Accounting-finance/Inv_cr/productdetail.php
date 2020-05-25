<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
    require '../../ConnectDB/connectDB.php';
    $voice_id = $_GET['voice_id'];
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍລະອຽດວາງບິນສິນຄ້າ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="faem_product.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍລະອຽດວາງບິນສິນຄ້າ
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
       
        $sqlget = "select voice_id,upper(emp_name) as emp_name,upper(emp_surname) as emp_surname,e.email as emp_email,kip_amount,us_amount,baht_amount,in_date,in_time,company,c.email as cus_email,c.tel as cus_tel,e.tel as emp_tel,c.address,i.img_path,quo_id from invoice2 i left join employees e on i.emp_id=e.emp_id left join customers c on i.cus_id=c.cus_id where i.voice_id = '$voice_id';;";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
        $sqlcompany = "select * from company;";
        $resultcompany = mysqli_query($link,$sqlcompany);
        $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <form action="Report_invoice_pro.php" method="POST" id="form1">
        <div class="container font14">
            <div class="row">
                <div style="float: left;">
                    <label>ເລກທີ invoice: <?php echo $rowget['voice_id'];?></label><br>
                    <label>ວັນທີອອກບິນ: <?php echo $rowget['in_date'];?></label><br>
                    <label>ເວລາ: <?php echo $rowget['in_time'];?></label><br>
                    <label>ເລກທີ Quotation: QU<?php echo $rowget['quo_id'];?></label><br>
                    
                        <input type="hidden" name="voice_id" value="<?php echo $rowget['voice_id'] ?>">
                        <input type="hidden" name="emp_name" value="<?php echo $rowget['emp_name'] ?>">
                        <input type="hidden" name="emp_surname" value="<?php echo $rowget['emp_surname'] ?>">
                        <input type="hidden" name="company" value="<?php echo $rowget['company'] ?>">
                        <input type="hidden" name="emp_email" value="<?php echo $rowget['emp_email'] ?>">
                        <input type="hidden" name="cus_email" value="<?php echo $rowget['cus_email'] ?>">
                        <input type="hidden" name="address" value="<?php echo $rowget['address'] ?>">
                        <input type="hidden" name="cus_tel" value="<?php echo $rowget['cus_tel'] ?>">
                        <input type="hidden" name="emp_tel" value="<?php echo $rowget['emp_tel'] ?>">
                        <input type="hidden" name="quo_id" value="<?php echo $rowget['quo_id'] ?>">
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
                </div>
                <div style="float: right;" align="right">
                    <label>ຜູ້ອອກບິນ: <?php echo $rowget['emp_name'];?></label><br>
                    <label>ລູກຄ້າ: <?php echo $rowget['company'];?></label><br>
                    <a href="#" data-toggle="modal" data-target="#myModal2">
                        <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                    </a>
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" style="margin-left: 0px;">
                            <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="100%"  class="imagelist" />
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <select name="rate" class="form-control" id="">
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
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <select name="billno_" class="form-control" id="">
                        <option value="">ເລືອກເລກທີບັນຊີ</option>
                        <?php
                            $sqlauther = "select * from rate;";
                            $resultauther = mysqli_query($link, $sqlauther);
                            while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                echo" <option value='$rowauther[3]'>$rowauther[0]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                   <input type="text" name="textbill" class="form-control" placeholder="ຕົວຫຍໍ້ລູກຄ້າ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                   <input type="text" name="credit_day" class="form-control" placeholder="ອາຍຸການນຳໃຊ້ໃບສະເໜີລາຄາ">
                </div>
            </div>
        </div><br>
    </form>
    <div class="container font14">
        <table class="table table-striped">
            <tr class="info">
                <th>#</th>
                <th>ລຫັດສິນຄ້າ</th>
                <th>Serial Number</th>
                <th>Mac_address</th>
                <th>ຊື່ສິນຄ້າ</th>
                <th>ຈຳນວນ</th>
                <th>ລາຄາ</th>
                <th>ລວມ</th>
                <th>ໝາຍເຫດ</th>
            </tr>
            <?php
               $sql = "select indet_id,i.pro_id,pro_name,serial,mac_address,i.qty,i.price,i.qty*i.price as total,i.note,rate_id from invoicedetail2 i join products p on i.pro_id=p.pro_id where voice_id='$voice_id';";
               $result = mysqli_query($link, $sql);
               $No_ = 0;
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                    <td><?php echo $No_ = $No_ + 1;?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['mac_address'];?></td>
                    <td><?php echo $row['pro_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['note'];?></td>
            </tr>
            <?php
               }
               $sqlsum = "select sum((qty*price) + vat) as newamount,rate_id,sum(qty*price) as amount,sum(vat) as vat from invoicedetail2 where voice_id = '$voice_id' group by rate_id;";
               $resultsum = mysqli_query($link,$sqlsum);
               $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
            ?>
             <tr class="font26 danger">
                <td colspan="7" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="2"> <?php echo number_format($rowsum['amount'],2);?> <?php echo $rowsum['rate_id'];?></td>
            </tr>
            <tr class="font26 danger">
                <td colspan="7" align="right"><b>VAT:</b></td>
                <td colspan="2"> <?php echo number_format($rowsum['vat'],2);?> <?php echo $rowsum['rate_id'];?></td>
            </tr>
            <tr class="font26 danger">
                <td colspan="7" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="2"> <?php echo number_format($rowsum['newamount'],2);?> <?php echo $rowsum['rate_id'];?></td>
            </tr>
        </table>
    </div>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
