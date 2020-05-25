<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['app_id'])){
                $id = $_GET['app_id'];
               
                    $sqldel = "delete from applyemp where app_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('Delete data Fail');";
                    echo"window.location.href='apply.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('Delete data successfully');";
                    echo"window.location.href='apply.php';";
                    echo"</script>";
                    }  
           }  
?>
