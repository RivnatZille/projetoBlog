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
//include "include/lib_js.php";
$msg = $_GET['msg'] ?? '';
?>

<body>

<!-- CAMPOS PARA LOGIN -->

<main class="flex justify-center items-center">
    <section class="bg-white p-8 w-96 rounded">
        <div class="text-center">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Bem-vindo/a!
                </h2>
                <p class="mt-6">
                    Informe seu e-mail e senha para acessar nosso incrível blog!
                </p>
                <?php if ($msg == 0) { ?>
                    <h3 class="mt-6 font-bold text-xl">Usuário não cadastrado!</h3>
                <?php } ?>

                <?php if ($msg == 1) { ?>
                    <h3 class="mt-6 font-bold text-xl">Senha incorreta!</h3>
                <?php } ?>

            </div>

            <div>
                <form class="flex flex-col items-center mt-6" action="include/validaLogin.php" method="POST">
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

<script src="https://cdn.tailwindcss.com"></script>

</body>
</html>



