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
    $purchase_id = $_GET['purchase_id'];
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
                <a href="faem.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍລະອຽດ PO
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
       
        $sqlget = "select purchase_id,upper(emp_name) as emp_name,upper(emp_surname) as emp_surname,amount,p.rate_id,rate_buy,po_date from purchase_order p left join employees e on p.emp_id=e.emp_id left join rate r on p.rate_id=r.rate_id where purchase_id='$purchase_id';";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
        $sqlcompany = "select * from company;";
        $resultcompany = mysqli_query($link,$sqlcompany);
        $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font14">
        <div class="row">
            <div style="float: left;">
                <label>ເລກທີ PO: <?php echo $rowget['purchase_id'];?></label><br>
                <label>ວັນທີອອກ PO: <?php echo $rowget['po_date'];?></label><br>
                <form action="report_po.php" method="POST" id="form1">
                    <input type="hidden" name="purchase_id" value="<?php echo $rowget['purchase_id'] ?>">
                    <input type="hidden" name="emp_name" value="<?php echo $rowget['emp_name'] ?>">
                    <input type="hidden" name="emp_surname" value="<?php echo $rowget['emp_surname'] ?>">
                    <input type="hidden" name="po_date" value="<?php echo $rowget['po_date'] ?>">
                    <input type="hidden" name="rate_id" value="<?php echo $rowget['rate_id'] ?>">
                    <input type="hidden" name="amount" value="<?php echo $rowget['amount'] ?>">
                    <input type="hidden" name="rate_buy" value="<?php echo $rowget['rate_buy'] ?>">
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
            </div>
            <div style="float: right;" align="right">
                <label>ຜູ້ອອກ PO: <?php echo $rowget['emp_name'];?></label><br>
                <label>ສະກຸນເງິນ: <?php echo $rowget['rate_id'];?></label><br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal3" >
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
                <form action="faemdetail.php" method="POST" id="frmdelete">
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ທ່ານຕ້ອງການຈະລົບ ຫຼື ບໍ່</b></h4>
                                </div>
                                    <input type="hidden" name="purchase_id" value="<?php echo $rowget['purchase_id'] ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                    <button type="submit" name="btndelete" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><br>
    <?php
        if(isset($_POST['btndelete'])){
            $purchase_id2 = $_POST['purchase_id'];
            $sqlck = "select * from podetail where purchase_id='$purchase_id2';";
            $resultck = mysqli_query($link,$sqlck);
            if(mysqli_num_rows($resultck) > 0){
                echo"<script>";
                echo"alert('ບໍ່ສາມາດລົບລາຍການໄດ້ ເນື່ອງຈາກລາຍການນີ້ໄດ້ລົງບັນທຶກບັນຊີລາຍຈ່າຍແລ້ວ');";
                echo"window.location.href='faem.php';";
                echo"</script>";
            }
            else {
                $sqlpod = "delete from purchasedetail where purchase_id='$purchase_id2';";
                $resultpod = mysqli_query($link,$sqlpod);
                $sqlpur = "delete from purchase_order where purchase_id='$purchase_id2';";
                $resultpur = mysqli_query($link,$sqlpur);
                if(!$resultpur){
                    echo"<script>";
                    echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                    echo"window.location.href='faem.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ລົບລາຍການສຳເລັດ');";
                    echo"window.location.href='faem.php';";
                    echo"</script>";
                }
            }
        }
    ?>
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
               $sql = "select pdet_id,pdet_name,qty,price,qty*price as total,purchase_id,note from purchasedetail where purchase_id='$purchase_id';";
               $result = mysqli_query($link, $sql);
               $No_ = 0;
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                    <td><?php echo $No_ = $No_ + 1;?></td>
                    <td><?php echo $row['pdet_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo number_format($row['price'],2);?></td>
                    <td><?php echo number_format($row['total'],2);?></td>
                    <td><?php echo $row['note'];?></td>
            </tr>
            <?php
               }
            ?>
            <tr class="font26 danger">
                <td colspan="3" align="right"><b>ຍອດລວມ:</b></td>
                <td colspan="3"> <?php echo number_format($rowget['amount'],2); mysqli_close($link);?> <?php echo $rowget['rate_id'];?></td>
            </tr>
        </table>
    </div>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
