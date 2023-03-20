CREATE TABLE cars (
    carID int NOT NULL AUTO_INCREMENT,
    make varchar (25),
    model varchar (25),
    year int,
    price int,
    PRIMARY KEY (carID)
);

-- Toyota
INSERT INTO cars (make, model, price) VALUES ("Toyota", "Camry", 25000);
INSERT INTO cars (make, model, price) VALUES ("Toyota", "Corolla", 20000);
INSERT INTO cars (make, model, price) VALUES ("Toyota", "RAV4", 26000);
INSERT INTO cars (make, model, price) VALUES ("Toyota", "Tacoma", 27000);

-- Ford
INSERT INTO cars (make, model, price) VALUES ("Ford", "F150", 31000);
INSERT INTO cars (make, model, price) VALUES ("Ford", "Focus", 30000);
INSERT INTO cars (make, model, price) VALUES ("Ford", "Explorer", 36000);
INSERT INTO cars (make, model, price) VALUES ("Ford", "Mustang", 27000);

-- Chevy
INSERT INTO cars (make, model, price) VALUES ("Chevy", "Impala", 23000);
INSERT INTO cars (make, model, price) VALUES ("Chevy", "Silverado", 35000);
INSERT INTO cars (make, model, price) VALUES ("Chevy", "Malibu", 23000);
INSERT INTO cars (make, model, price) VALUES ("Chevy", "Equinox", 26000);

-- Honda
INSERT INTO cars (make, model, price) VALUES ("Honda", "Odyssey", 33000);
INSERT INTO cars (make, model, price) VALUES ("Honda", "Accord", 26000);
INSERT INTO cars (make, model, price) VALUES ("Honda", "Civic", 22000);
INSERT INTO cars (make, model, price) VALUES ("Honda", "Ridgeline", 38000);

-- Subaru
INSERT INTO cars (make, model, price) VALUES ("Subaru", "Outback", 28000);
INSERT INTO cars (make, model, price) VALUES ("Subaru", "Crosstrek", 23000);
INSERT INTO cars (make, model, price) VALUES ("Subaru", "Forester", 26000);
INSERT INTO cars (make, model, price) VALUES ("Subaru", "Impreza", 19000);
