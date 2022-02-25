<?php

require "../include/db.php";
require "../include/include_paginaArtigo.php";

$idAutor = $_POST['inputId'];
$idArtigo = $_POST['inputIdArtigo'];
$titulo = htmlentities($_POST['inputTitulo'], ENT_QUOTES);
$corpo = htmlentities($_POST['inputCorpo'], ENT_QUOTES);
//var_dump($corpo);
//exit;

// *********************** //
// CADASTRO DE NOVO ARTIGO //
// *********************** //

if (!$idArtigo) {
    $novoArtigo = cadastraArtigo($idAutor, $titulo, $corpo);

    if (!$novoArtigo) {
        header('Location: ../pages/home.php?msg=falhaArtigo');
        exit;
    } else {
        header('Location: ../pages/home.php?msg=sucessoArtigo');
        exit;
    }
} else {

    // ******************* //
    // ALTERAÇÃO DE ARTIGO //
    // ******************* //

    $alteraArtigo = alteraArtigo($idArtigo, $titulo, $corpo);

    if (!$alteraArtigo) {
        header('Location: ../pages/home.php?msg=sucessoAlteracao');
        exit;
    } else {
        header('Location: ../pages/home.php?msg=falhaAlteracao');
        exit;
    }
}
