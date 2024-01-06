<?php


/**
 * @param $input
 * @return string|null
 */
function RequestGetDataApi($input): ?string
{
    $data = json_decode(file_get_contents('php://input'), true);
    $data = htmlspecialchars(stripslashes(trim($data[$input])));

    if (empty($data) or (gettype($data) == 'string' and $data == 'null')) {
        return null;
    }
    return $data;
}


/**
 * @param string $method
 * @return void
 */
function checkMethod(string $method): void
{
    if ($_SERVER['REQUEST_METHOD'] != $method) {
        error([
            'info' => 'METHOD HATASI'
        ]);
    }
}