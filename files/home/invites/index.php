<?php
require("../../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
?>
<script>
    function gen() {
        let xhr = new XMLHttpRequest();
        xhr.open("get","/api/user/geninvite.php");
        xhr.send();
        xhr.onload = function () {
            if(xhr.responseText != "true") {
                alert(xhr.responseText);
            } else {
                document.location.reload();
            }
        }
    }
</script>
<br>
<div class="mx-auto" style="width:95%;">
    <h2>Your invite codes</h2>
    <a class="btn btn-outline-info" onclick="gen();">Create invite</a>
    <br>
    <h2>Not used:</h2>
    <?php
    $invites = $db->req_sql("SELECT * FROM invites WHERE issuer = ? AND used = '0'", [$user->userid()], true);
    if ($invites == null) {
        echo("No invites!");
    } else {
        while ($invite = $invites->fetch_assoc()) {
            ?>
            <?php
            echo($invite['invite']);
            ?>
            <br>
            <?php
        }
    }
    ?>
    <h2>Used:</h2>
    <?php
    $invites = $db->req_sql("SELECT * FROM invites WHERE issuer = ? AND used = '1'", [$user->userid()], true);
    if ($invites == null) {
        echo("No invites!");
    } else {
        while ($invite = $invites->fetch_assoc()) {
            ?>
            <?php
            echo($invite['invite']." (Used by: ".$db->req_sql("SELECT * FROM users WHERE id = ?",[$invite['usedwho']])['user'].")");
            ?>
            <br>
            <?php
        }
    }
    ?>
</div>
<?php
$html->buildfooter();
?>
