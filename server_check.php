<?php

$hostname="localhost";
$dbuser="root";
$pw="";
$dbname="register";

$cont=mysqli_connect($hostname,$dbuser,$pw,$dbname);
if(!$cont)
{
    echo "Connection Unsuccessful";
}
?>