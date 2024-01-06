<?php


/**
 * @param $data
 * @return void
 */
function ok($data = null): void
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit();
}


/**
 * @param $data
 * @param $status
 * @return void
 */
function error($data, $status = 422): void
{
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode($data);
    exit();
}