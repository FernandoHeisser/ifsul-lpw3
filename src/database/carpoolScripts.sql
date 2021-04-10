-- CREATE USER 'fernando'@'localhost' IDENTIFIED BY '123';

-- GRANT ALL PRIVILEGES ON *.* TO 'fernando'@'localhost';

-- SHOW DATABASES;

DROP DATABASE IF EXISTS carpool;
CREATE DATABASE IF NOT EXISTS carpool;

USE carpool;

-- SHOW TABLES;

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
	phone VARCHAR(11) NOT NULL,
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
	phone VARCHAR(11) NOT NULL,
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
	canceled BOOLEAN NOT NULL DEFAULT 0,
	FOREIGN KEY fk_carpool_match_carpools_requested (carpool_request_id) REFERENCES carpools_requested (id),
	FOREIGN KEY fk_carpool_match_carpools_offered (carpool_offer_id) REFERENCES carpools_offered (id)
);

INSERT INTO users (email, name, cpf, password, phone, city, neighborhood, street, facebook, instagram, twitter, photo, carpool_done, carpool_canceled, carpool_offered, carpool_requested)
VALUES 	( 'fernando@email.com', 'Fernando Heisser', '04310299032', 'password', '51995258425', 'city', 'neighborhood', 'street', 'facebook', 'instagram', 'twitter', 'photo', 0, 0, 0, 0);

INSERT INTO users (email, name, cpf, password, phone, city, neighborhood, street, facebook, instagram, twitter, photo, carpool_done, carpool_canceled, carpool_offered, carpool_requested)
VALUES 	( 'nanando@email.com', 'Nanando Fixa', '14310299033', 'password', '55995258425', 'city', 'neighborhood', 'street', 'facebook', 'instagram', 'twitter', 'photo', 0, 0, 0, 0);

INSERT INTO carpools_offered (user_id, phone, from_city, from_neighborhood, from_street, to_city, to_neighborhood, to_street, start_date, end_date, available_vacancies, canceled, done)
VALUES 	( 1, '12345678900', 'Charqueadas', 'Centro', 'Rua Santo Amaro', 'São Jêronimo', 'Acacia', 'Rua São João', '2021-05-31 10:15:00', '2021-05-31 10:30:00', 4, 0, 0),
		( 1, '12345678900', 'ABC', 'ABC', 'ABC', 'DEF', 'DEF', 'DEF', '2021-03-29 10:15:00', '2021-03-29 10:30:00', 4, 0, 0),
		( 2, '12345678900', 'Butia', 'Centro', 'Rua Parana', 'General Câmara', 'Cruz de Malta', 'Rua Jacinto Dores', '2021-05-10 10:15:00', '2021-05-10 10:30:00', 4, 0, 0),
		( 2, '12345678900', 'XYZ', 'XYZ', 'XYZ', 'RST', 'RST', 'RST', '2021-04-01 10:15:00', '2021-04-01 10:30:00', 4, 0, 0);

INSERT INTO carpools_requested (user_id, phone, from_city, from_neighborhood, from_street, to_city, to_neighborhood, to_street, start_date, end_date, canceled, done)
VALUES 	( 1, '12345678900', 'Butia', 'Centro', 'Rua Lisboa', 'General Câmara', 'Cruz de Malta', 'Rua Flores da Cunha', '2021-05-10 10:15:00', '2021-05-10 10:30:00', 0, 0),
		( 1, '12345678900', 'XYZ', 'XYZ', 'XYZ', 'RST', 'RST', 'RST', '2021-04-01 10:15:00', '2021-04-01 10:30:00', 0, 0),
		( 2, '12345678900', 'ABC', 'ABC', 'ABC', 'DEF', 'DEF', 'DEF', '2021-03-29 10:15:00', '2021-03-29 10:30:00', 0, 0),
		( 2, '12345678900', 'Charqueadas', 'Centro', 'Rua Theodoro da Fonseca', 'São Jêronimo', 'Acacia', 'Rua Philipinas', '2021-05-31 10:15:00', '2021-05-31 10:30:00', 0, 0);
        
INSERT INTO carpool_match (carpool_request_id, carpool_offer_id, accepted, canceled)
VALUES 	( 1, 3, 0, 0),
		( 4, 1, 0, 0),
		( 2, 4, 0, 0),
		( 3, 2, 0, 0);
        
-- SELECT * FROM users;
-- SELECT * FROM carpools_requested;
-- SELECT * FROM carpools_offered;
-- SELECT * FROM carpool_match;

-- DELETE FROM users WHERE id = -1;
-- DELETE FROM carpools_requested WHERE id = -1;
-- DELETE FROM carpools_offered WHERE id = -1;
-- DELETE FROM carpool_match WHERE id = -1;