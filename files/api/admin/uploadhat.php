<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
if($user->admin() == false) {die("403");}
$name = $_POST['name'];
$description = $_POST['description'];
$cost = $_POST['cost'];
$asset = $_POST['rasset'];
if(!is_numeric($cost)) {die("Cost must be integer");}
if(!is_numeric($asset)) {die("Asset must be integer");}
if($db->req_sql("SELECT * FROM hats WHERE asset = ?",[$asset]) != null) {die("Asset already exists");}
$db->req_sql("INSERT INTO hats (name,description,cost,asset,madeby) VALUES (?,?,?,?,?)",[$name,$description,$cost,$asset,$user->userid()]);
die("true");
?>