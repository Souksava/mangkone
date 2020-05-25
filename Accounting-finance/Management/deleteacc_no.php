<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['acc_id'])){
                $id = $_GET['acc_id'];
                $sqlckpo = "select acc_id from podetail where acc_id='$id';";
                $resultckpo = mysqli_query($link, $sqlckpo);
                $sqlckcr = "select acc_id from receiptdetail where acc_id='$id';";
                $resultckcr = mysqli_query($link, $sqlckcr);
                $sqlcksalary = "select acc_id from receiptdetail where acc_id='$id';";
                $resultcksalary = mysqli_query($link, $sqlcksalary);
                $sqlckcash = "select acc_id from cash_receipt where acc_id='$id';";
                $resultckcash = mysqli_query($link, $sqlckcash);
                if(mysqli_num_rows($resultckpo) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບເລກທີບັນຊີນີ້ໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຈ່າຍແລ້ວ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckcr) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບເລກທີບັນຊີນີ້ໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຮັບແລ້ວ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultcksalary) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບເລກທີບັນຊີນີ້ໄດ້ ເນື່ອງຈາກເລກຊີບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການເບີກຈ່າຍເງິນເດືອນແລ້ວ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckcash) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບເລກທີບັນຊີນີ້ໄດ້ ເນື່ອງຈາກເລກທີບັນຊີນີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຮັບແລ້ວ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from acc_no where acc_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='acc_no.php';";
                    echo"</script>";
                    }
               }
           }  
?>
