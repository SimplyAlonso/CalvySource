<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
$id = $_POST['id'];
if($db->req_sql("SELECT * FROM ownedassets WHERE user = ? AND assettype = 'shirt' AND assetid = ?",[$user->userid(),$id]) == null) {die("err");}
$db->req_sql("UPDATE users SET shirt = ? WHERE ticket = ?",[$db->req_sql("SELECT * FROM shirts WHERE id = ?",[$id])['asset'],$_SESSION['ticket']]);
die("true");
?>