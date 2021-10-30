<?php
require("../../secure/includes.php");
if($_SERVER['REMOTE_ADDR'] != $info->siteip){
    die("NO");
}
$gameid = $_GET['gameid'];
$db->req_sql("DELETE FROM servers WHERE gameid = ?",[$gameid]);
die("true");
?>