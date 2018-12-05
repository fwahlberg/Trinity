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
foreach (glob("resources/*.php") as $filename) {
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
    if (isset($_GET["id"])) {
        $ticketno = DB::testInput($_GET["id"]);
        $Movement = Movement::queryObject('SELECT * FROM movement WHERE movementID = :id LIMIT 1', array(':id' => $ticketno));
        $Commodity = new Commodity;
        $QValues = $Commodity->QValues($Movement);

        if ($Movement->ClientID != $userInfo->activeAccount()->clientID) {
            $Movement = new Movement;
        }


        $variables = array(
          'pageTitle' => "Movements",
          'auth' => $auth,
          'movement' => $Movement,
          'QValues' => $QValues,
          'userInfo' => $userInfo
        );

        Template::render("movement", $variables);
    } else {
        header("Location: login.php");
    }
} else {
    header("Location: movements.php");
}
