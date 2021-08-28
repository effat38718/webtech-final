<?php
require 'DbConnect.php';

// if ($_SERVER['REQUEST_METHOD'] === "POST") {
//     $data = json_decode(file_get_contents('php://input'), true);
//     $command = $data['command'];
//     if ($command === "ChangePassword") {
//         UpdatePassword($data['password']);
//     }
// }

function UpdatePassword($password)
{
    $userName = $_SESSION['userName'];
    $conn = connect();
    $sql = "UPDATE USERS SET password = '" . $password . "' WHERE usernaame ='" . $userName . "';";

    if ($conn->query($sql) === TRUE) {
        echo "Pass Updated";
    } else {
        echo "Error Updating Pass: " . $conn->error;
    }
}
