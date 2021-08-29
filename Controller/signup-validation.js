window.onload = function () {
    document.getElementById("myBtn").addEventListener("click", submitOnclick);
}

function submitOnclick() {
    var username = document.forms["signup"]["userName"].value
    var position = document.forms["signup"]["position"].value
    var password = document.forms["signup"]["password"].value

    if (position == "--none" || position == "") {
        document.getElementById("position").style.borderColor = "#f44336";
        alert("Please Select your position");
    }
    if (username == "") {
        document.getElementById("userName").style.borderColor = "#f44336";
        alert("Please Set your UserName");
    }
    if (password == "") {
        document.getElementById("password").style.borderColor = "#f44336";
        alert("Please Set your Password");
    }
    else {
        alert("Information validated");
    }


}