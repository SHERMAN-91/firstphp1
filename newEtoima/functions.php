<?php

function checkVal($select, $from, $value){
    global $db;
$stmtfun=$db->prepare("SELECT $select FROM $from WHERE  $select LIKE ?");
$stmtfun->execute(array($value));
$countFun=$stmtfun->rowCount();
return $countFun;
}


function checkVal2($select, $from, $value){
    global $db;
$stmtfun=$db->prepare("SELECT $select FROM $from WHERE  $select.contains(?)");
$stmtfun->execute(array($value));
$countFun=$stmtfun->rowCount();
return $countFun;
}