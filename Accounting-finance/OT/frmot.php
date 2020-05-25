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
    $emp_id = $_SESSION['emp_id'];
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OT</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="ot.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                OT
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
    <div class="container font16" align="left">
        <form action="frmot.php" method="POST" id="formAdd">
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ວັນທີເຮັດວຽກລ່ວງເວລາ</label>
                    <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">    
                    <input type="date" class="form-control" name="date_ot">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ວັນທີເຮັດວຽກລ່ວງເວລາ</label> 
                    <select name="ot_type" id="" class="form-control">
                        <option value="">ເລືອກປະເພດ OT</option>
                        <option value="ວຽກລ່ວງເວລາວັນເຂົ້າການ">ວຽກລ່ວງເວລາວັນເຂົ້າການ</option>
                        <option value="ວຽກລ່ວງເວລາວັນພັກການ">ວຽກລ່ວງເວລາວັນພັກການ</option>
                        <option value="ວຽກລ່ວງເວລາວັນເທດສະການ">ວຽກລ່ວງເວລາວັນເທດສະການ</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ເວລາເລີ່ມ</label>
                    <input type="text" class="form-control" name="time_start"  pattern="[0-9]{2}:[0-9]{2}" placeholder="00:00">
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ເວລາສິ້ນສຸດ</label>
                    <input type="text" class="form-control" name="time_end"  pattern="[0-9]{2}:[0-9]{2}" placeholder="00:00">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 form-group">
                    <label>ເນື້ອງໃນ</label><br>
                    <input type="text" class="form-control" name="note" placeholder="ເນື້ອງໃນ">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group" align="center">
                    <button type="submit" name="btnAdd" class="btn btn-info" style="width: 90%;">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        ເພີ່ມລາຍການ OT
                    </button>
                </div>
            </div>
        </form>
        <hr width="90%" />
    </div>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1200px;">
                <tr>
                    <th style="width: 20px;">#</th>
                    <th style="width: 140px;">ຊື່ພະນັກງານ</th>
                    <th style="width: 150px;">ວັນທີເຮັດວຽກລ່ວງເວລາ</th>
                    <th style="width: 180px;">ປະເພດ OT</th>
                    <th style="text-align: left;">ເນື້ອໃນ</th>
                    <th style="width: 80px;">ເວລາເລີ່ມ</th>
                    <th style="width: 80px;">ເວລາສິ້ນສຸດ</th>
                    <th style="width: 80px;">ລວມເວລາ</th>
                    <th style="width: 30px;">ເຄື່ອງມື</th>
                </tr>
            <?php
                if(isset($_POST['btnAdd'])){
                    $date_ot = $_POST['date_ot'];
                    $time_start = $_POST['time_start'];
                    $time_end = $_POST['time_end'];
                    $ot_type = $_POST['ot_type'];
                    $note = $_POST['note'];
                    if(trim($date_ot) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາເລືອກວັນທີ');";
                        echo"window.location.href='frmot.php';";
                        echo"</script>";
                    }
                    elseif(trim($ot_type) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາເລືອກປະເພດ OT');";
                        echo"window.location.href='frmot.php';";
                        echo"</script>";
                    }
                    elseif(trim($time_start) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາປ້ອນເວລາເລີ່ມ');";
                        echo"window.location.href='frmot.php';";
                        echo"</script>";
                    }
                    elseif(trim($time_end) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາປ້ອນເວລາເລີກວຽກ OT');";
                        echo"window.location.href='frmot.php';";
                        echo"</script>";
                    }
                    elseif(trim($note) == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາໃສ່ເນື້ອໃນການເຮັດວຽກລ່ວງເວລາ');";
                        echo"window.location.href='frmot.php';";
                        echo"</script>";
                    }
                    else{

                        $sqladd = "insert into listot(emp_id,date_ot,time_start,time_end,ot_type,note) values('$emp_id','$date_ot','$time_start','$time_end','$ot_type','$note');";
                        $resultadd = mysqli_query($link, $sqladd);
                    }
                }
                    $sqlselect = "select ot_id,emp_name,note,date_ot,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type from  listot l left join employees e on l.emp_id=e.emp_id where l.emp_id='$emp_id';";
                    $resultselect = mysqli_query($link,$sqlselect);
                    $No_ = 0;
                    while($rowselect = mysqli_fetch_array($resultselect, MYSQLI_ASSOC)){
            ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $rowselect['emp_name'] ?></td>
                    <td><?php echo $rowselect['date_ot'] ?></td>
                    <td><?php echo $rowselect['ot_type'] ?></td>
                    <td><?php echo $rowselect['note'] ?></td>
                    <td><?php echo $rowselect['time_start'] ?></td>
                    <td><?php echo $rowselect['time_end'] ?></td>
                    <td><?php echo $rowselect['newtime'] ?></td>
                    <td align="center">
                      <a href="delot.php?ot_id=<?php echo $rowselect['ot_id'];?>">
                          <img src="../../image/Delete.png" alt="" width="24px">
                      </a>
                  </td>
                </tr>
            <?php
                }
            ?>
            </table>
        </div>
        <form action="frmot.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-md-12 form-group" align="center">
                    <button type="button" class="btn btn-warning" style="width: 90%;" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        ບັນທຶກຟອມ OT
                    </button>

                    <!-- Modal -->
                    <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" align="center">ຢືນຢັນ</h4>
                                </div>
                                <div class="modal-body">
                                    ທ່ານຕ້ອງການບັນທຶກຟອມ OT ຫຼື ບໍ່ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                    <button type="submit" name="btnSave" class="btn btn-warning">ບັນທຶກ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php 
        if(isset($_POST['btnSave'])){
            $sqlck = "select * from listot where emp_id='$emp_id';";
            $resultck = mysqli_query($link,$sqlck);
            if(mysqli_num_rows($resultck) == 0){
                echo"<script>";
                echo"alert('ກະລຸນາເພີ່ມລາຍການ OT');";
                echo"window.location.href='frmot.php';";
                echo"</script>";
            }
            else{
                $sqlsave = "insert into ot(emp_id,date_ot,time_start,time_end,ot_type,note,status) select emp_id,date_ot,time_start,time_end,ot_type,note,'ຍັງບໍ່ອະນຸມັດ' from listot where emp_id='$emp_id';";
                $resultsave = mysqli_query($link,$sqlsave);
                if(!$resultsave){
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='frmot.php';";
                    echo"</script>";
                }
                else{
                    echo"<script>";
                    echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='frmot.php';";
                    echo"</script>";
                    $sqlclear = "delete from listot where emp_id='$emp_id';";
                    $resultclear = mysqli_query($link,$sqlclear);
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
