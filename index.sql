CREATE DATABASE `users`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

CREATE USER 'alex'@'localhost'
  IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON `users`.* TO 'alex'@'localhost';

FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS `user` (
  `id`       INT(10)      NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(200) NULL     DEFAULT NULL COLLATE 'utf8_unicode_ci',
  `password` VARCHAR(10)  NOT NULL,
  `id_role`  INT(2)       NOT NULL,
  PRIMARY KEY (`id`)
)
  COLLATE = 'utf8_unicode_ci'
  ENGINE = InnoDB
  ROW_FORMAT = DEFAULT
  AUTO_INCREMENT = 1;
;

CREATE TABLE IF NOT EXISTS `role` (
  `id`        INT(2)      NOT NULL AUTO_INCREMENT,
  `name_role` VARCHAR(20) NULL     DEFAULT NULL COLLATE 'utf8_unicode_ci',
  PRIMARY KEY (`id`)
)
  COLLATE = 'utf8_unicode_ci'
  ENGINE = InnoDB
  ROW_FORMAT = DEFAULT
  AUTO_INCREMENT = 1;
;

# SELECT * FROM `role`;

INSERT INTO `role` (`id`, `name_role`) VALUES (NULL, 'admin');
INSERT INTO `user` (`id`, `name`, `password`, `id_role`) VALUES (NULL, 'Aleksandr', 'Alex24', 1);

INSERT INTO `role` (`id`, `name_role`) VALUES (NULL, 'guest');
SET @lastID := LAST_INSERT_ID();
INSERT INTO `user` (`id`, `name`, `password`, `id_role`) VALUES (NULL, 'Artur', '12345', @lastID);
INSERT INTO `user` (`id`, `name`, `password`, `id_role`) VALUES (NULL, 'Bogdan', 'mypass', @lastID);
INSERT INTO `user` (`id`, `name`, `password`, `id_role`) VALUES (NULL, 'Igor', 'igor123', @lastID);

INSERT INTO `role` (`id`, `name_role`) VALUES (NULL, 'viewer');
SET @lastID := LAST_INSERT_ID();
INSERT INTO `user` (`id`, `name`, `password`, `id_role`) VALUES (NULL, 'Roma', 'password', @lastID);
INSERT INTO `user` (`id`, `name`, `password`, `id_role`) VALUES (NULL, 'DIMA', '@DIMA@', @lastID);


DROP USER 'alex'@'localhost';

DROP DATABASE `users`;
