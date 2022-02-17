<?php
    require "../include/db.php";
    require "../include/include_home.php";

    $msg = $_GET['msg'] ?? '';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Blog</title>
</head>
<body>

<!-- ==================== -->
<!-- MENUS PARA NAVEGAÇÃO -->
<!-- ==================== -->

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
                        <a href="escreverArtigo.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3
                        py-2 rounded-md text-sm font-medium">Escrever Artigo</a>

                        <a href="../index.php" class="bg-red-900 text-white px-3 py-2 rounded-md text-sm
                        font-medium hover:bg-gray-700" aria-current="page">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ======= -->
<!-- ALERTAS -->
<!--======== -->

<section class="flex justify-center items-center text-xs font-bold">
    <?php if ($msg == "falhaArtigo") { ?>
        <h3 class="mt-6 font-bold text-red-500">Falha ao registrar o artigo!</h3>
    <?php } ?>

    <?php if ($msg == "sucessoArtigo") { ?>
        <h3 class="mt-6 font-bold text-lime-500">Artigo registrado com sucesso!</h3>
    <?php } ?>
</section>

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<header class="flex justify-center items-center mt-6 text-4xl font-extrabold">
    <h1>Artigos</h1>
</header>

<!-- =================== -->
<!-- CONTAINER PRINCIPAL -->
<!-- =================== -->

<main class="m-6 flex flex-wrap">

    <!-- ======= -->
    <!-- ARTIGOS -->
    <!-- ======= -->

    <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto mb-4">
        <a href="#" class="w-full block h-full">
            <div class="bg-white hover:bg-gray-800 w-full p-4">
                <p class="text-indigo-500 text-md font-medium">
                </p>
                <p class="text-indigo-500 text-xl font-medium mb-2">
                    Título do Artigo!
                </p>
                <p class="text-gray-400 hover:text-gray-300 font-light text-md">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad exercitationem magni obcaecati quasi.
                    Ab aliquam aperiam, assumenda autem dolor est expedita fugit, inventore iste nisi nostrum placeat,
                    quaerat sunt veritatis!
                </p>
                <p class="text-gray-400 text-sm font-light mt-2">
                    Autor: João
                </p>
            </div>
        </a>
    </div>

</main>


</body>
</html>

<?php
    include "../include/lib_js.php";
?>
