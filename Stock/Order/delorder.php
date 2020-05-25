<?php 
            require '../../ConnectDB/connectDB.php';
         
                $bill = $_POST['billno'];
                $sqlck = "select * from orders where billno='$bill' and status='ຍັງບໍ່ອະນຸມັດ';";
                $resultck = mysqli_query($link, $sqlck);
               if(mysqli_num_rows($resultck) > 0){
                    $sqldel = "delete from orderdetail where billno='$bill';";
                    $resultdel = mysqli_query($link, $sqldel);
                    $sqldel2 = "delete from orders where billno='$bill'";
                    $resultdel2 = mysqli_query($link, $sqldel2);
                    if(!$resultdel2)
                    {
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                        echo"window.location.href='accept.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='accept.php';";
                        echo"</script>";
                    }
               }
               else{
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບລາຍການນີ້ໄດ້ ເນື່ອງຈາກລາຍການນີ້ມີການອະນຸມັດແລ້ວ');";
                    echo"window.location.href='accept.php';";
                    echo"</script>";
               }
            
          
?>
