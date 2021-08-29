<?php
include "../config.php";
require '../Model/DbUserlist.php';
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
    <style>

    </style>
</head>

<body>
    <?php
    include 'php_header.php';
    ?>


    <h1><?php echo $CURRENT_PAGE; ?></h1>

    <?php
    //define("filepath", "user-info.json");
    $output = makeUserListTable();
    echo ($output);
    function submitOnclick($userName)
    {
        echo ($userName);
    }
    ?>
    <script type="text/javascript" src="..\Controller\userlist.js"></script>
    <br>

    <?php include 'logout-include.php'; ?><br><br>

    <?php
    include 'php_footer.php';
    ?>

</body>

</html>