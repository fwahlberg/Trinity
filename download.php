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
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();

/*
|--------------------------------------------------------------------------
| File functionality
|--------------------------------------------------------------------------
*/
if ($auth->isLoggedIn()) {
    $userInfo = getUserInfo($auth);
    $movements = array();

        foreach (Movement::queryAll('SELECT * FROM movement WHERE ClientID = :id ORDER BY Date DESC', array(':id' => $userInfo->activeAccount()->clientID)) as $movement) {
            $movements[] = $movement;
        }
        $columnTitles = array_keys($movements[0]);


// Set document properties

$spreadsheet->getProperties()
    ->setCreator('Trinity Grain Portal')
    ->setTitle('Movement Report');

// Add some data


$spreadsheet->getActiveSheet()->fromArray(
        $columnTitles,  // The data to set
        null,        // Array values with this value will not be set
        'A1'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    )->fromArray(
        $movements,  // The data to set
        null,        // Array values with this value will not be set
        'A2'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );


// Rename worksheet
$spreadsheet->getActiveSheet()
    ->setTitle('Simple');

// Save
$filename = date("d-m-Y") . " - " . $userInfo->activeAccount()->Name . " - Movements";
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
$writer->save("php://output");

}
