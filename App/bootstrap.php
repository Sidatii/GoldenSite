<?php
// Load Config
require_once('config/config.php');

// Autoload Core Libraries without having to require them one by one

spl_autoload_register(function($className){
    require_once 'libraries/'. $className .'.php';
})
?>