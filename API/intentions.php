<?php
/*
|--------------------------------------------------------------------------
| File includes and setup
|--------------------------------------------------------------------------
*/
//Require all classes from directory
spl_autoload_register(function ($class_name) {
    require_once '../classes/' . $class_name . '.class.php';
});

//Require Composer autoloader
require_once '../vendor/autoload.php';

//Include all resources files
foreach (glob("../resources/*.php") as $filename) {
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
  $data["data"] = array();
  $intentions = array();

  foreach(Intention::queryAllObjects('SELECT * FROM intentions WHERE ClientID = :id ORDER BY id DESC', array(':id' => $userInfo->activeAccount()->clientID)) as $intention){
      $intentions[] = $intention;
  }

  $data["data"] = $intentions;

  echo json_encode($data);
}
