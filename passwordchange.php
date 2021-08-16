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

    <?php
    define("filepath", "user-info.json");

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


            $user_data = read();
            $user_data_array_decode = json_decode($user_data);

            for ($i = 0; $i < count($user_data_array_decode); $i++) {
                if ($userId === $user_data_array_decode[$i]->username) {
                    $user_data_array_decode[$i]->password = $password;
                    break;
                }
            }
            $data_encode = json_encode($user_data_array_decode);
            $result1 = write($data_encode);
            if ($result1) {
                $successMessage = "Password changed successfully.";
            } else {
                $errorMessage = "Error while signing up!";
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

    function write($content)
    {
        $resource = fopen(filepath, "w");
        $fw = fwrite($resource, $content . "\n");
        fclose($resource);
        return $fw;
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

        <input class="register_button" type="submit" value="Confirm">
    </form>
    <span style="color : green"><?php echo $successMessage; ?> </span>
    <span style="color : red"><?php echo $errorMessage; ?> </span>
    <p><a href="Home.php">Home</a></p>
    <?php include 'logout-include.php'; ?><br>

    <?php
    include 'php_footer.php';
    ?>


</body>

</html>