<?php

require_once '../Helpers/Response.php';
require_once '../Helpers/ApiRequest.php';
require_once '../Helpers/Database.php';

$db = OpenCon();

if (!RequestGetDataApi('name')) {
    error([
        'info' => 'Kullanici ismi gereklidir'
    ]);
}


if (!filter_var(RequestGetDataApi('email'), FILTER_VALIDATE_EMAIL)) {
    error([
        'info' => 'Kullanici emaili hatalidir !'
    ]);
}


$query = $db->prepare("Select * from users where email = :email");
$query->execute(array(
    "email" => RequestGetDataApi('email'),
));

if ($query->fetch(PDO::FETCH_ASSOC)) {
    error([
        'info' => 'Kullanici emaili daha once alinmistir !'
    ]);
}

