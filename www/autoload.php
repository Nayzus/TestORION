<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 05.02.2021.
 * Time: 11:53.
 **/
spl_autoload_register(function ($class) {
    $file = __DIR__.'/'. str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
    else {
        print_r($file);
    }
});
