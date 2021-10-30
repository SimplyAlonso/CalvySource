<?php
require("../../secure/includes.php");
if($_SERVER['REMOTE_ADDR'] != $info->siteip){
    die("NO");
}
$port = $_GET['port'];
$gameid = $_GET['gameid'];
$db->req_sql("INSERT INTO servers (gameid,port) VALUES (?,?)",[$gameid,$port]);
die("true");
?>