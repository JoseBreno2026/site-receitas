<?php
require_once "scripts.php"; 

// Tenta estabelecer uma conexão inicial
try {
    // CORREÇÃO: Adicionado ;port=3307 em todas as strings de conexão
    $conexao = new PDO('mysql:host=localhost;port=3307;dbname=site_receita', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    try {
        // CORREÇÃO: Conecta ao servidor na porta 3307 para criar o banco
        $conexao = new PDO('mysql:host=localhost;port=3307', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $conexao->exec("CREATE DATABASE IF NOT EXISTS site_receita");

        // CORREÇÃO: Reconecta ao banco novo usando a porta 3307
        $conexao = new PDO('mysql:host=localhost;port=3307;dbname=site_receita', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $arquivo = '../sql/usuario.sql'; 
        
        if (file_exists($arquivo)) {
            $conteudoSql = file_get_contents($arquivo); 
            $conexao->exec($conteudoSql);
        }

    } catch (Exception $error) {
        // Log do erro real para você saber o que aconteceu
        log_txt("Erro crítico: " . $error->getMessage());

        // Isso vai parar o código e te mostrar o erro na tela se tudo falhar
        die("Falha total na conexão: " . $error->getMessage());
    }
}
?>