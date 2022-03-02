<?php

namespace App\Model;

use PDO;
use PDOException;

class DB
{
    public static ?PDO $connection = null;

    private static string $host = 'localhost';
    private static string $dbname = 'live_recapphp';
    private static string $charset = 'utf8';
    private static string $username = 'root';
    private static string $password = '';

    /**
     * @return PDO
     */
    public static function getConnection(): PDO {
        if (self::$connection === null) {
            self::connect();
        }

        return self::$connection;
    }

    /**
     * @return void
     */
    private static function connect(): void {
        try {

            self::$connection = new PDO(
                "mysql:host=localhost;dbname=live_recapPHP;charset=utf8",
                self::$username,
                self::$password
            );

            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


        } catch (PDOException $e) {

            die();

        }
    }
}