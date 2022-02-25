<?php
    require "../include/db.php";
    require "../include/include_paginaArtigo.php";

    $idArtigo = $_GET['idArtigo'];
    $arrayArtigo = montaArtigo($idArtigo);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $arrayArtigo['titulo'] ?></title>
    <link rel="stylesheet" href="../style/style_home.css">
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

                            <a href="cadastrarAutor.php"
                               class="bg-indigo-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700" aria-current="page">
                                Inscreva-se
                            </a>

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

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<div class="mt-4">
    <div class="text-center w-4/5 mx-auto p-4 z-20 bg-gray-100 rounded drop-shadow-md">
        <h1 class="text-3xl font-extrabold dark:text-white block text-indigo-500">
            <?= html_entity_decode($arrayArtigo['titulo']) ?>
        </h1>
        <h2 class="text-l font-extrabold text-black dark:text-white block">
            Escrito por: <?= $arrayArtigo['nome'] ?>
        </h2>
        <hr class="mt-4">

        <!-- ====== -->
        <!-- ARTIGO -->
        <!-- ====== -->

        <p class="text-l mt-4 max-w-4xl mx-auto">
            <?= html_entity_decode($arrayArtigo['corpo']) ?>
        </p>
        <hr class="mt-4">

        <!-- ================ -->
        <!-- BOTÕES DINÂMICOS -->
        <!-- ================ -->

        <?php if (array_key_exists('user_id', $_SESSION) && ($_SESSION['user_id'] == $arrayArtigo['id_autor'] ||
                $_SESSION['user_id'] == 1)) { ?>

            <div class="flex basis-full justify-center items-center mt-4">
                <a href="escreverArtigo.php?idArtigo=<?=$idArtigo?>" class="mx-2 bg-indigo-900 text-white px-3 py-2
                rounded-md text-sm font-medium hover:bg-indigo-700" aria-current="page">
                    Editar
                </a>
                <a href="../actions/action_deletarArtigo.php?idArtigo=<?=$idArtigo?>" class="mx-2 bg-red-900
                text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700"
                   aria-current="page">
                    Excluir
                </a>
            </div>

        <?php } ?>
    </div>
</div>

<!-- ============== -->
<!-- BOTÃO ESTÁTICO -->
<!-- ============== -->

    <div class="flex basis-full justify-center items-center m-4">
        <a href="home.php" class="bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700
        drop-shadow-md" aria-current="page">
            Voltar
        </a>
    </div>

</body>
</html>

<?php
    include "../include/lib_js.php";
?>
