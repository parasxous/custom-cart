<?php

//Starting Session
session_start();

//Autoloading classes from src library
spl_autoload_register(function ($className) {

    require_once __DIR__ . '/lib/' . $className . '.php';
});

//include helpers
require_once __DIR__ . '/helpers/' . 'system-helper.php';

define('BASE_URL', 'http://localhost/custom-cart/');
