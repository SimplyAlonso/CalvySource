<?php
require("../../secure/includes.php");
if($_SERVER['REMOTE_ADDR'] != $info->siteip){
    die("NO");
}
$players = $_GET['players'];
$gameid = $_GET['gameid'];
$db->req_sql("UPDATE servers SET players = ? WHERE gameid = ?",[$players,$gameid]);
die("true");
?>