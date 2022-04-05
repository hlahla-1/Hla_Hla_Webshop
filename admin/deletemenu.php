<?php include("database.php");
if(isset($_SESSION['adminid'])){
    $menuid=$_GET['id'];
    $result=$mysqli->query("DELETE FROM menus WHERE menuid='$menuid'");
    header("location:menus.php");
}
else{
    header("location:login.php");
}
?>