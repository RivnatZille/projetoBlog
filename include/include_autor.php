<?php

function cadastraAutor ($nome, $email)
{
    if(!$nome || !$email) return false;

    $sql = "INSERT INTO `autor` (`nome`, `email`) VALUES ('$nome', '$email');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}

function alteraAutor ($id, $nome, $email)
{
    if (!$id || !$nome || !$email) return false;

    $sql = "UPDATE `autor` SET `nome` = '$nome', `email` = '$email' WHERE `id` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return true;
}

function deletarAutor($id)
{
    if (!$id) return false;

    $sql = "UPDATE `autor` SET `status` = '0' WHERE `id` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
}

function buscaAutores()
{
    $sql = "SELECT `id`, `nome`, `email`, `status` FROM `autor` WHERE `status` = 1;";
    $result = mysqli_query($_SESSION['con'], $sql);

    if (!$result) return false;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $r[] = $row;
        }
    } else return false;

    return $r;
}

function checkAutor ($idRecebido)
{
    if (!$idRecebido) return false;

    $sql = "SELECT `id`, `nome`, `email` FROM `autor` WHERE `id` = '$idRecebido' LIMIT 1;";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    $userSql = mysqli_fetch_assoc($result);
    if (!$userSql) return false;
    return $userSql;
}

function tabela($arrayAutores)
{
    $html = "";

    if (!$arrayAutores) return false;

    foreach ($arrayAutores as $autor) {
        $id = $autor['id'];
        $html .= "<tr>";
        if (array_key_exists('user_id', $_SESSION) && $_SESSION['user_id'] == 1) {
            $html .= "<td class='px-6 py-4 whitespace-nowrap'>{$autor['id']}</td>";
        }
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>{$autor['nome']}</td>";
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>{$autor['email']}</td>";
        if (array_key_exists('user_id', $_SESSION) && $_SESSION['user_id'] == 1) {
            if ($autor['status'] == 1) {
            $html .= "<td class='px-6 py-4 whitespace-nowrap'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800'>
                            Ativo
                        </span>
                      </td>";
        } elseif ($autor['status'] == 0) {
            $html .= "<td class='px-6 py-4 whitespace-nowrap'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800'>
                            Desativado
                        </span>
                      </td>";
        }
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>
                      <a href='cadastrarAutor.php?id={$id}'>
                          <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800 hover:bg-blue-300'>
                            Editar
                          </span>
                      </a>
                  </td>";
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>
                      <a href='../actions/action_deletarAutor.php?id={$id}'>
                          <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800 hover:bg-red-300'>
                            Desativar
                          </span>
                      </a>
                  </td>";
        }
        $html .= "</tr>";
    }
    return $html;
}