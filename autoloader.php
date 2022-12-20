<?php

namespace autoload;

spl_autoload_register(function($className){
    
    $className = str_replace("App", "classes", $className);
    $className = str_replace("\\", "/", $className);
    $className .= '.php';

    require_once $className;
});
