<?php

require_once '../Helpers/Response.php';
require_once '../Helpers/ApiRequest.php';
require_once '../Helpers/Database.php';
require_once '../Helpers/Repository.php';

checkMethod('POST');


require_once '../Validation/ValidationUserStore.php';
try {

    $db = OpenCon();

    $db->beginTransaction();


    $query = $db->prepare("INSERT INTO users SET name = :name, email = :email, password = :password");
    $insert = $query->execute(array(
        "name" => RequestGetDataApi('name'),
        "email" => RequestGetDataApi('email'),
        "password" => md5(RequestGetDataApi('email'))
    ));
    $newUserId = $db->lastInsertId();
    $db->commit();

    ok([
        'info' => 'Kullanici Basariyle Eklendi',
        'data' => getById('users', $newUserId, 'name,email,id')
    ]);

} catch (Exception $e) {
    $db->rollback();
    error([
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'info' => 'Beklenmeyen Hata'
    ]);
}


