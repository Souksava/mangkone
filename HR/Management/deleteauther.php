<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['auther_id'])){
                $id = $_GET['auther_id'];
                $sqlckcate = "select auther_id from employees where auther_id='$id';";
                $resultckcate = mysqli_query($link, $sqlckcate);
                if(mysqli_num_rows($resultckcate) > 0){
                    echo"<script>";
                    echo"alert('Can not to delete this auther because this auther has in employees');";
                    echo"window.location.href='auther.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from auther where auther_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('Delete data Fail');";
                    echo"window.location.href='auther.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('Delete data successfully');";
                    echo"window.location.href='auther.php';";
                    echo"</script>";
                    }
                }
           }  
?>
