<?php

require_once '../Helpers/Response.php';
require_once '../Helpers/ApiRequest.php';
require_once '../Helpers/Database.php';
require_once '../Helpers/Repository.php';

$db = OpenCon();


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

if (!filter_var(RequestGetDataApi('email'), FILTER_VALIDATE_EMAIL)) {
    error([
        'info' => 'Kullanici emaili hatalidir !'
    ]);
}


if (RequestGetDataApi('email')) {
    $query = $db->prepare("Select * from users where email = :email and id!=:id");
    $query->execute(array(
        "email" => RequestGetDataApi('email'),
        "id" => RequestGetDataApi('user_id'),
    ));

    if ($query->fetch(PDO::FETCH_ASSOC)) {
        error([
            'info' => 'Kullanici emaili daha once alinmistir !'
        ]);
    }

}


if (RequestGetDataApi('password') and RequestGetDataApi('password_again')) {
    if (RequestGetDataApi('password_again') != RequestGetDataApi('password')) {
        error([
            'info' => 'Sifreler uyusmuyor !'
        ]);
    }
}


if (
    (RequestGetDataApi('password') and !RequestGetDataApi('password_again'))
    or
    (!RequestGetDataApi('password') and RequestGetDataApi('password_again'))
) {
    error([
        'info' => 'Sifre bilgileri duzgun girilmelidir !'
    ]);
}
