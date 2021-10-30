<?php
require("../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
?>
<br>
<div class="mx-auto" style="width:95%;">
    <h1>Welcome back, <?php echo($user->user()['user']); ?></h1>
    <img src="/images/default.png" style="width: 150px; height:150px; border: 1px solid grey; border-radius: 50%;">
</div>
<?php
$html->buildfooter();
?>