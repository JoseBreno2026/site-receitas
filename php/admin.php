<?php

// Inclui o arquivo de conexão com o banco de dados
require 'conexao.php';

// Inicia a sessão para acessar variáveis globais da sessão
session_start();

// Só o administrador (logado e com id = 0) pode ver esta página.
// Antes, "$_SESSION['id'] == 0" era verdadeiro também para quem NÃO estava logado
// (null == 0), então qualquer visitante via a lista de usuários.
$ehAdmin = isset($_SESSION['logado'], $_SESSION['id'])
    && $_SESSION['logado'] === true
    && (int) $_SESSION['id'] === 0;

if (!$ehAdmin) {
    header('Location: paginalogin.php');
    exit;
}
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página inicial de Administrador</title>
        <style>
            
            body {
                background-color: white;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th {
                padding: 1rem;
                background-color:  #ff5a5f;
            }
            th,td,tr{
                border: 1px solid ;
            }
            td,tr{
                background-color:  #ff5a5f;
            }
        </style>

    </head>

    <body>
        <div class="ordenacao">
            <?php
             ordenarNomes();
            ?>
        </div>
    </body>

    </html>


