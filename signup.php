<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'title.php' ?>
</head>

<script type="text/javascript" src="signup-validation.js"></script>

<body style="text-align: center;">
    <?php
    include 'php_header.php';
    ?>

    <h1><?php echo $CURRENT_PAGE; ?></h1>

    <?php
    //define("filepath", "user-info.json");
    require 'DbInsert.php';
    $useName = $password = $position = "";
    $userNameErr = $passwordErr = $positionErr  =  "";
    $successMessage = $errorMessage = "";
    $flag = false;
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $position = $_POST['position'];

        if (empty($userName)) {
            $userNameErr = "User name cannot be empty!";
            $flag = true;
        }
        if (empty($password)) {
            $passwordErr = "password cannot be empty!";
            $flag = true;
        }
        if (empty($position)) {
            $positionErr = "position cannot be empty!";
            $flag = true;
        }

        if (!$flag) {
            $userName = test_input($userName);
            $password = test_input($password);
            $position = test_input($position);

            $data = array("username" => $userName, "password" => $password, "position" => $position);
            $data_encode = json_encode($data);
            $result1 = write($data_encode);
            if ($result1) {
                $successMessage = "Signup Successfully.";
            } else {
                $errorMessage = "Error while signing up!";
            }
        }
    }

    /*function write($content)
    {
        $resource = fopen(filepath, "a");
        $fw = fwrite($resource, $content . "\n");
        fclose($resource);
        return $fw;
    }*/

    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="userName">Username<span style="color : red;">* </span>:</label>
        <input type="text" id="userName" name="userName">
        <span style="color : red;"><?php echo $userNameErr; ?></span> <br> <br>

        <label for="position">Position<span style="color : red;">* </span>:</label>
        <select name="position" id="position">
            <option value="" selected="selected">--none</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="receptionist">Receptionist</option>
            <option value="customer">Customer</option>
        </select>
        <span style="color : red;"><?php echo $positionErr; ?></span> <br><br>

        <label for="password">Password<span style="color : red;">* </span>:</label>
        <input type="password" id="password" name="password">

        <span style="color : red;"><?php echo $passwordErr; ?></span> <br> <br>

        <button class="pure-material-button-contained" type="button" id="myBtn">VALIDATE </button>
        <input class="register_button" type="submit" value="SIGN UP">
    </form>
    <span style="color : green"><?php echo $successMessage; ?> </span>
    <span style="color : red"><?php echo $errorMessage; ?> </span>
    <p>Already have an account? <a href="login-form.php">login here!</a>
    </p>
    <?php
    include 'php_footer.php';
    ?>

</body>

</html>