-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema teste-atividades
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `teste-atividades` ;

-- -----------------------------------------------------
-- Schema teste-atividades
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `teste-atividades` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema teste-12
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `teste-12` ;

-- -----------------------------------------------------
-- Schema teste-12
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `teste-12` DEFAULT CHARACTER SET latin1 ;
USE `teste-atividades` ;

-- -----------------------------------------------------
-- Table `teste-atividades`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teste-atividades`.`status` ;

CREATE TABLE IF NOT EXISTS `teste-atividades`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teste-atividades`.`atividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teste-atividades`.`atividades` ;

CREATE TABLE IF NOT EXISTS `teste-atividades`.`atividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(600) NOT NULL,
  `dt_inicio` DATETIME NOT NULL,
  `dt_fim` DATETIME NULL,
  `situacao` TINYINT NULL,
  `status_id` INT NOT NULL,
  PRIMARY KEY (`id`, `status_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_atividades_status_idx` (`status_id` ASC),
  CONSTRAINT `fk_atividades_status`
    FOREIGN KEY (`status_id`)
    REFERENCES `teste-atividades`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `teste-atividades`.`status` (`id`, `nome`) VALUES ('1', 'Pendente');
INSERT INTO `teste-atividades`.`status` (`id`, `nome`) VALUES ('2', 'Em desenvolvimento');
INSERT INTO `teste-atividades`.`status` (`id`, `nome`) VALUES ('3', 'Em teste');
INSERT INTO `teste-atividades`.`status` (`id`, `nome`) VALUES ('4', 'Concluída');