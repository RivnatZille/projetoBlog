<?php

require "../include/db.php";
require "../include/include_artigo.php";

$idAutor = $_POST['inputId'];
$titulo = $_POST['inputTitulo'];
$corpo = $_POST['inputCorpo'];

$novoArtigo = cadastraArtigo($idAutor, $titulo, $corpo);

if (!$novoArtigo) {
    header('Location: ../pages/home.php?msg=falhaArtigo');
    exit;
} else {
    header('Location: ../pages/home.php?msg=sucessoArtigo');
    exit;
}
