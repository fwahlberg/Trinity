<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getUserInfo(\Delight\Auth\Auth $auth) {
    if (!$auth->isLoggedIn()) {
        return null;
    }

    // TODO: load your custom user information and assign it to the session variable below
    //unset($_SESSION['_internal_user_info']);
    if(!isset($_SESSION['_internal_user_info'])){
      $_SESSION['_internal_user_info'] = new User($auth->getUserId());
    }


    return $_SESSION['_internal_user_info'];
}

 ?>
