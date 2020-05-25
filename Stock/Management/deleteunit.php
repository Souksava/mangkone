<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['unit_id'])){
                $id = $_GET['unit_id'];
                $sqlckunit = "select unit_id from products where unit_id='$id';";
                $resultckunit = mysqli_query($link, $sqlckunit);
                if(mysqli_num_rows($resultckunit) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຫົວໜ່ວຍສິນຄ້ານີ້ໄດ້ ເນື່ອງຈາກຫົວໜ່ວຍສິນຄ້ານີ້ມີຢູ່ໃນຂໍ້ມູນສິນຄ້າແລ້ວ');";
                    echo"window.location.href='CateAndUnit.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from unit where unit_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
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
