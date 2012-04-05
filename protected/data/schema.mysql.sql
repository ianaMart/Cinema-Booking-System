CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unq_user` (`email`)
);

CREATE TABLE `tbl_screen` (
  `screen_id` int(10) unsigned NOT NULL,
  `screen` varchar(255) NOT NULL,
  `seating_capacity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`screen_id`)
);

CREATE TABLE `tbl_film` (
  `film_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rt_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `runtime` int(3) unsigned DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`film_id`),
  UNIQUE KEY `unq_rt` (`rt_id`)
);

CREATE TABLE `tbl_booking` (
  `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `showing_id` int(10) unsigned NOT NULL,
  `no_of_seats_booked` int(1) unsigned NOT NULL,
  `total_price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `unq_booking` (`user_id`,`showing_id`)
);

CREATE TABLE `tbl_showing` (
  `showing_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `film_id` int(10) unsigned NOT NULL,
  `screen_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `price_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`showing_id`)
);

CREATE TABLE `tbl_Price` (
`price_id` int unsigned NOT NULL AUTO_INCREMENT,
`price` decimal(10,2) NOT NULL,
PRIMARY KEY (`price_id`) 
);

ALTER TABLE `tbl_Showing` ADD CONSTRAINT `fk_Showing_Screen_1` FOREIGN KEY (`screen_id`) REFERENCES `tbl_Screen` (`screen_id`);

ALTER TABLE `tbl_Showing` ADD CONSTRAINT `fk_Showing_Film_1` FOREIGN KEY (`film_id`) REFERENCES `tbl_Film` (`film_id`);

ALTER TABLE `tbl_Booking` ADD CONSTRAINT `fk_Booking_Showing_1` FOREIGN KEY (`showing_id`) REFERENCES `tbl_Showing` (`showing_id`);

ALTER TABLE `tbl_Booking` ADD CONSTRAINT `fk_Booking_User_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_User` (`user_id`);

ALTER TABLE `tbl_Showing` ADD CONSTRAINT `fk_Showing_Price_1` FOREIGN KEY (`price_id`) REFERENCES `tbl_Price` (`price_id`);


-- ----------------------------
-- Records
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('1', 'admin', '$2a$07$196806248031830437075u/9ZL7pFEU1lJgbFRQu.P9bV6GTwTepm');
INSERT INTO `tbl_user` VALUES ('2', 'user1@gmail.com', '$2a$07$196806248031830437075u0tttikPf9JYfqVQWrrAosPgyo3sbp/u');

INSERT INTO `tbl_price` VALUES ('1', '5.25');
INSERT INTO `tbl_price` VALUES ('2', '7.50');

INSERT INTO `tbl_screen` VALUES ('1', 'One', '100');
INSERT INTO `tbl_screen` VALUES ('2', 'Two', '50');
INSERT INTO `tbl_screen` VALUES ('3', 'Three', '100');
INSERT INTO `tbl_screen` VALUES ('4', 'Four', '75');
INSERT INTO `tbl_screen` VALUES ('5', 'Five', '5');

INSERT INTO `tbl_showing` VALUES ('1', '1', '1', '2011-12-08', '22:40:00', '1');
INSERT INTO `tbl_showing` VALUES ('2', '2', '1', '2012-01-27', '15:20:00', '1');
INSERT INTO `tbl_showing` VALUES ('3', '1', '3', '2012-01-01', '16:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('4', '3', '4', '2011-12-08', '14:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('5', '1', '2', '2011-12-08', '21:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('6', '1', '1', '2011-12-07', '21:00:00', '1');
