<?php
include "../config.php";
session_start();
$userId = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
if ($userId === "") {
    header("Location: login-form.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'title.php' ?>
    <link rel="stylesheet" href="style.css">
</head>
<script type="text/javascript" src="../Controller/passChangeForm.js"></script>

<body style="text-align: center;">

    <?php
    include 'php_header.php';
    require '../update_password.php';
    ?>

    <h1><?php echo $CURRENT_PAGE; ?></h1>

    <?php
    //define("filepath", "user-info.json");

    $password = "";
    $passwordErr = "";
    $successMessage = $errorMessage = "";
    $flag = false;
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $password = $_POST['password'];

        if (empty($password)) {
            $passwordErr = "password cannot be empty!";
            $flag = true;
        }


        if (!$flag) {
            $newPass = $_POST['password'];
            UpdatePassword($newPass);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <label for="password">Password<span style="color : red;">* </span>:</label>
        <input type="password" id="password" name="password">

        <span style="color : red;"><?php echo $passwordErr; ?></span> <br> <br>

        <input class="pure-material-button-contained" type="submit" value="Confirm">
    </form>
    <br>
    <span style="color : green"><?php echo $successMessage; ?> </span>
    <span style="color : red"><?php echo $errorMessage; ?> </span>
    <?php include 'logout-include.php'; ?><br>

    <?php
    include 'php_footer.php';
    ?>


</body>

</html>