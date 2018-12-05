<?php
require_once('../vendor/autoload.php');

spl_autoload_register(function ($class_name) {
  require_once '../resources/classes/' . $class_name . '.class.php';
});
$auth = new \Delight\Auth\Auth(DB::connect());
try {
    $userId = $auth->admin()->createUser('wahlbergf@msn.com', 'password', 'Felix Wahlberg');

    echo 'We have signed up a new user with the ID ' . $userId;
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

$clients = DB::queryAllObjects('SELECT ID, Name FROM clients ORDER BY Name;');



 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>Hello, world!</title>
   </head>
   <body>
     <h1>Create a new User</h1>
     <form>
       <div class="form-group">
         <label for="InputFirstName">First Name</label>
         <input type="text" class="form-control" id="InputFirstName" placeholder="First Name">
       </div>
       <div class="form-group">
         <label for="InputLastName">Last Name</label>
         <input type="text" class="form-control" id="InputLastName" placeholder="Last Name">
       </div>
      <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Password</label>
        <input type="password" class="form-control" id="InputConfirmPassword" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <label for="selectClient">Select Client</label>
        <select class="form-control" id="selectClient">
          <?php
          foreach ($clients as $value) {
            echo '<option value="' . $value->ID . '">' . $value->Name . '</option>';
          }
           ?>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
 </html>
