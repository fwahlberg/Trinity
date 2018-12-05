<?php
    require_once(dirname(__FILE__) . "/resources/config.php");
    require_once(AUTOLOAD);

    spl_autoload_register(function ($class_name) {
      require_once './resources/classes/' . $class_name . '.class.php';
    });


    $auth = new \Delight\Auth\Auth(DB::connect());
    if ($auth->isLoggedIn()) {
      if(isset($_POST["grade"])){
        $grade = $_POST["grade"];
        $Report = new Report;
        $Report->Movements = Movement::queryAllObjects('SELECT * FROM movement WHERE ClientID = :id AND Grade = :grade ORDER BY Date DESC',
        array(
        ':id' => $auth->getUserId(),
        ':grade' => $grade));


        $variables = array(
            'pageTitle' => "Reports",
            'auth'=> $auth,
            'grade' => $grade,
            'Report' => $Report
        );
        Template::render("report", $variables);
      } else {
        $memberGrades = DB::queryAll('SELECT Grade FROM movement WHERE ClientID = :id GROUP BY Grade;', array(':id' => $auth->getUserId()));
        $variables = array(
            'pageTitle' => "Reports",
            'auth'=> $auth,
            'memberGrades' => $memberGrades
        );
        Template::render("reports", $variables);
      }


    } else{
        header("Location: login.php");
    }





?>
