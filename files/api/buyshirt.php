<?php
require "../secure/includes.php";
if(!$user->loggedin()) {
    die("403");
}
$hat = $db->req_sql("SELECT * FROM shirts WHERE id = ?",[$_POST['id']]);
if($hat == null) {die("error");}
if($hat['cost'] == '-1') {die("Not for sale");}
$isowned = $db->req_sql("SELECT * FROM ownedassets WHERE user = ? AND assettype = 'shirt' AND assetid = ?",[$user->userid(),$_POST['id']]);
if($isowned != null) {die("ERR: already bought!");}
if((int)$hat['cost'] > (int)$user->namebux()) {die("You can't afford that!");}
$db->req_sql("UPDATE users SET namebux = ? WHERE ticket = ?",[(int)$user->namebux() - (int)$hat['cost'],$_SESSION['ticket']]);
$db->req_sql("INSERT INTO ownedassets (user,assettype,assetid) VALUES (?,?,?)", [$user->userid(),"shirt",$_POST['id']]);
die("true");
?>