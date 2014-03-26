CREATE TABLE twitter_users (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    searchtag1 VARCHAR(128) NOT NULL,
    searchtag2 VARCHAR(128) NOT NULL,
    searchtag3 VARCHAR(128) NOT NULL,
    searchtag4 VARCHAR(128) NOT NULL,
    searchtag5 VARCHAR(128) NOT NULL,
    searchtag6 VARCHAR(128) NOT NULL
);

INSERT INTO twitter_users (username, password, email, searchtag1, searchtag2, searchtag3, searchtag4, searchtag5, searchtag6) VALUES ('test1', 'pass1', 'test1@example.com', 'examplesearch1a', 'examplesearch2a', 'examplesearch3a', 'examplesearch4a', 'examplesearch5a', 'examplesearch6a');
INSERT INTO twitter_users (username, password, email, searchtag1, searchtag2, searchtag3, searchtag4, searchtag5, searchtag6) VALUES ('test2', 'pass2', 'test2@example.com', 'examplesearch1b', 'examplesearch2b', 'examplesearch3b', 'examplesearch4b', 'examplesearch5b', 'examplesearch6b');
INSERT INTO twitter_users (username, password, email, searchtag1, searchtag2, searchtag3, searchtag4, searchtag5, searchtag6) VALUES ('test3', 'pass3', 'test3@example.com', 'examplesearch1c', 'examplesearch2c', 'examplesearch3c', 'examplesearch4c', 'examplesearch5c', 'examplesearch6c');

