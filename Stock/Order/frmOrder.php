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
    <title>ສັ່ງຊື້</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Order.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ສັ່ງຊື້
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
        <div class="row" align="center">
            <form action="frmOrder.php" method="POST" id="form1">
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="pro_id" placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                </div>
                <div class="col-md-12 form-group">
                    <select name="cate_id" id="" class="form-control">
                        <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                        <?php
                            $sqlcate = "select * from category;";
                            $resultcate = mysqli_query($link, $sqlcate);
                            while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                            echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <select name="unit_id" id="" class="form-control">
                        <option value="">ເລືອກຫົວໜ່ວຍສິນຄ້າ</option>
                        <?php
                            $sqlunit = "select * from unit;";
                            $resultunit = mysqli_query($link, $sqlunit);
                            while($rowunit = mysqli_fetch_array($resultunit, MYSQLI_NUM)){
                            echo" <option value='$rowunit[0]'>$rowunit[1]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-success" name="btnSearch" style="width: 90%;">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        ຄົ້ນຫາ
                    </button>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" name="btnCheck" class="btn btn-info" style="width: 90%;">
                        ສິນຄ້າໃກ້ຈະໝົດ
                    </button>
                </div>
                <div class="col-md-12 form-group">
                   <a href="document.php" class="btn btn-warning" style="width: 90%;">ເກັບຫຼັກຖານການສັ່ງຊື້</a>
                </div>
            </form>
        </div>
        <hr width="90%" />
    </div>
    <div class="container">
        <?php
            if(isset($_POST['btnSearch'])){
            $pro_id = $_POST['pro_id'];
            $cate_id = $_POST['cate_id'];
            $unit_id = $_POST['unit_id'];
            $sqlsearch = "select pro_id,pro_name,cate_name,unit_name,qtyalert,img_path from products p join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id where pro_id='$pro_id' or p.cate_id='$cate_id' or p.unit_id='$unit_id';";
            $resultsearch = mysqli_query($link,$sqlsearch);
            while($rowsearch = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
        ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row font14">
                        <div class="form-group">
                            <img src="../Management/images/<?php echo $rowsearch['img_path']; ?>" width="80px" height="80px" class="img-circle imagelist" />    
                            <div style="margin-left: 90px">
                                <label>
                                    ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ: <?php echo $rowsearch['pro_id']; ?> <br>
                                    ຊື່:  <?php echo $rowsearch['pro_name']; ?> ປະເພດ: <?php echo $rowsearch['cate_name']; ?> <br> 
                                    ເງື່ອນໄຂການສັ່ງຊື້:  <?php echo $rowsearch['qtyalert']; ?>  <?php echo $rowsearch['unit_name']; ?><br>
                                </label><br>
                                <a href="frmorder2.php?pro_id=<?php echo $rowsearch['pro_id'] ?>" class="btn btn-warning" style="width: 250px;">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                    ສັ່ງຊື້ 
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        <?php
                }
            }
            if(isset($_POST['btnCheck'])){
                $sqlck = "select * from ckeckorder_view where qty < qtyalert;";
                $resultck = mysqli_query($link, $sqlck);
                while($rowck = mysqli_fetch_array($resultck, MYSQLI_ASSOC)){
            ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row font14">
                            <div class="form-group">
                                <img src="../Management/images/<?php echo $rowck['img_path']; ?>" width="80px" height="80px" class="img-circle imagelist" />
                                <div style="margin-left: 90px">
                                    <label>
                                        ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ: <?php echo $rowck['pro_id']; ?> <br>
                                        ຊື່:  <?php echo $rowck['pro_name']; ?> ປະເພດ: <?php echo $rowck['cate_name']; ?> <br> 
                                        ເງື່ອນໄຂການສັ່ງຊື້:  <?php echo $rowck['qtyalert']; ?>  <?php echo $rowck['unit_name']; ?><br>
                                    </label><br>
                                    <a href="frmorder2.php?pro_id=<?php echo $rowck['pro_id'] ?>" class="btn btn-warning" style="width: 250px;">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        ສັ່ງຊື້ 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            <?php
                }
            }
        ?>
    </div>
      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/bootstrap.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
