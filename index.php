<?php
    require "include/db.php";

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
                        <a href="../index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">
                            Página Inicial
                        </a>

                        <a href="pages/home.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium
                        hover:bg-gray-700" aria-current="page">
                            Artigos
                        </a>

                        <a href="pages/autores.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2
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
                            <a href="pages/cadastrarAutor.php?id=<?=$_SESSION['user_id']?>"
                               class="bg-indigo-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700" aria-current="page">
                                Alterar Dados
                            </a>
                            <a href="include/include_logout.php" class="bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700" aria-current="page">
                                Sair
                            </a>
                        <?php } else {?>
                            <a href="pages/login.php" class="bg-green-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-green-700" aria-current="page">
                                Entrar
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</nav>

<!-- ============ -->
<!-- BACKGROUND -->
<!-- ============ -->

<main>
    <div class="bg-indigo-900 relative overflow-hidden h-screen">
        <img src="images/background_landingpage.jpg" class="absolute h-full w-full object-cover"/>
        <div class="inset-0 bg-black opacity-25 absolute">
        </div>

        <div class="container mx-auto px-6 md:px-12 relative z-10 flex items-center py-32 xl:py-40">

            <!-- ====== -->
            <!-- HEADER -->
            <!-- ====== -->

            <header class="w-full flex flex-col items-center relative z-10">
                <h1 class="font-extrabold text-7xl text-center sm:text-8xl text-white leading-tight mt-4">
                    Bem-vindo/a <br>
                    <?php if (array_key_exists('user_name', $_SESSION)) { ?>
                    <span>
                        <?= $_SESSION['user_name'] ?>
                    </span>
                    <?php } else {?>
                    <span>
                        Visitante!
                    </span>
                    <?php } ?>
                </h1>

                <?php if (array_key_exists('user_name', $_SESSION)) { ?>
                    <p class="mt-10 font-bold text-2xl text-center text-white">
                        Neste incrível Blog, você pode escrever seus próprios artigos sobre os mais variados assuntos!
                    </p>
                    <a href="pages/home.php"
                       class="block bg-gray-600 hover:bg-gray-700 py-3 px-4 text-lg text-white font-bold uppercase
                       mt-10 rounded-md">
                        Visualizar Artigos
                    </a>
                <?php } else {?>
                    <p class="mt-10 font-bold text-2xl text-center text-white">
                        É um Autor e ainda não tem a sua conta? Clique no botão abaixo e inscreva-se!
                    </p>
                    <a href="pages/cadastrarAutor.php"
                       class="block bg-gray-600 hover:bg-gray-700 py-3 px-4 text-lg text-white font-bold uppercase
                       mt-10 rounded-md">
                        Inscreva-se
                    </a>
                <?php } ?>
            </header>
        </div>
    </div>
</main>

</body>
</html>

<?php
    include "include/lib_js.php";
?>
