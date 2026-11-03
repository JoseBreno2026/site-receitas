<?php

// Função que verifica se um e-mail de usuário já existe no banco de dados
function existe_usuario($user_post)
{
    require 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Prepara uma consulta SQL para selecionar os e-mails de todos os usuários
    $dados = $conexao->prepare("SELECT email FROM usuario;");
    $dados->execute(); // Executa a consulta no banco de dados

    // Recupera todos os e-mails como um array de objetos
    $usuarios = $dados->fetchAll(PDO::FETCH_OBJ);

    // Percorre a lista de usuários retornados
    foreach ($usuarios as $user) {
        if ($user_post == $user->email) { // Compara o e-mail informado com os existentes
            return true; // Retorna verdadeiro se o e-mail for encontrado
        }
    }

    return false; // Retorna falso caso o e-mail não seja encontrado
}

// Função que registra mensagens de erro em um arquivo de log
function log_txt($mensagem)
{
    date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário desejado
    $log = fopen(__DIR__ . "/log.txt", "a"); // Abre ou cria o arquivo 'log.txt' para escrita
    fwrite($log, date('Y-m-d H:i:s') . "\r\n"); // Registra a data e hora atual no arquivo

    fwrite($log, "$mensagem" . "\r\n"); // Escreve a mensagem de erro no arquivo
    fclose($log); // Fecha o arquivo
}

// Função que ordena alfabeticamente os nomes dos usuários e os exibe usando o método bolha
function ordenarNomes()
{
    echo "<table align=center style=text-align:center;><th>USUÁRIOS</th>";

    require 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Prepara uma consulta SQL para selecionar os nomes dos usuários
    $nome = $conexao->prepare("SELECT nome FROM usuario");
    $nome->execute(); // Executa a consulta no banco de dados

    // Armazena os resultados como um array de objetos
    $resultados = $nome->fetchAll(PDO::FETCH_OBJ);

    // Método de ordenação bolha (bubble sort)
    $n = count($resultados);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Comparação convertendo para letras minúsculas
            if (strtolower($resultados[$j]->nome) > strtolower($resultados[$j + 1]->nome)) {
                // Troca os elementos se estiverem fora de ordem
                $temp = $resultados[$j];
                $resultados[$j] = $resultados[$j + 1];
                $resultados[$j + 1] = $temp;
            }
        }
    }

    // Itera sobre os nomes ordenados e os exibe em uma tabela
    foreach ($resultados as $r) {
        // htmlspecialchars impede que um nome com HTML/JS cadastrado por um usuário seja executado
        echo "<tr><td>" . htmlspecialchars($r->nome) . "</td></tr>";
    }

    echo "</table>";
}
?>
