-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projetAgile
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetAgile
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetAgile` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `projetAgile` ;

-- -----------------------------------------------------
-- Table `projetAgile`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetAgile`.`admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  PRIMARY KEY (`idAdmin`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetAgile`.`survey`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetAgile`.`survey` (
  `idSurvey` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `description` VARCHAR(255) NULL ,
  PRIMARY KEY (`idSurvey`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetAgile`.`questionAnswer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetAgile`.`questionAnswer` (
  `idQuestion` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NULL ,
  `order` INT NULL ,
  `titleResponse1` VARCHAR(255) NULL ,
  `titleResponse2` VARCHAR(255) NULL ,
  `titleResponse3` VARCHAR(255) NULL ,
  `titleResponse4` VARCHAR(255) NULL ,
  `counter1` INT NULL ,
  `counter2` INT NULL ,
  `counter3` INT NULL ,
  `counter4` INT NULL ,
  `idSurvey` INT NOT NULL ,
  PRIMARY KEY (`idQuestion`)  ,
  INDEX `fk_question_enquete_idx` (`idSurvey` ASC)  ,
  CONSTRAINT `fk_question_enquete`
    FOREIGN KEY (`idSurvey`)
    REFERENCES `projetAgile`.`survey` (`idSurvey`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
