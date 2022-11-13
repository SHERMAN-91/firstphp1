<?php

$sdn='mysql: host=localhost; dbname=etioma';
$user="root";
$pass="";
$options=array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
try{
$db= new PDO($sdn, $user, $pass, $options);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}

catch(PDOException  $e){
echo "faild to connect", $e->getMessage();
}