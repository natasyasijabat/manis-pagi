<?php
class Database {
    private static ?PDO $pdo = null;
    public static function conn(): PDO {
        if (!self::$pdo) {
            $c = require __DIR__ . '/../config/database.php';
            self::$pdo = new PDO("mysql:host={$c['host']};dbname={$c['db']};charset=utf8mb4", $c['user'], $c['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
        return self::$pdo;
    }
}
