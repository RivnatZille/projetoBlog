<?php

require "../include/db.php";
require "../include/include_autor.php";

$idAutor = $_POST['inputId'];
$nomeAutor = $_POST['inputNome'];
$emailAutor = $_POST['inputEmail'];

// ********************** //
// CADASTRO DE NOVO AUTOR //
// ********************** //

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

    // ********************* //
    // ALTERAÇÃO DE CADASTRO //
    // ********************* //

    $alteraCadastro = alteraAutor($idAutor, $nomeAutor, $emailAutor);

    if (!$alteraCadastro) {
        header('Location: ../pages/autores.php?msg=falhaAlterar');
        exit;
    } else {
        $_SESSION['user_name'] = $nomeAutor;
        header('Location: ../pages/autores.php?msg=sucessoAlterar');
        exit;
    }
}
