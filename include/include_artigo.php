<?php

function cadastraArtigo ($id, $titulo, $corpo)
{
    if (!$id || !$titulo || !$corpo) return false;

    $sql = "INSERT INTO `artigo` (`id_autor`, `titulo`, `corpo`) VALUES ('$id', '$titulo', '$corpo');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}