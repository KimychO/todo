<?php

function autoload($className)
{
    $path = ROOT . '/app/';
    $segments = explode('\\', $className);
    //If empty namespace than it's component;
    if (!isset ($segments[1])) {
        $path .= 'etc/components/';
    } else {
        $segments[0] .= 's';
    }
    /** @noinspection PhpIncludeInspection */
    include $path . implode('/', $segments) . '.php';
}

spl_autoload_register('autoload');

