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
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `quizdb`.`questionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quizdb`.`questionarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `img` VARCHAR(300) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci',
  `nome` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descricao` VARCHAR(500) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fk_usuario` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) ,
  INDEX `fk_usuarios_questionarios_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_usuarios_questionarios`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `quizdb`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


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

CREATE TABLE `pontuacoes` (
  `id` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `fk_questao` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
ALTER TABLE `pontuacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao` (`fk_questao`) USING BTREE,
  ADD KEY `fk_usuario` (`fk_usuario`) USING BTREE;


ALTER TABLE `pontuacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `pontuacoes`
  ADD CONSTRAINT `pontuacoes_ibfk_1` FOREIGN KEY (`fk_questao`) REFERENCES `questionarios` (`id`),
  ADD CONSTRAINT `pontuacoes_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

--
-- Fim pontuacoes
--


USE `quizdb` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

