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
    <title>ແກ້ໄຂຂໍ້ມູນ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="Product.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
               ແກ້ໄຂຂໍ້ມູນສິນຄ້າ
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
    <div class="container font16">
    <?php 
       $id = $_GET['pro_id'];
       $sqlselect = "select pro_id,pro_name,price,price_baht,price_us,p.cate_id,cate_name,p.unit_id,unit_name,qtyalert,img_path from products p join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id where pro_id='$id';";
       $resultselect = mysqli_query($link,$sqlselect);
       $row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC);
    ?>
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <div class="row">
                    <form action="updatePro.php" method="POST" id="form1" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="hidden" name="pro_id" value="<?php echo $row['pro_id'];?>" />
                            <input type="text" value="<?php echo $row['pro_name'];?>" class="form-control" name="pro_name" placeholder="ຊື່ສິນຄ້າ">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="number" value="<?php echo $row['price'];?>" class="form-control" name="price" placeholder="ລາຄາຂາຍເງິນກີບ">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="number" min="0" value="<?php echo $row['price_baht'];?>" class="form-control" name="price_baht" placeholder="ລາຄາຂາຍເງິນບາດ">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="number" min="0" value="<?php echo $row['price_us'];?>" class="form-control" name="price_us" placeholder="ລາຄາຂາຍເງິນໂດລາ">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <select name="cate_id" id="" class="form-control">
                                <option value="<?php echo $row['cate_id'];?>"><?php echo $row['cate_name'];?></option>
                                <?php
                                    $cate = $row['cate_id'];
                                    $sqlcate = "select * from category where cate_id != '$cate';";
                                    $resultcate = mysqli_query($link, $sqlcate);
                                    while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                                        echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
                                    }
                                ?>
                            </select>
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <select name="unit_id" id="" class="form-control">
                                <option value="<?php echo $row['unit_id'];?>"><?php echo $row['unit_name'];?></option>
                                <?php
                                    $unit = $row['unit_id'];
                                    $sqlunit = "select * from unit where unit_id != '$unit';";
                                    $resultunit = mysqli_query($link, $sqlunit);
                                    while($rowunit = mysqli_fetch_array($resultunit, MYSQLI_NUM)){
                                        echo" <option value='$rowunit[0]'>$rowunit[1]</option>";
                                    }
                                ?>
                                
                            </select>
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="number" value="<?php echo $row['qtyalert'];?>" class="form-control" name="qtyalert" placeholder="ເງື່ອນໄຂການສັ່ງຊື້">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group" align="left">
                            <label>ເລືອກຮູບພາບສິນຄ້າ</label>
                            <input type="file" name="imgs" />
                        </div>
                        <div class="col-xs-12" align="center">
                            <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $pro_id = $_POST['pro_id'];
            $pro_name = $_POST['pro_name'];
            $price = $_POST['price'];
            $price_baht = $_POST['price_baht'];
            $price_us = $_POST['price_us'];
            $cate_id = $_POST['cate_id'];
            $unit_id = $_POST['unit_id'];
            $qtyalert = $_POST['qtyalert'];
            if($_FILES['imgs']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
            {
                // ຖ້າຟາຍເປັນຄ່າວ່າງໃຫ້ທຳການອັບເດດຊື່ເປັນໂຕເກົ່າ
                $sqlimg = "select img_path from products where pro_id='$pro_id';";
                $resultimg = mysqli_query($link, $sqlimg);
                $data = mysqli_fetch_array($resultimg, MYSQLI_ASSOC);
                $pro_image = $data['img_path'];
                // ສິນສຸດ
                $sql = "update products set pro_name='$pro_name',price='$price',price_baht='$price_baht',price_us='$price_us', cate_id='$cate_id',unit_id='$unit_id',qtyalert='$qtyalert',img_path='$pro_image' where pro_id ='$pro_id';";
                $result = mysqli_query($link, $sql);
                     if(!$result)
                         {
                           echo"<script>";
                           echo"alert('Can not to Update data please checking your input data');";
                           echo"window.location.href='Product.php';";
                          echo"</script>";
                          }
                        else{
                            echo"<script>";
                            echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                            echo"window.location.href='Product.php';";
                            echo"</script>";
                        }
            } 
            else{
                 //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                 $sqlsec = "select img_path from products where pro_id='$pro_id';";
                 $resultsec = mysqli_query($link, $sqlsec);
                 $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                 $path = __DIR__.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                 if(file_exists($path) && !empty($data2['img_path'])){
                     unlink($path);
                 }
                 //ສິ້ນສຸດ
                 //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                 $ext = pathinfo(basename($_FILES['imgs']['name']), PATHINFO_EXTENSION);
                 $new_image_name = 'img_'.uniqid().".".$ext;
                 $image_path = "images/";
                 $upload_path = $image_path.$new_image_name;
                 move_uploaded_file($_FILES['imgs']['tmp_name'], $upload_path);
                 $pro_image = $new_image_name;
                 //ສິນສຸດການຕັ້ງຊື່
                 $sql = "update products set pro_name='$pro_name',price='$price',price_baht='$price_baht',price_us='$price_us', cate_id='$cate_id',unit_id='$unit_id',qtyalert='$qtyalert',img_path='$pro_image' where pro_id ='$pro_id';";
                 $result1 = mysqli_query($link, $sql);
                 if(!$result1)
                 {
                    echo"<script>";
                    echo"alert('Can not to Update data please checking your input data');";
                    echo"window.location.href='Product.php';";
                    echo"</script>";
                 }
                 else{
                     
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='Product.php';";
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
