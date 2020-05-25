<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['pro_id'])){
                echo $id = $_GET['pro_id'];
                $sqlckid = "select pro_id from stock where pro_id='$id';";
                $resultckid = mysqli_query($link, $sqlckid);
                if(mysqli_num_rows($resultckid) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດລົບສິນຄ້ານີ້ໄດ້ເນື່ອງຈາກສິນຄ້ານີ້ເຄີຍມີ ຫຼື ຢູ່ໃນສາງສິນຄ້າແລ້ວ');";
                    echo"window.location.href='Product.php';";
                    echo"</script>";
                }
                else{
                    $sqlsec = "select img_path from products where pro_id='$id'";
                    $resultsec = mysqli_query($link, $sqlsec);
                    $data = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                    $path = __DIR__.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$data['img_path'];
                    if(file_exists($path) && !empty($data['img_path'])){
                        unlink($path);
                    }
                    $sqldel = "delete from products where pro_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບສິນຄ້າບໍ່ສຳເລັດ');";
                    echo"window.location.href='Product.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບສິນຄ້າສຳເລັດ');";
                    echo"window.location.href='Product.php';";
                    echo"</script>";
                    }
                }
          }  
?>
