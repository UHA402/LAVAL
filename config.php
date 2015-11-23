<?php

function getPathServer() {
    $serverUri = explode("/", getenv("REQUEST_URI"));
    $curWorkDir = explode("\\", getcwd());
    $path = 'http://'.getenv('HTTP_HOST').'/';

    for ($i = 0; $i < (count($serverUri) - 1); $i++) {
        for ($j = 0; $j < count($curWorkDir); $j++) {
            if ($serverUri[$i] == $curWorkDir[$j]) {
                $path .= $serverUri[$i].'/';
            }
        }
    }

    return $path;
}

session_name(getPathServer());
session_start();

define('URL', getPathServer());
define('LIBS', 'App/Core/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'laval_serveur');
define('DB_USER', 'root');
define('DB_PASS', '');
