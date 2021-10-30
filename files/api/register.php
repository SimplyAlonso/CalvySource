<?php
require("../secure/includes.php");
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
if (!$text->checkalphanumnotnull($username)) {
    die("Invalid username");
}
if (strlen($password) == 0) {
    die("Invalid password");
}
if (!$text->checkemail($email)) {
    die("Invalid email");
}
$user = $db->req_sql("SELECT * FROM users WHERE user = ?",[$username]);
if($user != null) {
    die("Username already exists!");
}
$password = password_hash($password, PASSWORD_BCRYPT);
$ticket = $text->generateRandomString();
$db->req_sql("INSERT INTO users (user,pass,email,ticket) VALUES (?,?,?,?)", [$username, $password, $email, $ticket]);
$_SESSION["ticket"] = $ticket;
die("true");
?>