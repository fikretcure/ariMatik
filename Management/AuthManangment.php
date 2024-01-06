<?php


require_once './Helpers/Request.php';
require_once './Helpers/Database.php';
require_once './Helpers/Config.php';


/**
 * @return string|null
 */
function login(): string|null
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (RequestGetData('email') && RequestGetData('password')) {
            $stmt = OpenCon()->prepare('SELECT * FROM users WHERE email=:email and password=:password');
            $stmt->execute([
                'email' => RequestGetData('email'),
                'password' => md5(RequestGetData('password')),
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header('Location: http://arge.test/index.php');
            }
        }
        return 'Bilgilerinizi kontrol etmelisiniz !';
    }
    return null;
}

/**
 * @return void
 */
function checkSession(): void
{
    if (!$_SESSION['id']) {
        redirect('login');
    }
}


/**
 * @return void
 */
function isSession(): void
{
    if ($_SESSION['id']) {
        redirect('index');
    }
}

/**
 * @return void
 */
function clearSession(): void
{
    session_destroy();
    redirect('login');
}

/**
 * @param $page
 * @return void
 */
function redirect($page): void
{
    header('Location: ' . Config::BASE_DOMAIN . $page . '.php');
}