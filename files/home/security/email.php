<?php
require("../../secure/includes.php");
$user->redirifnotloggedin();
if ($user->verified()) {
    header("Location: /");
    die();
}
$html->inithtml();
$html->navbar(false);
?>
    <script>
        function checkcode() {
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/verifykey.php");
            let formdata = new FormData();
            formdata.append("key",document.getElementById("key").value);
            xhr.send(formdata);
            xhr.onload = function() {
                if(xhr.responseText == "true") {
                    document.location.replace("/");
                }else {
                    alert(xhr.responseText);
                }
            }
        }
        function sendmail() {
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/sendkey.php");
            let formdata = new FormData();
            formdata.append("email",document.getElementById("email").value);
            xhr.send(formdata);
            xhr.onload = function() {
                alert(xhr.responseText);
            }
        }
    </script>
    <br>
    <div class="card mx-auto border-info" style="width: 35%;">
        <div style="margin-left: 10px;" class="mx-auto">
            <br>
            <h2>Email verification</h2>
            <hr>
            <h6>(You can send code only once a hour)</h6>
            (check your promotion folder)
            <div class="input-group" style="width: 100%;">
                <button onclick="sendmail()" class="btn btn-outline-secondary" type="button" id="button-addon1">Send</button>
                <input type="text" class="form-control" id="email" placeholder="Email" aria-label="Example text with button addon"
                       aria-describedby="button-addon1" value="<?php echo($user->user()['email']); ?>">
            </div>
            <br>
            <div class="input-group" style="width: 100%;">
                <button onclick="checkcode()" class="btn btn-outline-secondary" type="button" id="button-addon1">Verify</button>
                <input type="text" class="form-control" placeholder="Code" id="key" aria-label="Example text with button addon"
                       aria-describedby="button-addon1">
            </div>
            <br>
        </div>
    </div>
<?php
$html->buildfooter();
?>