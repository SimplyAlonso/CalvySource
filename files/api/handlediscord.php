<?php
require "../secure/includes.php";
$code = $_GET['code'];
if(!isset($code)) {die("ERR");}
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://discord.com/api/v8/oauth2/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "client_id=891427981141082153&client_secret=hXjNMmp7oSG2ti6JhX_kZK9RRVrA4XEo&grant_type=authorization_code&code=".$code."&redirect_uri=https%3A%2F%2Fnamelss.ml%2Fapi%2Fhandlediscord.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = json_decode(curl_exec($ch));
curl_close($ch);
if(!isset($server_output->access_token) || $server_output->scope != "identify guilds") {die("Looks like something went wrong.");}
$db->req_sql("UPDATE users SET discord_ticket = '".$server_output->access_token."' WHERE ticket = ?",[$_SESSION['ticket']]);
$curl = curl_init();
$headers = array(
    "Authorization: Bearer ".$server_output->access_token
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_URL, 'https://discord.com/api/v8/users/@me/guilds');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
$out = json_decode(curl_exec($curl));
curl_close($curl);
foreach($out as $guild) {
    if($guild->id == "895261485243183124") {
        $db->req_sql("UPDATE users SET verifieddis = '1' WHERE ticket = ?",[$_SESSION['ticket']]);
        Header("Location: /");
        die("Verification passed!");
    }
}
if($user->user()['bypassdiscord'] == "1") {
    $db->req_sql("UPDATE users SET verifieddis = '1' WHERE ticket = ?",[$_SESSION['ticket']]);
    Header("Location: /");
    die("Verification passed!");
}
die("Verification failed!");
?>
