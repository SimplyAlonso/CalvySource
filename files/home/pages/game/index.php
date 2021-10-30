<?php
require("../../../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
$id = $_GET['id'];
if (!isset($id)) {
    die("ERR");
}
if (!$text->checkalphanumnotnull($id)) {
    die("ERR");
}
$game = $db->req_sql("SELECT * FROM games WHERE id = ?", [$id]);
if($game == null) {echo("Game not found"); $html->buildfooter(); die(); }
?>
    <style>
        .container {
            position: relative;
            width: 50%;
            height:50%;
        }

        .container img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    </style>
    <br>
    <div style="width:50%;" class="card border-info mx-auto">
        <a class="btn btn-outline-info" href="calvy://<?php echo($user->user()['ticket']."|".$id) ?>" style="width:20%; position: absolute; right:10px; top:10px;">PLAY</a>
        <div style="margin-left: 20px;">
            <h3 style="max-width: 50%;"><?php echo($game['name']); ?></h3>
            Made by: <?php echo $user->getuserbyid($game['madeby'])['user']; ?>
            <div id="container" style="width: 50%;">
                <img style="border-radius: 10px; width:50%; height:50%;" src="/secure/2016Lplayer/content/games/<?php echo $game['id']; ?>/preview.img">
            </div>
        </div>
        <br>
        <div style="width:100%; border:1px dashed grey;"></div>
        <div style="margin-left: 20px;">
            <?php echo($game['description']); ?>
        </div>
        <br>
    </div>
<?php
$html->buildfooter();
?>