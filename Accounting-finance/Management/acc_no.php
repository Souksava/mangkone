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
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ຈັດການຂໍ້ມູນເລກທີບັນຊີ</title>
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
                ຈັດການຂໍ້ມູນເລກທີບັນຊີ
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
                <b>ເລກທີບັນຊີ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
            <div class="col-xs-12 col-sm-6" align="right">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <form action="acc_no.php" method="POST" id="form1">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຂໍ້ມູນເລກທີບັນຊີ</b></h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            <input type="number" name="acc_id" class="form-control" placeholder="ເລກທີບັນຊີ">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input type="text" name="acc_name" class="form-control" placeholder="ຊື່ເລກທີບັນຊີ">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <select name="unit_id" id="" class="form-control">
                                                <option value="">ເລືອກໝວດບັນຊີ</option>
                                                <?php
                                                        $sqlaccppy = "select unit_id,unit_name,ppy_name from acc_unit u left join acc_property p on u.ppy_id=p.ppy_id order by unit_name asc;";
                                                        $resultaccppy = mysqli_query($link, $sqlaccppy);
                                                        while($rowaccppy = mysqli_fetch_array($resultaccppy, MYSQLI_NUM)){
                                                        echo" <option value='$rowaccppy[0]'>$rowaccppy[1] ( $rowaccppy[2] )</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
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
            </div>
        </div>
    </div>
    <?php
           if(isset($_POST['btnsave'])){
            $acc_id = $_POST['acc_id'];
            $acc_name = $_POST['acc_name'];
            $unit_id = $_POST['unit_id'];
            if(trim($acc_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນເລກທີບັນຊີ');";
                echo"window.location.href='acc_no.php';";
                echo"</script>";
            }
            else if(trim($acc_name) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຊື່ເລກຊີບັນຊີ');";
                echo"window.location.href='acc_no.php';";
                echo"</script>";
            }
            else if(trim($unit_id) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາເລືອກໝວດບັນຊີ');";
                echo"window.location.href='acc_no.php';";
                echo"</script>";
            }
            else{
                $sqlckid = "select * from acc_no where acc_id='$acc_id';";
                $resultckid = mysqli_query($link,$sqlckid);
                $sqlckname = "select * from acc_no where acc_name='$acc_name';";
                $resultchname = mysqli_query($link,$sqlckname);
                if(mysqli_num_rows($resultckid) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດເພີ່ມເລກທີບັນຊີໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ມີຢູ່ແລ້ວ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultchname) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດເພີ່ມເລກທີບັນຊີໄດ້ ເນື່ອງຈາກຊື່ເລກທີບັນຊີນີ້ມີຢູ່ແລ້ວ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else{
                    $sqlacc = "insert into acc_no(acc_id,acc_name,unit_id) values('$acc_id','$acc_name','$unit_id');";
                    $resultacc = mysqli_query($link, $sqlacc);
                    if(!$resultacc)
                    {
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ກະລຸນາກວດສອບການປ້ອນຂໍ້ມູນອີກຄັ້ງ..!');";
                        echo"window.location.href='acc_no.php';";
                        echo"</script>";
                    }
                    else{    
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='acc_no.php';";
                        echo"</script>";
                    }
        
                }
            }

        }

    ?>
    <div class="container font16">
            <div class="row">
                <form action="acc_no.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ">
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
    </div>
    <div class="clearfix"></div><br>
    <div class="container font16">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th style="width: 50px;">ລະຫັດ</th>
                    <th style="width: 150px;">ຊື່ເລກທີບັນຊີ</th>
                    <th style="width: 150px;">ໝວດບັນຊີ</th>
                    <th width="75px">ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select acc_id,acc_name,a.unit_id,unit_name,u.ppy_id,ppy_name from acc_no a left join acc_unit u on a.unit_id=u.unit_id left join acc_property p on u.ppy_id=p.ppy_id where acc_id like '$search' or acc_name like '$search' or unit_name like '$search' or ppy_name like '$search' order by acc_id asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['acc_id']; ?></td>
                    <td><?php echo $row['acc_name']; ?></td>
                    <td><?php echo $row['unit_name']; ?> <?php echo "( ".$row['ppy_name'].")"; ?></td>
                    <td>
                        <a href="updateacc_no.php?acc_id=<?php echo $row['acc_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deleteacc_no.php?acc_id=<?php echo $row['acc_id']; ?>">
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
