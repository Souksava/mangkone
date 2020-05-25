
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
    <title>ຈັດການຂໍ້ມູນບໍລິການ</title>
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
                ບໍລິການ
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
        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ບໍລິການ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="service.php" method="POST" id="form1">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມການບໍລິການ</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="service_name" placeholder="ຊື່ການບໍລິການ">
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btnSave" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                      if(isset($_POST['btnSave'])){
                          $service_name = $_POST['service_name'];
                          $sqlck = "select * from service where service_name='$service_name';";
                          $resultck = mysqli_query($link,$sqlck);
                          if(trim($service_name) == ""){
                            echo"<script>";
                            echo"alert('ກະລຸນາປ້ອນຊື່ບໍລິການ');";
                            echo"window.location.href='service.php';";
                            echo"</script>";
                          }
                          else if(mysqli_num_rows($resultck) > 0){
                            echo"<script>";
                            echo"alert('ບໍ່ສາມາດເພີ່ມບໍລິການນີ້ໄດ້ ເນື່ອງຈາກບໍລິການນີ້ມີຢູ່ແລ້ວ');";
                            echo"window.location.href='service.php';";
                            echo"</script>";
                          }
                          else{
                              $sql = "insert into service(service_name) values('$service_name');";
                              $result = mysqli_query($link,$sql);
                              if(!$result){
                                echo"<script>";
                                echo"alert('ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ');";
                                echo"window.location.href='service.php';";
                                echo"</script>";
                              }
                              else{
                                echo"<script>";
                                echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                                echo"window.location.href='service.php';";
                                echo"</script>";
                              }
                          }
                      }
                    ?>
                </div>
            </div> 
        </div>
        <div class="container">
            <div class="row">
                <form action="service.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="searchcate" style="width: 300px;" placeholder="ຄົ້ນຫາການບໍລິການ">
                    <button class="btn btn-primary" type="submit" name="btnsearchcate">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div><br>
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row font14">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label>ລະຫັດ</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label>ຊື່ບໍລິການ</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label></label>
                        </div>
                    </div>
                </li>
                <?php 
                    $searchcate = "%".$_POST['searchcate']."%";
                    $sqlcate = "select * from service where service_id like '$searchcate' or service_name like '$searchcate';";
                    $resultcate = mysqli_query($link,$sqlcate);
                    while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_ASSOC)){
                ?>
                <li class="list-group-item">
                    <div class="row font14">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label> <?php echo $rowcate['service_id'] ?></label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label> <?php echo $rowcate['service_name'] ?></label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <a href="updateservice.php?service_id=<?php echo $rowcate['service_id'] ?>"> 
                                <img src="../../image/Edit.png" width="23px" align="left">
                            </a>
                            <a href="deleteservice.php?service_id=<?php echo $rowcate['service_id'] ?>">
                                <img src="../../image/Delete.png" alt="" width="23px">
                            </a>
                       
                        </div>
                    </div>
                </li>
                <?php
                    }
                ?>
            </ul>
       </div>
    </div>

    <div class="clearfix"></div><br>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
