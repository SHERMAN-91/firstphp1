<?php
include "conn.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
 
$userid=intval($_POST['IdNum']);
$counF=intval($_POST['countSF']);
$namepF=$_POST['namePF'];
$parF=intval($_POST['parF']);
$sel=$_POST['sele'];
$mess=$_POST['mess'];
 $allType="";
 
if(isset($_POST['type'])){
foreach($_POST['type'] as $valuType){
    $allType.=$valuType ."  ";
}
}

$stmt=$db->prepare("UPDATE `pelatis` SET `countS`= ?   , `nameP`= ?, `par` = ?, `where Is`=?, `mess`=?, `type`=? WHERE id = ?");
$stmt->execute(array($counF,$namepF,$parF,$sel,$mess,$allType, $userid));

echo "updata succefull";

$link=$_SERVER['HTTP_REFERER'];
echo $link;
header("location: $link");
// header("refresh:3;   index.php?namp=$namepF");
}