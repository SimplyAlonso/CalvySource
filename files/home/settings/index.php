<?php
require("../../secure/includes.php");
$html->inithtml();
$html->navbar();
$user->redirifnotloggedin();
?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Success</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Successfully changed your username!
        </div>
    </div>
</div>
<script>
    function change() {
        var username = document.getElementById('username');
        let xhr = new XMLHttpRequest();
        xhr.open("post", "/api/user/changeusername.php");
        let formdata = new FormData();
        formdata.append("username", username.value);
        xhr.send(formdata);
        xhr.onload = function () {
            if (xhr.responseText == "true") {
                var toastLiveExample = document.getElementById('liveToast')
                var toast = new bootstrap.Toast(toastLiveExample)
                toast.show()
                $('.modal').modal('hide');
            } else {
                alert(xhr.responseText);
            }
        }
    }
</script>
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                New username
                <input type="text" id="username" class="form-control" placeholder="Username" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="change()" class="btn btn-primary">Change (200$)</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="mx-auto" style="width:95%;">
    <h3>Settings</h3>
    <hr>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Account info</a>
        </li>
    </ul>
    <br>
    <div>
        <h2>Username: <a href="#" style="text-decoration: none;" data-bs-toggle="modal"
                         data-bs-target="#changeModal"><?php echo($user->user()['user']); ?></a></h2>
        <h2>Email: <?php echo($user->user()['email']); ?></h2>
    </div>
</div>
<?php
$html->buildfooter();
?>