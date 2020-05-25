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
    $sry_id = $_GET['sry_id'];
    $sqlseen = "update salary set seen1='SEEN' where status='ຍັງບໍ່ອະນຸມັດ' and sry_id='$sry_id';";
    $resultseen = mysqli_query($link,$sqlseen);
    $sqlseen2 = "update salary set seen1='SEEN' where status='ບໍ່ອະນຸມັດ' and sry_id='$sry_id';";
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
                ລາຍລະອຽດລາຍຈ່າຍ
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
       
        $sqlget = "select s.sry_id,emp_name,upper(emp_surname) as emp_surname,amount,sal_date,sal_mon,s.status,s.img_path,d.po_id from salary s left join employees e on s.emp_id=e.emp_id left join salarydetail d on s.sry_id=d.sry_id left join po p on d.po_id=p.po_id where s.sry_id='$sry_id' group by s.sry_id;";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font14">
        <div class="row">
            <div style="float: left;">
                <label>ເລກທີ: <?php echo $rowget['sry_id'];?></label><br>
                <label>ລົງວັນທີ: <?php echo $rowget['sal_date'];?></label><br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3" style="width: 128px;">
                        <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"> Accept</span> 
                </button> 
                <form action="accept_salary_detail.php" method="POST" id="frmaccept">
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Do you want to accept salary ?</b></h4>
                                </div>
                                    <input type="hidden" class="form-control" name="sry_id" value="<?php echo $sry_id?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                    <button type="submit" name="btnAccept" class="btn btn-success">
                                        <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"> Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal4">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"> Not Accept</span> 
                </button> 
                <form action="accept_salary_detail.php" method="POST" id="frmdelete">
                    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>Do you want to cancel salary ?</b></h4>
                                </div>
                                    <input type="hidden" class="form-control" name="sry_id" value="<?php echo $sry_id?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                    <button type="submit" name="btndelete" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">Not Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
              
            </div>
            <div style="float: right;" align="right">
                <label>ຜູ້ລົງບັນຊີ: <?php echo $rowget['emp_name'];?></label><br>
                <label>ສະຖານະການຈ່າຍ: <?php echo $rowget['status'];?></label><br>
            </div>
        </div>
    </div><br>
    <?php
       if(isset($_POST['btnAccept'])){
           $sry_id = $_POST['sry_id'];
           $sqlac = "update salary set status='ອະນຸມັດ' where sry_id='$sry_id';";
           $resultac = mysqli_query($link,$sqlac);
           if(!$resultac){
                echo"<script>";
                echo"alert('Can not to Accept this salary');";
                echo"window.location.href='accept_salary.php';";
                echo"</script>";
           }
           else{
                echo"<script>";
                echo"alert('Accept salary Success');";
                echo"window.location.href='accept_salary.php';";
                echo"</script>";
           }
       }
       if(isset($_POST['btndelete'])){
            $sry_id2 = $_POST['sry_id'];
            $sqlac2 = "update salary set status='ບໍ່ອະນຸມັດ' where sry_id='$sry_id2';";
            $resultac2 = mysqli_query($link,$sqlac2);
            if(!$resultac2){
                echo"<script>";
                echo"alert('Can not to Not Accept this salary');";
                echo"window.location.href='accept_salary.php';";
                echo"</script>";
           }
           else{
                echo"<script>";
                echo"alert('Not Accept salary Success');";
                echo"window.location.href='accept_salary.php';";
                echo"</script>";
           }
       }
    ?>
    <div align="center">
        <h3 class="font26"> <b><u>ຕາຕະລາງສະຫຼຸບຈ່າຍເງິນເດືອນພະນັກງານປະຈຳເດືອນ <?php echo $rowget['sal_mon'] ?></u></b></h3>
    </div>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px">
                <tr class="info">
                    <th>#</th>
                    <th>ຊື່ພະນັກງານ</th>
                    <th>ຈຳນວນເດືອນ</th>
                    <th>ເງິນເດືອນພື້ນຖານ</th>
                    <th>ເງິນລ່ວງເວລາ</th>
                    <th>ເງິນກິນເຂົ້າ</th>
                    <th>ເງິນນ້ຳມັນ</th>
                    <th>ເງິນໂທລະສັບ</th>
                    <th>ເງິນໂບນັດ</th>
                    <th>ລວມທັງໝົດ</th>
                    <th>ວັນຂາດ</th>
                    <th>ຫັກເງິນຂາດວຽກ</th>
                    <th>ຫັກ_ອປສ_5,5%</th>
                    <th>ຫັກ_ອປສ_6%</th>
                    <th>ຫັກເງິນອື່ນໆ</th>
                    <th>ເງິນເບີກຈ່າຍຕົວຈິງ</th>
                    <th>ລວມເປັນເງິນກີບ</th>
                </tr>
                <?php
                    $sqlrate = "select * from rate where rate_id='USD';";
                    $resultrate = mysqli_query($link,$sqlrate);
                    $rowrate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
                    $rate_buy = $rowrate['rate_buy'];
                    $sqlshow = "select sdet_id,sry_id,emp_name,upper(emp_surname) as emp_surname,qty,l.salary,ot,eat,oil,mobile,bonus,missday,miss,more,unit_id,acc_id,ppy_id,(l.salary*qty)+ot+eat+oil+mobile+bonus as total,((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more) as amount,(((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy' as amount_kip,(l.salary*qty)*.055 as lsw1,(l.salary*qty)*0.06 as lsw2,l.img_path from salarydetail l left join employees e on l.emp_id=e.emp_id where l.sry_id='$sry_id';";
                    $resultshow = mysqli_query($link,$sqlshow);
                    while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                    $NO_ = $NO_ + 1;
                ?>
                <tr>
                        <td><?php echo $NO_?></td>
                        <td><?php echo $rowshow['emp_name'] ?></td>
                        <td><?php echo $rowshow['qty'] ?></td>
                        <td><?php echo number_format($rowshow['salary'],2) ?></td>
                        <td><?php echo number_format($rowshow['ot'],2) ?></td>
                        <td><?php echo number_format($rowshow['eat'],2) ?></td>
                        <td><?php echo number_format($rowshow['oil'],2) ?></td>
                        <td><?php echo number_format($rowshow['mobile'],2) ?></td>
                        <td><?php echo number_format($rowshow['bonus'],2) ?></td>
                        <td><?php echo number_format($rowshow['total'],2) ?></td>
                        <td><?php echo number_format($rowshow['missday']) ?></td>
                        <td><?php echo number_format($rowshow['miss'],2) ?></td>
                        <td><?php echo number_format($rowshow['lsw1'],2) ?></td>
                        <td><?php echo number_format($rowshow['lsw2'],2) ?></td>
                        <td><?php echo number_format($rowshow['more'],2) ?></td>
                        <td><?php echo number_format($rowshow['amount'],2) ?> ໂດລາ</td>
                        <td><?php echo number_format($rowshow['amount_kip'],2) ?> ກີບ</td>   
                </tr>
                <?php
                        }
                        $sqlamount = "select sum(((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more)) as amount_us,sum((((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy') as amount_kip from salarydetail where sry_id='$sry_id';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="9" style="text-align: right;font-size: 26px;"><b>ມູນຄ່າລວມ:</b></th>
                        <th colspan="4" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount_us'],2); ?> ໂດລາ</b>
                            <input type="hidden" name="amount" value="<?php echo $rowamount['amount_us'];?>">
                        </th>
                        <th colspan="8" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount_kip'],2); ?> ກີບ</b>
                            <input type="hidden" name="amount_kip" value="<?php echo $rowamount['amount_kip']; ?>">
                        </th>
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
