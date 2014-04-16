-- CREATE TABLE tbl_user (
--     id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     username VARCHAR(128) NOT NULL,
--     oauth_token VARCHAR(128) NOT NULL,
--     oauth_token_secret VARCHAR(128) NOT NULL,
--     search_tag_1 VARCHAR(128)
-- );

CREATE TABLE `tbl_user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(128) NOT NULL,
    `oauth_token` VARCHAR(128) NOT NULL,
    `oauth_token_secret` VARCHAR(128) NOT NULL,
    `search_tag_1` VARCHAR(128),
    PRIMARY KEY (`id`)

);

INSERT INTO `tbl_user` (username, oauth_token, oauth_token_secret, search_tag_1) VALUES ('newuser1', 'lkjhasdf1234', 'asdf1234lkjh', '#thinkbig');