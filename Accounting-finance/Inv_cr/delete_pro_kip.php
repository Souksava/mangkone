<?php 
            require '../../ConnectDB/connectDB.php';
           if(isset($_GET['indet_id'])){
                echo $id = $_GET['indet_id'];
                    $sqlget = "select * from listinvoicedetail2 where indet_id='$id';";
                    $resultget = mysqli_query($link, $sqlget);
                    $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
                    $qty = $rowget['qty'];
                    $pro_id = $rowget['pro_id'];
                    $serial = $rowget['serial'];
                    $sqlstock = "update stock set qty=qty+'$qty' where pro_id='$pro_id' and serial='$serial';";
                    $result = mysqli_query($link, $sqlstock);
                    $sqldel = "delete from listinvoicedetail2 where indet_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                    echo"<script>";
                    echo"alert('ລົບລາຍການບໍ່ສຳເລັດ');";
                    echo"window.location.href='invoice_pro_kip.php';";
                    echo"</script>";
                    }
                    else{
                    echo"<script>";
                    echo"alert('ລົບລາຍການສຳເລັດ');";
                    echo"window.location.href='invoice_pro_kip.php';";
                    echo"</script>";
                    }
          }  
?>
