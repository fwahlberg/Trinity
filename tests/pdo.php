<?php
require '../resources/classes/DB.php';
require '../resources/classes/Member.php';


$pdo = new PDO("mysql:host=localhost;dbname=blackcat_web;charset=utf8", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//var_dump(DB::query('SELECT ClientID, name FROM clients LIMIT 1', array()));
echo "<br>";
$member = Member::queryObject('SELECT * FROM clients LIMIT 1', array());
echo "<br>";
//$user = $pdo->query('SELECT ClientID, name FROM clients LIMIT 1')->fetchObject('Member');

print_r($member);
echo"<br><br>";
print_r($member->Numbers());

print_r($member->Address());
