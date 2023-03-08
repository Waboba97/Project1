CREATE TABLE car_owners (
	userID int NOT NULL AUTO_INCREMENT,
    firstName varchar(30) NOT NULL,
    lastName varchar(30) NOT NULL,
    email varchar(50) NOT NULL,
    password varchar(256) NOT NULL,
    registration_date DATE NOT NULL,
    PRIMARY KEY (userID),
    UNIQUE KEY (email)
);