<?php 
    require '../../ConnectDB/connectDB.php';
           if(isset($_GET['dept_id'])){
                $id = $_GET['dept_id'];
                $sqlckcate = "select dept_id from auther where dept_id='$id';";
                $resultckcate = mysqli_query($link, $sqlckcate);
                if(mysqli_num_rows($resultckcate) > 0){
                    echo"<script>";
                    echo"alert('Can not to delete this department because this department has in auther);";
                    echo"window.location.href='department.php';";
                    echo"</script>";
                }
                else{
                    $sqldel = "delete from department where dept_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('Delete data Fail');";
                    echo"window.location.href='department.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('Delete data successfully');";
                    echo"window.location.href='department.php';";
                    echo"</script>";
                    }
                }
           }  
?>
