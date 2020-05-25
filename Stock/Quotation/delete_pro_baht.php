<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['quodet_id'])){
                echo $id = $_GET['quodet_id'];
                    $sqldel = "delete from listquotationdetail2 where quodet_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                        echo"window.location.href='quotation_pro_baht.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ລົບລາຍການສຳເລັດ');";
                        echo"window.location.href='quotation_pro_baht.php';";
                        echo"</script>";
                    }
          }  
?>
