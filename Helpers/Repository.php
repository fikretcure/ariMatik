<?php
require_once '../Helpers/Database.php';


/**
 * @param string $table
 * @param int $id
 * @param $columns
 * @return mixed
 */
function getById(string $table, int $id, $columns = '*'): mixed
{
    return OpenCon()->query("SELECT " . $columns . " FROM " . $table . " where id=" . $id)->fetch(PDO::FETCH_ASSOC);
}