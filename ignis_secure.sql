CREATE DATABASE ignis_secure;

USE ignis_secure;

CREATE TABLE inspections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_name VARCHAR(255) NOT NULL,
    owner_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    inspection_date DATE NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending'
);
