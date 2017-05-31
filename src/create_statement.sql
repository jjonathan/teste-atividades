-- -----------------------------------------------------
-- Table `teste-atividades`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `status` ;

CREATE TABLE IF NOT EXISTS `status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teste-atividades`.`atividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `atividades` ;

CREATE TABLE IF NOT EXISTS `atividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(600) NOT NULL,
  `dt_inicio` DATETIME NOT NULL,
  `dt_fim` DATETIME NULL,
  `situacao` TINYINT NULL,
  `status_id` INT NOT NULL,
  PRIMARY KEY (`id`, `status_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_atividades_status_idx` (`status_id` ASC))
ENGINE = InnoDB;

INSERT INTO `status` (`id`, `nome`) VALUES ('1', 'Pendente');
INSERT INTO `status` (`id`, `nome`) VALUES ('2', 'Em desenvolvimento');
INSERT INTO `status` (`id`, `nome`) VALUES ('3', 'Em teste');
INSERT INTO `status` (`id`, `nome`) VALUES ('4', 'Concluída');