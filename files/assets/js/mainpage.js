function calllogin() {
    var registerframe = document.getElementById("registerframe");
    registerframe.style.position = "fixed";
    registerframe.style.bottom = "-100%";
    var loginframe = document.getElementById("loginframe");
    loginframe.style.position = "";
    loginframe.style.bottom = "0";
}
function callregister() {
    var registerframe = document.getElementById("registerframe");
    registerframe.style.position = "";
    registerframe.style.bottom = "0";
    var loginframe = document.getElementById("loginframe");
    loginframe.style.position = "fixed";
    loginframe.style.bottom = "-100%";
}
function register() {
    var regbtn = document.getElementById("regbtn");
    regbtn.disabled = true;
    var pas1 = document.getElementById("passwordr");
    var pas2 = document.getElementById("passwordrr");
    var username = document.getElementById("usernamer");
    var email = document.getElementById("email");
    if(pas1.value != pas2.value) {
        alert("Password mismatch");
        regbtn.disabled = false;
    } else {
        if(pas1.value.length == 0) {
            alert("Password can't be null");
            regbtn.disabled = false;
        } else {
            if(username.value.length == 0) {
                alert("Username can't be null");
                regbtn.disabled = false;
            } else {
                if(email.value.length == 0) {
                    alert("Email can't be null");
                    regbtn.disabled = false;
                } else {
                    let xhr = new XMLHttpRequest();
                    xhr.open("post", "/api/register.php");
                    let formdata = new FormData;
                    formdata.append("username", username.value);
                    formdata.append("email", email.value);
                    formdata.append("password", pas1.value);
                    xhr.send(formdata);
                    xhr.onload = function () {
                        if (xhr.responseText != "true") {
                            alert(xhr.responseText);
                            regbtn.disabled = false;
                        } else {
                            document.location.replace("/home");
                        }
                    }
                }
            }
        }
    }
}
function login() {
    var loginbtn = document.getElementById("loginbtn");
    loginbtn.disabled = true;
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    if(username.value.length == 0) {
        alert("Username can't be null!");
        loginbtn.disabled = false;
    } else {
        if(password.value.length == 0) {
            alert("Password can't be null!");
            loginbtn.disabled = true;
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open("post","/api/login.php");
            let formdata = new FormData();
            formdata.append("username",username.value);
            formdata.append("password",password.value);
            xhr.send(formdata);
            xhr.onload = function() {
                if(xhr.responseText == "true") {
                    document.location.replace("/home");
                } else {
                    alert(xhr.responseText);
                    loginbtn.disabled = false;
                }
            }
        }
    }
}