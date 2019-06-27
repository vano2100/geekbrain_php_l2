CREATE TABLE `goods` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL DEFAULT '0',
	`price` DOUBLE NOT NULL DEFAULT '0',
	`description` VARCHAR(250) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (1, 'монитор', 3200, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (2, 'клавиатура', 540, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (3, 'мышь', 320, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (4, 'жесткий диск', 1300, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (5, 'видеокарта', 5600, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (6, 'процессор', 4700, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (7, 'материнская плата', 3150, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (8, 'телефон', 1200, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (9, 'блок питания', 1999, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (10, 'корпус', 3700, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (11, 'принтер', 5400, '0');
INSERT INTO `goods` (`id`, `name`, `price`, `description`) VALUES (12, 'сканер', 7000, '0');
