<?php
$ticket = $_GET['ticket'];
require("../../secure/includes.php");
if(!$text->checkalphanumnotnull($ticket)) {die("ERR");}
if($user->getuserbyticket($ticket) == null) {die("false");}
die("true");
?>