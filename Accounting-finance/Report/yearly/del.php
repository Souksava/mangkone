<?php 
    require '../../../ConnectDB/connectDB.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sqldel = "delete from listyearly where id='$id';";
        $resultdel = mysqli_query($link, $sqldel);
        if(!$resultdel)
        {
            echo"<script>";
            echo"window.location.href='saveyearly.php';";
            echo"</script>";
        }
        else{
            echo"<script>";
            echo"window.location.href='saveyearly.php';";
            echo"</script>";
        }         
    }  
?>
