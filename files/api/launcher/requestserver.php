<?php
require ("../../secure/includes.php");
$id = $_GET['id'];
$server = $db->req_sql("SELECT * FROM servers WHERE gameid = ?",[$id]);
if($server == null) {
    die("false");
}
echo($server['port']);
?>