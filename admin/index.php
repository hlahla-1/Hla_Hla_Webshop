<?php
    if($_SESSION['adminid']){
        header("location:home.php");
    }
    else{
        header("location:login.php");
    }
?>