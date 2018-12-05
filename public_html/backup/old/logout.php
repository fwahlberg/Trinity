<?php
require_once(dirname(__FILE__) . "/resources/config.php");


require_once(AUTOLOAD);

$db = new \PDO('mysql:dbname=' . $config["db"]["dbname"] . ';host=' . $config["db"]["host"] . ';charset=utf8mb4', $config["db"]["username"], $config["db"]["password"]);
$auth = new \Delight\Auth\Auth($db);

$auth->logOut();

header("Location: index.php");
?>
