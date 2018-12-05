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

  $variables = array(
      'pageTitle' => "Home",
      'auth'=> $auth,
      'account' => $userInfo->activeAccount(),
      'userInfo' => $userInfo
  );



    Template::render("dashboard", $variables);
} else{
    header("Location: login.php");
}
