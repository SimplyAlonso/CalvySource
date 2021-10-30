<?php
require("../secure/includes.php");
if(!$user->loggedin()) {die("ERROR");}
$key = $_POST['key'];
if(strlen($key) == 0) {die("Code can't be null");}
if($key == $user->user()['emailcode']) {
    $db->req_sql("UPDATE users SET verified = 1 WHERE ticket = ?",[$_SESSION['ticket']]);
    die("true");
}
die("Invalid key!");
?>