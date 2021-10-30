<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
$id = $_POST['id'];
if($db->req_sql("SELECT * FROM ownedassets WHERE user = ? AND assettype = 'pants' AND assetid = ?",[$user->userid(),$id]) == null) {die("err");}
$db->req_sql("UPDATE users SET pants = ? WHERE ticket = ?",[$db->req_sql("SELECT * FROM pants WHERE id = ?",[$id])['asset'],$_SESSION['ticket']]);
die("true");
?>