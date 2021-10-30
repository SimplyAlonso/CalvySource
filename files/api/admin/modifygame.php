<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
if($user->admin() == false) {die("403");}
$name = $_POST['name'];
$gameid = $_POST['gameid'];
$description = $_POST['description'];
$game = $_FILES['game'];
$thumbnail = $_FILES['thumbnail'];
$gamerow = $db->req_sql("SELECT * FROM games WHERE id = ?",[$gameid]);
if($gamerow == null) {die("err game not exist");}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://calvyy.xyz:212/close".$gameid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_close($ch);
$db->req_sql("UPDATE games SET name = ?, description = ? WHERE id = ?",[$name,$description,$gameid]);
move_uploaded_file($_FILES['game']['tmp_name'],"C:\\xampp\\htdocs\\secure\\2016Lplayer\\content\\games\\".$gamerow['id']."\\map.rbxl");
move_uploaded_file($_FILES['thumbnail']['tmp_name'],"C:\\xampp\\htdocs\\secure\\2016Lplayer\\content\\games\\".$gamerow['id']."\\preview.img");
die("true");
?>