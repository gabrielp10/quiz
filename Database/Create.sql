-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema quizdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `quizdb` ;
USE `quizdb` ;

-- -----------------------------------------------------
-- Table `quizdb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quizdb`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `type_user` int(11) NOT NULL DEFAULT 2,
  UNIQUE (`email`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- -----------------------------------------------------
-- Table `quizdb`.`categorias`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `quizdb`.`subcategorias`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_categorias` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias` (`fk_categorias`),
  CONSTRAINT `fk_categorias` FOREIGN KEY (`fk_categorias`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `quizdb`.`questionarios`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `questionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(300) DEFAULT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `fk_subcategorias` bigint(20) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  KEY `fk_usuarios_questionarios_idx` (`fk_usuario`),
  KEY `fk_subcategorias` (`fk_subcategorias`),
  CONSTRAINT `fk_subcategorias` FOREIGN KEY (`fk_subcategorias`) REFERENCES `subcategorias` (`id`),
  CONSTRAINT `fk_usuarios_questionarios` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- -----------------------------------------------------
-- Table `quizdb`.`questoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quizdb`.`questoes` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(3000) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `alternativa_a` VARCHAR(1000) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `alternativa_b` VARCHAR(1000) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `alternativa_c` VARCHAR(1000) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `alternativa_d` VARCHAR(1000) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `alternativa_e` VARCHAR(1000) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fk_questionarios` INT NOT NULL,
  `resposta` ENUM("A", "B", "C", "D", "E") NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_questoes_questionarios_idx` (`fk_questionarios` ASC) ,
  CONSTRAINT `fk_questoes_questionarios`
    FOREIGN KEY (`fk_questionarios`)
    REFERENCES `quizdb`.`questionarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `quizdb`.`pontuacoes`
-- -----------------------------------------------------

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacoes`
--

CREATE TABLE IF NOT EXISTS `pontuacoes` (
  `id` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `feito_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_questao` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `pontuacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao` (`fk_questao`) USING BTREE,
  ADD KEY `fk_usuario` (`fk_usuario`) USING BTREE;


ALTER TABLE `pontuacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `pontuacoes`
  ADD CONSTRAINT `pontuacoes_ibfk_1` FOREIGN KEY (`fk_questao`) REFERENCES `questionarios` (`id`),
  ADD CONSTRAINT `pontuacoes_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Fim pontuacoes
--

--
-- Estrutura para tabela `alternativas`
--

CREATE TABLE IF NOT EXISTS `alternativas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alternativa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta` tinyint(1) NOT NULL,
  `fk_questoes` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes` (`fk_questoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `alternativas`
  ADD CONSTRAINT `fk_questoes` FOREIGN KEY (`fk_questoes`) REFERENCES `questoes` (`id`);
--
-- Fim alternativas
--

--
-- Estrutura para tabela `acesso_questionarios`
--

CREATE TABLE IF NOT EXISTS `acesso_questionarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iniciado_em` datetime NOT NULL DEFAULT utc_timestamp(),
  `terminado_em` datetime DEFAULT NULL,
  `fk_questionarios` int(11) NOT NULL,
  `fk_usuarios` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios` (`fk_usuarios`),
  KEY `fk_questionarios` (`fk_questionarios`),
  CONSTRAINT `acesso_questionarios_ibfk_1` FOREIGN KEY (`fk_usuarios`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `acesso_questionarios_ibfk_2` FOREIGN KEY (`fk_questionarios`) REFERENCES `questionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acesso questionarios
--



USE `quizdb` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
