-- CREATE TABLE tbl_user (
--     id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     username VARCHAR(128) NOT NULL,
--     oauth_token VARCHAR(128) NOT NULL,
--     oauth_token_secret VARCHAR(128) NOT NULL,
-- );

CREATE TABLE IF NOT EXISTS `tbl_user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(64) NOT NULL,
    `user_id` VARCHAR(16) NOT NULL,
    `oauth_token` VARCHAR(128) NOT NULL,
    `oauth_token_secret` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)

);

INSERT INTO `tbl_user` (username, oauth_token, oauth_token_secret) VALUES ('newuser1', 'lkjhasdf1234', 'asdf1234lkjh');