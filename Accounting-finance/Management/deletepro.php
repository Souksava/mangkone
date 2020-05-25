<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['pro_id'])){
                $id = $_GET['pro_id'];
                $sqlckpo = "select pro_id from invoicedetail where pro_id='$id';";
                $resultckpo = mysqli_query($link, $sqlckpo);
                $sqlckcr = "select pro_id from receiptdetail where pro_id='$id';";
                $resultckcr = mysqli_query($link, $sqlckcr);
                if(mysqli_num_rows($resultckpo) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບສິນຄ້ານີ້ໄດ້ ເນື່ອງຈາກສິນຄ້ານີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການວາງບິນແລ້ວ');";
                    echo"window.location.href='acc_product.php';";
                    echo"</script>";
                }
                else if(mysqli_num_rows($resultckcr) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບສິນຄ້ານີ້ໄດ້ ເນື່ອງຈາກສິນຄ້ານີ້ໄດ້ນຳໃຊ້ຢູ່ລາຍການບັນຊີລາຍຮັບແລ້ວ');";
                    echo"window.location.href='acc_product.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from acc_product where pro_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
                        echo"window.location.href='acc_product.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
                        echo"window.location.href='acc_product.php';";
                        echo"</script>";
                    }
               }
           }  
?>
