<?php

function my__autoload($class) {

    $className = explode(DIRECTORY_SEPARATOR, $class);
    $className[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($path)) {
            require_once $path;
        }
}

spl_autoload_register('my__autoload');
require_once __DIR__ . '/vendor/autoload.php';