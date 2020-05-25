<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['sdet_id'])){
                echo $id = $_GET['sdet_id'];
                    $sqldel = "delete from listsalarydetail where sdet_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                    echo"window.location.href='frmsalary.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບລາຍການສຳເລັດ');";
                    echo"window.location.href='frmsalary.php';";
                    echo"</script>";
                    }
                
          }  
?>
