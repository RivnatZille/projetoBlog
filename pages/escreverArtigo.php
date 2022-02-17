<?php

include "../include/lib_js.php";
require "../include/db.php";

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escrever Artigo</title>
</head>

<body>

<!-- ============== -->
<!-- MENU NAVEGAÇÃO -->
<!-- ============== -->

<nav class="bg-gray-800">
    <div class="mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="home.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium
                        hover:bg-gray-700" aria-current="page">Artigos</a>

                        <a href="autores.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">Autores</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-8">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="home.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">Voltar</a>

                        <a href="../index.php" class="bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium
                        hover:bg-gray-700" aria-current="page">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<header class="flex justify-center items-center mt-6 text-3xl font-bold">
    <h1>Escreva abaixo o seu artigo!</h1>
</header>

<!-- ================== -->
<!-- FORM PARA CADASTRO -->
<!-- ================== -->

<div class="text-center mb-4 mt-6">
    <form action="../actions/action_escreverArtigo.php" method="post">
        <input type="hidden" name="inputId" value="<?= $_SESSION['user_id'] ?>">
        <label for="inputTitulo" class="font-semibold">Título do Artigo:</label>
        <br>
        <input type="text" id="inputTitulo" name="inputTitulo" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300
             rounded-md" required value="<?= $tituloRecebido['titulo'] ?? '' ?>">
        <br>
        <label for="inputCorpo" class="font-semibold">Artigo:</label>
        <br>
        <textarea class="text-center border rounded p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500
        shadow-sm sm:text-sm border-gray-300 rounded-md" id="inputCorpo" name="inputCorpo" rows="5"
                  cols="40"><?= $corpoRecebido['corpo'] ?? '' ?></textarea>
        </label>

        <br>
        <button class="ml-2 mt-4 items-center justify-center px-8 py-3 border border-transparent text-base
            font-medium rounded-md text-white bg-lime-700 hover:bg-lime-500 md:py-4 md:text-lg md:px-10" type="submit">Confirmar</button>
    </form>
</div>

</body>
</html>


