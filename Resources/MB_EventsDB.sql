CREATE TABLE `Monkey_Business`.`events` (
  `eventId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `personId` INT NOT NULL,
  PRIMARY KEY (`eventId`));

INSERT INTO events (name, start_date, end_date, personId)
VALUES 
('Reverze', '2017-03-10', '2017-03-11', 382),
('Tomorrowland', '2017-08-24', '2017-08-27', 104),
('Summerfestival', '2017-07-05', '2017-07-06', 291),
('Laundry Day', '2017-09-02', '2017-09-04', 192);