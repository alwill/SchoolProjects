<?php
/* Define the four constants that can be used with either PDO or mysqli */
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'test');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PWD', '');

/* Define the constant for PDO use. */
$_conString = 'mysql:host=' . DB_HOST;

DEFINE ('DB_CONNECTION_STRING', $_conString);
?>
