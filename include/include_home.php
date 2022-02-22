<?php

function buscaArtigos()
{
    $sql = "SELECT autor.nome, artigo.id, artigo.id_autor, artigo.titulo, 
            LEFT (artigo.corpo, 60) 
            FROM autor 
            LEFT JOIN artigo 
            ON autor.id = artigo.id_autor 
            WHERE artigo.status = 1;";
    $result = mysqli_query($_SESSION['con'], $sql);

    if (!$result) return false;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $r[] = $row;
        }
    } else return false;

    return $r;
}

function tabelaArtigos($arrayArtigos)
{
    $html = "";
    if (!$arrayArtigos) return false;

    foreach ($arrayArtigos as $artigo) {
        $id = $artigo['id'];
        $html .= "<div class='overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto mb-8'>";
        $html .= "<a href='paginaArtigo.php?idArtigo={$id}' class='w-full block h-full'>";
        $html .= "<div class='bg-gray-100 hover:bg-gray-800 w-full p-4'>";
        $html .= "<p class='text-indigo-500 text-xl font-medium mb-2'>"
                      . html_entity_decode($artigo['titulo']) .
                  "</p>";
        $html .= "<span class='text-gray-400 hover:text-gray-300 font-light text-md'>"
                      . html_entity_decode($artigo['LEFT (artigo.corpo, 60)']) .
            "...</span>";
        $html .= "<p class='text-gray-400 text-sm font-light mt-2'> Por: {$artigo['nome']}</p>";
        $html .= "</div>";
        $html .= "</a>";
        $html .= "</div>";
    }

    return $html;
}
