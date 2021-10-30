<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
if($user->admin() == false) {die("403");}
$name = $_POST['name'];
$description = $_POST['description'];
$cost = $_POST['cost'];
$asset = $_POST['rasset'];
$hatid = $_POST['hatid'];
if(!is_numeric($cost)) {die("Cost must be integer");}
if(!is_numeric($asset)) {die("Asset must be integer");}
if($db->req_sql("SELECT * FROM hats WHERE asset = ?",[$asset]) == null) {die("Please enter valid hat id");}
$db->req_sql("UPDATE hats SET name = ?,description = ?,cost = ?,asset = ?,madeby = ? WHERE id = ?",[$name,$description,$cost,$asset,$user->userid(),$hatid]);
die("true");
?>