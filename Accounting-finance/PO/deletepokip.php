<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['no_'])){
                echo $id = $_GET['no_'];
                    $sqlsec = "select img_path from listpodetail where no_='$id';";
                    $resultsec = mysqli_query($link, $sqlsec);
                    $data = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                    $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data['img_path'];
                    if(file_exists($path) && !empty($data['img_path'])){
                        unlink($path);
                    }
                    $sqldel = "delete from listpodetail where no_='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                    echo"window.location.href='pokip.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບລາຍການສຳເລັດ');";
                    echo"window.location.href='pokip.php';";
                    echo"</script>";
                    }
                
          }  
?>
