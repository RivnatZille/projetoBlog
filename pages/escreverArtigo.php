<!DOCTYPE html>

<?php

include "../include/lib_js.php";
require "../include/db.php";
require "../include/include_paginaArtigo.php";

$idRecebido = $_GET['idArtigo'] ?? '';
$artigoRecebido = checkArtigo($idRecebido);

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escrever Artigo</title>
    <script src="https://cdn.tiny.cloud/1/l8tz201qg1c3flz4dg0xjaj7c0m72365u5ychv76fejx47jg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            menubar: false
        });
    </script>
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

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<header class="flex justify-center items-center mt-6 text-3xl font-bold">
    <h1>Dados do Artigo</h1>
</header>

<!-- ================== -->
<!-- FORM PARA CADASTRO -->
<!-- ================== -->

<div class="text-center mb-4 mt-6">
    <form action="../actions/action_escreverArtigo.php" method="post">
        <input type="hidden" name="inputId" value="<?= $_SESSION['user_id'] ?>">
        <input type="hidden" name="inputIdArtigo" value="<?= $artigoRecebido['id'] ?? ''?>">
        <label for="inputTitulo" class="font-semibold">Título do Artigo:</label>

        <br>

        <input type="text" id="inputTitulo" name="inputTitulo" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300
             rounded-md" required value="<?= $artigoRecebido['titulo'] ?? '' ?>">

        <br>

        <label for="inputCorpo" class="font-semibold">Artigo:</label>

        <br>

<!--        <textarea class="text-center border rounded p-1 w-2/5 mt-1 focus:ring-indigo-500-->
<!--        focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md" id="inputCorpo" name="inputCorpo" rows="5" cols="40">--><?//= $artigoRecebido['corpo'] ?? '' ?><!--</textarea>-->

        <div class="m-auto w-3/5 mt-1">
            <textarea id="inputCorpo" name="inputCorpo"><?= $artigoRecebido['corpo'] ?? '' ?></textarea>
        </div>

        <br>

        <!-- ====== -->
        <!-- BOTÕES -->
        <!-- ====== -->

        <div class="flex basis-full justify-center items-center mt-4">
            <button class="mx-2 bg-green-800 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-green-600" type="submit">
                Confirmar
            </button>

            <?php if ($idRecebido) { ?>
            <a href="../pages/paginaArtigo.php?idArtigo=<?=$idRecebido?>" class="mx-2 bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700" aria-current="page">
                Voltar
            </a>
            <?php } ?>
        </div>
    </form>
</div>

</body>
</html>


