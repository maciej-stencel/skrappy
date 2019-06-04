CREATE TABLE users (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(150) NOT NULL,
  first_name VARCHAR(150) NOT NULL,
  last_name VARCHAR(150) NOT NULL,
  password VARCHAR(250) NOT NULL,
  email VARCHAR(150) NOT NULL,
  state VARCHAR(250) NOT NULL,
  county VARCHAR(250) NOT NULL,
  city VARCHAR(250) NOT NULL,
  postal_code VARCHAR(250) NOT NULL,
  street VARCHAR(250) NOT NULL);

CREATE TABLE `dispose` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`date` DATE, 
	`type` TINYINT,
	`containet_type` TINYINT,
	`qty` MEDIUMINT,
	`quantity_type` TINYINT,
	`user_id` INT NOT NULL
)