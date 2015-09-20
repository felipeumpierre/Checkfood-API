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
  `created_at` DATETIME NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`products` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categories_id` INT NOT NULL,
  `name` VARCHAR(150) NULL,
  `description` TEXT NULL,
  `price` DECIMAL(10,2) NULL,
  `stock` INT NULL,
  `created_at` DATETIME NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `checkfood`.`categories` (`id`)
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
  `created_at` DATETIME NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checkfood`.`requests`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`requests` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`requests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `products_id` INT NOT NULL,
  `boards_id` INT NOT NULL,
  `unity_price` DECIMAL(10,2) NULL,
  `quantity` INT NULL,
  `total_price` DECIMAL(10,2) NULL,
  `created_at` DATETIME NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_requests_products_idx` (`products_id` ASC),
  INDEX `fk_requests_boards1_idx` (`boards_id` ASC),
  CONSTRAINT `fk_requests_products`
    FOREIGN KEY (`products_id`)
    REFERENCES `checkfood`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_boards1`
    FOREIGN KEY (`boards_id`)
    REFERENCES `checkfood`.`boards` (`id`)
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
-- Table `checkfood`.`products_ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checkfood`.`products_ingredients` ;

CREATE TABLE IF NOT EXISTS `checkfood`.`products_ingredients` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `products_id` INT NOT NULL,
  `ingredients_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_ingredients_ingredients1_idx` (`ingredients_id` ASC),
  INDEX `fk_products_ingredients_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_products_ingredients_ingredients1`
    FOREIGN KEY (`ingredients_id`)
    REFERENCES `checkfood`.`ingredients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_ingredients_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `checkfood`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
