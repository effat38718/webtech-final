window.onload = function () {
    document.getElementById("myBtn").addEventListener("click", submitOnclick);
}

function submitOnclick() {
    var username = document.forms["login-form"]["username"].value
    var password = document.forms["login-form"]["password"].value
    if (username == "") {
        document.getElementById("username").style.borderColor = "#f44336";
        alert("Please Set your Username");
    }
    if (password == "") {
        document.getElementById("password").style.borderColor = "#f44336";
        alert("Please Set your Password");
    }
    else {
        alert("Information validated");
    }

}