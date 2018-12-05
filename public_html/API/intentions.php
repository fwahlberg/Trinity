<?php


    require_once('../vendor/autoload.php');


    spl_autoload_register(function ($class_name) {
      require_once '../resources/classes/' . $class_name . '.class.php';
    });

    $data["data"] = array();
    $intentions = array();


    $auth = new \Delight\Auth\Auth(DB::connect());
    if ($auth->isLoggedIn()) {

        foreach(Intention::queryAllObjects('SELECT * FROM intentions WHERE ClientID = :id ORDER BY id DESC', array(':id' => $auth->getUserId())) as $intention){
            $intentions[] = $intention;
        }

        $data["data"] = $intentions;

        echo json_encode($data);

    }





?>
