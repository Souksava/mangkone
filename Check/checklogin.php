<?php
    session_start();
    include("../ConnectDB/connectDB.php");
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
     //$pass = md5($_POST['pass']);


    $sql1 = "select * from employees where email='$email' and pass='$pass';";
    $resultck = mysqli_query($link, $sql1);
   //$num1 = MYSQLI_NUM_ROWS($sql1);
         if($email == "")
         {
                 echo"<script>";
                 echo"alert('ກະລຸນາໃສ່ອີເມວຜູ້ໃຊ້');";
                 echo"window.location.href='../index.php';";
                 echo"</script>";
         }
             else if($pass == "")
             {
                 echo"<script>";
                 echo"alert('ກະລຸນາໃສ່ລະຫັດຜູ້ໃຊ້');";
                 echo"window.location.href='../index.php';";
                 echo"</script>";
             }
             else if(!mysqli_num_rows($resultck))
             {
                 echo"<script>";
                 echo"alert('ອີເມວ ຫຼື ລະຫັດຜູ້ໃຊ້ບໍ່ຖືກຕ້ອງ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ');";
                 echo"window.location.href='../index.php';";
                 echo"</script>";
             }
             else 
             {
                 $sql = "select * from employees where Email = '$email' and pass = '$pass';";
                 $resultget = mysqli_query($link, $sql);
                 
                 if(mysqli_num_rows($resultget) <= 0){
                     echo"<meta http-equiv-'refress' content='1;URL=../index.php'>";
                 }
                 else{
                    
                     while($user = mysqli_fetch_array($resultget))
                     {
                         if($user['auther_id'] == 1)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['emp_name'] = $user['emp_name'];
                             $_SESSION['emp_id'] = $user['emp_id'];
                             $_SESSION['img_path'] = $user['img_path'];
                             $_SESSION['auther_id'] = 1;
                             echo"<meta http-equiv='refresh' content='1;URL=../Stock/Main.php'>";
                         }
                         else if($user['auther_id'] == 2)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['emp_name'] = $user['emp_name'];
                             $_SESSION['emp_id'] = $user['emp_id'];
                             $_SESSION['img_path'] = $user['img_path'];
                             $_SESSION['auther_id'] = 2;
                             echo"<meta http-equiv='refresh' content='1;URL=../Accounting-finance/Main.php'>";
                         }
                         else if($user['auther_id'] == 3)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['emp_name'] = $user['emp_name'];
                             $_SESSION['emp_id'] = $user['emp_id'];
                             $_SESSION['img_path'] = $user['img_path'];
                             $_SESSION['auther_id'] = 3;
                             echo"<meta http-equiv='refresh' content='1;URL=../Management/Main.php'>";
                         }
                         else if($user['auther_id'] == 4)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['emp_name'] = $user['emp_name'];
                             $_SESSION['emp_id'] = $user['emp_id'];
                             $_SESSION['img_path'] = $user['img_path'];
                             $_SESSION['auther_id'] = 4;
                             echo"<meta http-equiv='refresh' content='1;URL=../HR/Main.php'>";
                         }
                         else
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['emp_name'] = $user['emp_name'];
                             $_SESSION['emp_id'] = $user['emp_id'];
                             $_SESSION['img_path'] = $user['img_path'];
                             $_SESSION['auther_id'] > 3 ;
                             echo"No have permission to use system...!";
                         }

                     }
                 }
             }
           
            
            
           
            
?>