# Plataforma de Consulta de Receitas 🍳

Aplicação web desenvolvida para consulta de receitas culinárias brasileiras, organizadas por região. O sistema conta com um módulo de segurança e autenticação, permitindo que os utilizadores criem contas, façam login e acedam ao catálogo de receitas.

## 🚀 Funcionalidades
- **Sistema de Autenticação:** Registo e login de utilizadores com gestão de sessões.
- **Consulta de Receitas por Região:** Catálogo com 20 receitas tradicionais, acessíveis pelas regiões do Brasil (Norte, Nordeste, Sudeste, Sul e Centro-Oeste) ou pela lista completa na página principal. Cada receita apresenta os ingredientes e o modo de preparo.
- **Proteção de Rotas:** A página principal e a área "Minha conta" só abrem para utilizadores autenticados, e o painel de administrador só abre para o administrador.

## 🛠️ Tecnologias Utilizadas
- **Back-end:** PHP 7.0 ou superior (com PDO)
- **Banco de Dados:** MySQL (ou MariaDB, que já vem no XAMPP)
- **Front-end:** HTML5 e CSS3

## ⚙️ Como executar o projeto na sua máquina

Para rodar este projeto, será necessário um ambiente de servidor local como [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou WAMP.

> **Atenção:** acesse sempre o site por `http://localhost/...`. Não abra os arquivos com duplo clique nem pelo Live Server do VS Code, pois os arquivos `.php` precisam ser executados pelo Apache; caso contrário, o navegador baixa o arquivo em vez de abrir a página.

1. Clone o repositório dentro da pasta `htdocs` (se usar XAMPP) ou `www` (se usar WAMP):
`git clone https://github.com/JoseBreno2026/sistema-receitas-php.git`

2. Inicie os módulos **Apache** e **MySQL** no painel de controlo do seu servidor local.

3. Importe o banco de dados:
   - Abra o phpMyAdmin (normalmente em `http://localhost/phpmyadmin`).
   - Crie um banco de dados chamado `site_receita`.
   - Selecione o banco `site_receita` e importe o arquivo `sql/usuario.sql` (ele cria a tabela `usuario`).
   - *Este passo é opcional:* se o banco não existir, o arquivo `php/conexao.php` cria o banco e a tabela automaticamente no primeiro acesso (usando o usuário `root` sem senha).

4. Configure a conexão:
   - Abra o arquivo `php/conexao.php`.
   - O projeto está configurado com host `localhost`, usuário `root`, senha vazia e **porta `3307`**. Em uma instalação padrão do XAMPP/WAMP, a porta do MySQL é **`3306`**: nesse caso, troque `port=3307` por `port=3306` nas três linhas de conexão do arquivo. Ajuste também o usuário e a senha, caso sejam diferentes no seu servidor.

5. Acesse o projeto no navegador:
`http://localhost/sistema-receitas-php`
(se o seu Apache usar outra porta, inclua-a no endereço, por exemplo `http://localhost:8080/sistema-receitas-php`)
