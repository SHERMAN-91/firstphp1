<?php
include "conn.php";

if($_SERVER['REQUEST_METHOD']=="GET"){
if($_GET['do']=='piran'){
$stmt=$db->prepare("UPDATE `pelatis` SET `piran`=?, `pirDate`=now() where `id`=?");
$stmt->execute(array(1, $_GET['userid']));


}elseif($_GET['do']=='epistrofi'){
$stmt=$db->prepare("UPDATE `pelatis` SET `piran`=? where `id`=?");
$stmt->execute(array(0, $_GET['userid']));

}

$link=$_SERVER['HTTP_REFERER'];
echo $link;
header("location: $link");
// header("location: index.php?namp=$namepF");


}