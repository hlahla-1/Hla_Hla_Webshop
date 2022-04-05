<?php
include("head.php");
$id = $_SESSION['userid'];

$sql = "DELETE FROM users WHERE userid='$id'";          
if ($mysqli->query($sql) === TRUE) {
    session_destroy();
    header("location: index.php");
    }                
else {
    echo "No Deleted";
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    //$mysqli->close();
}
?>