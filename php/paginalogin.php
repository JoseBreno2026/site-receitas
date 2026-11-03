<?php 
require_once 'conexao.php'; 
require_once 'config.php';

session_start();

$erroLogin = false;

if (isset($_POST['login'])) {
    
    $_SESSION['logado'] = false; 

    $email = filter_input(INPUT_POST, 'email_login', FILTER_SANITIZE_EMAIL);
    $senha = (isset($_POST['senha_login']) && is_string($_POST['senha_login'])) ? $_POST['senha_login'] : '';

    // 1. Verificação do Administrador (dados em config.php)
    //    Aceita senha em texto puro ou um hash $2y$ (password_hash).
    $senhaAdminOk = (substr(ADMIN_SENHA, 0, 4) === '$2y$')
        ? password_verify($senha, ADMIN_SENHA)
        : hash_equals(ADMIN_SENHA, $senha);

    if ($email === ADMIN_EMAIL && $senhaAdminOk) {
        session_regenerate_id(true);
        $_SESSION['logado'] = true;
        $_SESSION['id'] = 0; 
        header("Location: admin.php"); 
        exit; 
    }

    // 2. Verificação no Banco de Dados
    try {
        $dados = $conexao->prepare("SELECT id, senha FROM usuario WHERE email = :email");
        $dados->bindValue(':email', $email);
        $dados->execute();

        $usuario = $dados->fetch(PDO::FETCH_OBJ);

        if ($usuario && password_verify($senha, $usuario->senha)) {
            session_regenerate_id(true);
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $usuario->id;
            
            header('Location: paginaprincipal.php');
            exit;
        } else {
            // O alerta é exibido dentro do <body> (mais abaixo), não antes do <!DOCTYPE>
            $erroLogin = true;
        }
    } catch (PDOException $e) {
        die("Erro no banco de dados: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Receitas Deliciosas</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="caixa-login">
        <h1>Login</h1>
        
        <form action="" method="POST" autocomplete="off" name="form_login_exclusivo">
            
            <input type="text" name="email_fake" style="display:none;" aria-hidden="true">
            <input type="password" name="password_fake" style="display:none;" aria-hidden="true">

            <input type="email" 
                   placeholder="Email" 
                   name="email_login" 
                   required 
                   autocomplete="none"
                   value="">

            <input type="password" 
                   placeholder="Senha" 
                   name="senha_login" 
                   required 
                   autocomplete="new-password"
                   value="">

            <button type="submit" name="login" id="botao-login">Entrar</button>
        </form>
        
        <p>Não tem uma conta? <a href="paginaregistro.php">Registre-se aqui</a></p>
    </div>
<?php if ($erroLogin): ?>
    <script>alert('Usuário ou senha inválidos');</script>
<?php endif; ?>
</body>
</html>