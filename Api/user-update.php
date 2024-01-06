<?php

require_once '../Helpers/Response.php';
require_once '../Helpers/ApiRequest.php';
require_once '../Helpers/Database.php';
require_once '../Helpers/Repository.php';

checkMethod('PUT');


require_once '../Validation/ValidationUserUpdate.php';
try {

    $db = OpenCon();
    $db->beginTransaction();


    if (RequestGetDataApi('name')) {
        $updatingData['name'] = RequestGetDataApi('name');
    }


    if (RequestGetDataApi('email')) {
        $updatingData['email'] = RequestGetDataApi('email');
    }


    if (RequestGetDataApi('password')) {
        $updatingData['password'] = RequestGetDataApi('password');
    }

    if ($updatingData) {
        $query = '';
        foreach ($updatingData as $key => $item) {
            $query .= $key . '=:' . $key;
            if (next($updatingData) == true) $query .= " ,";
        }

        $query = $db->prepare("Update  users SET " . $query . " where id=" . RequestGetDataApi('user_id'));
        $query->execute($updatingData);
    }

    $db->commit();

    ok([
        'info' => 'Kullanici Guncelleme Basarili',
        'data' =>  getById('users', RequestGetDataApi('user_id'),'name,email,id')
    ]);

} catch (Exception $e) {
    $db->rollback();
    error([
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'info' => 'Beklenmeyen Hata'
    ]);
}


