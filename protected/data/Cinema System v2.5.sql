ALTER TABLE `tbl_Showing` DROP FOREIGN KEY `fk_Showing_Screen_1`;
ALTER TABLE `tbl_Showing` DROP FOREIGN KEY `fk_Showing_Film_1`;
ALTER TABLE `tbl_Seat_Booked` DROP FOREIGN KEY `fk_SeatBooking_Booking_1`;
ALTER TABLE `tbl_Booking` DROP FOREIGN KEY `fk_Booking_Showing_1`;
ALTER TABLE `tbl_Booking` DROP FOREIGN KEY `fk_Booking_User_1`;
ALTER TABLE `tbl_Screen_Seat` DROP FOREIGN KEY `fk_ScreenSeat_Seat_1`;
ALTER TABLE `tbl_Screen_Seat` DROP FOREIGN KEY `fk_ScreenSeat_Screen_1`;
ALTER TABLE `tbl_Seat_Booked` DROP FOREIGN KEY `fk_SeatBooked_ScreenSeat_1`;
ALTER TABLE `tbl_Showing` DROP FOREIGN KEY `fk_Showing_Price_1`;
ALTER TABLE `tbl_User`DROP PRIMARY KEY;
ALTER TABLE `tbl_Screen`DROP PRIMARY KEY;
ALTER TABLE `tbl_Seat`DROP PRIMARY KEY;
ALTER TABLE `tbl_Film`DROP PRIMARY KEY;
ALTER TABLE `tbl_Booking`DROP PRIMARY KEY;
ALTER TABLE `tbl_Showing`DROP PRIMARY KEY;
ALTER TABLE `tbl_Seat_Booked`DROP PRIMARY KEY;
ALTER TABLE `tbl_Screen_Seat`DROP PRIMARY KEY;
ALTER TABLE `tbl_Price`DROP PRIMARY KEY;
DROP TABLE `tbl_User` CASCADE;
DROP TABLE `tbl_Screen` CASCADE;
DROP TABLE `tbl_Seat` CASCADE;
DROP TABLE `tbl_Film` CASCADE;
DROP TABLE `tbl_Booking` CASCADE;
DROP TABLE `tbl_Showing` CASCADE;
DROP TABLE `tbl_Seat_Booked` CASCADE;
DROP TABLE `tbl_Screen_Seat` CASCADE;
DROP TABLE `tbl_Price` CASCADE;
CREATE TABLE `tbl_User` (`user_id` int unsigned NOT NULL AUTO_INCREMENT,`email` varchar(255) NOT NULL,`password` varchar(60) NOT NULL,
CONSTRAINT unq_user UNIQUE (email),PRIMARY KEY (`user_id`) );
CREATE TABLE `tbl_Screen` (`screen_id` int unsigned NOT NULL,`screen` varchar(255) NOT NULL,PRIMARY KEY (`screen_id`) );
CREATE TABLE `tbl_Seat` (`seat_id` int unsigned NOT NULL,PRIMARY KEY (`seat_id`) );
CREATE TABLE `tbl_Film` (`film_id` int unsigned NOT NULL AUTO_INCREMENT,`rt_id` int unsigned NOT NULL,`title` varchar(255) NOT NULL,`runtime` time NOT NULL,`rating` int(3) NOT NULL DEFAULT '0',`trailer` varchar(255) NULL,PRIMARY KEY (`film_id`) );
CREATE TABLE `tbl_Booking` (`booking_id` int unsigned NOT NULL AUTO_INCREMENT,`user_id` int unsigned NOT NULL,`showing_id` int unsigned NOT NULL,
`total_price` decimal(10,2) NOT NULL DEFAULT '0',
CONSTRAINT unq_booking UNIQUE (user_id,showing_id),PRIMARY KEY (`booking_id`) );
CREATE TABLE `tbl_Showing` (`showing_id` int unsigned NOT NULL AUTO_INCREMENT,`film_id` int unsigned NOT NULL,`screen_id` int unsigned NOT NULL,`start_date` date NOT NULL,`start_time` time NOT NULL,`price_id` int unsigned NOT NULL,PRIMARY KEY (`showing_id`) );
CREATE TABLE `tbl_Seat_Booked` (`seat_booked_id` int unsigned NOT NULL AUTO_INCREMENT,`booking_id` int unsigned NOT NULL,`screen_seat_id` int unsigned NOT NULL,
CONSTRAINT unq_seat_booked UNIQUE (booking_id,screen_seat_id),PRIMARY KEY (`seat_booked_id`) );
CREATE TABLE `tbl_Screen_Seat` (`screen_seat_id` int unsigned NOT NULL AUTO_INCREMENT,`seat_id` int unsigned NOT NULL,`screen_id` int unsigned NOT NULL,
CONSTRAINT unq_screen_seat UNIQUE (seat_id,screen_id),PRIMARY KEY (`screen_seat_id`) );
CREATE TABLE `tbl_Price` (`price_id` int unsigned NOT NULL AUTO_INCREMENT,`price` decimal(10,2) NOT NULL,PRIMARY KEY (`price_id`) );
ALTER TABLE `tbl_Showing` ADD CONSTRAINT `fk_Showing_Screen_1` FOREIGN KEY (`screen_id`) REFERENCES `tbl_Screen` (`screen_id`);
ALTER TABLE `tbl_Showing` ADD CONSTRAINT `fk_Showing_Film_1` FOREIGN KEY (`film_id`) REFERENCES `tbl_Film` (`film_id`);
ALTER TABLE `tbl_Seat_Booked` ADD CONSTRAINT `fk_SeatBooking_Booking_1` FOREIGN KEY (`booking_id`) REFERENCES `tbl_Booking` (`booking_id`);
ALTER TABLE `tbl_Booking` ADD CONSTRAINT `fk_Booking_Showing_1` FOREIGN KEY (`showing_id`) REFERENCES `tbl_Showing` (`showing_id`);
ALTER TABLE `tbl_Booking` ADD CONSTRAINT `fk_Booking_User_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_User` (`user_id`);
ALTER TABLE `tbl_Screen_Seat` ADD CONSTRAINT `fk_ScreenSeat_Seat_1` FOREIGN KEY (`seat_id`) REFERENCES `tbl_Seat` (`seat_id`);
ALTER TABLE `tbl_Screen_Seat` ADD CONSTRAINT `fk_ScreenSeat_Screen_1` FOREIGN KEY (`screen_id`) REFERENCES `tbl_Screen` (`screen_id`);
ALTER TABLE `tbl_Seat_Booked` ADD CONSTRAINT `fk_SeatBooked_ScreenSeat_1` FOREIGN KEY (`screen_seat_id`) REFERENCES `tbl_Screen_Seat` (`screen_seat_id`);
ALTER TABLE `tbl_Showing` ADD CONSTRAINT `fk_Showing_Price_1` FOREIGN KEY (`price_id`) REFERENCES `tbl_Price` (`price_id`);
-- ------------------------------ Records-- ----------------------------INSERT INTO `tbl_user` VALUES ('1', 'admin', '$2a$07$123456789012345678909uAJrBHqTMNhuilc.MhU8tFyBbIC8OTS2');
INSERT INTO `tbl_user` VALUES ('2', 'user1@gmail.com', '$2a$07$123456789012345678909uMlAjgeDiWs6713cOGcnXvYh30I41Bje');
INSERT INTO `tbl_film` VALUES ('1', '770771659', 'The Amazing Spider-Man', '03:23:00', '0', 'oX9ZT3RbYE4');
INSERT INTO `tbl_film` VALUES ('2', '769959054', 'The Dark Knight', '02:19:00', '2', 'kqF8lcKTLw0');
INSERT INTO `tbl_price` VALUES ('1', '5.25');
INSERT INTO `tbl_screen` VALUES ('1', 'One');
INSERT INTO `tbl_screen` VALUES ('2', 'Two');
INSERT INTO `tbl_screen` VALUES ('3', 'Three');
INSERT INTO `tbl_screen` VALUES ('4', 'Four');

