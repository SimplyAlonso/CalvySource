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
        <br>
        <h3>Search users</h3>
        <div style="width: 50%;">
            <p id="txtprog">(press enter to search)</p>
            <input id="searchbar" type="text" class="form-control" placeholder="Username" aria-label="Username"
                   aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <script>
        const selectElement = document.getElementById('searchbar');

        selectElement.addEventListener('change', (event) => {
            $("#toast").toast("show");
        });
    </script>
<?php
$html->buildfooter();
?>