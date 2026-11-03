
-- Banco de dados: `site_receita`

-- Criando a da tabela `usuario`


CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `usuario`

ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

