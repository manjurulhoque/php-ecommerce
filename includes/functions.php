<?php

spl_autoload_register(function ($class) {
    $class = strtolower($class);
    $the_path = "{$class}.php";
    $the_path2 = "includes/{$class}.php";

    if (file_exists($the_path2)) {

        require_once($the_path2);

    } else {

        die("This file name {$class}.php was not found");

    }
});

function redirect($location)
{
    header("Location: {$location}");
}