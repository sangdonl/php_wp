CREATE DATABASE wp_eatery;
GRANT USAGE ON *.* TO wp_eatery@localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON wp_eatery.* TO wp_eatery@localhost;
FLUSH PRIVILEGES;

USE wp_eatery;

CREATE TABLE mailingList(
	_id int not null AUTO_INCREMENT,
	firstName VARCHAR(50) NOT NULL,
	lastName VARCHAR(50) NOT NULL,
	phoneNumber VARCHAR(15) NOT NULL,
	emailAddress VARCHAR(100) NOT NULL,
	username VARCHAR(50) NOT NULL,
	referrer VARCHAR(15) NOT NULL,
	PRIMARY KEY (_id)
	);
	
CREATE TABLE adminusers(
	AdminID int not null AUTO_INCREMENT,
	Username VARCHAR(50) NOT NULL,
	Password VARCHAR(50) NOT NULL,
	AdminLevel VARCHAR(50) NOT NULL,
	Lastlogin DATETIME		  DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (AdminID)
	);

INSERT INTO adminusers (Username, Password, AdminLevel) VALUES ('admin', 'passme', 'Administrator');
