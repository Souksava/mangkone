<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['rate_id'])){
                $id = $_GET['rate_id'];
                $sqlckpo = "select rate_id from podetail where rate_id='$id';";
                $resultckpo = mysqli_query($link, $sqlckpo);
                $sqlckcr = "select rate_id from receiptdetail where rate_id='$id';";
                $resultckcr = mysqli_query($link, $sqlckcr);
                $sqlcksalary = "select rate_id from receiptdetail where rate_id='$id';";
                $resultcksalary = mysqli_query($link, $sqlcksalary);
                $sqlckimp = "select rate_id from imports where rate_id='$id';";
                $resultckimp = mysqli_query($link, $sqlckimp);
                $sqlckcash = "select rate_id from cash_receipt where rate_id='$id';";
                $resultckcash = mysqli_query($link, $sqlckcash);
                if(mysqli_num_rows($resultckpo) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດບັນຊີນີ້ໄດ້ ເນື່ອງຈາກໝວດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຈ່າຍແລ້ວ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckcr) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດບັນຊີນີ້ໄດ້ ເນື່ອງຈາກໝວດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຮັບແລ້ວ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultcksalary) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດບັນຊີນີ້ໄດ້ ເນື່ອງຈາກໝວດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການເບີກຈ່າຍເງິນເດືອນແລ້ວ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckimp) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດບັນຊີນີ້ໄດ້ ເນື່ອງຈາກໝວດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການເບີກຈ່າຍເງິນເດືອນແລ້ວ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckcash) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບໝວດບັນຊີນີ້ໄດ້ ເນື່ອງຈາກໝວດບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຮັບແລ້ວ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from rate where rate_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='rate.php';";
                    echo"</script>";
                    }
               }
           }  
?>
