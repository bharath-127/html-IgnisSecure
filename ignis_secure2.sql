CREATE DATABASE ignis_secure2;

USE ignis_secure2;

CREATE TABLE licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_name VARCHAR(255) NOT NULL,
    owner_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    fire_certificate_path VARCHAR(255) NOT NULL,
    noc_document_path VARCHAR(255) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending'
);
