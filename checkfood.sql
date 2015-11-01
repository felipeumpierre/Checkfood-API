-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema checkfood
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema checkfood
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `checkfood` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `checkfood` ;

-- -----------------------------------------------------
-- Table `checkfood`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`categories` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`file_upload`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`file_upload` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`file_upload` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(95) NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`products` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categories_id` INT NOT NULL,
  `file_upload_id` INT NOT NULL,
  `name` VARCHAR(150) NULL,
  `description` TEXT NULL,
  `price` DECIMAL(10,2) NULL,
  `stock` INT NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`categories_id` ASC),
  INDEX `fk_products_file_upload1_idx` (`file_upload_id` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `checkfood`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_file_upload1`
    FOREIGN KEY (`file_upload_id`)
    REFERENCES `checkfood`.`file_upload` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`boards`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`boards` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`boards` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `number` VARCHAR(45) NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`status` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`requests`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`requests` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`requests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `boards_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,,
  PRIMARY KEY (`id`),
  INDEX `fk_requests_boards1_idx` (`boards_id` ASC),
  INDEX `fk_requests_status1_idx` (`status_id` ASC),
  CONSTRAINT `fk_requests_boards1`
    FOREIGN KEY (`boards_id`)
    REFERENCES `checkfood`.`boards` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `checkfood`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`ingredients` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`ingredients` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(65) NULL,
  `created_at` DATETIME NULL COMMENT '\n',
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`requests_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`requests_products` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`requests_products` (
  `id` INT NOT NULL,
  `requests_id` INT NOT NULL,
  `products_id` INT NOT NULL,
  `unity_price` DECIMAL(10,2) NULL,
  `quantity` INT(3) NULL,
  `total_price` DECIMAL(10,2) NULL,
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_requests_products_requests1_idx` (`requests_id` ASC),
  INDEX `fk_requests_products_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_requests_products_requests1`
    FOREIGN KEY (`requests_id`)
    REFERENCES `checkfood`.`requests` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `checkfood`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`requests_observation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`requests_observation` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`requests_observation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `requests_products_id` INT NOT NULL,
  `observation` TEXT NULL COMMENT '	\n',
  `created_at` DATETIME CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_requests_observation_requests_products1_idx` (`requests_products_id` ASC),
  CONSTRAINT `fk_requests_observation_requests_products1`
    FOREIGN KEY (`requests_products_id`)
    REFERENCES `checkfood`.`requests_products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
