<?php

require_once(dirname(__FILE__) . "/resources/config.php");

require_once(LIBRARY_PATH . "/templateFunctions.php");

require_once(AUTOLOAD);

$db = new \PDO('mysql:dbname=' . $config["db"]["dbname"] . ';host=' . $config["db"]["host"] . ';charset=utf8mb4', $config["db"]["username"], $config["db"]["password"]);
$auth = new \Delight\Auth\Auth($db);

    $variables = array(
        'pageTitle' => "Settings",
        'auth' => $auth
    );


    if ($auth->isLoggedIn()) {
        renderLayoutWithContentFile("settings.php", $variables);
    } else{
        header("Location: login.php");
    }





?>
