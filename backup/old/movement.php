<?php

require_once(dirname(__FILE__) . "/resources/config.php");

require_once(LIBRARY_PATH . "/templateFunctions.php");

require_once(AUTOLOAD);

$db = new \PDO('mysql:dbname=' . $config["db"]["dbname"] . ';host=' . $config["db"]["host"] . ';charset=utf8mb4', $config["db"]["username"], $config["db"]["password"]);
$auth = new \Delight\Auth\Auth($db);

    if(isset($_GET["id"])){

      $ticketno = test_input($_GET["id"]);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $db->prepare("SELECT * FROM movement WHERE Ticket = $ticketno;");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $result = $stmt->fetch();



      $variables = array(
          'pageTitle' => "Movements",
          'auth' => $auth,
          'result' => $result
      );


      if ($auth->isLoggedIn()) {
          renderLayoutWithContentFile("movement.php", $variables);
      } else{
          header("Location: login.php");
      }
    } else{
      header("Location: movements.php");
    }





    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
