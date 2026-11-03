<?php

// Inicia a sessão
session_start();

// Limpa os dados e destroi a sessão
$_SESSION = [];
session_destroy();

// Redireciona o usuário para o index e para a execução
header('Location: ../index.html');
exit;

?>
