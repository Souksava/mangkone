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
    <title>ຈັດການຂໍ້ມູນລູກຄ້າ</title>
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
                ຈັດການຂໍ້ມູນລູກຄ້າ
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
                <b>ລູກຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
            </div>
            <div class="col-xs-12 col-sm-6" align="right">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <form action="Customers.php" method="POST" id="form1" enctype="multipart/form-data">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຂໍ້ມູນລູກຄ້າ</b></h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            <input type="text" name="company" class="form-control" placeholder="ຊື່ບໍລິສັດ">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input type="text" name="address" class="form-control" placeholder="ທີ່ຕັ້ງບໍລິສັດ">
                                        </div> 
                                        <div class="col-xs-12 form-group">
                                            <input type="text" name="tel" class="form-control" placeholder="ເບີໂທຕິດຕໍ່">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input type="text" name="fax" class="form-control" placeholder="ເບີແຟັກ">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input type="email" class="form-control" name="email" placeholder="ທີ່ຢູ່ອີເມວ">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <label>ວັນທີໝົດສັນຍາ</label>
                                            <input type="date" class="form-control" name="end_promise">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <label>ວັນທີວາງບິນ</label>
                                            <input type="date" class="form-control" name="invoice_date">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input type="file" class="form-control" name="img_path">
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
            $company = $_POST['company'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $end_promise = $_POST['end_promise'];
            $invoice_date = $_POST['invoice_date'];
            if(trim($invoice_date) == ""){
                $invoice_date = "0000-00-00";
            }
            if(trim($company) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຊື່ບໍລິສັດ');";
                echo"window.location.href='Customers.php';";
                echo"</script>";
            }
            elseif(trim($address) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນຂໍ້ມູນທີ່ຕັ້ງບໍລິສັດ');";
                echo"window.location.href='Customers.php';";
                echo"</script>";
            }
            elseif(trim($tel) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນເບີໂທລະສັບ');";
                echo"window.location.href='Customers.php';";
                echo"</script>";
            }
            else{
                $sqlckemail = "select email from customers where email='$email';";
                $resultckemail = mysqli_query($link, $sqlckemail);
                if(mysqli_num_rows($resultckemail) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດໃຊ້ອີເມວນີ້ໄດ້ເນື່ອງຈາກອີເມວນີ້ມີຢູ່ແລ້ວ, ກະລຸນາໃສ່ອີເມວອື່ນທີ່ແຕກຕ່າງ');";
                    echo"window.location.href='Customers.php';";
                    echo"</script>";
                }
                else{
                    $ext = pathinfo(basename($_FILES["img_path"]["name"]), PATHINFO_EXTENSION);
                    $new_image_name = "img_".uniqid().".".$ext;
                    $image_path = "../../Stock/Management/images/";
                    $upload_path = $image_path.$new_image_name;
                    move_uploaded_file($_FILES["img_path"]["tmp_name"], $upload_path);
                    $pro_img = $new_image_name;
                    $sql = "insert into customers(company,address,tel,fax,email,end_promise,img_path,invoice_date) values('$company','$address','$tel','$fax','$email','$end_promise','$pro_img','$invoice_date');";
                    $result = mysqli_query($link, $sql);
                    if(!$result)
                    {
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ກະລຸນາກວດສອບການປ້ອນຂໍ້ມູນອີກຄັ້ງ..!');";
                        echo"window.location.href='Customers.php';";
                        echo"</script>";
                    }
                    else{    
                        echo"<script>";
                        echo"alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='Customers.php';";
                        echo"</script>";
                    }
        
                }
            }

        }

    ?>
    <div class="container">
            <div class="row">
                <form action="Customers.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ ລະຫັດ, ຊື່ບໍລິສັດ, ອີເມວ">
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
    </div>
    <div class="clearfix"></div><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 25px">ລະຫັດ</th>
                    <th style="width: 180px">ບໍລິສັດ</th>
                    <th style="width: 400px;">ທີ່ຕັ້ງບໍລິສັດ</th>
                    <th style="width: 120px">ເບີໂທຕິດຕໍ່</th>
                    <th style="width: 120px">ເບີແຟັກ</th>
                    <th style="width: 100px">ອີເມວ</th>
                    <th style="width: 100px">ວັນທີໝົດສັນຍາ</th>
                    <th style="width: 80px">ວັນທີວາງບິນ</th>
                    <th style="width: 80px">ສັນຍາຫຼັກຖານ</th>
                    <th width="75px">ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select * from customers where cus_id like '$search' or company like '$search'  or email like '$search';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['cus_id']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['fax']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['end_promise']; ?></td>
                    <td><?php echo $row['invoice_date']; ?></td>
                    <td>
                        <a href="../../Stock/Management/images/<?php echo $row['img_path']; ?>">
                            <img src="../../Stock/Management/images/<?php echo $row['img_path']; ?>" width="50px" height="50px" alt="" class="img-circle" /><br>
                        </a>
                    </td>
                    <td>
                        <a href="UpdateCus.php?cus_id=<?php echo $row['cus_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deletecus.php?cus_id=<?php echo $row['cus_id']; ?>">
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
