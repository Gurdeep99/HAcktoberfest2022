<?php

$sname="localhost";
$lUser= "root";
$lpassword= "";
$db_name= "test";

$mysqli = mysqli_connect($sname, $lUser, $lpassword, $db_name);
 if(!$mysqli){
     echo "Connection Failed!";
 }
 //else{
   //  echo "connect";
 //}
 ?>