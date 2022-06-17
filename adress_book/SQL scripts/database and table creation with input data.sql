DROP DATABASE IF EXISTS `adress_project`;
CREATE DATABASE `adress_project`; 
USE `adress_project`;

SET NAMES utf8 ;
SET character_set_client = utf8mb4 ;

CREATE TABLE `cities` (
  `city_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cities` VALUES (1,'Nairobi');
INSERT INTO `cities` VALUES (2,'Kakamega');
INSERT INTO `cities` VALUES (3,'Kisii');
INSERT INTO `cities` VALUES (4,'Nandi');
INSERT INTO `cities` VALUES (5,'Mombasa');
INSERT INTO `cities` VALUES (6,'Kisumu');
INSERT INTO `cities` VALUES (7,'Machacos');
INSERT INTO `cities` VALUES (8,'Wajir');

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip code` int(5) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `contacts` VALUES (1,'Mahalon',' Owino Ochieng','Imara Estate','Nairobi','00100','0713078671');
INSERT INTO `contacts` VALUES (2,'James',' Kalya Kiprop','Kahawa Downs Estate','Nairobi','00100','0788982993');
INSERT INTO `contacts` VALUES (3,'Peter','Adele Kismayiu','Kiangoo Estate','Kakamega','00100','0711299382');
INSERT INTO `contacts` VALUES (4,'Eshter','Musesi kambona','Kasido village','Kakamega','00100','0743332228');
INSERT INTO `contacts` VALUES (5,'Gladys','irungu Kangata','londiani ','Kisii','00100','0700434222');
INSERT INTO `contacts` VALUES (6,'Pretoria','Mwangi Macharia','Sare','Migori','00100','0795334134');


