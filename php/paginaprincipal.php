<?php

require_once 'conexao.php';

session_start();

// Só entra quem estiver logado; senão volta para o login e para a execução aqui.
// (isset evita o "Undefined array key", que imprimia um aviso e quebrava o redirecionamento)
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: paginalogin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas Deliciosas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="cabecalho">
        <a href="suaconta.php"><h3>MINHA CONTA</h3></a>
    </div>

    <h1 id="titulo-principal">VEJA AS RECEITAS POR REGIÃO</h1>

    <section class="conteiner">
        <div class="cartao">
            <a href="../html/norte.html">
                <img src="../img/norte.webp" alt="Tacacá - Região Norte">
                <h3>Região Norte</h3>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/nordeste.html">
                <img src="../img/nordeste.jpg" alt="Acarajé - Região Nordeste">
                <h3>Região Nordeste</h3>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/sudeste.html">
                <img src="../img/sudeste.jpg" alt="Pão de Queijo - Região Sudeste">
                <h3>Região Sudeste</h3>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/sul.html">
                <img src="../img/sul.jpeg" alt="Churrasco - Região Sul">
                <h3>Região Sul</h3>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/centro-oeste.html">
                <img src="../img/centrooeste.jpg" alt="Arroz com Pequi - Região Centro-Oeste">
                <h3>Região Centro-Oeste</h3>
            </a>
        </div>
    </section>

    <hr><br>
    <h1 id="titulo-secundario">VEJA TODAS AS RECEITAS</h1>

    <section class="conteiner">
        <div class="cartao">
            <a href="../html/feijoada.html">
                <img src="../img/feijoada.jpg" alt="Feijoada">
                <h3>Feijoada <span class="favorito"> </span></h3>
                <p>Tradicional prato brasileiro feito com feijão preto e carnes.</p>
            </a>
        </div>
       
        <div class="cartao">
            <a href="../html/acaraje.html">
                <img src="../img/acaraje.jpg" alt="Acarajé">
                <h3>Acarajé <span class="favorito"> </span></h3>
                <p>Delícia da Bahia feita com feijão-fradinho e vatapá.</p>
            </a>
        </div>
        
        <div class="cartao">
            <a href="../html/moqueca.html">
                <img src="../img/moqueca.jpeg" alt="Moqueca">
                <h3>Moqueca <span class="favorito"> </span></h3>
                <p>Prato de frutos do mar com leite de coco e azeite de dendê.</p>
            </a>
        </div>  

        <div class="cartao">
            <a href="../html/paodequeijo.html">
                <img src="../img/pão de queijo.jpg" alt="Pão de Queijo">
                <h3>Pão de Queijo <span class="favorito"> </span></h3>
                <p>Especialidade mineira feita com polvilho e queijo.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/churrasco.html">
                <img src="../img/churrasco.jpg" alt="Churrasco">
                <h3>Churrasco <span class="favorito"> </span></h3>
                <p>Tradicional grelhado gaúcho servido com farofa.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/tacaca.html">
                <img src="../img/tacaca.jpg" alt="Tacacá">
                <h3>Tacacá <span class="favorito"> </span></h3>
                <p>Sopa amazônica feita com tucupi e jambu.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/baiao_de_dois.html">
                <img src="../img/baiaodedois.webp" alt="Baião de Dois">
                <h3>Baião de Dois <span class="favorito"> </span></h3>
                <p>Arroz e feijão combinados, típico do Nordeste.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/cuscuzpaulista.html">
                <img src="../img/cuscuzpaulista.webp" alt="Cuscuz Paulista">
                <h3>Cuscuz Paulista <span class="favorito"> </span></h3>
                <p>Prato de milho recheado com vegetais e carnes.</p>
            </a>
        </div>
        <div class="cartao">
            <a href="../html/bolinho_de_bacalhau.html">
                <img src="../img/bolinhodebacalhau.jpg" alt="Bolinho de Bacalhau">
                <h3>Bolinho de Bacalhau <span class="favorito"> </span></h3>
                <p>Petisco crocante feito com bacalhau e batatas.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/vatapa.html">
                <img src="../img/vatapa.jpg" alt="Vatapá">
                <h3>Vatapá <span class="favorito"> </span></h3>
                <p>Creme baiano de camarão com leite de coco.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/quindim.html"> 
                <img src="../img/quindim.jpg" alt="Quindim">
                <h3>Quindim <span class="favorito"> </span></h3>
                <p>Sobremesa de coco típica do Brasil.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/canjica.html">
                <img src="../img/canjica.webp" alt="Canjica">
                <h3>Canjica <span class="favorito"> </span></h3>
                <p>Doce cremoso feito de milho e leite condensado.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/brigadeiro.html">
                <img src="../img/brigadeiro.jpg" alt="Brigadeiro">
                <h3>Brigadeiro <span class="favorito"> </span></h3>
                <p>Clássico doce de leite condensado e chocolate.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/cocada.html">
                <img src="../img/cocada.jpg" alt="Cocada">
                <h3>Cocada <span class="favorito"> </span></h3>
                <p>Doce tradicional de coco.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/bolo_de_rolo.html">
                <img src="../img/boloderolo.jpg" alt="Bolo de Rolo">
                <h3>Bolo de Rolo <span class="favorito"> </span></h3>
                <p>Delícia pernambucana feita com camadas finas de bolo.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/arrozcarreteiro.html">
                <img src="../img/arrozcarreteiro.png" alt="Arroz Carreteiro">
                <h3>Arroz Carreteiro <span class="favorito"> </span></h3>
                <p>Prato típico do Sul feito com arroz e carne seca.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/escondidinho.html">
                <img src="../img/escondidinho.jpg" alt="Escondidinho">
                <h3>Escondidinho <span class="favorito"> </span></h3>
                <p>Purê de mandioca recheado com carne seca.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/tapioca.html">
                <img src="../img/tapioca.jpeg" alt="Tapioca">
                <h3>Tapioca <span class="favorito"> </span></h3>
                <p>Prato leve e versátil feito com goma de mandioca.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/peixada.html">
                <img src="../img/peixada.webp" alt="Peixada">
                <h3>Peixada <span class="favorito"> </span></h3>
                <p>Prato nordestino feito com peixe e legumes.</p>
            </a>
        </div>

        <div class="cartao">
            <a href="../html/romeu_e_julieta.html">
                <img src="../img/romeuejulieta.jpg" alt="Romeu e Julieta">
                <h3>Romeu e Julieta <span class="favorito"> </span></h3>
                <p>Clássica combinação de goiabada com queijo.</p>
            </a>
        </div>
        
    </section>
    <div class="rodape">
        <p>&copy; 2025 Receitas Deliciosas. Todos os direitos reservados.</p>
    </div>
</body>
</html>