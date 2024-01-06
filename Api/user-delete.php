<?php

require_once '../Helpers/Response.php';
require_once '../Helpers/ApiRequest.php';
require_once '../Helpers/Database.php';
require_once '../Helpers/Repository.php';

checkMethod('DELETE');


try {
    $db = OpenCon();
    $db->beginTransaction();


    if (!RequestGetDataApi('user_id')) {
        error([
            'info' => 'User bilgisi verisi bulunamiyor !'
        ]);
    }


    if (!getById('users', RequestGetDataApi('user_id'))) {
        error([
            'info' => 'Kullanici sistemde mevcut degil !'
        ]);
    }

    $query = $db->prepare("DELETE FROM users where id=:id");
    $query->execute(array(
        "id" => RequestGetDataApi('user_id'),
    ));

    $db->commit();
    ok([
        'info' => 'Kullanici Silme Basarili',
        'data' => null
    ]);
} catch (Exception $e) {
    $db->rollback();
    error([
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'info' => 'Beklenmeyen Hata'
    ]);
}


