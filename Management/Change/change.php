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
    <title>ປ່ຽນລະຫັດຜ່ານ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="../Main.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                <b>ປ່ຽນລະຫັດຜ່ານ</b>
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
     <div class="container" >
        <div style="float: left;width: 260px;">
           <a href="#" data-toggle="modal" data-target="#myModal1">
                <img src="../../Stock/Management/images/<?php echo $_SESSION['img_path']; ?>" width="200px" height="200px" alt="" class="img-circle imagelist"  />
           </a>
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <img src="../../Stock/Management/images/<?php echo $_SESSION['img_path']; ?>" width="100%"  class="img-circle imagelist" />
                </div>
            </div>
            <br><br><br><br> <br><br><br><br> <br><br>
           <p style="margin-left: 50px;" class="font18" >
                <a href="#" data-toggle="modal" data-target="#myModal2">
                    ປ່ຽນຮູບປະຈຳຕົວ
                </a>
                <form action="change.php" id="formImage" method="POST" enctype="multipart/form-data">
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເລືອກຮູບ</b></h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            <input type="file" class="form-control" name="img_path">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="btnimg" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
           </p>
          <?php
             if(isset($_POST['btnimg'])){
                $emp_id = $_SESSION['emp_id'];
                if($_FILES['img_path']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
                {
                    echo"<script>";
                    echo"window.location.href='change.php';";
                    echo"</script>";
                } 
                else{
                     //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                     $sqlsec = "select img_path from employees where emp_id='$emp_id';";
                     $resultsec = mysqli_query($link, $sqlsec);
                     $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                     $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                     if(file_exists($path) && !empty($data2['img_path'])){
                         unlink($path);
                     }
                     //ສິ້ນສຸດ
                     //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                     $ext = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                     $new_image_name = 'img_'.uniqid().".".$ext;
                     $image_path = "../../Stock/Management/images/";
                     $upload_path = $image_path.$new_image_name;
                     move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path);
                     $pro_image = $new_image_name;
                     //ສິນສຸດການຕັ້ງຊື່
                     $sql = "update employees set img_path='$pro_image' where emp_id ='$emp_id';";
                     $result1 = mysqli_query($link, $sql);
                     if(!$result1)
                     {
                        echo"<script>";
                        echo"alert('ບໍ່ສາມາດປ່ຽນຮູບປະຈຳຕົວໄດ້');";
                        echo"window.location.href='change.php';";
                        echo"</script>";
                     }
                     else{
                         
                        echo"<script>";
                        echo"alert('ປ່ຽນຮູບປະຈຳຕົວສຳເລັດ');";
                        echo"window.location.href='../../Check/logout.php';";
                        echo"</script>";
                     }
                }
            }
          ?>
        </div>
        <div class="font18" style="float: left;">
            <?php
                $emp_id = $_SESSION['emp_id'];
                $sql = "select emp_id,emp_name,emp_surname,gender,dob,address,tel,email,start_work,salary,auther_name from employees e join auther a on e.auther_id=a.auther_id where e.emp_id='$emp_id';";
                $result = mysqli_query($link,$sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            ?><br>
            <b>ລະຫັດພະນັກງານ: </b><?php echo $row['emp_id'];?><b> ຊື່ພະນັກງານ: </b><?php echo $row['emp_name'];?><b> ນາມສະກຸນ: </b> <?php echo $row['emp_surname'];?><br>
            <b> ເພດ: </b><?php echo $row['gender'];?><b> ວັນເດືອນປີເກີດ: </b><?php echo $row['dob'];?><br>
            <b>ທີ່ຢູ່ປັດຈຸບັນ: </b><?php echo $row['address'];?><br>
            <b> ເບີໂທລະສັບ: </b><?php echo $row['tel'];?><b> ອີເມວ: </b><?php echo $row['email'];?><br><b> ວັນເຂົ້າເຮັດວຽກ: </b><?php echo $row['start_work'];?> 
            <b> ຕຳແໜ່ງ: </b><?php echo $row['auther_name'];?><b> ເງິນເດືອນ: </b><?php echo $row['salary'];?> <br>

        </div>
     </div>
     <div class="clearfix"></div>
     <div class="container font16">
            <form action="change.php" method="POST" id="formpass">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label>ລະຫັດຜ່ານເກົ່າ</label><br>
                        <input type="password" name="oldpass" class="form-control" placeholder="ລະຫັດຜ່ານເກົ່າ">
                    </div>
                    <div class="col-xs-12 form-group">
                        <label>ລະຫັດຜ່ານໃໝ່</label><br>
                        <input type="password" name="newpass" class="form-control" placeholder="ລະຫັດຜ່ານໃໝ່">
                    </div>
                    <div class="col-xs-12 form-group">
                        <label>ຢືນຢັນລະຫັດຜ່ານໃໝ່</label><br>
                        <input type="password" name="confirmpass" class="form-control" placeholder="ຢືນຢັນລະຫັດຜ່ານໃໝ່">
                    </div>
                    <div class="col-xs-12 form-group">
                        <button type="submit" name="btnchange" class="btn btn-warning">ປ່ຽນລະຫັດຜ່ານ</button>
                    </div>
                </div>
            </form>
     </div>
    <?php
        if(isset($_POST['btnchange'])){
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $confirmpass = $_POST['confirmpass'];
            $email = $_SESSION['email'];
            if(trim($oldpass) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລະຫັດຜ່ານເກົ່າ');";
                echo"window.location.href='change.php';";
                echo"</script>";
            }
            elseif(trim($newpass) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນລະຫັດຜ່ານໃໝ່');";
                echo"window.location.href='change.php';";
                echo"</script>";
            }
            elseif(trim($confirmpass) == ""){
                echo"<script>";
                echo"alert('ກະລຸນາປ້ອນການຢືນຢັນລະຫັດຜ່ານໃໝ່');";
                echo"window.location.href='change.php';";
                echo"</script>";
            }
            else{
                $sql = "select pass from employees where Email = '$email';";
                $resultget = mysqli_query($link, $sql);
                $oldpass2 = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
                if(trim($oldpass) != trim($oldpass2['pass'])){
                    echo"<script>";
                    echo"alert('ລະຫັດຜ່ານເກົ່າຂອງທ່ານບໍຖືກຕ້ອງ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ');";
                    echo"window.location.href='change.php';";
                    echo"</script>";
                }
                elseif(trim($newpass) != trim($confirmpass)) {
                    echo"<script>";
                    echo"alert('ລະຫັດຜ່ານໃໝ່ບໍຕົງກັນກະລຸນາລອງໃໝ່ອີກຄັ້ງ');";
                    echo"window.location.href='change.php';";
                    echo"</script>";
                }
                else {
                   $sqlpass = "update employees set pass='$confirmpass' where email='$email';";
                   $resultpass = mysqli_query($link,$sqlpass);
                   if(!$resultpass){
                        echo"<script>";
                        echo"alert('ເກີດຂໍ້ຜິດພາດກະລຸນາລອງໃໝ່ອີກຄັ້ງ');";
                        echo"window.location.href='change.php';";
                        echo"</script>";
                   }
                   else {
                        echo"<script>";
                        echo"alert('ປ່ຽນລະຫັດຜ່ານສຳເລັດ');";
                        echo"window.location.href='change.php';";
                        echo"</script>";
                   }
                }
            }
        }
    ?>

      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
