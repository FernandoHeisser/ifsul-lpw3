CREATE USER 'fernando'@'localhost' IDENTIFIED BY '123';

GRANT ALL PRIVILEGES ON *.* TO 'fernando'@'localhost';

SHOW DATABASES;

CREATE DATABASE IF NOT EXISTS carpool;

USE carpool;

SHOW TABLES;

DROP TABLE IF EXISTS carpool_match;
DROP TABLE IF EXISTS carpools_offered;
DROP TABLE IF EXISTS carpools_requested;
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(50) NOT NULL,
	name VARCHAR(50) NOT NULL,
	cpf VARCHAR(11) UNIQUE NOT NULL,
	password VARCHAR(255) NOT NULL,
	phone VARCHAR(11) UNIQUE NOT NULL,
	city VARCHAR(255) NULL,
	neighborhood VARCHAR(255) NULL,
	street  VARCHAR(255) NULL,
	facebook  VARCHAR(255) NULL,
	instagram  VARCHAR(255) NULL,
	twitter VARCHAR(255) NULL,
	photo VARCHAR(255) NULL,
	carpool_done INT NOT NULL DEFAULT 0,
	carpool_canceled INT NOT NULL DEFAULT 0,
	carpool_offered INT NOT NULL DEFAULT 0,
	carpool_requested INT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS carpools_requested (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	phone VARCHAR(11) UNIQUE NOT NULL,
	from_city VARCHAR(255) NOT NULL,
	from_neighborhood VARCHAR(255) NOT NULL,
	from_street  VARCHAR(255) NOT NULL,
	to_city VARCHAR(255) NOT NULL,
	to_neighborhood VARCHAR(255) NOT NULL,
	to_street  VARCHAR(255) NOT NULL,
	start_date DATETIME NOT NULL,
	end_date DATETIME NOT NULL,
	canceled BOOLEAN NOT NULL DEFAULT 0,
	done BOOLEAN NOT NULL DEFAULT 0,
	FOREIGN KEY fk_carpools_requested_users (user_id) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS carpools_offered (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	phone VARCHAR(11) UNIQUE NOT NULL,
	from_city VARCHAR(255) NOT NULL,
	from_neighborhood VARCHAR(255) NOT NULL,
	from_street  VARCHAR(255) NOT NULL,
	to_city VARCHAR(255) NOT NULL,
	to_neighborhood VARCHAR(255) NOT NULL,
	to_street  VARCHAR(255) NOT NULL,
	start_date DATETIME NOT NULL,
	end_date DATETIME NOT NULL,
	available_vacancies INT NULL,
	canceled BOOLEAN NOT NULL DEFAULT 0,
	done BOOLEAN NOT NULL DEFAULT 0,
	FOREIGN KEY fk_carpools_offered_users (user_id) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS carpool_match (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	carpool_request_id INT NOT NULL,
	carpool_offer_id INT NOT NULL,
	accepted BOOLEAN NOT NULL DEFAULT 0,
	FOREIGN KEY fk_carpool_match_carpools_requested (carpool_request_id) REFERENCES carpools_requested (id),
	FOREIGN KEY fk_carpool_match_carpools_offered (carpool_offer_id) REFERENCES carpools_offered (id)
);

SELECT * FROM users;

SELECT * FROM carpools_requested;

SELECT * FROM carpools_offered;

SELECT * FROM carpool_match;

DELETE FROM users WHERE id = ;

DELETE FROM carpools_requested WHERE id = ;

DELETE FROM carpools_offered WHERE id = ;

DELETE FROM carpool_match WHERE id = ;
