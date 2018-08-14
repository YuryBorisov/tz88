<?php

require __DIR__.'/../vendor/autoload.php';

$route = explode( '/', $_SERVER['REQUEST_URI']);

if ($route[1] == 'api')
    require __DIR__ . '/../routes/api.php';