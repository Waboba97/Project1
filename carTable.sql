CREATE TABLE cars (
	carID int NOT NULL AUTO_INCREMENT,
	make varchar (25),
    model varchar (25),
    baseYear int,
    price int,
    PRIMARY KEY (carID)
);

-- Toyota
INSERT INTO cars (make, model, baseYear, price) VALUES ("Toyota", "Camry", 2022, 25000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Toyota", "Corolla", 2022, 20000); 
INSERT INTO cars (make, model, baseYear, price) VALUES ("Toyota", "RAV4", 2022, 26000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Toyota", "Tacoma", 2022, 27000);

-- Ford
INSERT INTO cars (make, model, baseYear, price) VALUES ("Ford", "F150", 2022, 31000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Ford", "Focus", 2022, 30000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Ford", "Explorer", 2022, 36000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Ford", "Mustang", 2022, 27000);

-- Chevy
INSERT INTO cars (make, model, baseYear, price) VALUES ("Chevy", "Impala", 2022, 23000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Chevy", "Silverado", 2022, 35000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Chevy", "Malibu", 2022, 23000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Chevy", "Equinox", 2022, 26000);

-- Honda
INSERT INTO cars (make, model, baseYear, price) VALUES ("Honda", "Odyssey", 2022, 33000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Honda", "Accord", 2022, 26000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Honda", "Civic", 2022, 22000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Honda", "Ridgeline", 2022, 38000);

-- Subaru
INSERT INTO cars (make, model, baseYear, price) VALUES ("Subaru", "Outback", 2022, 28000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Subaru", "Crosstrek", 2022, 23000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Subaru", "Forester", 2022, 26000);
INSERT INTO cars (make, model, baseYear, price) VALUES ("Subaru", "Impreza", 2022, 19000); 