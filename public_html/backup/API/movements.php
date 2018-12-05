<?php


    require_once('../vendor/autoload.php');


    spl_autoload_register(function ($class_name) {
      require_once '../resources/classes/' . $class_name . '.class.php';
    });

    $data["data"] = array();
    $movements = array();


    $auth = new \Delight\Auth\Auth(DB::connect());
    if ($auth->isLoggedIn()) {

        foreach(Movement::queryAllObjects('SELECT * FROM movement WHERE ClientID = :id ORDER BY Date DESC', array(':id' => $auth->getUserId())) as $movement){
            $movements[] = $movement;
        }

        $data["data"] = $movements;

        echo json_encode($data);

    }





?>
