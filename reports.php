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
        //$userInfo->changeAccount(0);
        if (isset($_POST["grade"])) {
            $grade = $_POST["grade"];
            $Report = new Report;
            $Report->Movements = Movement::queryAllObjects(
            'SELECT * FROM movement WHERE ClientID = :id AND Grade = :grade ORDER BY Date DESC',
            array(
            ':id' => $userInfo->activeAccount()->clientID,
            ':grade' => $grade)
            );

            $variables = array(
            'pageTitle' => "Reports",
            'auth'=> $auth,
            'grade' => $grade,
            'Report' => $Report,
            'userInfo' => $userInfo
        );
            Template::render("report", $variables);
        } else {
            $memberGrades = DB::queryAll('SELECT Grade FROM movement WHERE ClientID = :id GROUP BY Grade;', array(':id' => $userInfo->activeAccount()->clientID));

            $variables = array(
            'pageTitle' => "Reports",
            'auth'=> $auth,
            'memberGrades' => $memberGrades,
            'userInfo' => $userInfo
            );
            Template::render("reports", $variables);
        }
    } else {
        header("Location: login.php");
    }
