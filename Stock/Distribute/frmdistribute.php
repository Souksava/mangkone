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
    <title>ການເບີກຈ່າຍສິນຄ້າ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
    <div class="header">
      <div class="container font18">
            <div class="tapbar">
                <a href="../Main.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ການເບີກຈ່າຍສິນຄ້າ
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
  <div class="container font16" align="center">
      <div style="width: 32%;float: left;margin-left: 15px;">
          <form action="frmdistribute.php" method="POST" id="formdis">
              <div class="row">
                  <div class="col-md-12 form-group">
                      <label>ເບີກຈ່າຍສິນຄ້າ</label>&nbsp&nbsp<img src="../../image/hidemenu.png" width="15px">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" name="pro_id" placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" name="serial" placeholder="Serial number">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="number" class="form-control" min="1" name="qty" placeholder="ຈຳນວນ">
                  </div>
                  <div class="col-md-12 form-group">
                      <select name="cus_id" id="" class="form-control">
                          <option value="">-- ເລືອກລູກຄ້າ --</option>
                          <?php
                              $sqlcus1 = "select * from customers;";
                              $resultcus1 = mysqli_query($link, $sqlcus1);
                              while($rowcus1 = mysqli_fetch_array($resultcus1, MYSQLI_NUM)){
                              echo" <option value='$rowcus1[0]'>$rowcus1[1]</option>";
                              }
                          ?>
                      </select>
                  </div>
                  <div class="col-md-12 form-group">
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
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" min="1" name="note" placeholder="ໝາຍເຫດ">
                  </div>
                  <div class="col-md-12 form-group">
                      <button type="button" class="btn btn-warning" style="width: 90%;"  data-toggle="modal" data-target="#myModal">
                          ເບີກສິນຄ້າ 
                      </button>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">ຄຳຢືນຢັນ</h4>
                                    </div>
                                    <div class="modal-body">
                                        ທ່ານຕ້ອງການຈະເບີກສິນຄ້າ ຫຼື ບໍ່ ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ບໍ່ຕ້ອງການ</button>
                                        <button type="sumbit" name="btnDis" class="btn btn-primary">ຕ້ອງການ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
          </form>
      </div>
    <?php
            date_default_timezone_set("Asia/Bangkok");
            $datenow = time();
            $Date = date("Y-m-d",$datenow);
            $Time = date("H:i:s",$datenow);
        if(isset($_POST['btnDis'])){
            $pro_iddis = $_POST['pro_id'];
            $serialdis = $_POST['serial'];
            $qtydis = $_POST['qty'];
            $cus_iddis = $_POST['cus_id'];
            $emp_iddis = $_POST['emp_id'];
            $note3 = $_POST['note'];
            if(trim($pro_iddis) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($serialdis) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນໝາຍເລກ Serial');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($qtydis) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($cus_iddis) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກລູກຄ້າ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($emp_iddis) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກພະນັກງານ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            else {
                $sqlckid = "select * from stock where pro_id='$pro_iddis';";
                $resultckid = mysqli_query($link,$sqlckid);
                $sqlckid2 = "select * from stock where pro_id='$pro_iddis' and serial='$serialdis';";
                $resultckid2 = mysqli_query($link,$sqlckid2);
                $sqlcksr = "select * from stock where serial='$serialdis';";
                $resultcksr = mysqli_query($link,$sqlcksr);
                $sqlckqty = "select qty from stock where pro_id='$pro_iddis' and serial='$serialdis';";
                $resultckqty = mysqli_query($link,$sqlckqty);
                $rowckqty = mysqli_fetch_array($resultckqty, MYSQLI_ASSOC);
                $qtychidis = $rowckqty['qty'];
                if(mysqli_num_rows($resultckid) == 0){
                    echo"<script>";
                    echo"alert('ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
                }
                elseif (mysqli_num_rows($resultcksr) == 0) {
                    echo"<script>";
                    echo"alert('ໝາຍເລກ Serial ບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
                }
                elseif (mysqli_num_rows($resultckid2) == 0) {
                    echo"<script>";
                    echo"alert('ລະຫັດສິນຄ້າ: $pro_iddis ແລະ serial: $serialdis ບໍ່ມີຢູ່ໃນສາງສິນຄ້າ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
                }
                elseif ($qtychidis < $qtydis) {
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດເບີກຈ່າຍສິນຄ້າໄດ້ ເນື່ອງຈາກສິນຄ້ານີ້ຢູ່ໃນສາງມີຈຳນວນ $qtychidis ທ່ານປ້ອນຈຳນວນມາ $qtydis ເຊິ່ງຈະເກີນກວ່າສິນຄ້າຢູ່ໃນສາງ ກະລຸນາປ້ອນຈຳນວນໃຫ້ຕ່ຳກວ່າ ຫຼື ເທົ່າກັບສິນຄ້າທີ່ຢູ່ໃນສາງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
                }
                else {
                    $sqlmac = "select mac_address from stock where pro_id='$pro_iddis' and serial='$serialdis';";
                    $resultmac = mysqli_query($link,$sqlmac);
                    $rowmac = mysqli_fetch_array($resultmac,MYSQLI_ASSOC);
                    $mac_address = $rowmac['mac_address'];
                    $sqlsave = "insert into distribute(datedis,timedis,emp_id,pro_id,serial,qty,cus_id,note,mac_address) values('$Date','$Time','$emp_iddis','$pro_iddis','$serialdis','$qtydis','$cus_iddis','$note3','$mac_address');";
                    $resultsave = mysqli_query($link,$sqlsave);
                    if(!$resultsave){
                        echo"<script>";
                        echo"alert('ເບີກຈ່າຍສິນຄ້າບໍ່ສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>";
                    }
                    else {
                        $sqlstock = "update stock set qty=qty-'$qtydis' where pro_id='$pro_iddis' and serial='$serialdis';";
                        $resultstock = mysqli_query($link,$sqlstock);
                        echo"<script>";
                        echo"alert('ເບີກຈ່າຍສິນຄ້າສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>";
                    }
                }


            }
        }
    ?>
      <div style="width: 32%;float: left;margin-left: 15px;">
          <form action="frmdistribute.php" method="POST" id="formRecov">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>ສິນຄ້າໝົດສັນຍາ</label>&nbsp&nbsp<img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="pro_id" placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="serial" placeholder="Serial Number">
                </div>
                <div class="col-md-12 form-group">
                    <input type="number" min="1" class="form-control" name="qty" placeholder="ຈຳນວນ">
                </div>
                <div class="col-md-12 form-group">
                    <select name="cus_id" id="" class="form-control">
                        <option value="">ເລືອກລູກຄ້າທີ່ໝົດສັນຍາ</option>
                        <?php
                            $sqlcus = "select * from customers;";
                            $resultcus = mysqli_query($link, $sqlcus);
                            while($rowcus = mysqli_fetch_array($resultcus, MYSQLI_NUM)){
                            echo" <option value='$rowcus[0]'>$rowcus[1]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <select name="emp_id" id="" class="form-control">
                        <option value="">ເລືອກພະນັກງານ</option>
                        <?php
                            $sqlemp1 = "select * from employees;";
                            $resultemp1 = mysqli_query($link, $sqlemp1);
                            while($rowemp1 = mysqli_fetch_array($resultemp1, MYSQLI_NUM)){
                            echo" <option value='$rowemp1[0]'>$rowemp1[1]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="note" placeholder="ໝາຍເຫດ">
                </div>
                <div class="col-md-12 form-group">
                    <button type="button" class="btn btn-info" style="width: 90%;"  data-toggle="modal" data-target="#myModal2">
                        ນຳສິນຄ້າໝົດສັນຍາເຂົ້າສາງ
                    </button>
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">ຄຳຢືນຢັນ</h4>
                                </div>
                                <div class="modal-body">
                                    ທ່ານຕ້ອງນຳສິນຄ້າໝົດສັນຍາເຂົ້າສາງຄືນບໍ່ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ບໍ່ຕ້ອງການ</button>
                                    <button type="sumbit" name="btnRecover" class="btn btn-primary">ຕ້ອງການ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
      </div>
    <?php
        if(isset($_POST['btnRecover'])){
            $pro_idreco = $_POST['pro_id'];
            $serialreco = $_POST['serial'];
            $qtyreco = $_POST['qty'];
            $cus_idreco = $_POST['cus_id'];
            $emp_idreco = $_POST['emp_id'];
            $notereco = $_POST['note'];
            if(trim($pro_idreco) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($serialreco) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນໝາຍເລກ Serial');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($qtyreco) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($cus_idreco) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກລູກຄ້າ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($emp_idreco) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກພະນັກງານ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            else {
               $sqlckre = "select * from stock where pro_id='$pro_idreco';";
               $resultckre = mysqli_query($link,$sqlckre);
               $sqlcksrre = "select * from stock where serial='$serialreco';";
               $resultcksrre = mysqli_query($link,$sqlcksrre);
               $sqlckdis = "select * from distribute where pro_id='$pro_idreco' and serial='$serialreco';";
               $resultckdiss = mysqli_query($link,$sqlckdis);
               $sqlckqtyre = "select qty from distribute where pro_id='$pro_idreco' and serial='$serialreco';";
               $resultckqtyre = mysqli_query($link,$sqlckqtyre);
               $rowckqtyre = mysqli_fetch_array($resultckqtyre, MYSQLI_ASSOC);
               $qtyre = $rowckqtyre['qty'];
               if(mysqli_num_rows($resultckre) == 0){
                    echo"<script>";
                    echo"alert('ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
               }
               elseif (mysqli_num_rows($resultcksrre) == 0) {
                    echo"<script>";
                    echo"alert('ໝາຍເລກ Serial ບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
               }
               elseif (mysqli_num_rows($resultckdiss) == 0) {
                    echo"<script>";
                    echo"alert('ສິນຄ້ານີ້ຍັງບໍ່ເຄີຍມີການເບີກຈ່າຍມາກ່ອນ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
                }
                elseif ($qtyre < $qtyreco){
                    echo"<script>";
                    echo"alert('ບໍໍ່ສາມາດເກັບຄືນສິນຄ້າໄດ້ເນື່ອງຈາກທ່ານປ້ອນຈຳນວນຫຼາຍກວ່າຈຳນວນທີ່ເຄີຍເບີກ ກະລຸນາປ້ອນຈຳນວນບໍ່ໃຫ້ເກີນ $qtyre');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>";
                }
                else {
                    $sqlmac = "select mac_address from stock where pro_id='$pro_idreco' and serial='$serialreco';";
                    $resultmac = mysqli_query($link,$sqlmac);
                    $rowmac = mysqli_fetch_array($resultmac,MYSQLI_ASSOC);
                    $mac_address = $rowmac['mac_address'];
                    $sqlsave2 = "insert into backdistribute(dateback,timeback,emp_id,cus_id,pro_id,serial,qty,moreinfo,mac_address) values('$Date','$Time','$emp_idreco','$cus_idreco','$pro_idreco','$serialreco','$qtyreco','$notereco','$mac_address');";
                    $resultsave2 = mysqli_query($link,$sqlsave2);
                    if(!$resultsave2){
                        echo"<script>";
                        echo"alert('ເກັບຄືນສິນຄ້າເຂົ້າສາງບໍ່ສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>";
                    }
                    else {
                        $sqlupdatestock = "update stock set qty=qty+'$qtyreco' where pro_id='$pro_idreco' and serial='$serialreco';";
                        $resultupdate = mysqli_query($link,$sqlupdatestock);
                        echo"<script>";
                        echo"alert('ເກັບຄືນສິນຄ້າເຂົ້າສາງສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>";
                    }
                }

            }
        }
    ?>
      <div style="width: 32%;float: left;margin-left: 15px;">
          <form action="frmdistribute.php" method="POST" id="formClaim">
              <div class="row">
                  <div class="col-md-12 form-group">
                    <label>ສິນຄ້າສົ່ງເຄມ</label>&nbsp&nbsp<img src="../../image/hidemenu.png" width="15px">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" name="pro_id" placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" name="serial" placeholder="Serial Number">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="number" min="1" class="form-control" name="qty" placeholder="ຈຳນວນ">
                  </div>
                  <div class="col-md-12 form-group">
                      <select name="sup_id" id="" class="form-control">
                          <option value="">ເລືອກຜູ້ສະໜອງ</option>
                           <?php
                              $sqlsup = "select * from supplier where type='Tool';";
                              $resultsup = mysqli_query($link, $sqlsup);
                              while($rowsup = mysqli_fetch_array($resultsup, MYSQLI_NUM)){
                              echo" <option value='$rowsup[0]'>$rowsup[1]</option>";
                              }
                          ?> 
                      </select>
                  </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="note" placeholder="ໝາຍເຫດ">
                </div>
                <div class="col-md-12 form-group">
                    <button type="button" class="btn btn-success" style="width: 40%;"  data-toggle="modal" data-target="#myModal3">
                        ສົ່ງເຄມສິນຄ້າ
                    </button>
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">ຄຳຢືນຢັນ</h4>
                                </div>
                                <div class="modal-body">
                                    ທ່ານຕ້ອງການສົ່ງເຄມສິນຄ້າບໍ່ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ບໍ່ຕ້ອງການ</button>
                                    <button type="sumbit" name="btnClaim" class="btn btn-primary">ຕ້ອງການ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" style="width: 40%;"  data-toggle="modal" data-target="#myModal4">
                            ສິນຄ້າເຄມແລ້ວ 
                    </button>
                    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">ຄຳຢືນຢັນ</h4>
                                </div>
                                <div class="modal-body">
                                    ທ່ານຕ້ອງການນຳສິນຄ້າເຄມແລ້ວເຂົ້າສາງຫຼືບໍ່ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ບໍ່ຕ້ອງການ</button>
                                    <button type="sumbit" name="btnClaimBack" class="btn btn-primary">ຕ້ອງການ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </form>
      </div>
    <?php
        if(isset($_POST['btnClaim'])){
            $pro_idcaim = $_POST['pro_id'];
            $serialcaim = $_POST['serial'];
            $qtycaim = $_POST['qty'];
            $sup_idcaim = $_POST['sup_id'];
            $note = $_POST['note'];
            if(trim($pro_idcaim) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($serialcaim) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນໝາຍເລກ serial');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($qtycaim) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຈຳນວນ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            elseif (trim($sup_idcaim) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກຜູ້ສະໜອງ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>";
            }
            else {
                $sqlckidcaim = "select * from stock where pro_id='$pro_idcaim';";
                $resultidcaim = mysqli_query($link,$sqlckidcaim);
                $sqlcksrcaim = "select * from stock where serial='$serialcaim';";
                $resultsrcaim = mysqli_query($link,$sqlcksrcaim);
                $sqlcksrcaim2 = "select * from stock where pro_id='$pro_idcaim' and serial='$serialcaim';";
                $resultsrcaim2 = mysqli_query($link,$sqlcksrcaim2);
                $sqlqtycaim = "select qty from stock where pro_id='$pro_idcaim' and serial='$serialcaim';";
                $resultqtycaim = mysqli_query($link,$sqlqtycaim);
                $rowqtycaim = mysqli_fetch_array($resultqtycaim, MYSQLI_ASSOC);
                $qtyckcaim = $rowqtycaim['qty'];
                $sqlckrecover = "select * from claim where pro_id='$pro_idcaim' and serial='$serialcaim' and status='claim';";
                $resultckrecover = mysqli_query($link,$sqlckrecover);
                if(mysqli_num_rows($resultidcaim) == 0){
                    echo"<script>";
                    echo"alert('ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                elseif (mysqli_num_rows($resultsrcaim) == 0) {
                    echo"<script>";
                    echo"alert('ໝາຍເລກ Serial ບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                elseif (mysqli_num_rows($resultsrcaim2) == 0) {
                    echo"<script>";
                    echo"alert('ສິນຄ້ານີ້ບໍ່ມີຢູ່ໃນສາງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                elseif (mysqli_num_rows($resultckrecover) > 0) {
                    echo"<script>";
                    echo"alert('ຂໍອະໄພ ສິນຄ້ານີ້ໄດ້ສົ່ງເຄມແລ້ວ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                elseif ($qtyckcaim < $qtycaim) {
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດສົ່ງເຄມໄດ້ເນື່ອຈາກທ່ານປ້ອນຈຳນວນສິນຄ້າເກີນກວ່າຈຳນວນສິນຄ້າທີ່ຢູ່ໃນສະຕ໋ອກ ກະລຸນາປ້ອນຈຳນວນບໍ່ໃຫ້ເກີນ $qtyckcaim');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                else {
                    $emp_id = $_SESSION['emp_id'];
                    $sqlmac = "select mac_address from stock where pro_id='$pro_idcaim' and serial='$serialcaim';";
                    $resultmac = mysqli_query($link,$sqlmac);
                    $rowmac = mysqli_fetch_array($resultmac,MYSQLI_ASSOC);
                    $mac_address = $rowmac['mac_address'];
                    $sqlsave3 = "insert into claim(dateclaim,timeclaim,emp_id,sup_id,pro_id,serial,qty,moreinfo,status,mac_address) values('$Date','$Time','$emp_id','$sup_idcaim','$pro_idcaim','$serialcaim','$qtycaim','$note','Claim','$mac_address');";
                    $resultcaim = mysqli_query($link,$sqlsave3);
                    if(!$resultcaim){
                        echo"<script>";
                        echo"alert('ສົ່ງເຄມສິນຄ້າບໍ່ສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>"; 
                    }
                    else {
                        $sqlupdatecaim = "update stock set qty=qty-'$qtycaim' where pro_id='$pro_idcaim' and serial='$serialcaim';";
                        $resultupdate2 = mysqli_query($link,$sqlupdatecaim);
                        echo"<script>";
                        echo"alert('ສົ່ງເຄມສິນຄ້າສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>"; 
                    }
                }
            }
        }
        if(isset($_POST['btnClaimBack'])){
           $pro_id = $_POST['pro_id'];
           $serial = $_POST['serial'];
           $qty = $_POST['qty'];
           $sup_id = $_POST['sup_id'];
           $note2 = $_POST['note'];
           if(trim($pro_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>"; 
           }
           elseif (trim($serial) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນໝາຍເລກ serial');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>"; 
           }
           elseif (trim($qty) == "") {
            echo"<script>";
            echo"alert('ກະລຸນາປ້ອນຈຳນວນ);";
            echo"window.location.href='frmdistribute.php';";
            echo"</script>"; 
            }
            elseif (trim($sup_id) == "") {
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກຜູ້ສະໜອງ');";
                echo"window.location.href='frmdistribute.php';";
                echo"</script>"; 
           }
           else {
               $sqlckidcaimb = "select * from claim where pro_id='$pro_id';";
               $resultckidcaimb = mysqli_query($link,$sqlckidcaimb);
               $sqlcksrcaimb = "select * from claim where serial='$serial';";
               $resultsrcaimb = mysqli_query($link,$sqlcksrcaimb);
               $sqlckcaimb = "select * from claim where pro_id='$pro_id' and serial='$serial';";
               $resultckcaimb = mysqli_query($link,$sqlckcaimb);
               $sqlckqtycaim = "select qty from claim where pro_id='$pro_id' and serial='$serial';";
               $resultckqtycaim = mysqli_query($link,$sqlckqtycaim);
               $rowqtyckcaim = mysqli_fetch_array($resultckqtycaim, MYSQLI_ASSOC);
               $qtyck = $rowqtyckcaim['qty'];
               $sqlckrecover = "select * from claim where pro_id='$pro_id' and serial='$serial' and status!='claimed';";
                $resultckrecover = mysqli_query($link,$sqlckrecover);
               if(mysqli_num_rows($resultckidcaimb) == 0){
                    echo"<script>";
                    echo"alert('ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
               }
               elseif (mysqli_num_rows($resultsrcaimb) == 0) {
                    echo"<script>";
                    echo"alert('ໝາຍເລກ Serial ບໍ່ຖືກຕ້ອງ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
               }
               elseif (mysqli_num_rows($resultckcaimb) == 0) {
                    echo"<script>";
                    echo"alert('ສິນຄ້ານີ້ບໍ່ເຄີຍມີການສົ່ງເຄມ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                elseif (mysqli_num_rows($resultckrecover) <= 0) {
                    echo"<script>";
                    echo"alert('ສິນຄ້ານີ້ຍັງບໍ່ເຄີຍສົ່ງເຄມ ກະລຸນາໃສ່ລະຫັດສິນຄ້າ ແລະ ໝາຍເລກ Serial ຂອງສິນຄ້າທີ່ເຄີຍສົ່ງເຄມ');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                elseif ($qtyck < $qty) {
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດນຳເຄື່ອງສົ່ງເຄມກັບໄດ້ ເນື່ອງຈາກສິນຄ້າທີ່ທ່ານປ້ອນເກີນກວ່າສິນຄ້າທີ່ເຄຍສົ່ງເຄມ ກະລຸນາປ້ອນຈຳນວນບໍ່ໃຫ້ເກີນ $qtyck');";
                    echo"window.location.href='frmdistribute.php';";
                    echo"</script>"; 
                }
                else {
                    $emp_idb = $_SESSION['emp_id'];
                    $emp_name = $_SESSION['emp_name'];
                    $sqlsave4 = "update claim set dateback='$Date',emp_name='$emp_name',status='Claimed' where pro_id='$pro_id' and serial='$serial' and status='Claim';";
                    $resultsave4 = mysqli_query($link,$sqlsave4);
                    if(!$resultsave4){
                        echo"<script>";
                        echo"alert('ນຳສິນຄ້າເຄມເຂົ້າສາງບໍ່ສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>"; 
                    }
                    else {
                        $sqlupdatecaimb = "update stock set qty=qty+'$qty' where pro_id='$pro_id' and serial='$serial';";
                        $resultupdate4 = mysqli_query($link,$sqlupdatecaimb);
                        echo"<script>";
                        echo"alert('ນຳສິນຄ້າເຄມເຂົ້າສາງສຳເລັດ');";
                        echo"window.location.href='frmdistribute.php';";
                        echo"</script>"; 
                    }
                }
           }
        }
    ?>
  </div>
 

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
