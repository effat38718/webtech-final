<?php
include "config.php";
require 'Db_sales.php';
session_start();
$userid = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
if ($userid === "") {
    header("Location: login-form.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php include 'title.php' ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'php_header.php';
    ?>


    <h1><?php echo $CURRENT_PAGE; ?></h1>

    <?php
    //define("filepath", "user-info.json");
    echo "<table class = userTable>";
    echo "<tr><th>Order ID</th>";
    echo "<th>Bill</th>";
    echo "<th>Date</th>";

    echo "</tr>";

    $result1 = Userlist();
    foreach ($result1 as $item) {
        echo "<tr>";
        echo "<td>" . $item['order_id'] . "</td>";
        echo "<td>" . $item['bill'] . "</td>";
        echo "<td>" . $item['date'] . "</td>";

        echo "</tr>";
        // consoleLog($row);
    }
    echo "</table>";
    ?>
    <br>

    <?php include 'logout-include.php'; ?><br><br>

    <?php
    include 'php_footer.php';
    ?>

</body>

</html>