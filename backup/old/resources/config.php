<?php

$config = array(
    "db" => array(
      "dbname" => "black-ofv-u-215864",
      "username" => "black-ofv-u-215864",
      "password" => "2/TUyz.ET",
      "host" => "10.16.16.15"
    ),
    "urls" => array(
        "baseUrl" => "http://beta.blackcat.com"
    ),
    "paths" => array(
        "resources" => "/path/to/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        )
    )
);



/*
    Creating constants for heavily used paths
*/
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("AUTOLOAD")
    or define("AUTOLOAD", $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
