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


