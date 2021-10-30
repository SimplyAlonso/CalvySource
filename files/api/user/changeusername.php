<?php
require("../../secure/includes.php");
$username = $_POST['username'];
if(!$text->checkalphanumnotnull($username)) {die("Invalid username");}
if(!$user->loggedin()) {die("Not logged in");}
if($user->getuserbyname($username) != null) {die("Username already exists!");}
if($user->namebux() < 200) {die("You can't afford that!");}
$db->req_sql("UPDATE users SET user = ?, namebux = ? WHERE id = ?",[$username,$user->namebux() - 200,$user->userid()]);
die("true");
?>