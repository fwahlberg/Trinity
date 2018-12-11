<nav class="navbar navbar-expand-xl navbar-light bg-light topbar">
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="fa fa-bars"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <?php
   if ($auth->isLoggedIn()) {
     ?>
   <ul class="navbar-nav mr-auto">
     <!-- <li class="nav-item active">
       <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
     </li> -->
     <li class="nav-item d-xl-none <?php echo ($pageTitle == "Home" ? "active" : "")?>">
         <a href="/" class="nav-link">Home</a>
     </li>

     <li class="nav-item d-xl-none <?php echo ($pageTitle == "Movements" ? "active" : "")?>">
         <a href="movements.php" class="nav-link">Movements</a>
     </li>

     <li class="nav-item d-xl-none <?php echo ($pageTitle == "Reports" ? "active" : "")?>">
         <a href="reports.php" class="nav-link">Grade Reports</a>
     </li>

     <li class="nav-item d-xl-none <?php echo ($pageTitle == "Intentions" ? "active" : "")?>">
         <a href="intentions.php" class="nav-link">Intentions</a>
     </li>

     <li class="nav-item d-xl-none">
         <a href="logout.php" class="nav-link">Log out <i class="fas fa-sign-out-alt"></i></a>
     </li>
   </ul>
   <span class="navbar-text mr-5">
        <?php echo $auth->getUsername(); ?>
    </span>
   <form class="form-inline my-2 my-lg-0" method="POST" action="/changeAccount.php">

     <select class="form-control mr-sm-2" id="selectClient" name="client" onchange="this.form.submit()" >
       <?php
       if($auth->isLoggedIn()) {
       $i = 0;
       foreach ($userInfo->getUserAccountsIndex() as $value) {
         if($value->clientID == $userInfo->activeAccount()->clientID){
           echo '<option value="' . $i . '" selected>' . $value->Name . '</option>';
         } else {
           echo '<option value="' . $i . '">' . $value->Name . '</option>';
         }
         $i++;

       }
     }

       ?>
     </select>
     <input type="hidden" name="current_url" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
   </form>
 <?php } ?>
 </div>



</nav>
