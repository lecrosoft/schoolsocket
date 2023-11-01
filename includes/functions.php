<?php

function classAutoload($class)
{
    $class = strtolower($class);
    $path = "incudes/{$class}.php";

    if (is_file($path) && !class_exists($class)) {
        require_once($path);
    } else {
        die("The file name{$class}.php");
    }
}
spl_autoload('classAutoload');
function redirect($location)
{
    header("Location:{$location}");
}
