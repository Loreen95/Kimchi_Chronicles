<?php
// Starts output buffering, determines how much data gets stored before being sent to the user.
ob_start();

// Define file locations.
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// This script looks for files within the matching folders above, for easier usability and can avoid "absolute" locations.
// $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 6;
// $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", PUBLIC_PATH);

// Require the neccesary files once, then call the main file in other files. This avoids repetition of code.
require_once("functions.php");
require_once("database/database.php");
require_once("database/query_functions.php");
