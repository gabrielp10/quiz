USE `quizdb`;

-- -----------------------------------------------------
-- Insert Table `quizdb`.`usuarios`
-- -----------------------------------------------------
INSERT INTO `quizdb`.`usuarios`
(
  `username`,
  `email`,
  `password`
)
VALUES
(
  'gabriel.tito',
  'gabriel.tito@google.com',
  '321321'
);

INSERT INTO `quizdb`.`usuarios`
(
  `username`,
  `email`,
  `password`
)
VALUES
(
  'antonio.felix',
  'antonio.felix@google.com',
  '123123'
);

-- -----------------------------------------------------
-- Table `quizdb`.`usuarios`
-- -----------------------------------------------------
INSERT INTO `quizdb`.`questionarios`
(
  `img`,
  `nome`,
  `descricao`,
  `fk_usuario`)
VALUES
(
  NULL,
  'Curiosidades sobre PHP',
  'Nesse quiz você poderá provar seus conhecimento na liguagem de programação PHP.',
  2
);

INSERT INTO `quizdb`.`questionarios`
(
  `img`,
  `nome`,
  `descricao`,
  `fk_usuario`)
VALUES
(
  NULL,
  'Comandos mais utilizados no linux',
  NULL,
  2
);

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
);

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
'Qual comando move os arquivos de um diretorio para o outro?',
'mv',
'sudo rm -rf /',
'cat',
'cp',
'cd',
 2,
'A'
);

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



INSERT INTO `quizdb`.`questionarios`
(
  `img`,
  `nome`,
  `descricao`,
  `fk_usuario`)
VALUES
(
  'python-logo.png',
  'Python - Básico',
  'Python básico para iniciantes.',
  1
);

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
)
;

-- UPDATES

UPDATE questionarios SET img = 'php-logo.png' WHERE id = 1;

UPDATE questionarios set img = 'bash-logo.jpg' WHERE id = 2;

