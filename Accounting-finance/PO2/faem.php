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
    <title>ແຟ້ມໃບສະເໜີ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="po.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແຟ້ມລາຍການໃບສະເໜີ
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
                <b>ແຟ້ມລາຍການໃບສະເໜີ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
            <div class="col-xs-12 col-sm-6 form-group" align="right">
                <form action="faem.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ ເລກທີ, ຊື່ຜູ້ສະເໜີ, ສະກຸນເງິນ, ວັນທີ">
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container font12b">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>ເລກທີ PO</th>
                    <th>ຜູ້ສະເໜີ</th>
                    <th>ຍອດລວມ</th>
                    <th>ສະກຸນເງິນ</th>
                    <th>ລົງວັນທີ</th>
                    <th>ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select purchase_id,emp_name,amount,p.rate_id,po_date from purchase_order p left join employees e on p.emp_id=e.emp_id where purchase_id like '$search' or emp_name like '$search' or po_date like '$search' or rate_id";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['purchase_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo number_format($row['amount'],2); ?></td>
                    <td><?php echo $row['rate_id']; ?></td>
                    <td><?php echo $row['po_date']; ?></td>
                    <td>
                        <a href="faemdetail.php?purchase_id=<?php echo $row['purchase_id']; ?>">
                            <img src="../../image/info.png" width="25px">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlsum = "select count(purchase_id) as qty,sum(amount) as totalkip from purchase_order where rate_id='LAK';";
                    $resultsum = mysqli_query($link, $sqlsum);
                    $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
                    $sqlsum2 = "select sum(amount) as totalbaht from purchase_order where rate_id='THB';";
                    $resultsum2 = mysqli_query($link, $sqlsum2);
                    $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
                    $sqlsum3 = "select sum(amount) as totalus from purchase_order where rate_id='USD';";
                    $resultsum3 = mysqli_query($link, $sqlsum3);
                    $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
                ?>
                <tr class="danger" style="font-size: 16px;">
                    <th colspan="" >ລວມລາຍການ: <?php echo $rowsum['qty']; ?></th>
                    <th colspan="2"  style="text-align: center;">ຍອດລວມ: <?php echo number_format($rowsum['totalkip'],2); ?> ກີບ</th>
                    <th colspan="2"  style="text-align: center;">ຍອດລວມ: <?php echo number_format($rowsum2['totalbaht'],2); ?> ບາດ</th>
                    <th colspan=""  style="text-align: center;">ຍອດລວມ: <?php echo number_format($rowsum3['totalus'],2); ?> ໂດລາ</th>
                </tr>
            </table>
        </div>
    </div>
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
