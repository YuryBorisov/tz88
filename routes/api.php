<?php

if (explode('?', $route[2])[0] == 'get')
    (new \App\Http\Controllers\HomeController())->index();