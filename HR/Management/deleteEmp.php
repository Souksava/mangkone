<?php 
            require '../../ConnectDB/connectDB.php';
                $id = $_GET['emp_id'];
                $sqlck = "select emp_id from distribute where emp_id='$id';";
                $resultck = mysqli_query($link, $sqlck);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"alert('Can not delete this employees because this employee ID had in other data');";
                    echo"window.location.href='employees.php';";
                    echo"</script>";
                }
               else{
                    $sqlsec = "select img_path from employees where emp_id='$id'";
                    $resultsec = mysqli_query($link, $sqlsec); 
                    $data = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                    $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data['img_path'];
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