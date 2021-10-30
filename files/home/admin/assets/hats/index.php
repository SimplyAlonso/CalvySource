<?php
require("../../../../secure/includes.php");
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
            var cost = document.getElementById("cost");
            var rasset = document.getElementById("rasset");
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/admin/uploadhat.php");
            let fd = new FormData();
            fd.append("name",name.value);
            fd.append("description",description.value);
            fd.append("cost",cost.value);
            fd.append("rasset",rasset.value);
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
            document.getElementById("uploadbtn").className = "btn btn-outline-info disabled";
            var hatid = document.getElementById("hatid");
            var name = document.getElementById("namem");
            var description = document.getElementById("descriptionm");
            var cost = document.getElementById("costm");
            var rasset = document.getElementById("rassetm");
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/admin/modifyhat.php");
            let fd = new FormData();
            fd.append("hatid",hatid.value);
            fd.append("name",name.value);
            fd.append("description",description.value);
            fd.append("cost",cost.value);
            fd.append("rasset",rasset.value);
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
                Successfully uploaded/modified hat!
            </div>
        </div>
    </div>
    <br>
    <div class="mx-auto" style="width:95%;">
        <?php $html->buildnavadmin(); ?>
        <br>
        <?php $html->buildnavassets(); ?>
        <br>
        Add hats
        <div style="width:40%;">
            <input type="text" class="form-control" placeholder="Name" id="name" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Description" id="description" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Cost (0 - free)" id="cost" aria-label="Cost (0 - free)"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Roblox asset" id="rasset" aria-label="Cost (0 - free)"
                   aria-describedby="basic-addon1">
            <br>
            <a id="uploadbtn" class="btn btn-outline-info" onclick="add();">Upload!</a>
        </div>
        <hr>
        Modify hats
        <div style="width:40%;">
            <input type="text" class="form-control" placeholder="Hat id (not roblox asset)" id="hatid" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Name" id="namem" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Description" id="descriptionm" aria-label="Username"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Cost (0 - free)" id="costm" aria-label="Cost (0 - free)"
                   aria-describedby="basic-addon1">
            <br>
            <input type="text" class="form-control" placeholder="Roblox asset" id="rassetm" aria-label="Cost (0 - free)"
                   aria-describedby="basic-addon1">
            <br>
            <a id="uploadbtn" class="btn btn-outline-info" onclick="modify();">Upload!</a>
        </div>
    </div>
<?php
$html->buildfooter();
?>