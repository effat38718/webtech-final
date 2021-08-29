<?php
require 'DbConnect.php';


function login($userName)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT password,position FROM USERS WHERE usernaame = ?");
    $sql->bind_param("s", $userName);
    $sql->execute();
    $res = $sql->get_result();
    // while ($row = $res->fetch_assoc()) {
    //     echo $row['password'] . "<br>";
    //     // consoleLog($row);
    // }
    $row = $res->fetch_assoc();

    return $row;
}

function consoleLog($msg)
{
    echo '<script type="text/javascript">' .
        'console.log(' . $msg . ');</script>';
}
