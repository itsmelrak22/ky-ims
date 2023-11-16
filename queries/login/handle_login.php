<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

header('Content-Type: application/json; charset=utf-8');

$username = sanitizeInput($_POST['username'] ?? '');
$password = sanitizeInput($_POST['password'] ?? '');

function sanitizeInput($input) {
    $sanitizedInput = htmlspecialchars($input, ENT_QUOTES);
    $sanitizedInput = parse_url($sanitizedInput, PHP_URL_PATH);
    return $sanitizedInput;
}


try {
    $conn = new User;
    $user = $conn->setQuery("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' AND `deleted_at` IS NULL")->getAll();

} catch (\Exception $e) {
    echo $e->getMessage();
    exit(0);
}


if(count($user) == 0){
    $_SESSION['errors'] = ["Credentials is invalid!"];
    header('Location: ../../login.php');

    echo 'Credentials is invalid';

    exit(0);
}else{

    // echo 'success';

    $_SESSION['user'] = $user[0];

    header('Location: ../../home.php');
    exit(0);
}
