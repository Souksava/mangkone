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
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $Time = date("H:i:s",$datenow);
    $sqlsalary = "select max(sry_id) as sry_id from salary;";
    $resultsalary = mysqli_query($link,$sqlsalary);
    $rowsalary = mysqli_fetch_array($resultsalary,MYSQLI_ASSOC);
    $salary_id = $rowsalary['sry_id'] + 1;
    $sqlrate = "select * from rate where rate_id='USD';";
    $resultrate = mysqli_query($link,$sqlrate);
    $rowrate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
    $rate = $rowrate['rate_buy'];
    $sqlpo_id = "select max(po_id) as po_id from po";
    $resultpo_id = mysqli_query($link,$sqlpo_id);
    $rowpo_id = mysqli_fetch_array($resultpo_id,MYSQLI_ASSOC);
    $po_id = $rowpo_id['po_id'] + 1;
    
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ເບີກຈ່າຍເງິນເດືອນ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="salary.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ເບີກຈ່າຍເງິນເດືອນ</b>
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br><br>
      <!-- body -->
    <div class="container font16">
        <form action="frmsalary.php" method="POST" id="form1" enctype="multipart/form-data">
            <div class="row"  align="left">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ຊື່ພະນັກງານ</label><br>
                    <select name="emp_id" id="" class="form-control">
                        <option value="">ເລືອກພະນັກງານ</option>
                        <?php
                                $sqlemp = "select * from employees;";
                                $resultemp = mysqli_query($link, $sqlemp);
                                while($rowemp = mysqli_fetch_array($resultemp, MYSQLI_NUM)){
                                echo" <option value='$rowemp[0]'>$rowemp[1]</option>";
                            }
                        ?>
                    </select>
                    <input type="hidden" value="<?php echo $salary_id ?>" name="sry_id">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ຈຳນວນ</label><br>
                    <input type="number" min="0" class="form-control" name="qty" placeholder="ຈຳນວນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເງິນລ່ວງເວລາ</label><br>
                    <input type="date" min="" class="form-control" name="ot">
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເງິນກິນເຂົ້າ</label>
                    <input type="number" min="0" class="form-control" name="eat" placeholder="ເງິນກິນເຂົ້າ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເງິນນ້ຳມັນ</label>
                    <input type="number" min="0" class="form-control" name="oil" placeholder="ເງິນນ້ຳມັນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ເງິນໂທລະສັບ</label>
                    <input type="number" min="0" class="form-control" name="mobile" placeholder="ເງິນໂທລະສັບ">
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເງິນໂບນັດ</label>
                    <input type="number" min="0" class="form-control" name="bonus" placeholder="ເງິນໂບນັດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ຈຳນວນວັນຂາດວຽກ</label>
                    <input type="number" min="0" class="form-control" name="missday" placeholder="ຈຳນວນວັນຂາດວຽກ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group" >
                    <label>ລວມຫັກວັນຂາດວຽກ</label>
                    <input type="number" min="0" class="form-control" name="miss" placeholder="ລວມຫັກວັນຂາດວຽກ">
                </div>
            </div>
            <div class="row ">
               
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ຫັກເງິນອື່ນໆ</label>
                    <input type="number" min="0" class="form-control" name="more" placeholder="ຫັກເງິນອື່ນໆ">
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary" name="btnadd" style="width: 150px;margin-left: 20px;">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp 
                   ເພີ່ມລາຍການ
                </button>
            </div>
        </from>
    </div>
    <?php
        if(isset($_POST['btnadd'])){
            $sry_id = $_POST['sry_id'];
            $emp_id = $_POST['emp_id'];
            $date_ot = date_create($_POST['ot']);
            $date_ot = date_format($date_ot, 'Y-m')."%";
            $sqlot = "select sum(amount) as ot_amount from ot where emp_id='$emp_id' and status='ອະນຸມັດ';";
            $resultot = mysqli_query($link,$sqlot);
            $rowot = mysqli_fetch_array($resultot, MYSQLI_ASSOC);
            $ot = $rowot['ot_amount'];
            $qty = $_POST['qty'];
            $eat = $_POST['eat'];
            $oil = $_POST['oil'];
            $mobile = $_POST['mobile'];
            $missday = $_POST['missday'];
            $miss = $_POST['miss'];
            $more = $_POST['more'];
            $bonus = $_POST['bonus'];
            $sqlsalary = "select salary from employees where emp_id='$emp_id';";
            $resultsalary = mysqli_query($link,$sqlsalary);
            $rowsalary = mysqli_fetch_array($resultsalary,MYSQLI_ASSOC);
            $salary = $rowsalary['salary'];
            if(trim($emp_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກພະນັກງານ');";
                echo"window.location.href='frmsalary.php';";
                echo"</script>";
            }
            elseif(trim($qty) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='frmsalary.php';";
                echo"</script>";
            }
            else{
                $sqlckimp = "select * from listimp";
                $resultimp = mysqli_query($link,$sqlckimp);
                $sqlpo = "select * from listpodetail";
                $resultpo = mysqli_query($link,$sqlpo);
                if(mysqli_num_rows($resultimp) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກໃນຂະນະນີ້ມີຜູ້ໃຊ້ກຳລັງທຳການນຳເຂົ້າສິນຄ້າຢູ່');";
                    echo"window.location.href='frmsalary.php';";
                    echo"</script>";
                }
                elseif(mysqli_num_rows($resultpo) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກໃນຂະນະນີ້ມີຜູ້ໃຊ້ກຳລັງທຳການເຮັດບັນຊີລາຍຈ່າຍຢູ່');";
                    echo"window.location.href='frmsalary.php';";
                    echo"</script>";
                }
                else{
                    $sqlck = "select * from listsalarydetail where emp_id='$emp_id';";
                    $resultck = mysqli_query($link,$sqlck);
                    if(mysqli_num_rows($resultck) > 0){
                            echo"<script>";
                            echo"alert('ພະນັກງານຄົນນີ້ໄດ້ເພີ່່ມຢູ່ໃນລາຍການແລ້ວ ກະລຸນາເລືອກພະນັກງານຄົນໃໝ່');";
                            echo"window.location.href='frmsalary.php';";
                            echo"</script>";
                    }
                    else{
                        $sqladd = "insert into listsalarydetail(sry_id,emp_id,qty,salary,ot,eat,oil,mobile,bonus,missday,miss,more,acc_id,po_id) values('$sry_id','$emp_id','$qty','$salary','$ot','$eat','$oil','$mobile','$bonus','$missday','$miss','$more','64100000','$po_id');";
                        $resultadd = mysqli_query($link,$sqladd);
                    }
                }
            } 
        }
    ?>
    <div class="container font12b">
        <hr width="90%" />
        <form action="revenue_us.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6  form-group">
                    <h4><b>ເລກທີເບີກຈ່າຍເງິນເດືອນ: <?php echo $salary_id ?></b></h4>
                    <input type="hidden" name="sry_id" value="<?php echo $salary_id ?>">
                </div>
                <div class="col-xs-12 col-sm-6  form-group" align="right">
                    <input type="text" name="sal_mon" class="form-control" placeholder="ເບີກຈ່າຍເງິນເດືອນປະຈຳເດືອນ">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-responsive" style="width: 1500px;">
                    <tr class="warning">
                        <th colspan="18" style="text-align: center;font-size: 18px;"><b>ລາຍການເບີກຈ່າຍເງິນເດືອນ</b></th>
                    </tr>
                    <tr>
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
                        <th>ເຄື່ອງມື</th> 
                    </tr>
                    <?php
                        $sqlshow = "select sdet_id,sry_id,emp_name,qty,l.salary,ot,eat,oil,mobile,bonus,missday,miss,more,acc_id,(l.salary*qty)+ot+eat+oil+mobile+bonus as total,((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more) as amount,(((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate' as amount_kip,(l.salary*qty)*.055 as lsw1,(l.salary*qty)*0.06 as lsw2 from listsalarydetail l left join employees e on l.emp_id=e.emp_id;";
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
                        <td>
                            <a href="del_salary.php?sdet_id=<?php echo $rowshow['sdet_id'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlamount = "select sum(((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more)) as amount_us,sum((((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate') as amount_kip from listsalarydetail;";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="9" style="text-align: right;font-size: 26px;"><b>ມູນຄ່າລວມ:</b></th>
                        <th colspan="4" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount_us'],2); ?> ໂດລາ</b>
                            <input type="hidden" name="amount" value="<?php echo $rowamount['amount_us'];?>">
                        </th>
                        <th colspan="5" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount_kip'],2); ?> ກີບ</b>
                            <input type="hidden" name="amount_kip" value="<?php echo $rowamount['amount_kip']; ?>">
                        </th>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກບັນຊີລາຍຈ່າຍ
            </button>
                <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" align="center">ຢືນຢັນ</h4>
                            </div>
                            <div class="modal-body" align="center">
                                ທ່ານຕ້ອງການຈະບັນທຶກການເບີກຈ່າຍເງິນເດືອນ ຫຼື ບໍ່ ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                <button type="submit" name="btnSave" class="btn btn-primary">ບັນທຶກ</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnSave'])){
            $amount = $_POST['amount'];
            $sal_mon = $_POST['sal_mon'];
            $emp_id2 = $_SESSION['emp_id'];
            $salary_id2 = $_POST['sry_id'];
              if(trim($sal_mon) == ""){
                    echo"<script>";
                    echo"alert('ກະລຸນາປ້ອນເດືອນທີ່ເບີກຈ່າຍເງິນເດືອນ');";
                    echo"window.location.href='frmsalary.php';";
                    echo"</script>";
              }
              else{
                    $sqlsave = "insert into salary(sry_id,emp_id,amount,sal_date,sal_mon,status,seen1,seen2) values('$salary_id2','$emp_id2','$amount','$Date','$sal_mon','ຍັງບໍ່ອະນຸມັດ','NOTSEEN','NOTSEEN');";
                    $resultsave = mysqli_query($link,$sqlsave);
                    if(!$resultsave){
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                        echo"window.location.href='frmsalary.php';";
                        echo"</script>";
                    }
                    else{
                        $sqlsavepo = "insert into po(po_id,emp_id,us_amount,po_date,po_time,status) values('$po_id','$emp_id2','$amount','$Date','$Time','PAID');";
                        $resultsavepo = mysqli_query($link,$sqlsavepo);
                        if(!$resultsavepo){
                            echo"<script>";
                            echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                            echo"window.location.href='frmsalary.php';";
                            echo"</script>";
                        }
                        else{
                            $sqlsalarydetail = "insert into salarydetail(sry_id,emp_id,qty,salary,ot,eat,oil,mobile,bonus,missday,miss,more,acc_id,po_id) select sry_id,emp_id,qty,salary,ot,eat,oil,mobile,bonus,missday,miss,more,acc_id,po_id from listsalarydetail;";
                            $resultsalarydetail = mysqli_query($link,$sqlsalarydetail);
                            $sqlpodetail = "insert into podetail(bill,po_date,pdet_name,qty,price,acc_id,po_id,rate_id,rate) select '$salary_id2','$Date',emp_name,qty,((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more) as amount_us,acc_id,po_id,'USD','$rate' from listsalarydetail l left join employees e on l.emp_id=e.emp_id;";
                            $resultpodetail = mysqli_query($link,$sqlpodetail);
                            if(!$resultsalarydetail){
                                echo"<script>";
                                echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                                echo"window.location.href='frmsalary.php';";
                                echo"</script>";
                            }
                            elseif(!$resultpodetail){
                                echo"<script>";
                                echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້');";
                                echo"window.location.href='frmsalary.php';";
                                echo"</script>";
                            }
                            else {
                                $sqlclear = "delete from listsalarydetail;";
                                $resultclear = mysqli_query($link,$sqlclear);
                                echo"<script>";
                                echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                                echo"window.location.href='frmsalary.php';";
                                echo"</script>";
                            }
                            
                        }
                    }
              }
          
          
        }
    ?>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
