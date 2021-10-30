<?php
require "../../secure/includes.php";
if ($user->user()['verifieddis'] == "1") {
    die("Already verified");
}
$html->inithtml();
$html->navbar(false);
?>
<script>
    function verify() {
        let key = document.getElementById("key");
        let xhr = new XMLHttpRequest()
        xhr.open("post","/api/user/verifykey.php");
        let fd = new FormData();
        fd.append("key",key.value);
        xhr.send(fd);
        xhr.onload = function () {
            if(xhr.responseText == "true") {
                document.location.replace("/home");
            } else {
                alert(xhr.responseText);
            }
        }
    }
</script>
    <br>
    <div style="width:40%;" class="card border-info mx-auto">
        <br>
        <h2 style="text-align: center;">Verification</h2>
        <h5 style="text-align: center;">This revival is protected with invite keys. Ask your friend to get in. (If you'll exploit, your friend will be banned too)</h5>
        <br>
        <div class="mx-auto">
            <input type="text" id="key" class="form-control" placeholder="Invite key" aria-label="Invite key" aria-describedby="basic-addon1">
            <br>
        </div>
        <a onclick="verify()" class="btn btn-outline-info mx-auto" style="width: 30%; margin-bottom: 10px;">Verify</a>
    </div>
<?php
$html->buildfooter();
?>