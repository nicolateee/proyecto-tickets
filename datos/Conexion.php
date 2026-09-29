<?php
class Conexion
{
    public static function obtener(): PDO
    {
        $c = require __DIR__ . '/../config/config.php';
        $dsn = "mysql:host={$c['host']};dbname={$c['db']};charset=utf8mb4";
        return new PDO($dsn, $c['user'], $c['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }
}