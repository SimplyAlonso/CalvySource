<?php
require("../secure/includes.php");
$username = $_POST['username'];
$password = $_POST['password'];
$user1 = $db->req_sql("SELECT * FROM users WHERE user = ?",[$username]);
if($user1 == null) {die("Invalid username/password");}
if(password_verify($password,$user1['pass'])) {
    $_SESSION['ticket'] = $user1['ticket'];
    die("true");
} else {
    die("Invalid username/password");
}
?>
