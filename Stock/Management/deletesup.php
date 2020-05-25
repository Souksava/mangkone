<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['sup_id'])){
                $id = $_GET['sup_id'];
                $sqlck = "select sup_id from orders where sup_id='$id';";
                $resultck = mysqli_query($link, $sqlck);
                $sqlck2 = "select sup_id from imports where sup_id='$id';";
                $resultck2 = mysqli_query($link, $sqlck2);
                $sqlck3 = "select sup_id from claim where sup_id='$id';";
                $resultck3 = mysqli_query($link, $sqlck3);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຜູ້ສະໜອງນີ້ໄດ້ ເນື່ອງຈາກຜູ້ສະໜອງນີ້ມີຂໍ້ມູນຢູ່ໃນການສັ່ງຊື້ແລ້ວ');";
                    echo"window.location.href='Supplier.php';";
                    echo"</script>";
                }
                elseif(mysqli_num_rows($resultck2) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຜູ້ສະໜອງນີ້ໄດ້ ເນື່ອງຈາກຜູ້ສະໜອງນີ້ມີຂໍ້ມູນຢູ່ໃນການນຳເຂົ້າສິນຄ້າແລ້ວ');";
                    echo"window.location.href='Supplier.php';";
                    echo"</script>";
                }
                elseif(mysqli_num_rows($resultck3) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຜູ້ສະໜອງນີ້ໄດ້ ເນື່ອງຈາກຜູ້ສະໜອງນີ້ມີຂໍ້ມູນຢູ່ໃນການສົ່ງສິນຄ້າເຄມແລ້ວ');";
                    echo"window.location.href='Supplier.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from supplier where sup_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='Supplier.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='Supplier.php';";
                    echo"</script>";
                    }
                }
           }  
?>
