<?php
require("../../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
?>
    <br>
    <style>
        .container {
            position: relative;
            width: 37%;
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


    <div style="margin: 0 auto 0 auto; width: 80%;" class="mx-auto">
        Running games:

        <br>
        <?php
        $data = $db->req_sql("SELECT * FROM servers", [], true);
        if($data != null) {
            while ($server = $data->fetch_assoc()) {
                $plrs = $server['players'];
                $game = $db->req_sql("SELECT * FROM games WHERE id = ?",[$server['gameid']]);
                $html->cardgame("/home/pages/game?id=" . $game['id'], "/secure/2016Lplayer/content/games/" . $game['id'] . "/preview.img", $game['name'], $plrs);
            }
        }
        ?>

        <br>
    Random games:
    <br>
    </div>
    <div style="margin: 0 auto 0 auto; width: 80%;" class="mx-auto">
        <?php
        $data = $db->req_sql("SELECT * FROM games ORDER BY RAND()", [], true);
        while ($row = $data->fetch_assoc()) {
            $plrs = $db->req_sql("SELECT players FROM servers WHERE gameid = ?",[$row['id']])['players'];
            if($plrs == null) {$plrs = "0";}
            $html->cardgame("/home/pages/game?id=".$row['id'],"/secure/2016Lplayer/content/games/".$row['id']."/preview.img",$row['name'],$plrs);
        }
        ?>
    </div>
<?php
$html->buildfooter();
?>