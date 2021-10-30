<?php
$file = fopen("test.txt","a");
fwrite($file,$_POST['thumb']);
?>