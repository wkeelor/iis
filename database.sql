##--------------DROP TABLES--------------
DROP TABLE Users;
DROP TABLE Venues;
DROP TABLE Venue_images;
DROP TABLE Events;
DROP TABLE Event_images;
DROP TABLE Categories;
DROP TABLE Event_registration;
##----------------------------------------



##--------------CREATE TABLES--------------
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    birthdate VARCHAR(50) NOT NULL,
    img_path VARCHAR(50) NOT NULL
);

CREATE TABLE Venues (
    venue_id INT AUTO_INCREMENT PRIMARY KEY,
    adress VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
);

CREATE TABLE Venue_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (venue_id) REFERENCES Venues(venue_id),
    path VARCHAR(255) NOT NULL,  
);

CREATE TABLE Events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (venue_id) REFERENCES Venues(venue_id),
    name VARCHAR(255) NOT NULL,
    start_time VARCHAR(255) NOT NULL,
    end_time VARCHAR(255) NOT NULL,
    capacity INT NOT NULL,
    price INT NOT NULL,
);

CREATE TABLE Event_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (event_id) REFERENCES Venues(event_id),
    path VARCHAR(255) NOT NULL,  
);

CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (parent_id) REFERENCES Categories(id),
    FOREIGN KEY (event_id) REFERENCES Events(event_id),
);

CREATE TABLE Event_registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (event_id) REFERENCES Events(event_id),
);
##----------------------------------------



##--------------TESTING DATA--------------

##----------------------------------------