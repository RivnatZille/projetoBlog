<?php

require "../include/db.php";
require "../include/include_paginaArtigo.php";

$id = $_GET['idArtigo'];
$deletarArtigo = deletarArtigo($id);

// ****************** //
// EXCLUSÃO DE ARTIGO //
// ****************** //

if (!$deletarArtigo) {
    header("Location: ../pages/home.php?msg=sucessoDeletar");
    exit;
} else {
    header("Location: ../pages/home.php?msg=falhaDeletar");
    exit;
}