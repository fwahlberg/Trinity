<?php
    require_once(dirname(__FILE__) . "/resources/config.php");
    require_once(AUTOLOAD);

    spl_autoload_register(function ($class_name) {
      require_once './resources/classes/' . $class_name . '.class.php';
    });


    $auth = new \Delight\Auth\Auth(DB::connect());
    if ($auth->isLoggedIn()) {
        $member = Member::queryObject('SELECT * FROM clients WHERE ID = :id LIMIT 1', array(':id' => $auth->getUserId()));
      $variables = array(
          'pageTitle' => "Home",
          'auth'=> $auth,
          'member' => (empty($member) ? new Member : $member)
      );



        Template::render("dashboard", $variables);
    } else{
        header("Location: login.php");
    }





?>
