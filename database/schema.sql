-- Remove all tables

DROP TABLE IF EXISTS mailer;
DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS vehicle_details;
DROP TABLE IF EXISTS body_details;
DROP TABLE IF EXISTS models;
DROP TABLE IF EXISTS brands;
DROP TABLE IF EXISTS body_types;
DROP TABLE IF EXISTS transmissions;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS user_details;

-- Mailer credentials table
CREATE TABLE mailer
(
    host     varchar(30)  NOT NULL DEFAULT 'smtp.example.com',
    username varchar(100) NOT NULL DEFAULT 'example@email.com',
    password varchar(100) NOT NULL DEFAULT 'examplepass',
    port     int          NOT NULL DEFAULT 587,
    maskname varchar(100) NOT NULL DEFAULT 'Mailer'
);

-- Create roles

CREATE TABLE roles (
  id int PRIMARY KEY AUTO_INCREMENT,
  role varchar(255) UNIQUE NOT NULL
);

-- Create users

CREATE TABLE users (
  id int PRIMARY KEY AUTO_INCREMENT,
  login varchar(255) UNIQUE NOT NULL,
  password varchar(255) NOT NULL,
  role int NOT NULL,
  email varchar(255) UNIQUE,
  first_name varchar(255),
  last_name varchar(255),
  enabled boolean DEFAULT true,
  FOREIGN KEY (role) REFERENCES roles(id)
);

-- Cars' body types

CREATE TABLE body_types (
  body_type varchar(20) PRIMARY KEY
);

-- Transmission's types

CREATE TABLE transmissions (
  transmission varchar(20) PRIMARY KEY
);

-- Brands

CREATE TABLE brands (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand varchar(255) NOT NULL UNIQUE
);

-- Cars' models

CREATE TABLE models (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand_id int NOT NULL,
  model varchar(255) NOT NULL,
  FOREIGN KEY (brand_id) REFERENCES brands(id)
);

-- Body details

CREATE TABLE body_details(
  id int PRIMARY KEY AUTO_INCREMENT,
  model_id int NOT NULL,
  body_type varchar(20) NOT NULL,
  number_of_doors int NOT null,
  transmission varchar(20) NOT NULL,
  FOREIGN KEY (model_id) REFERENCES models(id),
  FOREIGN KEY (body_type) REFERENCES body_types(body_type),
  FOREIGN KEY (transmission) REFERENCES transmissions(transmission),
  UNIQUE (model_id, body_type, number_of_doors, transmission)
);

CREATE TABLE cars (
  id int PRIMARY KEY AUTO_INCREMENT,
  year int NOT NULL,
  price_per_day int NOT NULL,
  body_details int NOT NULL,
  photoLink TEXT(100000) NOT NULL,
  FOREIGN KEY (body_details) REFERENCES body_details (id)
);

CREATE TABLE booking (
  customer_id int,
  car_id int,
  rent_start_time timestamp,
  rent_end_time timestamp DEFAULT CURRENT_TIMESTAMP,
  is_approved boolean,
  PRIMARY KEY (customer_id, car_id),
  FOREIGN KEY (customer_id) REFERENCES users (id),
  FOREIGN KEY (car_id) REFERENCES cars (id)
);
