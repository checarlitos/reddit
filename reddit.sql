DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS ruser;

CREATE TABLE ruser (
		userPref INT UNSIGNED AUTO_INCREMENT NOT NULL,
		userHandle VARCHAR(32) NOT NULL,
		UNIQUE(userHandle),
		PRIMARY KEY(userPref)
);

CREATE TABLE post (
		subReddit INT UNSIGNED AUTO_INCREMENT NOT NULL,
	   userHandle VARCHAR(32) NOT NULL,
		content VARCHAR (140) NOT NULL,
		FOREIGN KEY (userHandle) REFERENCES ruser(userHandle),
		PRIMARY KEY (subReddit)
);

CREATE TABLE comments (
		subPost INT UNSIGNED AUTO_INCREMENT NOT NULL,
	   userHandle VARCHAR(32) NOT NULL,
		content VARCHAR (140) NOT NULL,
		FOREIGN KEY (userHandle) REFERENCES ruser (userHandle),
		PRIMARY KEY (subPost)
);

CREATE TABLE CLASSIC (
	author VARCHAR (128),
	title VARCHAR (128),
	type VARCHAR (16),
	year CHAR (4)
);


