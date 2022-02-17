<?php

require "../include/db.php";
require "../include/include_autor.php";

$id = $_GET['id'];
$deletaAutor = deletarAutor($id);

if (!$deletaAutor) {
    header("Location: ../pages/autores.php?msg=sucessoDeletar");
    exit;
} else {
    header("Location: ../pages/autores.php?msg=falhaDeletar");
    exit;
}