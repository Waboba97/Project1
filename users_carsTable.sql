CREATE TABLE users_cars (
    CID int NOT NULL,
    -- Car ID
    UID int NOT NULL,
    -- User ID
    PRIMARY KEY (CID, UID),
    FOREIGN KEY (CID) REFERENCES cars(carID),
    FOREIGN KEY (UID) REFERENCES car_owners(userID)
);