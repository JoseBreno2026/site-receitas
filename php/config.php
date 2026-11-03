<?php

// Credenciais do administrador (antes ficavam escritas dentro do paginalogin.php).
//
// ADMIN_SENHA pode ser a senha em texto puro OU um hash gerado pelo PHP (mais seguro).
// Para gerar um hash, rode no terminal:
//     php -r "echo password_hash('SUA_SENHA', PASSWORD_DEFAULT);"
// e cole o resultado (começa com $2y$) no lugar da senha abaixo.

define('ADMIN_EMAIL', 'josebrenoalmeida2018@gmail.com');
define('ADMIN_SENHA', '987654321');
