<?php
    require "../include/db.php";
    require "../include/include_home.php";

    $msg = $_GET['msg'] ?? '';

    $listaArtigos = buscaArtigos();
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

                        <a href="../index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">
                            Página Inicial
                        </a>

                        <a href="home.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium
                        hover:bg-gray-700" aria-current="page">
                            Artigos
                        </a>

                        <a href="autores.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">
                            Autores
                        </a>

                        <?php if (array_key_exists('user_id', $_SESSION)) { ?>
                            <a href="escreverArtigo.php" class="bg-indigo-700 text-white px-3 py-2 rounded-md text-sm
                            font-medium hover:bg-gray-700">
                                Escrever Artigo
                            </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-8">

                        <?php if (array_key_exists('user_id', $_SESSION)) { ?>
                            <p class="font-medium text-white px-3 py-2">
                                <?= $_SESSION['user_name'] ?>
                            </p>

                            <a href="cadastrarAutor.php?id=<?=$_SESSION['user_id']?>"
                               class="bg-indigo-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700" aria-current="page">
                                Alterar Dados
                            </a>

                            <a href="../include/include_logout.php" class="bg-red-900 text-white px-3 py-2 rounded-md
                            text-sm font-medium hover:bg-red-700" aria-current="page">
                                Sair
                            </a>

                        <?php } else {?>

                            <a href="login.php" class="bg-green-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-green-700" aria-current="page">
                                Entrar
                            </a>

                        <?php } ?>

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

<header class="font-extrabold text-4xl text-center sm:text-8xl text-black leading-tight mt-4">
    <h1>Lista de Artigos</h1>
</header>

<!-- =================== -->
<!-- CONTAINER PRINCIPAL -->
<!-- =================== -->

<main class="mx-6 my-12 flex flex-wrap">

    <!-- ======= -->
    <!-- ARTIGOS -->
    <!-- ======= -->

    <?= tabelaArtigos($listaArtigos) ?>

</main>

</body>
</html>

<?php
    include "../include/lib_js.php";
?>
