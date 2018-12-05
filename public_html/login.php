<?php
  require_once(dirname(__FILE__) . "/resources/config.php");
  require_once(AUTOLOAD);

  spl_autoload_register(function ($class_name) {
    require_once './resources/classes/' . $class_name . '.class.php';
  });
  $auth = new \Delight\Auth\Auth(DB::connect());
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
      Template::render("login", $variables);
  }


?>
