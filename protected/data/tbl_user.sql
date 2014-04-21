-- CREATE TABLE tbl_user (
--     id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     username VARCHAR(128) NOT NULL,
--     oauth_token VARCHAR(128) NOT NULL,
--     oauth_token_secret VARCHAR(128) NOT NULL,
-- );

CREATE TABLE IF NOT EXISTS `tbl_user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(32) NOT NULL,
    `email` VARCHAR(32) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `twtter_id` VARCHAR(32) NOT NULL,
    `oauth_token` VARCHAR(128) NOT NULL,
    `oauth_token_secret` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)

);

INSERT INTO `tbl_user` (username, email, password, twitter_id, oauth_token, oauth_token_secret) VALUES ('newuser1','newuser1@email.com','newuserpass1','1123581321345589','lkjhasdf1234', 'asdf1234lkjh');