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
    <title>Document</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="frmOrder.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                Document
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
      <div class="clearfix"></div>
     <!-- head -->
     <br>
    <div class="container font16">
        <div class="table-responsive">
            <table class="table table-striped" style="text-align: center;">
                <tr>
                    <th>ເລກທີໃບສັ່ງຊື້</th>
                    <th>ຜູ້ສັ່ງຊື້</th>
                    <th>ຜູ້ສະໜອງ</th>
                    <th>ລວມຈຳນວນ</th>
                    <th>ວັນທີສັ່ງຊື້</th>
                    <th>ເວລາສັ່ງຊື້</th>
                    <th>ສະຖານະ</th>
                    <th>ສຳເນົາຫຼັກຖານ</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    $sqlsel = "select billno,emp_name,company,amount,dateorder,timeorder,o.status,o.img_path from orders o join employees e on o.emp_id=e.emp_id join supplier s on o.sup_id=s.sup_id where o.status='ອະນຸມັດ';";
                    $resultsel = mysqli_query($link,$sqlsel);
                    while($row = mysqli_fetch_array($resultsel,MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['billno'];?></td>
                    <td><?php echo $row['emp_name'];?></td>
                    <td><?php echo $row['company'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><?php echo $row['dateorder'];?></td>
                    <td><?php echo $row['timeorder'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <img src="../Management/images/<?php echo $row['img_path'];?>" width="50px" height="50px" alt="" class="img-circle" />
                    </td>
                    <form  action="document.php?billno=<?php echo $row['billno'];?>" id="form1" method="POST" enctype="multipart/form-data">
                        <td>
                            <div class="form-group">
                                <input type="file" name="img_path" class="form-control">
                            </div> 
                        </td>
                        <td>
                            <button type="submit" name="btnUpload" class="btn btn-success">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                            </button>
                        </td>
                    </form>
                </tr>
                <?php
                    }

                if(isset($_POST['btnUpload'])){
                    $billno = $_GET['billno'];
                    if($_FILES['img_path']['name'] == ""){
                        echo"<script>";
                        echo"alert('ກະລຸນາໃສ່ພາບຫຼັກຖານການສັ່ງຊື້');";
                        echo"window.location.href='document.php';";
                        echo"</script>";
                    }
                    else{
                        //ລົບຟາຍເກົ່າທີ່ເຄີຍມີ
                            $sqlsec = "select img_path from orders where billno='$billno';";
                            $resultsec = mysqli_query($link, $sqlsec);
                            $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                            $path = __DIR__.DIRECTORY_SEPARATOR.'../Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                            if(file_exists($path) && !empty($data2['img_path'])){
                                unlink($path);
                            }
                        //ສິ້ນສຸດ
                        //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                        $ext = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                        $new_image_name = 'img_'.uniqid().".".$ext;
                        $image_path = "../Management/images/";
                        $upload_path = $image_path.$new_image_name;
                        move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path);
                        $pro_image = $new_image_name;
                        //ສິນສຸດການຕັ້ງຊື່
                        $sql = "update orders set img_path='$pro_image' where billno ='$billno';";
                        $result1 = mysqli_query($link, $sql);
                        if(!$result1)
                        {
                           echo"<script>";
                           echo"alert('ບໍ່ສາມາດອັບໂຫລດຫຼັກຖານໄດ້ກະກຸນາກວດສອບຟາຍພາບອີກຄັ້ງ');";
                           echo"window.location.href='document.php';";
                           echo"</script>";
                        }
                        else{
                            
                           echo"<script>";
                           echo"alert('ອັບໂຫລດພາບຫຼັກຖານສຳເລັດ');";
                           echo"window.location.href='document.php';";
                           echo"</script>";
                        }
                   
                    }
                }
                ?>
            </table>
        </div>
    </div>
      <div class="clearfix"></div><br>
      <!-- body -->
  
      <!-- body -->
  </body>
  <script src="../../js/bootstrap.min.js" type="javascript"></script>
  <script src="../../js/bootstrap.js" type="javascript"></script>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/style.js"></script>
</html>
