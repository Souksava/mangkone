<?php
    require '../../ConnectDB/connectDB.php';
    $id = $_GET['No_'];
    $sqlget = "select * from listimp where No_='$id';";
    $resultget = mysqli_query($link,$sqlget);
    $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
    $pro_id = $row['pro_id'];
    $serial = $row['serial'];
    $sqllist = "delete from listimp where No_='$id';";
    $resultlist = mysqli_query($link,$sqllist);
    if(!$resultlist){
        echo"<script>";
        echo"alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');";
        echo"window.location.href='import2.php';";
        echo"</script>";
    }
    else {
        $sqlstock = "delete from stock where pro_id='$pro_id' and serial='$serial';";
        $resultstock = mysqli_query($link,$sqlstock);
        echo"<script>";
        echo"alert('ລົບຂໍ້ມູນສຳເລັດ');";
        echo"window.location.href='import2.php';";
        echo"</script>";
    }
?>