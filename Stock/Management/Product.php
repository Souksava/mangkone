
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
    <title>ສິນຄ້າ</title>
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
                ຂໍ້ມູນສິນຄ້າ
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
                    <b>ສິນຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="Product.php" method="POST" id="form1" enctype="multipart/form-data">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຂໍ້ມູນສິນຄ້າ</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="pro_id" placeholder="ລະຫັດສິນຄ້າ ຫຼື ບາໂຄດ">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="pro_name" placeholder="ຊື່ສິນຄ້າ">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="number" min="0" class="form-control" name="price" placeholder="ລາຄາຂາຍເງິນກີບ">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="number" min="0" class="form-control" name="price_baht" placeholder="ລາຄາຂາຍເງິນບາດ">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <input type="number" min="0" class="form-control" name="price_us" placeholder="ລາຄາຂາຍເງິນໂດລາ">
                                            </div> 
                                            <div class="col-xs-12 form-group">
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
                                            <div class="col-xs-12 form-group">
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
                                            <div class="col-xs-12 form-group">
                                                <input type="number" name="qtyalert" class="form-control" min="0" placeholder="ເງື່ອນໄຂການສັ່ງຊື້">
                                            </div>
                                            <div class="col-xs-12 form-group" align="center">
                                                <label>ເລືອກຮູບພາບສິນຄ້າ</label>
                                                <input type="file" class="form-control" name="imgs" />
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btnSave" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnSave'])){
                            $pro_id = $_POST['pro_id'];
                            $pro_name = $_POST['pro_name'];
                            $price = $_POST['price'];
                            $price_baht = $_POST['price_baht'];
                            $price_us = $_POST['price_us'];
                            $cate_id = $_POST['cate_id'];
                            $unit_id = $_POST['unit_id'];
                            $qtyalert = $_POST['qtyalert'];

                            if(trim($pro_id) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນລະຫັດສິນຄ້າ');";
                                echo"window.location.href='Product.php';";
                                echo"</script>";
                            }
                            elseif(trim($pro_name) == ""){
                                echo"<script>";
                                echo"alert('ກູລຸນາປ້ອນຊື່ສິນຄ້າ');";
                                echo"window.location.href='Product.php';";
                                echo"</script>";
                            }
                            elseif(trim($price) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນລາຄາ');";
                                echo"window.location.href='Product.php';";
                                echo"</script>";
                            }
                            elseif(trim($cate_id) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາເລືອກປະເພດສິນຄ້າ');";
                                echo"window.location.href='Product.php';";
                                echo"</script>";
                            }
                            elseif(trim($unit_id) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາເລືອກຫົວໜ່ວຍສິນຄ້າ');";
                                echo"window.location.href='Product.php';";
                                echo"</script>";
                            }
                            elseif(trim($qtyalert) == ""){
                                echo"<script>";
                                echo"alert('ກະລຸນາປ້ອນເງື່ອນໄຂການສັ່ງຊື້');";
                                echo"window.location.href='Product.php';";
                                echo"</script>";
                            }
                            else{
                                $sqlckid = "select pro_id from product where pro_id='$pro_id';";
                                $resultckid = mysqli_query($link, $sqlckid);
                                if(mysqli_num_rows($resultckid) > 0){
                                    echo"<script>";
                                    echo"alert('ບໍ່ສາມາດເພີ່ມສິນຄ້າໄດ້ເນື່ອງຈາກລະຫັດສິນຄ້ານີ້ມີຢູ່ແລ້ວ, ກະລຸນາປ້ອນລະຫັດສິນຄ້າທີ່ແຕກຕ່າງ');";
                                    echo"window.location.href='Product.php';";
                                    echo"</script>";
                                }else{
                                    $ext = pathinfo(basename($_FILES["imgs"]["name"]), PATHINFO_EXTENSION);
                                    $new_image_name = "img_".uniqid().".".$ext;
                                    $image_path = "images/";
                                    $upload_path = $image_path.$new_image_name;
                                    move_uploaded_file($_FILES["imgs"]["tmp_name"], $upload_path);
                                    $pro_img = $new_image_name;
                                    $sql = "insert into products(pro_id,pro_name,price,price_baht,price_us,cate_id,unit_id,qtyalert,img_path) values('$pro_id','$pro_name','$price','$price_baht','$price_us','$cate_id','$unit_id','$qtyalert','$pro_img');";
                                    $result = mysqli_query($link, $sql);
                                    if(!$result)
                                    {
                                        echo"<script>";
                                        echo"alert('ເພີ່ມຂໍ້ມູນບໍ່ສຳເລັດ');";
                                        echo"window.location.href='Product.php';";
                                        echo"</script>";
                                    }
                                    else{    
                                        echo"<script>";
                                        echo"alert('ເພີ່ມຂໍ້ມູນສຳເລັດ');";
                                        echo"window.location.href='Product.php';";
                                        echo"</script>";
                                    }                
                                }
                            }
                        }
                    ?>
                </div>
            </div>
            <br>
      </div> 
      <div class="container">
            <div class="row">
                <form action="Product.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
      </div>
    <div class="clearfix"></div><br>
    <?php
        $search = "%".$_POST['search']."%";
        $sqlselect = "select pro_id,pro_name,price,price_baht,price_us,cate_name,unit_name,qtyalert,img_path from products p join category c on p.cate_id=c.cate_id join unit u on p.unit_id=u.unit_id where pro_id like '$search' or pro_name like '$search' or cate_name like '$search' or unit_name like '$search' order by pro_name asc; ";
        $resultselect = mysqli_query($link,$sqlselect);
        while($row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC)){
    ?>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row font14">
                    <div class="form-group">
                        <a href="images/<?php echo $row['img_path']?>">
                            <img src="images/<?php echo $row['img_path']; ?>" alt="" width="80px" height="80px" class="img-circle imagelist" />
                        </a>
                        <div style="margin-left: 90px">
                            <label>
                                ລະຫັດສິນຄ້າ ຫູື ບາໂຄດ: <?php echo $row['pro_id'] ?> <br>
                                ຊື່ສິນຄ້າ:  <?php echo $row['pro_name'] ?> <?php echo $row['cate_name'] ?> <br>
                                ລາຄາ:  <?php echo number_format($row['price']); ?> ກີບ  ລາຄາ:  <?php echo number_format($row['price_baht']); ?> ບາດ  ລາຄາ:  <?php echo number_format($row['price_us']); ?> ໂດລາ<br>
                                ເງື່ອນໄຂການສັ່ງຊື້:  <?php echo $row['qtyalert'] ?> <?php echo $row['unit_name'] ?> <br>
                            </label><br>
                            <a href="updatePro.php?pro_id=<?php echo $row['pro_id'];?>"> 
                                <img src="../../image/Edit.png" width="23px" align="left">
                            </a>
                            <a href="deletePro.php?pro_id=<?php echo $row['pro_id'];?>">
                                <img src="../../image/Delete.png" alt="" width="24px">
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <?php
        }
        mysqli_close($link);
    ?>
     
      

  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
