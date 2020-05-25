<?php 
            require '../../ConnectDB/connectDB.php';
         
                $id = $_GET['ot_id'];
                $sqldel = "delete from listot where ot_id='$id';";
                $resultdel = mysqli_query($link, $sqldel);
                if(!$resultdel)
                {
                echo"<script>";
                echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                echo"window.location.href='frmot.php';";
                echo"</script>";
                }
                else{
                echo"<script>";
                echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                echo"window.location.href='frmot.php';";
                echo"</script>";
                }
          
?>
