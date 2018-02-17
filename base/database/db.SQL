/*
Created: 17.02.2018
Modified: 17.02.2018
Model: MySQL 5.7
Database: MySQL 5.7
*/




-- Create tables section -------------------------------------------------

-- Table Mark

CREATE TABLE `Mark`
(
  `ID` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(128),
  PRIMARY KEY (`ID`)
)
;

-- Table Car

CREATE TABLE `Car`
(
  `ID` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(128),
  `ID_mark` Bigint NOT NULL,
  `ID_category` Bigint NOT NULL,
  PRIMARY KEY (`ID`)
)
;

CREATE INDEX `IX_Relationship1` ON `Car` (`ID_mark`)
;

CREATE INDEX `IX_Relationship2` ON `Car` (`ID_category`)
;

-- Table Category

CREATE TABLE `Category`
(
  `ID` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(128),
  PRIMARY KEY (`ID`)
)
;

-- Table Characteristic

CREATE TABLE `Characteristic`
(
  `ID` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(128),
  `value` Varchar(128),
  `unit` Varchar(128),
  `ID_modification` Bigint NOT NULL,
  PRIMARY KEY (`ID`)
)
;

CREATE INDEX `IX_Relationship5` ON `Characteristic` (`ID_modification`)
;

-- Table Modification

CREATE TABLE `Modification`
(
  `ID` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(128),
  `ID_car` Bigint NOT NULL,
  PRIMARY KEY (`ID`)
)
;

CREATE INDEX `IX_Relationship6` ON `Modification` (`ID_car`)
;

-- Create foreign keys (relationships) section ------------------------------------------------- 


ALTER TABLE `Car` ADD CONSTRAINT `Relationship1` FOREIGN KEY (`ID_mark`) REFERENCES `Mark` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Car` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`ID_category`) REFERENCES `Category` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Characteristic` ADD CONSTRAINT `Relationship5` FOREIGN KEY (`ID_modification`) REFERENCES `Modification` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Modification` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`ID_car`) REFERENCES `Car` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;




