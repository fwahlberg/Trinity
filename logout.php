<?php
/*
|--------------------------------------------------------------------------
| File includes and setup
|--------------------------------------------------------------------------
*/
//Require all classes from directory
spl_autoload_register(function ($class_name) {
  require_once './classes/' . $class_name . '.class.php';
});

//Require Composer autoloader
require_once './vendor/autoload.php';

//Include all resources files
foreach (glob("resources/*.php") as $filename)
{
    require_once $filename;
}


  $auth = new \Delight\Auth\Auth(DB::connect());

  $auth->logOut();
  session_destroy();

  header("Location: index.php");
?>
