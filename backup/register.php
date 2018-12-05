<?php

    require_once(dirname(__FILE__) . "/resources/config.php");
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    require_once(AUTOLOAD);

    $db = new \PDO('mysql:dbname=' . $config["db"]["dbname"] . ';host=' . $config["db"]["host"] . ';charset=utf8mb4', $config["db"]["username"], $config["db"]["password"]);
    $auth = new \Delight\Auth\Auth($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });

            header('Location: index.php');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    $variables = array(
        'pageTitle' => "Home",
        'auth' => $auth
    );


    if (!$auth->isLoggedIn()) {
        renderLayoutWithContentFile("register.php", $variables);
    } else{
        header('Location: index.php');
    }





?>
