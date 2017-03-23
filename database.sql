DROP SCHEMA `DKN`;
CREATE SCHEMA `DKN` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

CREATE  TABLE `DKN`.`Users` (
  `username` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(50) NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `tel` VARCHAR(20) NOT NULL ,
  `email` VARCHAR(100) NULL ,
  `address` VARCHAR(200) NULL ,
  `city` VARCHAR(50) NULL ,
  `province` VARCHAR(50) NULL ,
  `postal` VARCHAR(6) NULL ,
  `is_block` VARCHAR(1) NOT NULL ,
  `is_admin` VARCHAR(1) NOT NULL ,
  PRIMARY KEY (`username`) );

INSERT INTO `dkn`.`users` (`username`, `password`, `name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_block`, `is_admin`) VALUES ('redeteus', 'sghs0721', 'Ghang seok Seo', '647-877-3578', 'redeteus@gmail.com', '4968 Yonge St. Apt #2505', 'Toronto', 'Ontario', 'M2N7G9', 'N', 'N');
INSERT INTO `dkn`.`users` (`username`, `password`, `name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_block`, `is_admin`) VALUES ('admin', 'admin', 'Administrator', '123-456-7890', 'admin@dkn.com', '1234 Yonge St.', 'Toronto', 'Ontario', 'M2N1N9', 'N', 'Y');
INSERT INTO `dkn`.`users` (`username`, `password`, `name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_block`, `is_admin`) VALUES ('test1', '123456', 'Test1', '651-789-1596', 'test1@gmail.com', '1345 Yonge St.', 'Toronto', 'Ontario', 'M2N2T1', 'N', 'N');
INSERT INTO `dkn`.`users` (`username`, `password`, `name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_block`, `is_admin`) VALUES ('test2', '123456', 'Test2', '652-789-1596', 'test2@gmail.com', '2346 Yonge St.', 'Toronto', 'Ontario', 'M2N2T2', 'N', 'N');
INSERT INTO `dkn`.`users` (`username`, `password`, `name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_block`, `is_admin`) VALUES ('test3', '123456', 'Test3', '653-789-1596', 'test3@gmail.com', '3346 Yonge St.', 'Halifax', 'Nova Scotia', 'N3G7Q3', 'Y', 'N');

CREATE  TABLE `DKN`.`Cars` (
  `car_id` INT NOT NULL AUTO_INCREMENT  ,
  `username` VARCHAR(50) NOT NULL ,
  `make` VARCHAR(50) NOT NULL ,
  `model` VARCHAR(50) NOT NULL ,
  `year` VARCHAR(4) NOT NULL ,
  PRIMARY KEY (`car_id`) );

INSERT INTO `dkn`.`cars` (`username`, `make`, `model`, `year`) VALUES ('redeteus', 'Lexus', 'NX', '2015');
INSERT INTO `dkn`.`cars` (`username`, `make`, `model`, `year`) VALUES ('redeteus', 'Chevrolet', 'Spark', '2010');
INSERT INTO `dkn`.`cars` (`username`, `make`, `model`, `year`) VALUES ('redeteus', 'BMW', 'Z4', '1997');
INSERT INTO `dkn`.`cars` (`username`, `make`, `model`, `year`) VALUES ('test1', 'Benz', 'S300', '2007');


CREATE  TABLE `DKN`.`Appointments` (
  `appointment_id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(50) NOT NULL ,
  `branch_id` INT NOT NULL ,
  `date` VARCHAR(10) NOT NULL ,
  `time` VARCHAR(2) NULL ,
  `visitor_name` VARCHAR(100) NOT NULL ,
  `tel` VARCHAR(20) NOT NULL ,
  `email` VARCHAR(100) NULL ,
  `address` VARCHAR(200) NULL ,
  `city` VARCHAR(50) NULL ,
  `province` VARCHAR(50) NULL ,
  `postal` VARCHAR(6) NULL ,
  `make` VARCHAR(50) NOT NULL ,
  `model` VARCHAR(50) NOT NULL ,
  `year` VARCHAR(4) NOT NULL ,
  `is_scheduled` VARCHAR(1) NOT NULL ,
  PRIMARY KEY (`appointment_id`) );

CREATE  TABLE `DKN`.`Branches` (
  `branch_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `tel` VARCHAR(20) NOT NULL ,
  `email` VARCHAR(100) NULL ,
  `address` VARCHAR(200) NOT NULL ,
  `city` VARCHAR(50) NOT NULL ,
  `province` VARCHAR(50) NOT NULL ,
  `postal` VARCHAR(6) NOT NULL ,
  `map` VARCHAR(1000) NOT NULL ,
  `is_main` VARCHAR(1) NOT NULL ,
  `is_open` VARCHAR(1) NOT NULL ,
  PRIMARY KEY (`branch_id`) );

INSERT INTO `dkn`.`branches` (`name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `map`, `is_main`, `is_open`) VALUES ('Main', '647-123-4567', 'main@dkn.com', '123 Yonge St.', 'Toronto', 'Ontario', 'M2N1G9', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8149.692361582063!2d-79.41654482981137!3d43.76556463223513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48da4ef5a518aea9!2sCineplex+Cinemas+Empress+Walk!5e0!3m2!1sen!2sca!4v1489119752728', 'Y', 'Y');
INSERT INTO `dkn`.`branches` (`name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `map`, `is_main`, `is_open`) VALUES ('Etobicoke', '647-456-7890', 'etobicoke@dkn.com', '456 Yonge St.', 'Toronto', 'Ontario', 'M2N9T1', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8149.692361582063!2d-79.41654482981137!3d43.76556463223513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48da4ef5a518aea9!2sCineplex+Cinemas+Empress+Walk!5e0!3m2!1sen!2sca!4v1489119752728', 'N', 'Y');
INSERT INTO `dkn`.`branches` (`name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `map`, `is_main`, `is_open`) VALUES ('Quebec City', '123-789-4568', 'quecbeccity@dkn.com', '456 Rue DeMont', 'Quebec City', 'Quebec', 'Q9S5B8', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8149.692361582063!2d-79.41654482981137!3d43.76556463223513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48da4ef5a518aea9!2sCineplex+Cinemas+Empress+Walk!5e0!3m2!1sen!2sca!4v1489119752728', 'N', 'Y');


