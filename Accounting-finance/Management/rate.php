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
    <title>ຈັດການຂໍ້ມູນສະກຸນເງິນ (Rate)</title>
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
            ຈັດການຂໍ້ມູນສະກຸນເງິນ (Rate)
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
                <b>ສະກຸນເງິນ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
        </div>
    </div>
    <div class="clearfix"></div><br>
    <div class="container font16">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>ຊື່ເລດເງິນ</th>
                    <th>ຊື້</th>
                    <th>ຂາຍ</th>
                    <th>ເລກທີບັນຊີ</th>
                    <th>ປຶ້ມບັນຊີ</th>
                    <th width="75px">ເຄື່ອງມື</th>
                </tr>
                <?php
                  
                    $sqlsearch = "select * from rate order by rate_id asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['rate_id']; ?></td>
                    <td><?php echo number_format($row['rate_buy'],2); ?></td>
                    <td><?php echo number_format($row['rate_sell'],2); ?></td>
                    <td><?php echo $row['ac_no']; ?></td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                    <td>
                        <a href="updaterate.php?rate_id=<?php echo $row['rate_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <!-- <a href="deleterate.php?rate_id=<?php echo $row['rate_id']; ?>">
                            <img src="../../image/Delete.png" alt="" width="20px">
                        </a> -->
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
