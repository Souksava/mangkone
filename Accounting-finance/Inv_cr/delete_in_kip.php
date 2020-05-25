<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['indet_id'])){
                echo $id = $_GET['indet_id'];
                    $sqldel = "delete from listinvoicedetail where indet_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                    echo"window.location.href='invoice_in_kip.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບລາຍການສຳເລັດ');";
                    echo"window.location.href='invoice_in_kip.php';";
                    echo"</script>";
                    }
          }  
?>
