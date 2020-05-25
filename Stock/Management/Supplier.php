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
    <title>ຈັດການຂໍ້ມູຜູ້ສະໜອງ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="management.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ຜູ້ສະໜອງ
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
                    <b>ຜູ້ສະໜອງ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="Supplier.php" method="POST" id="form1">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຂໍ້ມູນຜູ້ສະໜອງ</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="company" placeholder="ຊື່ບໍລິສັດ">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="address" placeholder="ທີ່ຕັ້ງບໍລິສັດ">
                                            </div>  
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" placeholder="ເບີໂທຕິດຕໍ່" name="tel">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" placeholder="ເບີແຟັກ" name="fax">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="email" class="form-control" placeholder="ທີ່ຢູ່ອີເມວ" name="email">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <select name="type" id="" class="form-control">
                                                    <option value="">ເລືອກປະເພດຜູ້ສະໜອງ</option>
                                                    <option value="Tool">Tool</option>
                                                    <option value="Internet">Internet</option>
                                                </select>
                                            </div> 
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btnsave" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnsave'])){
                            $sup_id = $_POST['sup_id'];
                            $company = $_POST['company'];
                            $tel = $_POST['tel'];
                            $fax = $_POST['fax'];
                            $address = $_POST['address'];
                            $email = $_POST['email'];
                            $type = $_POST['type'];
                            if(trim($company) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນຊື່ບໍລິສັດ');";
                                echo"window.location.href='Supplier.php';";
                                echo"</script>";
                            }
                            elseif(trim($tel) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາໃສ່ເບີໂທລະສັບ');";
                                echo"window.location.href='Supplier.php';";
                                echo"</script>";
                            }
                            elseif(trim($address) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນທີ່ຕັ້ງບໍລິສັດ');";
                                echo"window.location.href='Supplier.php';";
                                echo"</script>";
                            }
                            elseif(trim($type) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາເລືອກປະເພດຜູ້ສະໜອງ');";
                                echo"window.location.href='Supplier.php';";
                                echo"</script>";
                            }
                            else{
                                $sql = "insert into supplier(company,tel,fax,address,email,type) values('$company','$tel','$fax','$address','$email','$type');";
                                $result = mysqli_query($link,$sql);
                                if(!$result)
                                {
                                    echo"<script>";
                                    echo"alert('ບໍ່ສາມາດເພີ່ມຜູ້ສະໜອງໄດ້');";
                                    echo"window.location.href='Supplier.php';";
                                    echo"</script>";
                                }
                                else{    
                                    echo"<script>";
                                    echo"alert('ເພີ່ມຜູ້ສະໜອງສຳເລັດ');";
                                    echo"window.location.href='Supplier.php';";
                                    echo"</script>";
                                }            
                            }
                        }
                    ?>
                </div>
            </div>
            <br>
      </div> 
      <div class="container">
            <div class="row">
                <form action="Supplier.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ">
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
      </div>
    <div class="clearfix"></div><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1500px;">
                <tr>
                    <th>ລະຫັດ</th>
                    <th>ຊື່ບໍລິສັດ</th>
                    <th>ເບີໂທຕິດຕໍ່</th>
                    <th>ເບີແຟັກ</th>
                    <th>ທີ່ຕັ້ງບໍລິສັດ</th>
                    <th >ທີ່ຢູ່ອີເມວ</th>
                    <th >ປະເພດຜູ້ສະໜອງ</th>
                  
                    <th width="75px">ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select * from supplier where sup_id like '$search' or company like '$search';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['sup_id']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['fax']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td>
                        <a href="UpdateSup.php?sup_id=<?php echo $row['sup_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deletesup.php?sup_id=<?php echo $row['sup_id']; ?>">
                            <img src="../../image/Delete.png" alt="" width="20px">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    mysqli_close($link);
                ?>
            </table>
        </div>
    </div>
     
      

  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
