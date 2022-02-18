<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Autor</title>
</head>

<?php
include "../include/lib_js.php";
require "../include/db.php";
require "../include/include_autor.php";

$idRecebido = $_GET['id'] ?? '';
$autorRecebido = checkAutor($idRecebido);
?>

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

            <div class="flex space-x-8">

                <?php if (array_key_exists('user_id', $_SESSION)) { ?>
                    <p class="font-medium text-white px-3 py-2">
                        <?= $_SESSION['user_name'] ?>
                    </p>
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
</nav>

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<header class="flex justify-center items-center mt-6 text-3xl font-bold">
    <h1>Dados Cadastrais</h1>
</header>

<!-- ================== -->
<!-- FORM PARA CADASTRO -->
<!-- ================== -->

<div class="text-center mb-4 mt-6">
    <form action="../actions/action_cadastrarAutor.php" method="post">
        <input type="hidden" name="inputId" value="<?= $autorRecebido['id'] ?? ''?>">
        <label for="inputNome" class="font-semibold">Nome do Autor:</label>
        <br>
        <input type="text" id="inputNome" name="inputNome" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300
             rounded-md" required value="<?= $autorRecebido['nome'] ?? '' ?>">
        <br>
        <label for="inputEmail" class="font-semibold">E-mail do Autor:</label>
        <br>
        <input type="email" id="inputEmail" name="inputEmail" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300
             rounded-md" required value="<?= $autorRecebido['email'] ?? '' ?>">
        <br>
        <button class="ml-2 mt-4 items-center justify-center px-8 py-3 border border-transparent text-base
            font-medium rounded-md text-white bg-lime-700 hover:bg-lime-500 md:py-4 md:text-lg md:px-10" type="submit">Confirmar</button>
    </form>
</div>

</body>
</html>


