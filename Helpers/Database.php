<?php
try {
    require_once 'Config.php';

    /**
     * @return PDO
     */
    function OpenCon(): PDO
    {
        $connection = new PDO("mysql:host=mysql;dbname=" . Config::MYSQL_DB_NAME, Config::MYSQL_USER_NAME, Config::MYSQL_PASSWORD);
        $connection->exec("SET NAMES utf8");
        return $connection;
    }

} catch (Throwable $e) {
    echo($e);
}