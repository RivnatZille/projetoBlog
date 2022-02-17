<?php

require "../include/db.php";
require "../include/include_autor.php";

$idAutor = $_POST['inputId'];
$nomeAutor = $_POST['inputNome'];
$emailAutor = $_POST['inputEmail'];

if (!$idAutor) {
    $novoCadastro = cadastraAutor($nomeAutor, $emailAutor);

    if (!$novoCadastro) {
        header('Location: ../pages/autores.php?msg=falhaCadastro');
        exit;
    } else {
        header('Location: ../pages/autores.php?msg=sucessoCadastro');
        exit;
    }
} else {
    $alteraCadastro = alteraAutor($idAutor, $nomeAutor, $emailAutor);

    if (!$alteraCadastro) {
        header('Location: ../pages/autores.php?msg=falhaAlterar');
        exit;
    } else {
        header('Location: ../pages/autores.php?msg=sucessoAlterar');
        exit;
    }
}
