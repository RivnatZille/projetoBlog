<?php

function cadastraArtigo ($id, $titulo, $corpo)
{
    if (!$id || !$titulo || !$corpo) return false;

    $sql = "INSERT INTO `artigo` (`id_autor`, `titulo`, `corpo`) VALUES ('$id', '$titulo', '$corpo');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}

function alteraArtigo ($id, $titulo, $corpo)
{
    if (!$id || !$titulo || !$corpo) return false;

    $sql = "UPDATE `artigo` SET `titulo` = '$titulo', `corpo` = '$corpo' WHERE `id` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if ($result) return false;
    return true;
}

function deletarArtigo ($id)
{
    if (!$id) return false;

    $sql = "UPDATE `artigo` SET `status` = '0' WHERE `id` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
}

function checkArtigo($idRecebido)
{
    if (!$idRecebido) return false;

    $sql = "SELECT `id`, `titulo`, `corpo` FROM `artigo` WHERE `id` = '$idRecebido';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;

    $artigoSql = mysqli_fetch_assoc($result);
    if (!$artigoSql) return false;
    return $artigoSql;
}

function montaArtigo($idRecebido)
{
    $sql = "SELECT autor.nome, artigo.id, artigo.id_autor, artigo.titulo, artigo.corpo 
            FROM autor 
            LEFT JOIN artigo 
            ON autor.id = artigo.id_autor 
            WHERE artigo.status = 1 AND
            artigo.id = '$idRecebido';";

    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;

    $artigoSql = mysqli_fetch_assoc($result);
    if (!$artigoSql) return false;

    return $artigoSql;

}