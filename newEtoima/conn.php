<?php

$sdn='mysql: host=sql7.freemysqlhosting.net; dbname=sql7559479';
$user="sql7559479";
$pass="VLcnpAlQ3D";
$portD="3306";
$options=array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
try{
$db= new PDO($sdn, $user, $pass,$portD, $options);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}

catch(PDOException  $e){
echo "faild to connect", $e->getMessage();
}
