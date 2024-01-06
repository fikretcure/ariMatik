<?php

require_once './Helpers/Config.php';

/**
 * @return PDO|void
 */
function OpenCon()
{
    try {
        $connection = new PDO("mysql:host=mysql;dbname=" . Config::MYSQL_DB_NAME, Config::MYSQL_USER_NAME, Config::MYSQL_PASSWORD);
        $connection->exec("SET NAMES utf8");
        return $connection;
    } catch (PDOException $e) {
        echo($e->getMessage());
    }
}
