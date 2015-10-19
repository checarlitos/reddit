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
		userHandle INT UNSIGNED NOT NULL,
		content VARCHAR (140) NOT NULL,
		FOREIGN KEY (userHandle) REFERENCES ruser(userHandle),
		PRIMARY KEY (subReddit)
);

CREATE TABLE comments (
		subPost INT UNSIGNED AUTO_INCREMENT NOT NULL,
		userHandle INT UNSIGND NOT NULL,
		content VARCHAR (140) NOT NULL,
		FOREIGN KEY (userHandle) REFERENCES (userHandle),
		FOREIGN KEY (subPost) REFERENCES subPost (subPost),
		PRIMARY KEY (userHandle, subPost)
);