INSERT INTO `tbl_seat` VALUES ('1');
INSERT INTO `tbl_seat` VALUES ('2');
INSERT INTO `tbl_seat` VALUES ('3');
INSERT INTO `tbl_seat` VALUES ('4');
INSERT INTO `tbl_seat` VALUES ('5');
INSERT INTO `tbl_seat` VALUES ('6');
INSERT INTO `tbl_seat` VALUES ('7');
INSERT INTO `tbl_seat` VALUES ('8');
INSERT INTO `tbl_seat` VALUES ('9');

INSERT INTO `tbl_screen_seat` VALUES ('1', '1', '1');
INSERT INTO `tbl_screen_seat` VALUES ('2', '1', '2');
INSERT INTO `tbl_screen_seat` VALUES ('3', '1', '3');
INSERT INTO `tbl_screen_seat` VALUES ('4', '2', '1');
INSERT INTO `tbl_screen_seat` VALUES ('5', '2', '2');
INSERT INTO `tbl_screen_seat` VALUES ('6', '2', '3');
INSERT INTO `tbl_screen_seat` VALUES ('7', '3', '1');
INSERT INTO `tbl_screen_seat` VALUES ('8', '3', '2');
INSERT INTO `tbl_screen_seat` VALUES ('9', '3', '3');
INSERT INTO `tbl_screen_seat` VALUES ('10', '4', '1');
INSERT INTO `tbl_screen_seat` VALUES ('11', '4', '2');
INSERT INTO `tbl_screen_seat` VALUES ('12', '4', '3');
INSERT INTO `tbl_screen_seat` VALUES ('13', '5', '1');
INSERT INTO `tbl_screen_seat` VALUES ('14', '5', '2');
INSERT INTO `tbl_screen_seat` VALUES ('15', '5', '3');

INSERT INTO `tbl_showing` VALUES ('1', '1', '1', '2011-12-08', '22:41:52', '1');
INSERT INTO `tbl_booking` VALUES ('1', '1', '1', '0.00');
INSERT INTO `tbl_booking` VALUES ('2', '2', '1', '0.00');INSERT INTO `tbl_seat_booked` VALUES ('1', '1', '1');

