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
$user = $_SESSION['_internal_user_info'];

//print_r($user->setUser(394));
//echo $user->activeAccount();

//print_r($user->loadAccounts());
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $client = $_POST['client'];
  if ($auth->isLoggedIn()) {
    $user->changeAccount($client);
  }
}

$url = $_POST["current_url"];
echo $url;
header("Location: $url");
//echo "<script>window.location.href = '" . $url . "';</script>";
