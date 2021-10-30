<?php
require "../../secure/includes.php";
$user->redirifnotloggedin();
if($user->admin() == false) {die("403");}
$name = $_POST['name'];
$description = $_POST['description'];
$game = $_FILES['game'];
$thumbnail = $_FILES['thumbnail'];

$db->req_sql("INSERT INTO games (name,description,madeby) VALUES (?,?,?)",[$name,$description,$user->userid()]);
$gamerow = $db->req_sql("SELECT * FROM games WHERE name = ? AND description = ? AND madeby = ?",[$name,$description,$user->userid()]);
mkdir("C:\\xampp\\htdocs\\secure\\2016Lplayer\\content\\games\\".$gamerow['id']);
move_uploaded_file($_FILES['game']['tmp_name'],"C:\\xampp\\htdocs\\secure\\2016Lplayer\\content\\games\\".$gamerow['id']."\\map.rbxl");
move_uploaded_file($_FILES['thumbnail']['tmp_name'],"C:\\xampp\\htdocs\\secure\\2016Lplayer\\content\\games\\".$gamerow['id']."\\preview.img");
die("true");
?>
