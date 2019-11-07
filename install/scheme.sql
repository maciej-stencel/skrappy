
CREATE TABLE `state` ( 
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `state` VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `type` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `type` varchar(150)
) ENGINE=InnoDB;

CREATE TABLE `container` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `container` varchar(150)
) ENGINE=InnoDB;

CREATE TABLE `qty_type` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `type` varchar(150)
) ENGINE=InnoDB;

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `state_id` int(11) NOT NULL,
  `county` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `postal_code` varchar(250) NOT NULL,
  `street` varchar(250) NOT NULL,
   FOREIGN KEY (`state_id`)
        REFERENCES `state`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `dispose` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_id` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `qty_type_id` int(11) NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`type_id`) REFERENCES `type`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`container_id`) REFERENCES `container`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`qty_type_id`) REFERENCES `qty_type`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;