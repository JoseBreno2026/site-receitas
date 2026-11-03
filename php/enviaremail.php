<?php
    @$nome = $_POST["nome"]; // Coleta o nome enviado no formulário
    @$email = $_POST["email"]; // Coleta o email enviado no formalário
    @$mensagem = $_POST["mensagem"]; // Coleta a mensagem enviada no formulário

    $arquivo = fopen("feedback.txt", "a"); // Cria uma variavel que abre ou cria um arquivo .txt
    $conteudo = "Nome: $nome\nEmail: $email\nMensagem: $mensagem\n\n---\n\n"; // Coloca todos os dados enviados na variável conteúdo
    fwrite($arquivo, $conteudo); // Escreve no arquivo o que estiver na variável conteúdo
    fclose($arquivo); // Fecha o arquivo
 
    print "<br> O seu feedback foi enviado para nossa equipe com sucesso!"; // Mostra uma mensagem para o usuário dizendo que o feedback foi enviado
?>
