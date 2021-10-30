<?php
require "../../secure/includes.php";
$html->inithtml();
$user->redirifnotloggedin();
$html->navbar();
?>
<br>
<div style="width:95%;" class="mx-auto">
    <?php
    $html->buildnavavatar();
    ?>
</div>
<?php
$html->buildfooter();
?>