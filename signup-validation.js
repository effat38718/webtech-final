window.onload = function () {
    document.getElementById("myBtn").addEventListener("click", submitOnclick);
}

function submitOnclick() {
    var position = document.forms["registrationForm"]["position"].value


    var username = document.forms["registrationForm"]["username"].value
    var password = document.forms["registrationForm"]["password"].value

    if (position == "--none" || position == "") {
        document.getElementById("position").style.borderColor = "#f44336";
        alert("Please Select your position");
    }
    if (username == "") {
        document.getElementById("username").style.borderColor = "#f44336";
        alert("Please Set your UserName");
    }
    if (password == "") {
        document.getElementById("password").style.borderColor = "#f44336";
        alert("Please Set your Password");
    }


}