<?php
include "config.php";
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
    define("filepath", "user-info.json");

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
    // function check_position(){
    //     $user_data = read();
    //     $user_data_array_decode = json_decode($user_data);
    //     $found = false;
    //     for ($i = 0; $i < count($user_data_array_decode); $i++) {
    //         if ($userid === $user_data_array_decode[$i]->username && $position === $user_data_array_decode[$i]->'Admin') {
    //             $found = true;
    //             break;
    //         }
    //     }
    // }

    $users_list = read();
    $users_list_array_decode = json_decode($users_list);

    echo "<table>";
    echo "<tr><th>Username</th>";
    echo "<th>Password</th>";
    echo "<th>Position</th>";

    echo "<th>Actions</th>";
    echo "</tr>";

    for ($i = 0; $i < count($users_list_array_decode); $i++) {

        echo "<tr>";
        echo "<td>" . $users_list_array_decode[$i]->username . "</td>";
        echo "<td>" . $users_list_array_decode[$i]->password . "</td>";
        echo "<td>" . $users_list_array_decode[$i]->position . "</td>";

        echo "<td> <input type='submit' name='delete' value='DELETE USER'> </td>";

        echo "</tr>";
    }
    echo "</table>";



    ?>
    <br>
    <p><a href="Home.php">Home</a></p>
    <?php include 'logout-include.php'; ?><br><br>

    <?php
    include 'php_footer.php';
    ?>

</body>

</html>