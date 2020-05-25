<?php 
            require '../../ConnectDB/connectDB.php';
                $id = $_GET['emp_id'];
                $sqlck = "select emp_id from distribute where emp_id='$id';";
                $resultck = mysqli_query($link, $sqlck);
                $sqlckback = "select emp_id from backdistribute where emp_id='$id';";
                $resultckback = mysqli_query($link, $sqlckback);
                $sqlckch = "select emp_id from chsalary where emp_id='$id';";
                $resultckch = mysqli_query($link, $sqlckch);
                $sqlckclaim = "select emp_id from claim where emp_id='$id';";
                $resultckclaim = mysqli_query($link, $sqlckclaim);
                $sqlckimp = "select emp_id from imports where emp_id='$id';";
                $resultckimp = mysqli_query($link, $sqlckimp);
                $sqlckorder = "select emp_id from orders where emp_id='$id';";
                $resultckorder = mysqli_query($link, $sqlckorder);
                $sqlckpo = "select emp_id from po where emp_id='$id';";
                $resultckpo = mysqli_query($link, $sqlckpo);
                $sqlckrc = "select emp_id from receipt where emp_id='$id';";
                $resultckrc = mysqli_query($link, $sqlckrc);
                $sqlcksal = "select emp_id from salary where emp_id='$id';";
                $resultcksal = mysqli_query($link, $sqlcksal);
                $sqlcksald = "select emp_id from salarydetail where emp_id='$id';";
                $resultcksald = mysqli_query($link, $sqlcksald);
                $sqlckinvoice = "select emp_id from invoice where emp_id='$id';";
                $resultckinvoice = mysqli_query($link, $sqlckinvoice);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"alert('Can not delete this employees because this employee ID had in other data');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckback) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການເກັບຄືນສິນຄ້າໝົດສັນຍາແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckch) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການປັບປ່ຽນເງິນເດືອນແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckclaim) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການເບີກຈ່າຍສິນຄ້າແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckimp) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການນຳເຂົ້າສິນຄ້າແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckorder) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການສັ່ງຊື້ສິນຄ້າແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckpo) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການເຮັດບັນຊີລາຍຈ່າຍແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckrc) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການເຮັດບັນຊີລາຍຮັບແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultcksal) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການເບີກຈ່າຍເງິນເດືອນແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultcksald) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການຮັບເງິນເດືອນແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckinvoice) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພະນັກງານນີ້ໄດ້ເຄື່ອນໄຫວໃນການວາງບິນແລ້ວ');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
               else{
                    $sqlsec = "select img_path from employees where emp_id='$id'";
                    $resultsec = mysqli_query($link, $sqlsec); 
                    $data = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                    $path = __DIR__.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$data['img_path'];
                    if(file_exists($path) && !empty($data['img_path'])){
                        unlink($path);
                    }
                    $sqldel = "delete from employees where emp_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('Delete Data Fail');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('Delete Successfuly');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                    } 
               }
?>
<html>
    <head>
        <title>
            ລົບຂໍ້ມູນ
        </title>
        <link href="../../css/bootstrap.css"  rel="stylesheet" />
   
   <link href="../../css/style.css"  rel="stylesheet" />
   <link href="../../fonts/glyphicons-halflings-regular.ttf" />
   <link href="../../fonts/Phetsarath_OT.ttf" />
    </head>
    <body>
            <div align="center" class="fontblack16"><br>
                <img src="../../image/Maiythuang.png" width="100px"><br>
                <h3  >
                ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດນີ້ໄດ້ເຄື່ອນໄຫວໃນລະບົບແລ້ວ<br>
                ກະລຸນາລົບການເຄື່ອນໄຫວຂອງລະຫັດນີ້ໃນລະບົບອອກໃຫ້ໝົດກ່ອນຈຶ່ງສາມາດລົບລະຫັດນີ້ໄດ້
                </h3>
                <a href="employees.php" class="btn btn-primary">ກັບໄປໜ້າເກົ່າ</a>
            </div>
    </body>
</html>