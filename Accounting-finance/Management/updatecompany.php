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
                <a href="company.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ແກ້ໄຂຂໍ້ມູນ
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
    <?php
        $id = $_GET['com_id'];
        $sqlget = "select * from company where com_id='$id';";
        $resultget = mysqli_query($link,$sqlget);
        $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    ?>
    <div class="container font16">
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <form action="updatecompany.php" method="POST" id="formupdate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ຊື່ວິສາຫະກິດ</label><br>
                            <input type="hidden" name="com_id" value="<?php echo $row['com_id']; ?>">
                            <input type="text" class="form-control" name="com_name" value="<?php echo $row['com_name']; ?>" placeholder="ຊື່ວິສາຫະກິດ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ທີ່ຕັ້ງ</label><br>
                            <input type="text"  class="form-control" name="address" value="<?php echo $row['address']; ?>" placeholder="ທີ່ຕັ້ງ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ເບີໂທ</label><br>
                            <input type="text" class="form-control" name="tel" value="<?php echo $row['tel']; ?>" placeholder="ເບີໂທ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ເບີແຟັກ</label><br>
                            <input type="text" min="1" class="form-control" name="fax" value="<?php echo $row['fax']; ?>" placeholder="ເບີແຟັກ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ອີເມວ</label><br>
                            <input type="email" min="1" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="ອີເມວ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ທີ່ຢູ່ເວັບໄຊ</label><br>
                            <input type="text" class="form-control" name="website" value="<?php echo $row['website']; ?>" placeholder="ທີ່ຢູ່ເວັບໄຊ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ໃບຢັ້ງຢືນ</label><br>
                            <input type="file" class="form-control" name="certificate" >
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ໃບອາກອນ</label><br>
                            <input type="file" class="form-control" name="tax" >
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ໃບອະນຸຍາດ</label><br>
                            <input type="file" class="form-control" name="licenses">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ໂລໂກ້</label><br>
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ເລກທີພາສີອາກອນ</label><br>
                            <input type="text" class="form-control" name="tax_id" value="<?php echo $row['tax_id']; ?>" placeholder="ເລກທີພາສີອາກອນ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ວັນສ້າງຕັ້ງ</label><br>
                            <input type="date"class="form-control" name="establishment" value="<?php echo $row['establishment']; ?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ວັນໝົດອາຍຸໃບອະນຸຍາດ</label><br>
                            <input type="date" class="form-control" name="exp_licenses" value="<?php echo $row['exp_licenses']; ?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                            <label>ສະໂລແກນ</label><br>
                            <input type="text" class="form-control" name="slogan" value="<?php echo $row['slogan']; ?>" placeholder="ສະໂລແກນ">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group" align="center">
                            <button type="submit" name="btnUpdate" class="btn btn-success" style="width: 300px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
        if(isset($_POST['btnUpdate'])){
            $com_id = $_POST['com_id'];
            $com_name = $_POST['com_name'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $website = $_POST['website'];
            $tax_id = $_POST['tax_id'];
            $establishment = $_POST['establishment'];
            $exp_licenses = $_POST['exp_licenses'];
            $slogan = $_POST['slogan'];
            $certificate = $_FILES['certificate']['name'];
            $tax = $_FILES['tax']['name'];
            $licenses = $_FILES['licenses']['name'];
            $logo = $_FILES['logo']['name'];
            if($certificate == "" and $tax == "" and $licenses == "" and $logo == ""){
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }       
            elseif ($certificate != "" and $tax == "" and $licenses == "" and $logo == "") {
                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($certificate != "" and $tax != "" and $licenses == "" and $logo == "") {
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($certificate != "" and $tax != "" and $licenses != "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($certificate != "" and $tax != "" and $licenses == "" and $logo != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($certificate != "" and $tax == "" and $licenses != "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
        
                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດhh');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($certificate != "" and $tax == "" and $licenses != "" and $logo != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($certificate != "" and $tax == "" and $licenses == "" and $logo != "") {
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
               
                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate == "" and $licenses == "" and $logo == "") {
              
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate != "" and $licenses == "" and $logo == "") {
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate != "" and $licenses != "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate != "" and $licenses == "" and $logo != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;

                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate == "" and $licenses != "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate == "" and $licenses != "" and $logo != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($tax != "" and $certificate == "" and $licenses == "" and $logo != "") {
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;

                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax == "" and $certificate == "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax != "" and $certificate == "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax != "" and $certificate != "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax != "" and $certificate == "" and $logo != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax == "" and $certificate != "" and $logo == "") {
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',licenses='$pro_image2',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax == "" and $certificate != "" and $logo != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($licenses != "" and $tax == "" and $certificate == "" and $logo != "") {
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;

                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax == "" and $licenses == "" and $certificate == "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax != "" and $licenses == "" and $certificate == "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax != "" and $licenses != "" and $certificate == "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',tax='$pro_image3' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax != "" and $licenses == "" and $certificate != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
         
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax == "" and $licenses != "" and $certificate == "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax == "" and $licenses != "" and $certificate != "") {
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            elseif ($logo != "" and $tax == "" and $licenses == "" and $certificate != "") {
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
              

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
            }
            else{
                //ເມື່ອປ່ຽນຮູບພາບແລ້ວລົບພາບເກົ່າ
                $sqlsec = "select logo from company where com_id='$com_id';";
                $resultsec = mysqli_query($link, $sqlsec);
                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['logo'];
                if(file_exists($path) && !empty($data2['logo'])){
                    unlink($path);
                }
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);
                $new_image_name = 'img_'.uniqid().".".$ext;
                $image_path = "../../Stock/Management/images/";
                $upload_path = $image_path.$new_image_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_path);
                $pro_image = $new_image_name;
            
                $sqlsec2 = "select licenses from company where com_id='$com_id';";
                $resultsec2 = mysqli_query($link, $sqlsec2);
                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['licenses'];
                if(file_exists($path2) && !empty($data3['licenses'])){
                    unlink($path2);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext2 = pathinfo(basename($_FILES['licenses']['name']), PATHINFO_EXTENSION);
                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                $image_path2 = "../../Stock/Management/images/";
                $upload_path2 = $image_path2.$new_image_name2;
                move_uploaded_file($_FILES['licenses']['tmp_name'], $upload_path2);
                $pro_image2 = $new_image_name2;
            
                $sqlsec3 = "select tax from company where com_id='$com_id';";
                $resultsec3 = mysqli_query($link, $sqlsec3);
                $data4 = mysqli_fetch_array($resultsec3, MYSQLI_ASSOC);
                $path3 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data4['tax'];
                if(file_exists($path3) && !empty($data4['tax'])){
                    unlink($path3);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext3 = pathinfo(basename($_FILES['tax']['name']), PATHINFO_EXTENSION);
                $new_image_name3 = 'img_'.uniqid().".".$ext3;
                $image_path3 = "../../Stock/Management/images/";
                $upload_path3 = $image_path3.$new_image_name3;
                move_uploaded_file($_FILES['tax']['tmp_name'], $upload_path3);
                $pro_image3 = $new_image_name3;

                $sqlsec4 = "select certificate from company where com_id='$com_id';";
                $resultsec4 = mysqli_query($link, $sqlsec4);
                $data5 = mysqli_fetch_array($resultsec4, MYSQLI_ASSOC);
                $path4 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data5['certificate'];
                if(file_exists($path4) && !empty($data5['certificate'])){
                    unlink($path4);
                }
                //ສິ້ນສຸດ
                //ຕັ້ງຊື່ຮູບພາບອັດຕະໂນມັດ
                $ext4 = pathinfo(basename($_FILES['certificate']['name']), PATHINFO_EXTENSION);
                $new_image_name4 = 'img_'.uniqid().".".$ext4;
                $image_path4 = "../../Stock/Management/images/";
                $upload_path4 = $image_path4.$new_image_name4;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_path4);
                $pro_image4 = $new_image_name4;
                $sql = "update company set com_name='$com_name',address='$address',tel='$tel',fax='$fax',email='$email',website='$website',tax_id='$tax_id',establishment='$establishment',exp_licenses='$exp_licenses',slogan='$slogan',logo='$pro_image',licenses='$pro_image2',tax='$pro_image3',certificate='$pro_image4' where com_id='$com_id';";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້');"; 
                    echo"window.location.href='company.php';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');"; 
                    echo"window.location.href='company.php';";
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
