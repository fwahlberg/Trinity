<?php
require_once(dirname(__FILE__) . "/../resources/config.php");
require_once(AUTOLOAD);

spl_autoload_register(function ($class_name) {
  require_once '../resources/classes/' . $class_name . '.class.php';
});
$auth = new \Delight\Auth\Auth(DB::connect());

foreach(DB::queryAll('SELECT Grade FROM movement WHERE ClientID = :id GROUP BY Grade;', array(':id' => $auth->getUserId())) as $Item){
  echo "<a href='/tests/varietyfilter.php?grade=" . $Item["Grade"] . "'>" . $Item["Grade"] . "</a><br>";
}


if(isset($_GET['grade'])){
  $grade = $_GET["grade"];
  $Movements = Movement::queryAllObjects('SELECT * FROM movement WHERE Grade = :grade ORDER BY Date DESC', array(':grade' => $grade));

  var_dump($Movements);
}

?>
