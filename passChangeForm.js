// window.onload = function () {
//     document.getElementById("passChangeConfirm").addEventListener("click", changeUserPass);
// }

function changeUserPass() {
    var xmlhttp = new XMLHttpRequest();
    var newPass = document.getElementById("password").value
    xmlhttp.onreadystatechange = function () {
        console.log(newPass)
        // console.log(this.responseText);
        // document.getElementById("UserListTable").innerHTML = this.responseText;
    };
    xmlhttp.open("POST", "DbUserlist.php", true);
    xmlhttp.send(JSON.stringify({ "password": newPass, "command": "ChangePassword" }));
}