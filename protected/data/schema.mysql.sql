CREATE TABLE `tbl_User` (
`user_id` int unsigned NOT NULL AUTO_INCREMENT,
`email` varchar(255) NOT NULL,
`password` varchar(60) NOT NULL,
CONSTRAINT unq_user UNIQUE (email),
PRIMARY KEY (`user_id`) 
);

CREATE TABLE `tbl_Screen` (
`screen_id` int unsigned NOT NULL,
`screen` varchar(255) NOT NULL,
`seating_capacity` int unsigned NOT NULL,
PRIMARY KEY (`screen_id`) 
);

CREATE TABLE `tbl_Film` (
`film_id` int unsigned NOT NULL AUTO_INCREMENT,
`rt_id` int unsigned NOT NULL,
`title` varchar(255) NOT NULL,
`runtime` time NOT NULL,
`rating` int(3) NOT NULL DEFAULT '0',
`trailer` varchar(255) NULL,
PRIMARY KEY (`film_id`) 
);

CREATE TABLE `tbl_Booking` (
`booking_id` int unsigned NOT NULL AUTO_INCREMENT,
`user_id` int unsigned NOT NULL,
`showing_id` int unsigned NOT NULL,
`no_of_seats_booked` int(1) unsigned NOT NULL,
`total_price` decimal(5,2) NOT NULL,
CONSTRAINT unq_booking UNIQUE (user_id,showing_id),
PRIMARY KEY (`booking_id`) 
);

CREATE TABLE `tbl_Showing` (
`showing_id` int unsigned NOT NULL AUTO_INCREMENT,
`film_id` int unsigned NOT NULL,
`screen_id` int unsigned NOT NULL,
`start_date` date NOT NULL,
`start_time` time NOT NULL,
`price_id` int unsigned NOT NULL,
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

INSERT INTO `tbl_film` VALUES ('1', '770771659', 'The Amazing Spider-Man', '03:23:00', '0', 'oX9ZT3RbYE4');
INSERT INTO `tbl_film` VALUES ('2', '769959054', 'The Dark Knight', '02:19:00', '2', 'kqF8lcKTLw0');
INSERT INTO `tbl_film` VALUES ('3', '714976247', 'Iron Man', '02:06:00', '0', '');

INSERT INTO `tbl_price` VALUES ('1', '5.25');

INSERT INTO `tbl_screen` VALUES ('1', 'One', '100');
INSERT INTO `tbl_screen` VALUES ('2', 'Two', '50');
INSERT INTO `tbl_screen` VALUES ('3', 'Three', '100');
INSERT INTO `tbl_screen` VALUES ('4', 'Four', '75');

INSERT INTO `tbl_showing` VALUES ('1', '1', '1', '2011-12-08', '22:40:00', '1');
INSERT INTO `tbl_showing` VALUES ('2', '2', '1', '2012-01-27', '15:20:00', '1');
INSERT INTO `tbl_showing` VALUES ('3', '1', '3', '2012-01-01', '16:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('4', '3', '4', '2011-12-08', '14:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('5', '1', '2', '2011-12-08', '21:00:00', '1');
INSERT INTO `tbl_showing` VALUES ('6', '1', '1', '2011-12-07', '21:00:00', '1');
