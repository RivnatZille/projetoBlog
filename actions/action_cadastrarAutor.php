<?php

require "../include/db.php";
require "../include/include_autor.php";

$nomeAutor = $_POST['inputNome'];
$emailAutor = $_POST['inputEmail'];

$novoCadastro = cadastraAutor($nomeAutor, $emailAutor);

if (!$novoCadastro) {
    header('Location: ../pages/autores.php?msg=0');
    exit;
} else {
    header('Location: ../pages/autores.php?msg=1');
    exit;
}