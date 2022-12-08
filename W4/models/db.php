<?php
$ini = parse_ini_file( __DIR__ . '/dbconfig.ini');

$db = new PDO("mysql:host=" . $ini['servername'] . 
              ";port=" . $ini['port'] . 
              ";dbname=" . $ini['dbname'], 
              $ini['username'], 
              $ini['password']);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);