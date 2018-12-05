<nav class="navbar navbar-expand-lg navbar-light bg-light topbar">

 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="#"><?php echo $auth->getUsername(); ?> <span class="sr-only">(current)</span></a>
     </li>
   </ul>
   <form class="form-inline my-2 my-lg-0" method="POST" action="/changeAccount.php">
     <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
     <select class="form-control mr-sm-2" id="selectClient" name="client" method="POST" action="/changeAccount.php">
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
     <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Select</button>
   </form>
 </div>



</nav>
