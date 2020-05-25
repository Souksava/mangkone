<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['cash_id'])){
                    $id = $_GET['cash_id'];
                    $sqlsec = "select img_path from listcash_receipt where cash_id='$id';";
                    $resultsec = mysqli_query($link, $sqlsec);
                    $data = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                    $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data['img_path'];
                    if(file_exists($path) && !empty($data['img_path'])){
                        unlink($path);
                    }
                    $sqldel = "delete from listcash_receipt where cash_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                    echo"window.location.href='revenue_baht.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບລາຍການສຳເລັດ');";
                    echo"window.location.href='revenue_baht.php';";
                    echo"</script>";
                    }
                
          }  
?>
