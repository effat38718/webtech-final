<?php
include "config.php";
session_start();
$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'title.php' ?>
</head>

<body style="text-align: center;">

    <?php
    include 'php_header.php';
    ?>
    <h1><?php echo $CURRENT_PAGE; ?></h1>
    <h1>Welcome! <?php echo $userId; ?></h1>
    <p><a href="users-list.php">View/Delete user data</a></p>
    <p><a href="passwordchange.php">Change Password</a></p>
    <p><a href="ViewData.php">View Finance and Sale Data </a></p>
    <p><a href="salary.php.php">Salary</a></p>
    <p><a href="ratings.php">Ratings</a></p>

    <?php include 'logout-include.php'; ?> <br>

    <?php
    include 'php_footer.php';
    ?>

</body>

</html>