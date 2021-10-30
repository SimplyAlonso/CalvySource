<?php
require("../../../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
$user->redirifnotloggedin();
$user->redirifnotadmin();
?>
    <script>
        function add() {
            document.getElementById("uploadbtn").className = "btn btn-outline-info disabled";
            var name = document.getElementById("name");
            var description = document.getElementById("description");
            var game = document.getElementById("game");
var thumbnail = document.getElementById("thumbnail");
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/admin/uploadgame.php");
            let fd = new FormData();
            fd.append("name",name.value);
            fd.append("description",description.value);
            fd.append("game",game.files[0]);
fd.append("thumbnail",thumbnail.files[0]);
            xhr.send(fd);
            xhr.onload = function () {
                if(xhr.responseText == "true") {
                    document.getElementById("uploadbtn").className = "btn btn-outline-info";
                    var toastLiveExample = document.getElementById('liveToast')
                    var toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()

                } else {
                    alert(xhr.responseText);
                    document.getElementById("uploadbtn").className = "btn btn-outline-info";
                }
            }
        }
        function modify() {
            document.getElementById("modifybtn").className = "btn btn-outline-info disabled";
            var name = document.getElementById("namem");
            var description = document.getElementById("descriptionm");
            var gameid = document.getElementById("gameid");
            var game = document.getElementById("gamem");
            var thumbnail = document.getElementById("thumbnailm");
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/admin/modifygame.php");
            let fd = new FormData();
            fd.append("name",name.value);
            fd.append("gameid",gameid.value);
            fd.append("description",description.value);
            fd.append("game",game.files[0]);
            fd.append("thumbnail",thumbnail.files[0]);
            xhr.send(fd);
            xhr.onload = function () {
                if(xhr.responseText == "true") {
                    document.getElementById("uploadbtn").className = "btn btn-outline-info";
                    var toastLiveExample = document.getElementById('liveToast')
                    var toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()

                } else {
                    alert(xhr.responseText);
                    document.getElementById("uploadbtn").className = "btn btn-outline-info";
                }
            }
        }
    </script>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <small></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Successfully uploaded/modified game!
            </div>
        </div>
    </div>
    <br>
    <div class="mx-auto" style="width:95%;">
        <?php $html->buildnavadmin(); ?>
        <br>
        Add games<br>
Game file:
        <br>
        PLEASE FILL ALL FIELDS OR I WILL PUT YOUR EYES IN YOUR ASS!!!! - Nobody
        <br>
        Also don't put those gay pictures for your game thumbnail, it's just gay - IzzyPizzy
        <div style="width:40%;">
            <input type="file" class="form-control" placeholder="Name" id="game" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
Thumbnail:
<input type="file" class="form-control" placeholder="f" id="thumbnail" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Name" id="name" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Description" id="description" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <a class="btn btn-outline-info" onclick="add();" id="uploadbtn">Upload</a>
        </div>
        <hr>
        Modify games
        <div style="width:40%;">
            <input type="text" class="form-control" placeholder="Game id" id="gameid" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            Game file:
            <input type="file" class="form-control" placeholder="Name" id="gamem" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            Thumbnail:
            <input type="file" class="form-control" placeholder="f" id="thumbnailm" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Name" id="namem" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Description" id="descriptionm" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <a id="modifybtn" class="btn btn-outline-info" onclick="modify();">Modify!</a>
        </div>
    </div>
<?php
$html->buildfooter();
?>
