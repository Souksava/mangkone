<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['ppy_id'])){
                $id = $_GET['ppy_id'];
                $sqlckcash = "select ppy_id from acc_unit where ppy_id='$id';";
                $resultckcash = mysqli_query($link, $sqlckcash);
                if(mysqli_num_rows($resultckcash) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດຊັບສົມບັດນີ້ໄດ້ ເນື່ອງຈາກປະເພດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການໝວດບັນຊີແລ້ວ');";
                    echo"window.location.href='acc_property.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from acc_property where ppy_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                        echo"window.location.href='acc_property.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='acc_property.php';";
                        echo"</script>";
                    }
               }
           }  
?>
