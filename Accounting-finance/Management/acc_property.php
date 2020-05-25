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
    <title>ປະເພດບັນຊີ</title>
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
            ຈັດການຂໍ້ມູນປະເພດບັນຊີ
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
                <b>ປະເພດບັນຊີ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
            <div class="col-xs-12 col-sm-6" align="right">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <form action="acc_property.php" method="POST" id="form1">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຂໍ້ມູນໝວດຊັບສົມບັດ</b></h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            <input type="text" name="ppy_name" class="form-control" placeholder="ຊື່ໝວດຊັບສົມບັດ">
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
            $ppy_name = $_POST['ppy_name'];
            if(trim($ppy_name) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຊື່ປະເພດບັນຊີ');";
                echo"window.location.href='acc_property.php';";
                echo"</script>";
            }
            else{
                $sqlckname = "select * from acc_property where ppy_name='$ppy_name';";
                $resultchname = mysqli_query($link,$sqlckname);
                if(mysqli_num_rows($resultchname) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດເພີ່ມປະເພດບັນຊີໄດ້ ເນື່ອງຈາກຊື່ປະເພດບັນຊີນີ້ມີຢູ່ແລ້ວ');";
                    echo"window.location.href='acc_property.php';";
                    echo"</script>";
                }
                else{
                    $sqlacc = "insert into acc_property(ppy_name) values('$ppy_name');";
                    $resultacc = mysqli_query($link, $sqlacc);
                    if(!$resultacc)
                    {
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ກະລຸນາກວດສອບການປ້ອນຂໍ້ມູນອີກຄັ້ງ..!');";
                        echo"window.location.href='acc_property.php';";
                        echo"</script>";
                    }
                    else{    
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='acc_property.php';";
                        echo"</script>";
                    }
        
                }
            }

        }

    ?>
    <div class="container">
            <div class="row">
                <form action="acc_property.php" method="POST" id="fomrsearch">
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
            <table class="table table-striped">
                <tr>
                    <th>ລະຫັດ</th>
                    <th>ຊື່ປະເພດບັນຊີ</th>
                    <th width="75px">ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select * from acc_property where ppy_id like '$search' or ppy_name like '$search' order by ppy_id asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['ppy_id']; ?></td>
                    <td><?php echo $row['ppy_name']; ?></td>
                    <td>
                        <a href="updateacc_pro.php?ppy_id=<?php echo $row['ppy_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deleteacc_pro.php?ppy_id=<?php echo $row['ppy_id']; ?>">
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
