<?php
require ("../secure/includes.php");
if($user->getuserbyid($_GET['id'])['admin'] == '1') {
    die("true");
} else {
    die("false");
}
?>