<?php

require_once(dirname(__FILE__) . "/resources/config.php");

require_once(LIBRARY_PATH . "/templateFunctions.php");

require_once(AUTOLOAD);

$db = new \PDO('mysql:dbname=' . $config["db"]["dbname"] . ';host=' . $config["db"]["host"] . ';charset=utf8mb4', $config["db"]["username"], $config["db"]["password"]);
$auth = new \Delight\Auth\Auth($db);


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare("SELECT * FROM intentions");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();



    $variables = array(
        'pageTitle' => "Intentions",
        'auth' => $auth,
        'results' => $results
    );


    if ($auth->isLoggedIn()) {
        renderLayoutWithContentFile("intentions.php", $variables);
    } else{
        header("Location: login.php");
    }





?>
