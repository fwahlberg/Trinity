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

  if ($auth->isLoggedIn()) {
    //If User logged in
    $variables = array(
      'pageTitle' => "Intentions",
      'auth' => $auth
    );
    Template::render("intentions", $variables);
  } else{
    //User not logged in - head to login page
    header("Location: login.php");
  }





?>
