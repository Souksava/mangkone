<?php 
            require '../../ConnectDB/connectDB.php';
         
                $id = $_GET['pro_id'];
                $sqldel = "delete from listorder where pro_id='$id';";
                $resultdel = mysqli_query($link, $sqldel);
                if(!$resultdel)
                {
                echo"<script>";
                echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                echo"window.location.href='frmorder2.php';";
                echo"</script>";
                }
                else{
                echo"<script>";
                echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                echo"window.location.href='frmorder2.php';";
                echo"</script>";
                }
          
?>
