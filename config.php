<?php

//LA BONNE BOUFFE - CONFIG

define('SITE_DIRNAME', 'php_LaBonneBouffe');

/*
 Réglages BDD
 */

define('DB_NAME', 'LaBonneBouffeNoureuxGerber');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');

/*mode dev*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);