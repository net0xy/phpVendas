<?php

// /* mysql */
//$DRIVER = 'mysql';
//$SERVER = 'localhost';
//$USER = 'root';
//$PASS = '';
//$PORT = '3308';
//$DATABASE = 'phpvendas';
//define('URLCONNECTION', $DRIVER.':host='.$SERVER.';port='.$PORT.';dbname='.$DATABASE);
//define('USER', $USER);
//define('PASS', $PASS);


// /* sqlite */
$DRIVER = 'sqlite';
$USER = '';
$PASS = '';
define('URLCONNECTION', $DRIVER.':../database/database.sqlite');
define('USER', $USER);
define('PASS', $PASS);