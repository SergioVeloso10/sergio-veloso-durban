<?php

if (!function_exists('connection')) {
    function connection()
    {
        $servername = env("DB_HOST");
        $username = env("DB_USERNAME");
        $password = env("DB_PASSWORD");
        $dbname = env("DB_DATABASE");
        $coneccion = new mysqli($servername, $username, $password, $dbname);
        if ($coneccion->connect_error) {
            die("Connection failed: " . $coneccion->connect_error);
        }
        return $coneccion;
    }
}
