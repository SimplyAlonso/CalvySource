<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
$key = $_POST['key'];
$keydb = $db->req_sql("SELECT * FROM invites WHERE invite = ?",[$key]);
if($keydb == null) {die("Check your key!");}
if($keydb['used'] == "1") {die("Key already used!");}
$db->req_sql("UPDATE invites SET used = 1, usedwho = ? WHERE invite = ?",[$user->userid(),$key]);
$db->req_sql("UPDATE users SET invited = 1, codeused = ? WHERE id = ?",[$key,$user->userid()]);
die("true");
?>