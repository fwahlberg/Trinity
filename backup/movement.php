<?php

    require_once(dirname(__FILE__) . "/resources/config.php");
    require_once(AUTOLOAD);

    spl_autoload_register(function ($class_name) {
      require_once './resources/classes/' . $class_name . '.class.php';
    });


    $auth = new \Delight\Auth\Auth(DB::connect());

    if(isset($_GET["id"])){

      $ticketno = DB::test_input($_GET["id"]);
      $Movement = Movement::queryObject('SELECT * FROM movement WHERE id = :id ORDER BY Date DESC', array(':id' => $ticketno));

      if($Movement->ClientID != $auth->getUserId()){
        $Movement = new Movement;
      }


      $variables = array(
          'pageTitle' => "Movements",
          'auth' => $auth,
          'movement' => $Movement
      );


      if ($auth->isLoggedIn()) {
          Template::render("movement", $variables);
      } else{
          header("Location: login.php");
      }
    } else{
      header("Location: movements.php");
    }






?>
