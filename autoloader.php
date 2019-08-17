<?php

require_once dirname(__FILE__) . '/connections.php';

spl_autoload_register(function ($class_name) {

    $paths = [
//        dirname(__FILE__) . '/' . $class_name . '.php',

        dirname(__FILE__) . '/controllers/' . $class_name . '.php',
        dirname(__FILE__) . '/controllers/db/' . $class_name . '.php',
        dirname(__FILE__) . '/controllers/EShop/' . $class_name . '.php',
        dirname(__FILE__) . '/controllers/Tools/' . $class_name . '.php',

        dirname(__FILE__) . '/public/' . $class_name . '.php',
        dirname(__FILE__) . '/public/requests/' . $class_name . '.php',

        dirname(__FILE__) . '/src/templates/' . $class_name . '.php',
        dirname(__FILE__) . '/src/templates/pages/' . $class_name . '.php',
        dirname(__FILE__) . '/src/templates/pages/eshop_catalog/' . $class_name . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            include $path;
        }
    }
});