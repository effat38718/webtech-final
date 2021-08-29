// window.onload = function () {
//     document.getElementById("myBtn").addEventListener("click", submitOnclick(username));
// }

function DeleteUserOnClick(username) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        document.getElementById("UserListTable").innerHTML = this.responseText;
    };
    xmlhttp.open("POST", "http://localhost:81/restaurant/Model/DbUserlist.php", true);
    xmlhttp.send(JSON.stringify({ "username": username, "command": "DeleteUser" }));
}

function UpdateUserOnclick(username) {
    var postition = document.getElementById('position' + username).value;
    var password = document.getElementById('password' + username).innerHTML;
    var salary = document.getElementById('salary' + username).innerHTML;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        document.getElementById("UserListTable").innerHTML = this.responseText;
    };
    xmlhttp.open("POST", "http://localhost:81/restaurant/Model/DbUserlist.php", true);
    xmlhttp.send(JSON.stringify({ "username": username, "command": "UpdateUser", "position": postition, "salary": salary }));
}