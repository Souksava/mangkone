<?php 
            require '../../ConnectDB/connectDB.php';
                $id = $_GET['ot_id'];
                $sqlck = "select * from ot where status='ອະນຸມັດ' and ot_id='$id';";
                $resutck = mysqli_query($link,$sqlck);
              if(mysqli_num_rows($resutck) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກລາຍການນີ້ໄດ້ອະນຸມັດແລ້ວ');";
                    echo"window.location.href='acceptot.php';";
                    echo"</script>";
              }
              else{
                    $sqldel = "delete from ot where ot_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                        echo"window.location.href='acceptot.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='acceptot.php';";
                        echo"</script>";
                    }
              }
          
?>
