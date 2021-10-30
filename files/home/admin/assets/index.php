<?php
require("../../../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
$user->redirifnotloggedin();
$user->redirifnotadmin();
?>

    <br>
    <div class="mx-auto" style="width:95%;">
        <?php $html->buildnavadmin(); ?>
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/home/admin/assets/hats">Hats</a>
            </li>
        </ul>
        <br>
    </div>
<?php
$html->buildfooter();
?>