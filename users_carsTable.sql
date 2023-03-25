CREATE TABLE users_cars (
    CID int NOT NULL,
    -- Car ID
    UID int NOT NULL,
    -- User ID
    year int NOT NULL,
    -- Year of vehicle
    mileage int NOT NULL,
	-- mileage of the vehicle
	quality int NOT NULL,
	-- quality of the vehicle (decreasing quality)
    PRIMARY KEY (CID, UID),
    FOREIGN KEY (CID) REFERENCES cars(carID),
    FOREIGN KEY (UID) REFERENCES car_owners(userID)
);
