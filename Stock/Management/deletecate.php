<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['cate_id'])){
                $id = $_GET['cate_id'];
                $sqlckcate = "select cate_id from products where cate_id='$id';";
                $resultckcate = mysqli_query($link, $sqlckcate);
                if(mysqli_num_rows($resultckcate) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບປະເພດສິນຄ້ານີ້ໄດ້ເນື່ອງຈາກປະເພດສິນຄ້ານີ້ໄດ້ຖືກໃຊ້ຢູ່ໃນຂໍ້ມູນສິນຄ້າແລ້ວ');";
                    echo"window.location.href='CateAndUnit.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from category where cate_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບປະເພດສິນຄ້າບໍ່ສຳເລັດ');";
                    echo"window.location.href='CateAndUnit.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='CateAndUnit.php';";
                    echo"</script>";
                    }
                }
           }  
?>
