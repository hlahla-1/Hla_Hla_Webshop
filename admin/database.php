<?php
//start session
session_set_cookie_params(0);
session_start();
define('SITEURL','http://localhost/Hla-Hla-Webshop/');
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hlahlakitchen';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // object

if($mysqli->connect_errno ) {
    printf("Connect failed: %s<br />", $mysqli→connect_error);
    exit();
}
//printf('Connected successfully.<br />');
?>