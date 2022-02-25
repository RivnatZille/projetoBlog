<?php
require "../include/db.php";
require "../include/include_autor.php";

$listaAutores = buscaAutores();

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
    <link rel="stylesheet" href="../style/style_autores.css">
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

<!-- ======= -->
<!-- ALERTAS -->
<!--======== -->

<section class="flex justify-center items-center text-xs font-bold">
    <?php if ($msg == "falhaCadastro") { ?>
        <h3 class="mt-6 font-bold text-red-500">Falha ao cadastrar!</h3>
    <?php } ?>

    <?php if ($msg == "sucessoCadastro") { ?>
        <h3 class="mt-6 font-bold text-lime-500">Autor cadastrado com sucesso!</h3>
    <?php } ?>

    <?php if ($msg == "falhaDeletar") { ?>
        <h3 class="mt-6 font-bold text-red-500">Falha ao deletar autor!</h3>
    <?php } ?>

    <?php if ($msg == "sucessoDeletar") { ?>
        <h3 class="mt-6 font-bold text-lime-500">Autor deletado com sucesso!</h3>
    <?php } ?>

    <?php if ($msg == "falhaAlterar") { ?>
        <h3 class="mt-6 font-bold text-red-500">Falha ao alterar os dados do autor!</h3>
    <?php } ?>

    <?php if ($msg == "sucessoAlterar") { ?>
        <h3 class="mt-6 font-bold text-lime-500">Dados do autor alterados com sucesso!</h3>
    <?php } ?>
</section>

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<header class="font-extrabold text-4xl text-center sm:text-8xl text-white leading-tight mt-4">
    <h1>Lista de Autores</h1>
</header>

<!-- ============= -->
<!-- TABLE AUTORES -->
<!-- ============= -->

<div class="flex flex-col">
    <div class="flex justify-center -my-2 overflow-x-auto">
        <div class="m-4 py-2 align-middle inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <?php if (array_key_exists('user_id', $_SESSION) && $_SESSION['user_id'] == 1) { ?>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                        <?php } ?>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            E-mail
                        </th>
                        <?php if (array_key_exists('user_id', $_SESSION) && $_SESSION['user_id'] == 1) { ?>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Excluir
                            </th>
                        <?php } ?>

                    </thead>
                    </tr>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?= tabela($listaAutores) ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
include "../include/lib_js.php";
?>