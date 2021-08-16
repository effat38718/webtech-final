<?php
include "config.php";

define("filepath", "user-info.json");

$username = $password = "";
$isValid = true;
$usernameErr = $passwordErr = "";
$uid = "";

require 'DbRead.php';

if (isset($_COOKIE['uid'])) {
    $uid = $_COOKIE['uid'];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isValid = true;


    if (empty($username)) {
        $usernameErr = "Username can not be empty!";
        $isValid = false;
    }

    if (empty($password)) {
        $passwordErr = "Password can not be empty!";
        $isValid = false;
    }

    if ($isValid) {

        $user_data = read();
        $user_data_array_decode = json_decode($user_data);
        $found = false;
        for ($i = 0; $i < count($user_data_array_decode); $i++) {
            if ($username === $user_data_array_decode[$i]->username && $password === $user_data_array_decode[$i]->password) {
                $found = true;
                break;
            }
        }

        if ($found) {
            echo '<span style="color:green;">Log In Successfull!</span>';

            if (isset($_POST['rememberme'])) {

                setcookie("uid", $username, time() + 60 * 60 * 24 * 30);
            }

            session_start();
            $_SESSION['uid'] = $username;

            header("Location: Home.php");
        } else {
            echo '<span style="color:red;">Log In failed! Invalid username or password!</span>';
        }
    }
}

function read()
{
    $resource = fopen(filepath, "r");
    $fz = filesize(filepath);
    $fr = "";
    if ($fz > 0) {
        $fr = fread($resource, $fz);
    }
    fclose($resource);
    return $fr;
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php include 'title.php' ?>
</head>

<body style="text-align: center;">
    <?php
    include 'php_header.php';
    ?>

    <h1><?php echo $CURRENT_PAGE; ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">


        <label for="username">Username: </label>
        <input type="text" id="username" name="username" value="<?php echo $uid; ?>">
        <span style="color: red;"><?php echo $usernameErr; ?></span>
        <br> <br>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <span style="color: red;"><?php echo $passwordErr; ?></span>
        <br>
        <br>

        <input type="checkbox" name="rememberme" id="rememberme">
        <label for="rememberme">Remember Me</label>
        <br><br>


        <input class="submit" type="submit" value="login">





    </form>
    <br><br>
    <p>Don't have an account? <a href="signup.php">Sign Up!</a> </p>

    <?php
    include 'php_footer.php';
    ?>

</body>

</html>