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
    $re_id = $_GET['re_id'];
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍລະອຽດລາຍຮັບ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="faem.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
            ລາຍລະອຽດລາຍຮັບ
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
        $sqlget = "select re_id,upper(emp_name) as emp_name,bill,e.email as emp_email,company,c.fax as cus_fax,c.address as cus_address,c.email as cus_email,c.tel as cus_tel,c.fax,e.tel as emp_tel,re_date,r.img_path from receipt r left join employees e on r.emp_id=e.emp_id left join customers c on r.cus_id=c.cus_id where re_id = '$re_id';";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
        $sqlcompany = "select * from company;";
        $resultcompany = mysqli_query($link,$sqlcompany);
        $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <form action="Report_general.php" method="POST" id="form1">
        <div class="container font14">
            <div class="row">
                <div style="float: left;">
                    <label>ເລກທີບັນຊີລາຍຮັບ: <?php echo $rowget['re_id'];?></label><br>
                    <label>ວັນທີລົງບັນຊີ: <?php echo $rowget['re_date'];?></label><br>
                    <label>ເລກທີບິນລາຍຮັບ: <?php echo $rowget['bill'];?></label><br>
                        <input type="hidden" name="re_id" value="<?php echo $rowget['re_id'] ?>">
                        <input type="hidden" name="emp_name" value="<?php echo $rowget['emp_name'] ?>">
                        <input type="hidden" name="company" value="<?php echo $rowget['company'] ?>">
                        <input type="hidden" name="emp_email" value="<?php echo $rowget['emp_email'] ?>">
                        <input type="hidden" name="cus_email" value="<?php echo $rowget['cus_email'] ?>">
                        <input type="hidden" name="cus_address" value="<?php echo $rowget['cus_address'] ?>">
                        <input type="hidden" name="cus_tel" value="<?php echo $rowget['cus_tel'] ?>">
                        <input type="hidden" name="cus_fax" value="<?php echo $rowget['cus_fax'] ?>">
                        <input type="hidden" name="emp_tel" value="<?php echo $rowget['emp_tel'] ?>">
                        <input type="hidden" name="bill" value="<?php echo $rowget['bill'] ?>">
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
                    <label>ຜູ້ລົງບັນຊີ: <?php echo $rowget['emp_name'];?></label><br>
                    <label>ລາຍຮັບຈາກລູກຄ້າ: <?php echo $rowget['company'];?></label><br>
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
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
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
            </div>
        </div><br>
    </form>
    <div class="container font14">
        <table class="table table-striped">
            <tr class="info">
                <th>#</th>
                <th>ຊື່ລາຍການ</th>
                <th>ຈຳນວນ</th>
                <th>ລາຄາ</th>
                <th>ລວມ</th>
                <th>ໝາຍເຫດ</th>
            </tr>
            <?php
               $sql = "select cash_id,re_id,cash_name,qty,price,qty*price as total,vat,cash_date,bill,rate_id,rate,note from cash_receipt where re_id='$re_id';";
               $result = mysqli_query($link, $sql);
               $No_ = 0;
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                    <td><?php echo $No_ = $No_ + 1;?></td>
                    <td><?php echo $row['cash_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo number_format($row['price'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo number_format($row['total'],2);?> <?php echo $row['rate_id'];?></td>
                    <td><?php echo $row['note'];?></td>
            </tr>
            <?php
               }
               $sqlsum = "select sum((qty*price) + vat) as newamount,rate_id,sum(qty*price) as amount,sum(vat) as vat from cash_receipt where re_id = '$re_id' group by rate_id;";
               $resultsum = mysqli_query($link,$sqlsum);
               $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
            ?>
             <tr class="font26 danger">
                <td colspan="4" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="2" align="right"> <?php echo number_format($rowsum['amount'],2);?> <?php echo $rowsum['rate_id'];?></td>
            </tr>
            <tr class="font26 danger">
                <td colspan="4" align="right"><b>VAT:</b></td>
                <td colspan="2" align="right"> <?php echo number_format($rowsum['vat'],2);?> <?php echo $rowsum['rate_id']; ?></td>
            </tr>
            <tr class="font26 danger">
                <td colspan="4" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="2" align="right"> <?php echo number_format($rowsum['newamount'],2);?> <?php echo $rowsum['rate_id'];?></td>
            </tr>
        </table>
    </div>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
