CREATE DATABASE `test`;

-- 1
CREATE TABLE `test`.`subscribers`(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `fname` VARCHAR(100) NOT NULL ,
    `email` VARCHAR(100) NOT NULL ,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

-- 2
CREATE TABLE `test`.`audit_subscribers` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `subscriber_name` VARCHAR(100) NOT NULL ,
    `action_performed` VARCHAR(200) NOT NULL ,
    `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

-- 3
CREATE TRIGGER `before_subscriber_insert` BEFORE INSERT ON `subscribers`
FOR EACH ROW
INSERT INTO `audit_subscribers` SET `action_performed` = 'Inserted a new subscriber', `subscriber_name` = new.fname

-- 4
CREATE TRIGGER `after_subscriber_delete` AFTER DELETE ON `subscribers`
FOR EACH ROW
INSERT INTO `audit_subscribers` SET `action_performed` = 'Deleted a subscriber', `subscriber_name` = old.fname

-- 5
CREATE TRIGGER `after_subscriber_edit` AFTER UPDATE ON `subscribers`
FOR EACH ROW
INSERT INTO `audit_subscribers` SET `action_performed` = 'Edited a subscriber', `subscriber_name` = new.fname

-- przykładowe zapytania
-- INSERT INTO `subscribers` (`id`, `fname`, `email`) VALUES (NULL, 'Kanu', 'kanu@email.com'); 
-- UPDATE `subscribers` SET `fname` = 'Maczeta2', `email` = 'maczeta@email3.com' WHERE `subscribers`.`id` = 1;
-- DELETE FROM `subscribers` WHERE `subscribers`.`id` = 1