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
  | File functionality
  |--------------------------------------------------------------------------
  */
  $error = '';

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
  $userInfo = getUserInfo($auth);
  $variables = array(
      'pageTitle' => "Home",
      'auth'=> $auth,
      'error' => $error,
      'userInfo' => $userInfo
  );

  if ($auth->isLoggedIn()) {
      header("Location: index.php");
  } else{
      Template::render("login", $variables);
  }


?>
