<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <!-- <h3>Blackcat Web Portal</h3> -->
        <a href="/">
        <img class="logo" src="http://www.trinitygrain.co.uk/wp-content/uploads/2018/07/Trinitylogo-master-1.png"></img>
      </a>
    </div>
    <?php
    if ($auth->isLoggedIn()) {
      ?>

    <ul class="list-unstyled components">
        <!-- <p>Dummy Heading</p> -->
        <li <?php if($pageTitle == "Home") { ?> class="active" <?php }?>>
            <a href="/">Home</a>
        </li>

        <li<?php if($pageTitle == "Movements") { ?> class="active" <?php }?>>
            <a href="movements.php">Movements</a>
        </li>

        <li<?php if($pageTitle == "Reports") { ?> class="active" <?php }?>>
            <a href="reports.php">Grade Reports</a>
        </li>

        <li<?php if($pageTitle == "Intentions") { ?> class="active" <?php }?>>
            <a href="intentions.php">Intentions</a>
        </li>

        <!-- <li <?php if($pageTitle == "Settings") { ?> class="active" <?php }?>>
            <a href="settings.php">Settings</a>
        </li> -->
    </ul>


    <ul class="list-unstyled components usercontrols">
        <!-- <p>Dummy Heading</p> -->
        <li>
            <a href="logout.php">Log out <i class="fas fa-sign-out-alt"></i></a>
        </li>
    </ul>

    <p class="credit">
      Powered by Blackcat
    </p>
    <?php
  }
  ?>
</nav>
