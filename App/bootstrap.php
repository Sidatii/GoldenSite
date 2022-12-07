<?php
// Load Config
require_once('config/config.php');
// Here we will load the libraries needed in the project

// Autoload Core Library
spl_autoload_register(function($className){
    require_once 'libraries/'. $className .'.php';
})
?>