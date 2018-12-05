<?php

//  Require Config and Composer Autoload file
require_once(dirname(__FILE__) . "/resources/config.php");
require_once(AUTOLOAD);

//Load in all required classes
spl_autoload_register(function ($class_name) {
  require_once './resources/classes/' . $class_name . '.class.php';
});

//Initialise authentication
$auth = new \Delight\Auth\Auth(DB::connect());

    $variables = array(
        'pageTitle' => "Movements",
        'auth' => $auth,
    );


    if ($auth->isLoggedIn()) {
        Template::render("movements", $variables);
    } else{
        header("Location: login.php");
    }





?>
