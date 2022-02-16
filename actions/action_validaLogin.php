<?php

function getUser ($email)
{
    $query = "SELECT * FROM `autor` WHERE `email` LIKE '{$email}'";
    $result = mysqli_query($_SESSION['con'], $query);

    if (!$result) return false;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $r[] = $row;
        }
    } else {
        return false;
    }

    return $r[0];
}