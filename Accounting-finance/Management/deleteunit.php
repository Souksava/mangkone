<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['unit_id'])){
                $id = $_GET['unit_id'];
                $sqlckpo = "select unit_id from acc_no where unit_id='$id';";
                $resultckpo = mysqli_query($link, $sqlckpo);
                if(mysqli_num_rows($resultckpo) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດບັນຊີນີ້ໄດ້ ເນື່ອງຈາກໝວດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການເລກທີບັນຊີແລ້ວ');";
                    echo"window.location.href='acc_unit.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from acc_unit where unit_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='acc_unit.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='acc_unit.php';";
                    echo"</script>";
                    }
               }
           }  
?>
