<?php
require 'DbConnect.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $command = $data['command'];
    if ($command === "DeleteUser") {
        DeleteUser($data['username']);
    } else if ($command === "UpdateUser") {
        UpdateUser($data['username'], $data['position'], $data['salary']);
    }
}

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

function DeleteUser($username)
{
    $conn = connect();
    $sql = "DELETE FROM USERS WHERE usernaame ='" . $username . "';";
    // $sql->bind_param("s", $username);
    if ($conn->query($sql) === TRUE) {
        $updatedtable = makeUserListTable();
        echo $updatedtable;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

function makeUserListTable()
{
    $output = "";
    $output .= "<table id=UserListTable class=userTable>";
    $output .= "<tr><th>Username</th>";
    $output .= "<th>Password</th>";
    $output .= "<th>Position</th>";
    $output .= "<th>Salary</th>";

    $output .= "<th>Actions</th>";
    $output .= "</tr>";

    $result1 = Userlist();
    foreach ($result1 as $item) {
        $output .= "<tr>";
        $output .= "<td>" . $item['usernaame'] . "</td>";
        $output .= "<td id=password" . $item['usernaame'] . ">" . $item['password'] . "</td>";

        $output .= "<td>";
        $output .= "<select name=position id=position" . $item['usernaame'] . " userName = " . $item['usernaame'] . ">";
        $output .= "<option value=" . $item['position'] . " selected='" . $item['position'] . "'>" . $item['position'] . "</option>";
        $output .= "<option value=admin>Admin</option>";
        $output .= "<option value=manager>manager</option>";
        $output .= "<option value=receptionist>Receptionist</option>";
        $output .= "<option value=customer>Customer</option>";
        $output .= "</select>";
        $output .= "</td>";

        $output .= "<td contenteditable id=salary" . $item['usernaame'] . ">" . $item['salary'] . "</td>";


        // echo "<td> <input type='submit' name='delete' value='DELETE USER'id ='myBtn'> </td>";
        $output .= "<td>";
        $output .= "<button class='delete_button' type='button' id='myBtn' userName=" . $item['usernaame'] . " onclick=DeleteUserOnClick(\"" . $item['usernaame'] . "\")>Delete User</button>";
        $output .= "<button class='update_button' type='button' id='updateButton' userName=" . $item['usernaame'] . " onclick=UpdateUserOnclick(\"" . $item['usernaame'] . "\")>Update User</button>";
        $output .= "</td>";

        $output .= "</tr>";
        // consoleLog($row);
    }
    $output .= "</table>";
    return $output;
}

function consoleLog($msg)
{
    echo '<script type="text/javascript">' .
        'console.log(' . $msg . ');</script>';
}

function UpdateUser($username, $position, $salary)
{
    $conn = connect();
    $sql = "UPDATE users SET position='" . $position . "',salary='" . $salary . "' WHERE usernaame ='" . $username . "';";
    // $sql->bind_param("s", $username);
    if ($conn->query($sql) === TRUE) {
        $updatedtable = makeUserListTable();
        echo $updatedtable;
    } else {
        echo "Error Updating record: " . $conn->error;
    }
}
