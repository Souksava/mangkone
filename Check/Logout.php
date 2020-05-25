<?php
    session_start();
    unset($_SESSION['ses_id']);
    unset($_SESSION['email']);
    unset($_SESSION['emp_name']);
    unset($_SESSION['emp_id']);
    unset($_SESSION['auther_id']);
    session_destroy();
    echo"<meta http-equiv='refresh' content='1;URL=../index.php'>";
?>