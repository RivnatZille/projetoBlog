<?php

function cadastraAutor ($nome, $email)
{
    if(!$nome || !$email) return false;

    $sql = "INSERT INTO `autor` (`nome`, `email`) VALUES ('$nome', '$email');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}