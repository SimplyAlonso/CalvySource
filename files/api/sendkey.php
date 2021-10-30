<?php
require "../secure/includes.php";
if(!$user->loggedin()) {die("ERR");}
if($user->user()['emailtime'] > (time()-3600)) {die("Ratelimited");}
$email = $_POST["email"];
if(!$text->checkemail($email)) {die("Invalid email");}
$key = $text->generateRandomString(15);
$db->req_sql("UPDATE users SET email = ?, emailcode = ?, emailtime = ? WHERE ticket = ?",[$email,$key,time(),$_SESSION['ticket']]);
$mail->sendmail($key,$email);
die("Success");
?>