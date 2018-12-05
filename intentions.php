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
/*
|--------------------------------------------------------------------------
| Setup variabless
|--------------------------------------------------------------------------
*/
$auth = new \Delight\Auth\Auth(DB::connect());

/*
|--------------------------------------------------------------------------
| File functionality
|--------------------------------------------------------------------------
*/

if ($auth->isLoggedIn()) {
  $userInfo = getUserInfo($auth);
    //If User logged in
    $variables = array(
      'pageTitle' => "Intentions",
      'auth' => $auth,
      'userInfo' => $userInfo
    );
    Template::render("intentions", $variables);
  } else{
    //User not logged in - head to login page
    header("Location: login.php");
  }





?>
