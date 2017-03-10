CREATE SCHEMA `dkn` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

CREATE  TABLE `dkn`.`Users` (
  `username` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(45) NULL ,
  `tel` VARCHAR(45) NULL ,
  `email` VARCHAR(100) NULL ,
  `address` VARCHAR(200) NULL ,
  `city` VARCHAR(50) NULL ,
  `province` VARCHAR(50) NULL ,
  `postal` VARCHAR(6) NULL ,
  PRIMARY KEY (`username`) )
COMMENT = 'Customer and Admin User Table';


