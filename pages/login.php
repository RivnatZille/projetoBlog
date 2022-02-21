<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<?php

include "../include/lib_js.php";
require "../include/db.php";

$msg = $_GET['msg'] ?? '';
?>

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
                        <a href="cadastrarAutor.php"
                           class="bg-indigo-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700" aria-current="page">
                            Inscreva-se
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ====== -->
<!-- HEADER -->
<!-- ====== -->

<main class="flex justify-center items-center">
    <section class="bg-white p-8 w-96 rounded">
        <div class="text-center">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Acesso de Autores
                </h2>
                <p class="mt-6">
                    Informe seu e-mail e senha para acessar o Blog e administrar seus artigos!
                </p>
                <?php if ($msg == "cadastroInexistente") { ?>
                    <h3 class="mt-6 font-bold text-xl">Usuário não cadastrado!</h3>
                <?php } ?>

                <?php if ($msg == "senhaIncorreta") { ?>
                    <h3 class="mt-6 font-bold text-xl">Senha incorreta!</h3>
                <?php } ?>

            </div>

            <!-- ========== -->
            <!-- FORM LOGIN -->
            <!-- ========== -->

            <div>
                <form class="flex flex-col items-center mt-6" action="../include/include_validaLogin.php" method="POST">
                    <input
                            name="email"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border
                                border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
                                focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm text-center"
                            type="email" placeholder="E-mail">
                    <input
                            name="pw"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border
                                border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none
                                focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm text-center"
                            type="password" placeholder="Senha">
                    <input
                            id="btn_logar"
                            class="ml-2 mt-6 flex items-center justify-center px-8 py-3 border border-transparent
                                text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4
                                 md:text-lg md:px-10" type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </section>
</main>

</body>
</html>



