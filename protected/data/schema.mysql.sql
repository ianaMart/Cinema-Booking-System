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
  `total_price` decimal(5,2) unsigned NOT NULL,
  PRIMARY KEY (`booking_id`)
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
`price` decimal(10,2) unsigned NOT NULL,
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
INSERT INTO `tbl_user` VALUES ('1', 'admin', '$2a$07$196806248031830437075ulz5WDdky.VCck/0ZepPRK3Vkwv6i6Q2');

INSERT INTO `tbl_price` VALUES ('1', '5.25');
INSERT INTO `tbl_price` VALUES ('2', '7.50');
INSERT INTO `tbl_price` VALUES ('3', '6.10');

INSERT INTO `tbl_screen` VALUES ('1', 'One', '100');
INSERT INTO `tbl_screen` VALUES ('2', 'Two', '50');
INSERT INTO `tbl_screen` VALUES ('3', 'Three', '100');
INSERT INTO `tbl_screen` VALUES ('4', 'Four', '75');
INSERT INTO `tbl_screen` VALUES ('5', 'Five', '5');

INSERT INTO `tbl_film` VALUES ('1', '771190618', 'The Hunger Games', '2012', '142', 'qoUT7q2iTbQ');
INSERT INTO `tbl_film` VALUES ('2', '770863876', '21 Jump Street', '2012', '109', 'RLoKtb4c4W0');
INSERT INTO `tbl_film` VALUES ('3', '771229793', 'Mirror Mirror', '2012', '95', '8CHXHEIGb7A');
INSERT INTO `tbl_film` VALUES ('4', '770740154', 'Marvel\'s The Avengers', '2012', '142', 'eOrNdBpGMv8');
INSERT INTO `tbl_film` VALUES ('5', '771252912', 'The Best Exotic Marigold Hotel', '2012', '118', 'dDY89LYxK0w');
INSERT INTO `tbl_film` VALUES ('6', '771208374', 'Wrath of the Titans', '2012', '99', 'mQckuXV6DRA');
INSERT INTO `tbl_film` VALUES ('7', '770858174', 'Battleship', '2012', '131', 'sbx9dxcLsiQ');
INSERT INTO `tbl_film` VALUES ('8', '771240536', 'The Devil Inside', '2012', '83', 'ojTQp923rQw');
INSERT INTO `tbl_film` VALUES ('9', '771224339', 'Contraband', '2012', '109', 'Rp0b5ZXIUvE');
INSERT INTO `tbl_film` VALUES ('10', '771203062', 'We Bought a Zoo', '2011', '124', 'brbzw0ZJGlI');
INSERT INTO `tbl_film` VALUES ('11', '714976247', 'Iron Man', '2008', '126', '');
INSERT INTO `tbl_film` VALUES ('12', '770800493', 'Iron Man 2', '2010', '124', '');
INSERT INTO `tbl_film` VALUES ('13', '769959054', 'The Dark Knight', '2008', '152', '');
INSERT INTO `tbl_film` VALUES ('14', '770805418', 'Inception', '2010', '148', '');
INSERT INTO `tbl_film` VALUES ('15', '770863873', 'Mission: Impossible Ghost Protocol', '2011', '133', '');
INSERT INTO `tbl_film` VALUES ('16', '771041419', 'Men in Black III', '2012', '99', '');
INSERT INTO `tbl_film` VALUES ('17', '770672991', 'Harry Potter and the Deathly Hallows - Part 1', '2010', '146', '');

INSERT INTO `tbl_showing` VALUES ('1', '1', '1', '2012-04-27', '18:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('2', '1', '5', '2012-04-27', '22:00:00', '2');
INSERT INTO `tbl_showing` VALUES ('3', '1', '1', '2012-04-28', '12:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('4', '2', '5', '2012-04-29', '17:00:00', '3');
INSERT INTO `tbl_showing` VALUES ('5', '3', '2', '2012-06-27', '13:00:00', '3');
INSERT INTO `tbl_showing` VALUES ('6', '4', '2', '2012-06-26', '14:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('7', '14', '1', '2012-04-19', '16:00:00', '2');
INSERT INTO `tbl_showing` VALUES ('8', '14', '1', '2012-04-30', '15:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('9', '1', '3', '2012-06-18', '14:00:00', '3');