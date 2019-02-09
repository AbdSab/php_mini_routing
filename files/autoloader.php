<?php

require  __DIR__ . '/../config.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . './route.php';

foreach (glob(__DIR__ . "/_controllers/*.php") as $classes)
{
    require $classes;
}
foreach (glob(__DIR__ . "/../controllers/*.php") as $controller)
{
    require $controller;
}