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
    <title>ແຟ້ມລາຍຈ່າຍ</title>
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
                ແຟ້ມລາຍຈ່າຍ
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
                <b>ແຟ້ມລາຍຈ່າຍ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
            <div class="col-xs-12 col-sm-6 form-group" align="right">
                <form action="faem.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ ເລກທີ, ຊື່ຜູ້ລົງບັນຊີ, ວັນທີ, ສະຖານະການຈ່າຍ">
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
                    <th>ເລກທີໃບລາຍຈ່າຍ</th>
                    <th>ຜູ້ລົງບັນຊີ</th>
                    <th>ເງິນກີບ</th>
                    <th>ເງິນບາດ</th>
                    <th>ເງິນໂດລາ</th>
                    <th>ລົງວັນທີ</th>
                    <th>ເວລາ</th>
                    <th>ສະຖານະການຈ່າຍ</th>
                    <th>ຫຼັກຖານ</th>
                    <th colspan="2">ອັບໂຫຼດຫຼັກຖານ</th>
                    <th>ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select po_id,emp_name,kip_amount,baht_amount,us_amount,po_date,po_time,p.status,p.img_path from po p left join employees e on p.emp_id=e.emp_id where emp_name like '$search' or po_id like '$search' or po_date like '$search' or p.status like '$search' order by po_id asc;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['po_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo number_format($row['kip_amount'],2); ?></td>
                    <td><?php echo number_format($row['baht_amount'],2); ?></td>
                    <td><?php echo number_format($row['us_amount'],2); ?></td>
                    <td><?php echo $row['po_date']; ?></td>
                    <td><?php echo $row['po_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                    <form action="faem.php" method="POST" id="uploadfile" enctype="multipart/form-data">
                        <td>
                                <input type="file" name="img_path" class="form-control">
                                <input type="hidden" name="po_id" value="<?php echo $row['po_id']; ?>">
                        </td>
                        <td>
                                <button type="submit" name="btnUpload" class="btn btn-primary">ອັບໂຫຼດ</button>
                            
                        </td>
                    </form>
                    <td>
                        <a href="faemdetail.php?po_id=<?php echo $row['po_id']; ?>">
                            <img src="../../image/info.png" width="25px">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    $sqlsum = "select count(po_id) as qty,sum(kip_amount) as totalkip,sum(baht_amount) as totalbaht,sum(us_amount) as totalus from po;";
                    $resultsum = mysqli_query($link, $sqlsum);
                    $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
                ?>
                <tr class="danger" style="font-size: 16px;">
                    <th colspan="2" >ລວມລາຍການ: <?php echo $rowsum['qty']; ?></th>
                    <th colspan="4"  style="text-align: center;">ຍອດລວມ: <?php echo number_format($rowsum['totalkip'],2); ?> ກີບ</th>
                    <th colspan="3"  style="text-align: center;">ຍອດລວມ: <?php echo number_format($rowsum['totalbaht'],2); ?> ບາດ</th>
                    <th colspan="3"  style="text-align: center;">ຍອດລວມ: <?php echo number_format($rowsum['totalus'],2); ?> ໂດລາ</th>
                </tr>
            </table>
        </div>
    </div>
    <?php
        if(isset($_POST['btnUpload'])){
            $po_id = $_POST['po_id'];
            if($_FILES['img_path']['name'] == ""){
                echo"<script>";
                echo"alert('ກະລຸນາໃສ່ພາບຫຼັກຖານການເຮັດບັນຊີລາຍຈ່າຍ');";
                echo"window.location.href='faem.php';";
                echo"</script>";
            }
            else{
                //ລົບຟາຍເກົ່າທີ່ເຄີຍມີ
                $sqlsec = "select img_path from po where po_id='$po_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                if(file_exists($path) && !empty($data2['img_path'])){
                    unlink($path);
                }
                //ສິ້ນສຸດ
                $ext = pathinfo(basename($_FILES["img_path"]["name"]), PATHINFO_EXTENSION);
                $new_image_name = "img_".uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES["img_path"]["tmp_name"], $upload_path);
                $pro_img = $new_image_name;
                $sqlupload = "update po set img_path='$pro_img' where po_id='$po_id';";
                $resultupload = mysqli_query($link, $sqlupload);
                if(!$resultupload){
                    echo"<script>";
                    echo"alert('ອັບໂຫຼດຫຼັກຖານຜິດພາດ');";
                    echo"window.location.href='faem.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ອັບໂຫຼດຫຼັກຖານສຳເລັດ');";
                    echo"window.location.href='faem.php';";
                    echo"</script>";
                }
            }
        }
    ?>
      

  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
