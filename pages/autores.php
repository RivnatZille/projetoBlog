<?php
    require "../include/db.php";
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

<!-- MENUS PARA NAVEGAÇÃO -->

<nav class="bg-gray-800">
    <div class="mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="home.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium
                        hover:bg-gray-700" aria-current="page">Artigos</a>

                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md
                        text-sm font-medium">Autores</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-8">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="cadastrarAutor.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Cadastrar Autor</a>

                        <a href="../index.php" class="bg-red-900 text-white px-3 py-2 rounded-md text-sm
                        font-medium hover:bg-gray-700" aria-current="page">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ALERTAS -->

<section class="flex justify-center items-center text-xs font-bold">
    <?php if ($msg == 0) { ?>
        <h3 class="mt-6 font-bold text-red-500">Falha ao cadastrar!</h3>
    <?php } ?>

    <?php if ($msg == 1) { ?>
        <h3 class="mt-6 font-bold text-lime-500">Autor cadastrado com sucesso!</h3>
    <?php } ?>
</section>

<!-- HEADER -->

<header class="flex justify-center items-center mt-6 text-3xl font-bold">
    <h1>Lista de Autores</h1>
</header>

<!-- ARTIGOS -->

</body>
</html>

<?php
    include "../include/lib_js.php";
?>
