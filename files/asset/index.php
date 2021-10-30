<?php
Header("Content-type: text/plain");
error_reporting(~E_ALL);
$id = $_GET['id'];
if(file_exists("./".$id) && file_get_contents("./".$id) != null) {
require "../game/functions.php";
$tosign = "\n--rbxassetid%".$id."%\n".file_get_contents("./".$id);
die(sign($tosign));
} else {
    Header("Location: https://assetdelivery.roblox.com/v1/asset?id=" . $id);
}
?>