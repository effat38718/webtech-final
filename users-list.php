<?php
include "config.php";
require 'DbUserlist.php';
session_start();
$userid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php include 'title.php' ?>

    <style>
        table,
        th,
        tr,
        td {
            color: #6b8e23;
            border: 2px solid grey;
        }
    </style>
</head>

<body>
    <?php
    include 'php_header.php';
    ?>


    <h1><?php echo $CURRENT_PAGE; ?></h1>

    <?php
    //define("filepath", "user-info.json");
    echo "<table>";
    echo "<tr><th>Username</th>";
    echo "<th>Password</th>";
    echo "<th>Position</th>";

    echo "<th>Actions</th>";
    echo "</tr>";

    $result1 = Userlist();
    foreach ($result1 as $item) {
        echo "<tr>";
        echo "<td>" . $item['usernaame'] . "</td>";
        echo "<td>" . $item['position'] . "</td>";
        echo "<td>" . $item['password'] . "</td>";


        // echo "<td> <input type='submit' name='delete' value='DELETE USER'id ='myBtn'> </td>";
        echo "<td> <button class='pure-material-button-contained' type='button' id='myBtn'>Delete</button> </td>";

        echo "</tr>";
        // consoleLog($row);
    }
    echo "</table>";
    ?>
    <script type="text/javascript" src="userlist.js"></script>
    <br>
    <p><a href="Home.php">Home</a></p>
    <?php include 'logout-include.php'; ?><br><br>

    <?php
    include 'php_footer.php';
    ?>

</body>

</html>