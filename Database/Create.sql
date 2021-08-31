SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `acesso_questionarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iniciado_em` datetime NOT NULL DEFAULT utc_timestamp(),
  `terminado_em` datetime DEFAULT NULL,
  `fk_questionarios` int(11) NOT NULL,
  `fk_usuarios` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios` (`fk_usuarios`),
  KEY `fk_questionarios` (`fk_questionarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `alternativas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alternativa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta` tinyint(1) NOT NULL,
  `fk_questoes` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes` (`fk_questoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `pontuacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pontuacao` int(11) DEFAULT NULL,
  `feito_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_questao` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questao` (`fk_questao`) USING BTREE,
  KEY `fk_usuario` (`fk_usuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  KEY `fk_subcategorias` (`fk_subcategorias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE IF NOT EXISTS `questoes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(3000) DEFAULT NULL,
  `fk_questionarios` int(11) NOT NULL,
  `resposta` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes_questionarios_idx` (`fk_questionarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_categorias` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias` (`fk_categorias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `type_user` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


ALTER TABLE `acesso_questionarios`
  ADD CONSTRAINT `acesso_questionarios_ibfk_1` FOREIGN KEY (`fk_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `acesso_questionarios_ibfk_2` FOREIGN KEY (`fk_questionarios`) REFERENCES `questionarios` (`id`);

ALTER TABLE `alternativas`
  ADD CONSTRAINT `fk_questoes` FOREIGN KEY (`fk_questoes`) REFERENCES `questoes` (`id`);

ALTER TABLE `pontuacoes`
  ADD CONSTRAINT `pontuacoes_ibfk_1` FOREIGN KEY (`fk_questao`) REFERENCES `questionarios` (`id`),
  ADD CONSTRAINT `pontuacoes_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

ALTER TABLE `questionarios`
  ADD CONSTRAINT `fk_subcategorias` FOREIGN KEY (`fk_subcategorias`) REFERENCES `subcategorias` (`id`),
  ADD CONSTRAINT `fk_usuarios_questionarios` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_questoes_questionarios` FOREIGN KEY (`fk_questionarios`) REFERENCES `questionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `subcategorias`
  ADD CONSTRAINT `fk_categorias` FOREIGN KEY (`fk_categorias`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
