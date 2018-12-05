<?php
require_once(dirname(__FILE__) . "/resources/config.php");
$error = "";
require_once(LIBRARY_PATH . "/templateFunctions.php");
require_once(AUTOLOAD);
$db = new \PDO('mysql:dbname=' . $config["db"]["dbname"] . ';host=' . $config["db"]["host"] . ';charset=utf8mb4', $config["db"]["username"], $config["db"]["password"]);
$auth = new \Delight\Auth\Auth($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  try {
      $auth->login($_POST['email'], $_POST['password']);
      header("Location: index.php");
  }
  catch (\Delight\Auth\InvalidEmailException $e) {
    $error = "Invalid Email";
  }
  catch (\Delight\Auth\InvalidPasswordException $e) {
      $error = "Invalid Password";
  }
  catch (\Delight\Auth\EmailNotVerifiedException $e) {
      $error = "Account not verified";
  }
  catch (\Delight\Auth\TooManyRequestsException $e) {
      $error = "There has been an error, please try again later";
  }
}

$variables = array(
    'pageTitle' => "Home",
    'auth'=> $auth,
    'error' => $error
);

if ($auth->isLoggedIn()) {
    header("Location: index.php");
} else{
    renderLayoutWithContentFile("login.php", $variables);
}


?>
