USE `quizdb`;

-- -----------------------------------------------------
-- Insert Table `quizdb`.`usuarios`
-- -----------------------------------------------------
--

-- Usuarios
INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `create_at`, `type_user`) VALUES
(1, 'gabriel.tito', 'gabriel.tito@google.com', '321321', '2021-03-26 04:00:41', 2),
(2, 'antonio.felix', 'antonio.felix@google.com', '123123', '2021-03-26 04:00:41', 1),

-- Questionarios
INSERT INTO `questionarios` (`id`, `img`, `nome`, `descricao`, `fk_usuario`) VALUES
(1, 'php-logo.png', 'PHP - Básico', 'Nesse quiz você poderá provar seus conhecimento na liguagem de programação PHP.', 2),
(2, 'bash-logo.jpg', 'Linux - Básico', 'Comandos Linux básico para iniciantes.', 2),
(3, 'python-logo.png', 'Python - Básico', 'Python básico para iniciantes.', 1),
(4, 'css.jpg', 'CSS - Básico', 'CSS Para iniciantes.', 1);

-- Linux id 2
INSERT INTO `quizdb`.`questoes`
(
`descricao`,
`alternativa_a`,
`alternativa_b`,
`alternativa_c`,
`alternativa_d`,
`alternativa_e`,
`fk_questionarios`,
`resposta`
)
VALUES
(
'Qual comando copia os arquivos entre os diretorios?',
'mv',
'sudo rm -rf /',
'cat',
'cp',
'cd',
2,
'D'
),
(
'Qual comando move os arquivos de um diretorio para o outro?',
'mv',
'sudo rm -rf /',
'cat',
'cp',
'cd',
 2,
'A'
);

-- PHP id 1
INSERT INTO `quizdb`.`questoes`
(
`descricao`,
`alternativa_a`,
`alternativa_b`,
`alternativa_c`,
`alternativa_d`,
`alternativa_e`,
`fk_questionarios`,
`resposta`
)
VALUES
(
'Qual função do PHP transforma o texto em maiúsculo?',
'$string,toUpper()',
'upper_str($tring)',
'strtoupper($tring)',
'str_upper($tring)',
'upper($string)',
 1,
'C'
);

-- Python id 3
INSERT INTO `quizdb`.`questoes`
(
`descricao`,
`alternativa_a`,
`alternativa_b`,
`alternativa_c`,
`alternativa_d`,
`alternativa_e`,
`fk_questionarios`,
`resposta`
)
VALUES
(
'Qual é a sintaxe correta para ter a saida "Hello World"?',
'print("Hello World")',
'echo("Hello World");',
'p("Hello World")',
'echo "Hello World"',
'Nenhuma das alternativas',
 3,
'A'
),
(
'Como você inseri COMENTÁRIOS em códigos Python?',
'/*Esse é um comentário*/',
'//Esse é um comentário',
'#Esse é um comentário',
'--Esse é um comentário',
'&lt;!-- Esse é um comentário --&gt;',
 3,
'C'
),
(
'Qual deles NÃO é um nome de variável válido?',
'minha_variavel',
'minha-variavel',
'_minhavariavel',
'minhaVariavel',
'Minhavariavel',
 3,
'B'
),
(
'Qual é a extensão de arquivo correta para arquivos Python?',
'.pyt',
'.pyth',
'.snake',
'.pt',
'.py',
 3,
'E'
),
(
'Qual é a maneira correta de criar uma função em Python?',
'create minhaFunction()',
'function minhaFunction()',
'def minhaFunction()',
'public void minhaFunction()',
'fn minhaFunction()',
 3,
'C'
);


--
-- Despejando dados para a tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `alternativa`, `resposta`, `fk_questoes`) VALUES
(1, 'mv', 0, 1),
(2, 'sudo rm -rf /', 0, 1),
(3, 'cat', 0, 1),
(4, 'cp', 1, 1),
(5, 'cd', 0, 1),
(6, 'mv', 1, 2),
(7, 'sudo rm -rf /', 0, 2),
(8, 'cat', 0, 2),
(9, 'cp', 0, 2),
(10, 'cd', 0, 2),
(11, '$string,toUpper()', 0, 3),
(12, 'upper_str($tring)', 0, 3),
(13, 'strtoupper($tring)', 1, 3),
(14, 'str_upper($tring)', 0, 3),
(15, 'upper($string)', 0, 3),
(16, 'print(\"Hello World\")', 1, 4),
(17, 'echo(\"Hello World\");', 0, 4),
(18, 'p(\"Hello World\")', 0, 4),
(19, 'echo \"Hello World\"', 0, 4),
(20, 'Nenhuma das alternativas', 0, 4),
(21, '/*Esse é um comentário*/', 0, 5),
(22, '//Esse é um comentário', 0, 5),
(23, '#Esse é um comentário', 1, 5),
(24, '--Esse é um comentário', 0, 5),
(25, '&lt;!-- Esse é um comentário --&gt;', 0, 5),
(26, 'minha_variavel', 0, 6),
(27, 'minha-variavel', 1, 6),
(28, '_minhavariavel', 0, 6),
(29, 'minhaVariavel', 0, 6),
(30, 'Minhavariavel', 0, 6),
(31, '.pyt', 0, 7),
(32, '.pyth', 0, 7),
(33, '.snake', 0, 7),
(34, '.pt', 0, 7),
(35, '.py', 1, 7),
(36, 'create minhaFunction()', 0, 8),
(37, 'function minhaFunction()', 0, 8),
(38, 'def minhaFunction()', 1, 8),
(39, 'public void minhaFunction()', 0, 8),
(40, 'fn minhaFunction()', 0, 8);

--
-- Despejando dados para a tabela `pontuacoes`
--

INSERT INTO `pontuacoes` (`id`, `pontuacao`, `feito_em`, `fk_questao`, `fk_usuario`) VALUES
(16, 0, '2021-03-29 01:04:25', 2, 1),
(17, 1, '2021-03-29 01:04:42', 3, 1),
(18, 0, '2021-03-29 01:06:53', 1, 1),
(19, 0, '2021-03-29 01:22:14', 1, 1),
(20, 2, '2021-03-30 03:23:09', 2, 1),
(21, 3, '2021-06-18 21:18:52', 3, 2),
(22, 3, '2021-06-19 05:41:49', 3, 1),
(23, 2, '2021-06-19 05:42:01', 2, 1);
