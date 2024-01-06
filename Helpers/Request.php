<?php
session_start();

/**
 * @param $data
 * @return string
 */
function RequestGetData($data): string
{
    return htmlspecialchars(stripslashes(trim($_POST[$data])));
}
