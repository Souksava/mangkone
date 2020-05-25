<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['service_id'])){
                    $id = $_GET['service_id'];
                    $sqldel = "delete from service where service_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='service.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='service.php';";
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