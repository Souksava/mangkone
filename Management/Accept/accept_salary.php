
<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 3){
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
    <title>ອະນຸມັດ</title>
    <LINK REL="SHORTC UT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="accept.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ອະນຸມັດເບີກຈ່າຍເງິນເດືອນ
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
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="warning">
                    <th>
                        ເລກທີ
                    </th>
                    <th>
                        ຜູ້ສະເໜີ
                    </th>
                    <th>
                        ລວມ
                    </th>
                    <th>
                        ປະຈຳເດືອນ
                    </th>
                    <th>
                        ລົງວັນທີ
                    </th>
                    <th>
                        ສະຖານະ
                    </th>
                    <th>
                        ຫຼັກຖານ
                    </th>
                    <th></th>
                </tr>
                <?php
                      $sql = "select sry_id,emp_name,amount,sal_date,sal_mon,s.status,s.img_path from salary s left join employees e on e.emp_id=s.emp_id where s.status='ຍັງບໍ່ອະນຸມັດ';";
                      $result = mysqli_query($link,$sql);
                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['sry_id'] ?></td>
                    <td><?php echo $row['emp_name'] ?></td>
                    <td><?php echo number_format($row['amount'],2) ?></td>
                    <td><?php echo $row['sal_mon'] ?></td>
                    <td><?php echo $row['sal_date'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                    <td>
                        <a href="accept_salary_detail.php?sry_id=<?php echo $row['sry_id'] ?>">
                            <img src="../../image/info.png" alt="" width="25px">&nbsp&nbsp
                        </a>
                    </td>
                </tr>
               <?php
                      }
               ?>
            </table>
        </div>
    </div>
  
      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
