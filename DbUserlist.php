<?php
require 'DbConnect.php';


function Userlist()
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM USERS ");
    $sql->execute();
    $res = $sql->get_result();
    // while ($row = $res->fetch_assoc()) {
    //     echo $row['password'] . "<br>";
    //     // consoleLog($row);
    // }
    //$row = $res->fetch_assoc();

    return $res;
}

function consoleLog($msg)
{
    echo '<script type="text/javascript">' .
        'console.log(' . $msg . ');</script>';
}
