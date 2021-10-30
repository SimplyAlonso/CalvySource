<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
$invites = $db->req_sql("SELECT * FROM invites WHERE issuer = ?",[$user->userid()],true);
if($user->admin() != true && $invites->num_rows >= 2) {
    die("You can't create more than 2 invites!");
}
$db->req_sql("INSERT INTO invites (invite,issuer) VALUES (?,?)",[$text->generateRandomString(25),$user->userid()]);
die("true")
?>