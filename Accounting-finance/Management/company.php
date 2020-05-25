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
    <title>ຂໍ້ມູນວິສະຫະກິດ</title>
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
            ວິສະຫະກິດ
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
                <b>ຈັດການຂໍ້ມູນວິສະຫະກິດ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
        </div>
    </div>
    <div class="clearfix"></div><br>
    <div class="container font12b">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table table-striped" style="width: 2300px;">
                    <tr>
                        <th style="width: 5px;">#</th>
                        <th style="width: 300px;">ຊື່ວິສະຫະກິດ</th>
                        <th style="width: 500px;">ທີ່ຕັ້ງ</th>
                        <th >ເບີໂທ</th>
                        <th >ແຟັກ</th>
                        <th >ອີເມວ</th>
                        <th >ທີ່ຢູ່ເວັບໄຊ</th>
                        <th >ໃບຢັ້ງຢືນ</th>
                        <th >ໃບອາກອນ</th>
                        <th >ໃບອະນຸຍາດ</th>
                        <th >ໂລໂກ້</th>
                        <th >ເລກທີພາສີອາກອນ</th>
                        <th >ວັນທີ່ສ້າງຕັ້ງ</th>
                        <th >ວັນທີ່ໝົດໃບອະນຸຍາດ</th>
                        <th>ສະໂລແກນ</th>
                        <th >ເຄື່ອງມື</th>
                    </tr>
                    <?php
                    
                        $sqlsearch = "select * from company";
                        $resultsearch = mysqli_query($link,$sqlsearch);
                        while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $row['com_id']; ?></td>
                        <td><?php echo $row['com_name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['fax']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                           <a href="<?php echo $row['website'];?>" target="_blank">
                                <?php echo $row['website']; ?>
                           </a>
                        </td>
                        <td>
                            <a href="../../Stock/Management/images/<?php echo $row['certificate']; ?>">
                                <img src="../../Stock/Management/images/<?php echo $row['certificate']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                            </a>
                        </td>
                        <td>
                            <a href="../../Stock/Management/images/<?php echo $row['tax']; ?>">
                                <img src="../../Stock/Management/images/<?php echo $row['tax']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                            </a>
                        </td>
                        <td>
                            <a href="../../Stock/Management/images/<?php echo $row['licenses']; ?>">
                                <img src="../../Stock/Management/images/<?php echo $row['licenses']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                            </a>
                        </td>
                        <td>
                            <a href="../../Stock/Management/images/<?php echo $row['logo']; ?>">
                                <img src="../../Stock/Management/images/<?php echo $row['logo']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                            </a>
                        </td>
                        <td><?php echo $row['tax_id']; ?></td>
                        <td><?php echo $row['establishment']; ?></td>
                        <td><?php echo $row['exp_licenses']; ?></td>
                        <td><?php echo $row['slogan']; ?></td>
                        <td>
                            <a href="updatecompany.php?com_id=<?php echo $row['com_id'];?>">
                                <img src="../../image/Edit.png" width="20px">
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
    </div>
     
      

  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
