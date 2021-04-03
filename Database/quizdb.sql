-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Abr-2021 às 04:43
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quizdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacoes`
--

CREATE TABLE `pontuacoes` (
  `id` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `feito_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_questao` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pontuacoes`
--

INSERT INTO `pontuacoes` (`id`, `pontuacao`, `feito_em`, `fk_questao`, `fk_usuario`) VALUES
(16, 0, '2021-03-29 01:04:25', 2, 1),
(17, 1, '2021-03-29 01:04:42', 3, 1),
(18, 0, '2021-03-29 01:06:53', 1, 1),
(19, 0, '2021-03-29 01:22:14', 1, 1),
(20, 2, '2021-03-30 03:23:09', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionarios`
--

CREATE TABLE `questionarios` (
  `id` int(11) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questionarios`
--

INSERT INTO `questionarios` (`id`, `img`, `nome`, `descricao`, `fk_usuario`) VALUES
(1, 'php-logo.png', 'Curiosidades sobre PHP', 'Nesse quiz você poderá provar seus conhecimento na liguagem de programação PHP.', 2),
(2, 'bash-logo.jpg', 'Comandos mais utilizados no linux', NULL, 2),
(3, 'python-logo.png', 'Python - Básico', 'Python básico para iniciantes.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` bigint(20) NOT NULL,
  `descricao` varchar(3000) DEFAULT NULL,
  `alternativa_a` varchar(1000) DEFAULT NULL,
  `alternativa_b` varchar(1000) DEFAULT NULL,
  `alternativa_c` varchar(1000) DEFAULT NULL,
  `alternativa_d` varchar(1000) DEFAULT NULL,
  `alternativa_e` varchar(1000) DEFAULT NULL,
  `fk_questionarios` int(11) NOT NULL,
  `resposta` enum('A','B','C','D','E') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `descricao`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `alternativa_e`, `fk_questionarios`, `resposta`) VALUES
(1, 'Qual comando copia os arquivos entre os diretorios?', 'mv', 'sudo rm -rf /', 'cat', 'cp', 'cd', 2, 'D'),
(2, 'Qual comando move os arquivos de um diretorio para o outro?', 'mv', 'sudo rm -rf /', 'cat', 'cp', 'cd', 2, 'A'),
(3, 'Qual função do PHP transforma o texto em maiúsculo?', '$string,toUpper()', 'upper_str($tring)', 'strtoupper($tring)', 'str_upper($tring)', 'upper($string)', 1, 'C'),
(4, 'Qual é a sintaxe correta para ter a saida \"Hello World\"?', 'print(\"Hello World\")', 'echo(\"Hello World\");', 'p(\"Hello World\")', 'echo \"Hello World\"', 'Nenhuma das alternativas', 3, 'A'),
(5, 'Como você inseri COMENTÁRIOS em códigos Python?', '/*Esse é um comentário*/', '//Esse é um comentário', '#Esse é um comentário', '--Esse é um comentário', '&lt;!-- Esse é um comentário --&gt;', 3, 'C'),
(6, 'Qual deles NÃO é um nome de variável válido?', 'minha_variavel', 'minha-variavel', '_minhavariavel', 'minhaVariavel', 'Minhavariavel', 3, 'B'),
(7, 'Qual é a extensão de arquivo correta para arquivos Python?', '.pyt', '.pyth', '.snake', '.pt', '.py', 3, 'E'),
(8, 'Qual é a maneira correta de criar uma função em Python?', 'create minhaFunction()', 'function minhaFunction()', 'def minhaFunction()', 'public void minhaFunction()', 'fn minhaFunction()', 3, 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `type_user` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `create_at`, `type_user`) VALUES
(1, 'gabriel.tito', 'gabriel.tito@google.com', '321321', '2021-03-26 04:00:41', 2),
(2, 'antonio.felix', 'antonio.felix@google.com', '123123', '2021-03-26 04:00:41', 1),
(3, 'maicon.kuster', NULL, 'shitpost', '2021-03-30 06:23:12', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pontuacoes`
--
ALTER TABLE `pontuacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao` (`fk_questao`) USING BTREE,
  ADD KEY `fk_usuario` (`fk_usuario`) USING BTREE;

--
-- Índices para tabela `questionarios`
--
ALTER TABLE `questionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_UNIQUE` (`nome`),
  ADD KEY `fk_usuarios_questionarios_idx` (`fk_usuario`);

--
-- Índices para tabela `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questoes_questionarios_idx` (`fk_questionarios`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pontuacoes`
--
ALTER TABLE `pontuacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `questionarios`
--
ALTER TABLE `questionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pontuacoes`
--
ALTER TABLE `pontuacoes`
  ADD CONSTRAINT `pontuacoes_ibfk_1` FOREIGN KEY (`fk_questao`) REFERENCES `questionarios` (`id`),
  ADD CONSTRAINT `pontuacoes_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `questionarios`
--
ALTER TABLE `questionarios`
  ADD CONSTRAINT `fk_usuarios_questionarios` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_questoes_questionarios` FOREIGN KEY (`fk_questionarios`) REFERENCES `questionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
