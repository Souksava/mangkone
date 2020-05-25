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
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍງານລູກຄ້າໃກ້ຈະໝົດສັນຍາ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Report.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍງານລູກຄ້າໃກ້ຈະໝົດສັນຍາ
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
                    <b>ລາຍງານລູກຄ້າໃກ້ຈະໝົດສັນຍາ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
            </div>
            <br>
      </div>
    <div class="clearfix"></div><br>
    <?php
            $sqlcompany = "select * from company;";
            $resultcompany = mysqli_query($link,$sqlcompany);
            $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font12b">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1300px;">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 15px;">ລະຫັດ</th>
                    <th style="width: 150px;">ຊື່ບໍລິສັດ</th>
                    <th style="width: 300px;">ທີ່ຕັ້ງບໍລິສັດ</th>
                    <th style="width: 120px;">ເບີໂທຕິດຕໍ່</th>
                    <th style="width: 120px;">ແຟັກ</th>
                    <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                    <th style="width: 100px;">ວັນທີໝົດສັນຍາ</th>
                    <th style="width: 100px;">ວັນທີ່ຍັງເຫຼືອ</th>
                    <th style="width: 80px;">ໃບສັນຍາ</th>
                </tr>
                <?php
                    $sqlsearch = "select cus_id,company,address,tel,fax,email,end_promise,img_path,end_promise,datediff(end_promise,'$Date') as day from customers where datediff(end_promise,'$Date')<= 30;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['cus_id']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['fax'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['end_promise'];?></td>
                    <td>
                        <?php 
                            if($row['day'] <= 0){
                                echo "ລູກຄ້າໝົດສັນຍາ";
                            }
                            else {
                                echo $row['day'];
                            }
                        ?>
                    </td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
