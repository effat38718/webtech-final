<?php
switch ($_SERVER['SCRIPT_NAME']) {
    case '/restaurant/View/login-form.php':
        $CURRENT_PAGE = "Login";
        $PAGE_TITLE = "Login";
        break;
    case '/restaurant/View/passwordchange.php':
        $CURRENT_PAGE = "Change Password";
        $PAGE_TITLE = "Change Password";
        break;
    case '/restaurant/View/signup.php':
        $CURRENT_PAGE = "Signup Form";
        $PAGE_TITLE = "Signup";
        break;
    case '/restaurant/View/users-list.php':
        $CURRENT_PAGE = "User List";
        $PAGE_TITLE = "User List";
        break;
    case '/restaurant/View/salesData.php':
        $CURRENT_PAGE = "Sales Data";
        $PAGE_TITLE = "Sales Data";
        break;
    case '/restaurant/View/ratings.php':
        $CURRENT_PAGE = "Ratings";
        $PAGE_TITLE = "Ratings";
        break;
    case '/restaurant/View/Home.php';
        $CURRENT_PAGE = "Home";
        $PAGE_TITLE = "Home";
        break;
}
