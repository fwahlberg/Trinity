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

    $data["data"] = array();
    $movements = array();


    if ($auth->isLoggedIn()) {
        $userInfo = getUserInfo($auth);
        foreach (Movement::queryAllObjects('SELECT * FROM movement WHERE ClientID = :id ORDER BY Date DESC', array(':id' => $userInfo->activeAccount()->clientID)) as $movement) {
            $movements[] = $movement;
        }

        $data["data"] = $movements;

        echo json_encode($data);
    }
