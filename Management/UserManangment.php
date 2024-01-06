<?php


require_once './Helpers/Request.php';
require_once './Helpers/Database.php';


/**
 * @return Exception|string|null
 */
function userUpdate(): Exception|string|null
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $db = OpenCon();
            $db->beginTransaction();

            if (!RequestGetData('name')) {
                return 'Isim bos birakilamaz';
            }

            if (!RequestGetData('email')) {
                return 'Email bos birakilamaz';
            }


            $query = $db->prepare("Select * from users where email = :email and id!=:id");
            $query->execute(array(
                "email" => RequestGetData('email'),
                "id" => $_SESSION['id'],
            ));

            if ($query->fetch(PDO::FETCH_ASSOC)) {
                return 'Kullanici emaili daha once alinmistir !';
            }


            if (!filter_var(RequestGetData('email'), FILTER_VALIDATE_EMAIL)) {
                return 'Kullanici emaili hatalidir !';
            }


            if (RequestGetData('password') and RequestGetData('password_again')) {
                if (RequestGetData('password_again') != RequestGetData('password')) {
                    return 'Sifreler uyusmuyor !Tekrar deneyiniz';
                }
                $updatingData['password'] = md5(RequestGetData('password'));
            }


            if (
                (RequestGetData('password') and !RequestGetData('password_again'))
                or
                (!RequestGetData('password') and RequestGetData('password_again'))
            ) {
                return 'Sifre bilgileri duzgun girilmelidir !';
            }

            $updatingData['name'] = RequestGetData('name');
            $updatingData['email'] = RequestGetData('email');
            $updatingData['id'] = $_SESSION['id'];


            $query = '';
            foreach ($updatingData as $key => $item) {
                $query .= $key . '=:' . $key;
                if (next($updatingData) == true) $query .= " ,";
            }

            $query = $db->prepare("Update  users SET " . $query . " where id=:id");
            $query->execute($updatingData);

            $_SESSION['name'] = RequestGetData('name');
            $_SESSION['email'] = RequestGetData('email');

            $db->commit();
            return 'Guncelleme Basarili';
        } catch (Exception $e) {
            $db->rollback();
            return ($e);
        }
    }
    return null;
}


/**
 * @return array|false
 */
function indexUser(): false|array
{
    $stmt = OpenCon()->prepare('SELECT * FROM users order by name');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}