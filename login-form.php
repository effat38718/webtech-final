<?php
include "config.php";
require 'DbRead.php';

//define("filepath", "user-info.json");

$useName = $password =  "";
$userNameErr = $passwordErr =  "";
$successMessage = $errorMessage = "";
$flag = false;


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $rememberMeFlag = false;

    if (empty($userName)) {
        $userNameErr = "User name cannot be empty!";
        $flag = true;
    }
    if (empty($password)) {
        $passwordErr = "password cannot be empty!";
        $flag = true;
    }

    if (!$flag) {
        if (strlen($userName) > 10) {
            $userNameErr = "Username cannot be more than 10 characters!";
            $flag = true;
        }
        if (strlen($password) > 8) {
            $passwordErr = "password cannot be more than 8 characters!";
            $flag = true;
        }
        if (!$flag) {
            $userName = test_input($userName);
            $password = test_input($password);

            // $data = array("username" => $userName, "password" => $password, "position" => $position);
            // $data_encode = json_encode($data);
            $result1 = login($userName, $password); //write($data_encode);
            //$row = mysqli_fetch_array($result);

            if (strcmp($result1, $password) == 0) {
                $errorMessage = "login successful";
                if ($_POST['rememberme'] === "on") {
                    rememberUser($userName);
                    saveUsertoSession($userName);
                    header("Location: Home.php");
                } else {
                    saveUsertoSession($userName);
                    header("Location: Home.php");
                }
            } else {
                $errorMessage = "Login failed.....!";
                echo ($errorMessage);
            }
        }
    }
}

function rememberUser($username)
{
    $cookie_expire_time = 60 * 60;
    $cookie_username = 'userName';
    $cookie_value = $username;
    setcookie($cookie_username, $cookie_value, time() + ($cookie_expire_time), "/");
}

function saveUsertoSession($username)
{
    session_start();
    $_SESSION['userName'] = $username;
}

// function write($content)
// {
//     $resource = fopen(filepath, "a");
//     $fw = fwrite($resource, $content . "\n");
//     fclose($resource);
//     return $fw;
// }

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php include 'title.php' ?>
</head>

<script type="text/javascript" src="login-validation.js"></script>


<body style="text-align: center;">
    <?php
    include 'php_header.php';
    ?>

    <h1><?php echo $CURRENT_PAGE; ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="login-form">


        <label for="userName">Username: </label>
        <input type="text" id="username" name="userName">
        <span style="color: red;"><?php echo $userNameErr; ?></span>
        <br> <br>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <span style="color: red;"><?php echo $passwordErr; ?></span>
        <br>
        <br>

        <input type="checkbox" name="rememberme" id="rememberme">
        <label for="rememberme">Remember Me</label>
        <br><br>

        <button class="pure-material-button-contained" type="submit" id="myBtn">SIGN IN</button>

    </form>
    <br><br>
    <p>Don't have an account? <a href="signup.php">Sign Up!</a> </p>

    <?php
    include 'php_footer.php';
    ?>

</body>
<!-- <style>
    body {
        background-image: url("background_02.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style> -->


</html>