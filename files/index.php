<?php
require("secure/includes.php");
if ($user->loggedin()) {
    Header("location: " . $info->siteurl . "/home");
}
$html->inithtml();
$html->navbar();
?>
    <script src='/assets/js/mainpage.js'></script>
<h1 style="text-align: center;">Welcome to <strong><?php echo $info->sitename; ?></strong></h1>
<h2 style="text-align: center;"><strong><?php echo $info->sitename; ?></strong> is a new 20?? roblox revival (now merged with funnyblox)</h2>
<br>
<div class="card border-info mx-auto bg-dark shadow" id="registerframe" style="width:30%;">
    <h2 style="text-align: center; margin-top: 10px;">Ready to begin?</h2>
    <div style="width: 90%;" class="mx-auto">
        <label for="usernamer" style="text-align: left;" class="form-label ">Username</label>
        <input type="text" class="form-control border-info" id="usernamer" placeholder="nonamebody12">
        <label for="email" style="text-align: left;" class="form-label">Email</label>
        <input type="email" class="form-control border-info" id="email" placeholder="verycoolguy@coolmail.com">
        <label for="passwordr" style="text-align: left;" class="form-label">Password (Hashed with bcrypt)</label>
        <input type="password" class="form-control border-info" id="passwordr" placeholder="verystrongpassword123">
        <label for="passwordrr" style="text-align: left;" class="form-label">Verify password</label>
        <input type="password" class="form-control border-info" id="passwordrr" placeholder="verystrongpassword123">
        <button class="btn border-info" id="regbtn" onclick="register();" style="margin-bottom: 10px; color: white; margin-top: 10px;">Register!</button>
        <br>
        <p style="color: grey;">...or you want to <a style="text-decoration: none;" href="#" onclick="calllogin();">login</a>?</p>
    </div>
</div>
<div class="card border-info mx-auto bg-dark shadow" id="loginframe" style="width:30%; bottom:-100%; position: fixed;">
    <h2 style="text-align: center; margin-top: 10px;">Ready to begin?</h2>
    <div style="width: 90%;" class="mx-auto">
        <label for="username" style="text-align: left;" class="form-label">Username</label>
        <input type="text" class="form-control border-info" id="username" placeholder="nonamebody12">
        <label for="password" style="text-align: left;" class="form-label">Password</label>
        <input type="password" class="form-control border-info" id="password" placeholder="verystrongpassword123">
        <button class="btn border-info" id="loginbtn" style="margin-bottom: 10px; margin-top: 10px; color: white;" onclick="login();">Login!</button>
        <br>
        <p style="color: white;">...or you want to <a style="text-decoration: none;" onclick="callregister();" href="#">register</a>?</p>
    </div>
</div>
<?php
$html->buildfooter();
?>