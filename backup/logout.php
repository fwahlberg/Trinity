<?php
    require_once(dirname(__FILE__) . "/resources/config.php");
    require_once(AUTOLOAD);

    spl_autoload_register(function ($class_name) {
      require_once './resources/classes/' . $class_name . '.class.php';
    });


    $auth = new \Delight\Auth\Auth(DB::connect());

  $auth->logOut();

  header("Location: index.php");
?>
