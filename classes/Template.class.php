<?php
class Template {

      public static function render($contentFile, $variables = array())
      {
          $contentFileFullPath = TEMPLATES_PATH . "/pages/page." . $contentFile . ".php";

          // making sure passed in variables are in scope of the template
          // each key in the $variables array will become a variable
          if (count($variables) > 0) {
              foreach ($variables as $key => $value) {
                  if (strlen($key) > 0) {
                      ${$key} = $value;
                  }
              }
          }

          require_once(TEMPLATES_PATH . "/partials/header.php");

          echo "<div class=\"wrapper\">\n";

          require_once(TEMPLATES_PATH . "/partials/sidebar.php");

          echo "<div id=\"main-container\">\n";
          require_once(TEMPLATES_PATH . "/partials/topBar.php");
          echo "<div id=\"content\">\n";

          if (file_exists($contentFileFullPath)) {
              require_once($contentFileFullPath);
          } else {
              /*
                  If the file isn't found the error can be handled in lots of ways.
                  In this case we will just include an error template.
              */
              require_once(TEMPLATES_PATH . "/pages/page.404.php");
          }

          // close content div
          echo "\t</div>\n";
          // close main-container div
          echo "\t</div>\n";

          // close wrapper div
          echo "\t</div>\n";




          require_once(TEMPLATES_PATH . "/partials/footer.php");
      }

}
