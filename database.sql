CREATE DATABASE tourism_db;
USE tourism_db;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admins (username, password) VALUES ('admin', 'admin123');

CREATE TABLE tours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    duration VARCHAR(50),
    image VARCHAR(255)
);
