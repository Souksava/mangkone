
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
    <title>ຈັດການຂໍ້ມູນປະເພດ ແລະ ຫົວໜ່ວຍສິນຄ້າ </title>
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
                ປະເພດ ແລະ ຫົວໜ່ວຍສິນຄ້າ
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
        <div style="width: 45%; margin: 0 auto;float: left;margin-left: 30px;">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ປະເພດ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="CateAndUnit.php" method="POST" id="form1">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມປະເພດສິນຄ້າ</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="cate_name" placeholder="ຊື່ປະເພດສິນຄ້າ">
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btncate" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btncate'])){
                            $cate_name = $_POST['cate_name'];
                            if(trim($cate_name) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນຊື່ປະເພດສິນຄ້າ');";
                                echo"window.location.href='CateAndUnit.php';";
                                echo"</script>";
                            }
                            else{
                                $sqlckcate = "select cate_name from category where cate_name='$cate_name';";
                                $resultckcate = mysqli_query($link, $sqlckcate);
                                if(mysqli_num_rows($resultckcate) > 0){
                                    echo"<script>";
                                    echo"alert('ບໍ່ສາມາດເພີ່ມປະເພດສິນຄ້ານີ້ໄດ້ ເນື່ອງຈາກປະເພດສິນຄ້ານີ້ມີຢູ່ແລ້ວ, ກະລຸນາເພີ່ມປະເພດສິນຄ້າທີ່ແຕກຕ່າງ');";
                                    echo"window.location.href='CateAndUnit.php';";
                                    echo"</script>";
                                }
                                else{
                                    $sqlsavecate = "insert into category(cate_name) values('$cate_name');";
                                    $resultsavecate = mysqli_query($link,$sqlsavecate);
                                    if(!$resultsavecate){
                                        echo"<script>";
                                        echo"alert('ບັນທຶກບໍ່ສຳເລັດ');";
                                        echo"window.location.href='CateAndUnit.php';";
                                        echo"</script>";
                                    }
                                    else{
                                        echo"<script>";
                                        echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                                        echo"window.location.href='CateAndUnit.php';";
                                        echo"</script>";
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </div> 
        </div>
        <div class="container">
            <div class="row">
                <form action="CateAndUnit.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="searchcate" style="width: 300px;" placeholder="ຄົ້ນຫາປະເພດສິນຄ້າ">
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
                            <label>ຊື່ປະເພດສິນຄ້າ</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label></label>
                        </div>
                    </div>
                </li>
                <?php 
                    $searchcate = "%".$_POST['searchcate']."%";
                    $sqlcate = "select * from category where cate_id like '$searchcate' or cate_name like '$searchcate';";
                    $resultcate = mysqli_query($link,$sqlcate);
                    while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_ASSOC)){
                ?>
                <li class="list-group-item">
                    <div class="row font14">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label> <?php echo $rowcate['cate_id'] ?></label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label> <?php echo $rowcate['cate_name'] ?></label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <a href="Updatecate.php?cate_id=<?php echo $rowcate['cate_id'] ?>"> 
                                <img src="../../image/Edit.png" width="23px" align="left">
                            </a>
                            <a href="deletecate.php?cate_id=<?php echo $rowcate['cate_id'] ?>">
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
    <!--
        ຟອມຫົວໜ່ວຍສິນຄ້າ
    -->
    <div class="container font16">
        <div style="width: 45%; margin-left: 30px;float: left;">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ຫົວໜ່ວຍ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="CateAndUnit.php" method="POST" id="form2">
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຫົວໜ່ວຍສິນຄ້າ</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="unit_name" placeholder="ຊື່ຫົວໜ່ວຍສິນຄ້າ">
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btnunit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnunit'])){
                            $unit_name = $_POST['unit_name'];
                            if(trim($unit_name) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນຊື່ຫົວໜ່ວຍສິນຄ້າ');";
                                echo"window.location.href='CateAndUnit.php';";
                                echo"</script>";
                            }
                            else{
                                $sqlckunit = "select unit_name from unit where unit_name='$unit_name';";
                                $resultckunit = mysqli_query($link, $sqlckunit);
                                if(mysqli_num_rows($resultckunit) > 0){
                                    echo"<script>";
                                    echo"alert('ບໍ່ສາມາດເພີ່ມຫົວໜ່ວຍສິນຄ້ານີ້ໄດ້ ເນື່ອງຈາກຫົວໜ່ວຍສິນຄ້ານີ້ມີຢູ່ແລ້ວ, ກະລຸນາເພີ່ມຫົວໜ່ວຍອື່ນທີ່ແຕກຕ່າງ');";
                                    echo"window.location.href='CateAndUnit.php';";
                                    echo"</script>";
                                }
                                else{
                                    $sqlsaveunit = "insert into unit(unit_name) values('$unit_name');";
                                    $resultsaveunit = mysqli_query($link,$sqlsaveunit);
                                    if(!$resultsaveunit){
                                        echo"<script>";
                                        echo"alert('ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ');";
                                        echo"window.location.href='CateAndUnit.php';";
                                        echo"</script>";
                                    }
                                    else{
                                        echo"<script>";
                                        echo"alert('ເພີ່ມຫົວໜ່ວຍສິນຄ້າສຳເລັດ');";
                                        echo"window.location.href='CateAndUnit.php';";
                                        echo"</script>";
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </div> 
        </div>
        <div class="container">
            <div class="row">
                <form action="CateAndUnit.php" method="POST" id="fomrsearch2">
                    <input type="text" class="form-control" name="searchunit" style="width: 300px;" placeholder="ຄົ້ນຫາຫົວໜ່ວຍສິນຄ້າ">
                    <button class="btn btn-primary" type="submit" name="btnsearchunit">
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
                            <label> ລະຫັດ</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label> ຊື່ຫົວໜ່ວຍສິນຄ້າ</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label></label>
                        </div>
                    </div>
                </li>
                <?php 
                    $searchunit = "%".$_POST['searchunit']."%";
                    $sqlunit = "select * from unit where unit_id like '$searchunit' or unit_name like '$searchunit';";
                    $resultunit = mysqli_query($link,$sqlunit);
                    while($rowunit = mysqli_fetch_array($resultunit, MYSQLI_ASSOC)){
                ?>
                <li class="list-group-item">
                    <div class="row font14">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label><?php echo $rowunit['unit_id']; ?></label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label><?php echo $rowunit['unit_name']; ?></label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <a href="updateUnit.php?unit_id=<?php echo $rowunit['unit_id']; ?>"> 
                                <img src="../../image/Edit.png" width="23px" align="left">
                            </a>
                            <a href="deleteunit.php?unit_id=<?php echo $rowunit['unit_id']; ?>" >
                                <img src="../../image/Delete.png" alt="" width="23px">
                            </a>
        
                        </div>
                    </div>
                </li>
                <?php 
                    }
                    mysqli_close($link);
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
