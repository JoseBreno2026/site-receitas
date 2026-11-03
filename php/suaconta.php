<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Inicia a sessão para acessar variáveis globais da sessão
session_start();

// Se não estiver logado, volta para o login e para a execução aqui
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: paginalogin.php');
    exit;
}

// O administrador (id = 0) não tem conta na tabela de usuários
if ((int) $_SESSION['id'] === 0) {
    header('Location: admin.php');
    exit;
}

// Obtém o ID do usuário da sessão
$id = $_SESSION['id'];

// Mensagem que será mostrada em um alert() no final da página (se houver)
$alerta = null;

// ---------------------------------------------------------------------------
// As ações abaixo ficam ANTES de qualquer HTML. Se vierem depois, o
// header("Location: ...") é ignorado ("headers already sent") e não redireciona.
// ---------------------------------------------------------------------------

// Verifica se o botão de apagar conta foi clicado
if (isset($_POST['apagar'])) {

    // Prepara a consulta para deletar o usuário no banco de dados
    $deletar = $conexao->prepare("DELETE FROM usuario WHERE id = :id");
    $deletar->bindValue(':id', $id); // Vincula o ID à consulta

    try {
        $deletar->execute(); // Executa a consulta
        header('Location: logout.php'); // Redireciona para o logout (que leva ao index)
        exit;
    } catch (PDOException $error) {
        // Registra o erro em um log e prepara uma mensagem de erro
        log_txt("Erro ao deletar: " . $error->getMessage());
        $alerta = 'Erro ao deletar!';
    }
}

// Verifica se o botão de alterar senha foi clicado
if (isset($_POST['alterar'])) {
    $novaSenha = $_POST['senha'] ?? '';

    if (!is_string($novaSenha) || trim($novaSenha) === '') {
        $alerta = 'Digite a nova senha.';
    } else {
        // Criptografa a nova senha inserida pelo usuário
        $senha = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Prepara a consulta para atualizar a senha no banco de dados
        $alterar = $conexao->prepare("UPDATE usuario SET senha = :senha WHERE id = :id");
        $alterar->bindValue(":senha", $senha); // Vincula a nova senha à consulta
        $alterar->bindValue(":id", $id); // Vincula o ID à consulta

        try {
            $alterar->execute(); // Executa a consulta
            $alerta = 'SENHA ALTERADA COM SUCESSO';
        } catch (PDOException $error) {
            // Registra o erro em um log e prepara uma mensagem de erro
            log_txt("Erro ao alterar dados: " . $error->getMessage());
            $alerta = 'Erro ao alterar dados!';
        }
    }
}

// Prepara uma consulta para buscar o nome e o email do usuário no banco de dados
$dados_perfil = $conexao->prepare("SELECT nome, email FROM usuario WHERE id = :id;");
$dados_perfil->bindValue(':id', $id); // Vincula o ID à consulta
$dados_perfil->execute(); // Executa a consulta

// Obtém os resultados da consulta como um objeto
$perfil = $dados_perfil->fetch(PDO::FETCH_OBJ);

// Se a conta não existe mais no banco, encerra a sessão
if (!$perfil) {
    header('Location: logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/suaconta.css">
</head>

<body>
    <header>
        <nav>
            <!-- Links de navegação -->
            <a href="paginaprincipal.php" class="nav-item">
                <h1>Receitas Deliciosas</h1>
            </a>
            <a href="logout.php" class="nav-item"><img src="../img/logout.webp" alt=""></a>
        </nav>
    </header>
    <main>
        <div class="left-grid">
            <img src="../img/logo.jpg" alt="">
        <div>
                <!-- Exibe o nome do usuário -->
                <h2>
                    <?= htmlspecialchars($perfil->nome) ?>
                </h2>
            </div>
        </div>

        <div class="right-grid">
            <div>
                <h3>Seus Dados</h3>

                <!-- Exibe o nome completo do usuário -->
                <div class="label-box"><img src="../img/perfil.png" alt="">Nome completo</div>
                <div class="input-box">
                    <?= htmlspecialchars($perfil->nome) ?>
                </div>

                <!-- Exibe o email do usuário -->
                <div class="label-box"><img src="../img/perfil.png" alt="">Email</div>
                <div class="input-box">
                    <?= htmlspecialchars($perfil->email) ?>
                </div>
            </div>
            <div>
                <h3>Alterar senha</h3>
                <!-- Formulário para alterar a senha -->
                <form action="" method="post">
                    <input type="password" name="senha" placeholder="Nova senha" autocomplete="new-password">
                    <button type="submit" name="alterar"><span class="botao-texto">Alterar</span></button>
                </form>
                <!-- Formulário para apagar a conta -->
                <form action="" method="post">
                    <button type="submit" name="apagar"><span class="botao-texto">APAGAR CONTA</span></button>
                </form>
            </div>
        </div>
    </main>
<?php if ($alerta !== null): ?>
    <script>alert(<?= json_encode($alerta, JSON_UNESCAPED_UNICODE) ?>);</script>
<?php endif; ?>
</body>

</html>
