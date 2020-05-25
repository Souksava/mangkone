<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['pdet_id'])){
                echo $id = $_GET['pdet_id'];
                    $sqldel = "delete from listpurchasedetail where pdet_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                        echo"window.location.href='frmpo.php';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"alert('ລົບລາຍການສຳເລັດ');";
                        echo"window.location.href='frmpo.php';";
                        echo"</script>";
                    }
                
          }  
?>
