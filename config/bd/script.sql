-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE;
SET SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_motel
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `bd_motel` DEFAULT CHARACTER SET utf8mb4;
USE `bd_motel`;

-- -----------------------------------------------------
-- Table cliente
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE INDEX `id_cliente_UNIQUE` (`id_cliente` ASC)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table carro
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `carro` (
  `id_carro` INT NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(10) NOT NULL,
  `modelo` VARCHAR(50) NOT NULL,
  `cor` VARCHAR(30) NOT NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_carro`),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC),
  INDEX `fk_carro_cliente_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_carro_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table quarto
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `quarto` (
  `id_quarto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` TEXT NOT NULL,
  `situacao` VARCHAR(20) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_quarto`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table servico
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` INT NOT NULL AUTO_INCREMENT,
  `tipo_servico` VARCHAR(50) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table forma_pagamento
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id_pagamento` INT NOT NULL AUTO_INCREMENT,
  `tipo_pagamento` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_pagamento`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table reserva
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` INT NOT NULL AUTO_INCREMENT,
  `data_reserva` DATE NOT NULL,
  `quantidade_horas` INT NOT NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `id_cliente` INT NOT NULL,
  `id_quarto` INT NOT NULL,
  `id_pagamento` INT NOT NULL,
  PRIMARY KEY (`id_reserva`),

  INDEX `fk_reserva_cliente_idx` (`id_cliente` ASC),
  INDEX `fk_reserva_quarto_idx` (`id_quarto` ASC),
  INDEX `fk_reserva_pagamento_idx` (`id_pagamento` ASC),

  CONSTRAINT `fk_reserva_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,

  CONSTRAINT `fk_reserva_quarto`
    FOREIGN KEY (`id_quarto`)
    REFERENCES `quarto` (`id_quarto`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,

  CONSTRAINT `fk_reserva_pagamento`
    FOREIGN KEY (`id_pagamento`)
    REFERENCES `forma_pagamento` (`id_pagamento`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE

) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table reserva_servico
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `reserva_servico` (
  `id_reserva` INT NOT NULL,
  `id_servico` INT NOT NULL,
  `quantidade` INT NOT NULL DEFAULT 1,

  PRIMARY KEY (`id_reserva`, `id_servico`),

  INDEX `fk_reserva_servico_reserva_idx` (`id_reserva` ASC),
  INDEX `fk_reserva_servico_servico_idx` (`id_servico` ASC),

  CONSTRAINT `fk_reserva_servico_reserva`
    FOREIGN KEY (`id_reserva`)
    REFERENCES `reserva` (`id_reserva`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

  CONSTRAINT `fk_reserva_servico_servico`
    FOREIGN KEY (`id_servico`)
    REFERENCES `servico` (`id_servico`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE

) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;