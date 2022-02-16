<?php
require "db.php";
require "../actions/action_validaLogin.php";

$email = (string) $_POST['email'];
$pw = (string) $_POST['pw'];

if (!$isUser = getUser($email)) {
//    echo "Usuário não cadastrado!";
    header('location: ../index.php?msg=0');
} elseif ($pw != $isUser['senha']) {
//    echo "Senha incorreta!";
    header('location: ../index.php?msg=1');
} else {
    $_SESSION['user_id'] = $isUser['id'];
    $_SESSION['user_name'] = $isUser['name'];

    header('location: ../pages/home.php');
    exit;
}
