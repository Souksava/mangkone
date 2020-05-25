<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['cus_id'])){
                $id = $_GET['cus_id'];
                $sqlck = "select cus_id from distribute where cus_id='$id';";
                $resultck = mysqli_query($link, $sqlck);
                $sqlck2 = "select cus_id from backdistribute where cus_id='$id';";
                $resultck2 = mysqli_query($link, $sqlck2);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບລູກຄ້ານີ້ໄດ້ ເນື່ອງຈາກລູກຄ້ານີ້ໄດ້ມີຂໍ້ມູນຢູ່ໃນການເກັບສິນຄ້າໝົດສັນຍາ');";
                    echo"window.location.href='Customers.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultck2) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບລູກຄ້ານີ້ໄດ້ ເນື່ອງຈາກລູກຄ້ານີ້ໄດ້ມີຂໍ້ມູນຢູ່ໃນການເບີກຈ່າຍສິນຄ້າແລ້ວ');";
                    echo"window.location.href='Customers.php';";
                    echo"</script>";
                }
               else{
                    $sqlsec = "select img_path from customers where cus_id='$id'";
                    $resultsec = mysqli_query($link, $sqlsec); 
                    $data = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                    $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data['img_path'];
                    if(file_exists($path) && !empty($data['img_path'])){
                        unlink($path);
                    }
                    $sqldel = "delete from customers where cus_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນລູກຄ້າບໍ່ສຳເລັດ');";
                    echo"window.location.href='Customers.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='Customers.php';";
                    echo"</script>";
                    }
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