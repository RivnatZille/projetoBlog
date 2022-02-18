<?php
require "db.php";
require "../actions/action_validaLogin.php";

$email = (string) $_POST['email'];
$pw = (string) $_POST['pw'];

if (!$isUser = getUser($email)) {
//    echo "Usuário não cadastrado!";
    header('location: ../pages/login.php?msg=cadastroInexistente');
} elseif ($pw != $isUser['senha']) {
//    echo "Senha incorreta!";
    header('location: ../pages/login.php?msg=senhaIncorreta');
} else {
    $_SESSION['user_id'] = $isUser['id'];
    $_SESSION['user_name'] = $isUser['nome'];

    header('location: ../index.php?msg=sucessoLogin');
    exit;
}
