USE `quizdb`;

-- -----------------------------------------------------
-- Insert Table `quizdb`.`usuarios`
-- -----------------------------------------------------
--

-- Usuarios
INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `create_at`, `type_user`) VALUES
(1, 'gabriel.tito', 'gabriel.tito@google.com', '321321', '2021-03-26 04:00:41', 2),
(2, 'antonio.felix', 'antonio.felix@google.com', '123123', '2021-03-26 04:00:41', 1),
(3, 'maicon.kuster', NULL, 'shitpost', '2021-03-30 06:23:12', 2);

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
