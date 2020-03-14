-- Remove all tables

DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS vehicle_details;
DROP TABLE IF EXISTS models;
DROP TABLE IF EXISTS brands;
DROP TABLE IF EXISTS body_types;
DROP TABLE IF EXISTS transmissions;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS user_details;

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
  phone_number varchar(255) UNIQUE,
  first_name varchar(255),
  last_name varchar(255),
  enabled boolean DEFAULT true,
  FOREIGN KEY (role) REFERENCES roles(id)
);

-- Cars' body types

CREATE TABLE body_types (
  body_type varchar(255) PRIMARY KEY
);

-- Transmission's types

CREATE TABLE transmissions (
  transmission varchar(255) PRIMARY KEY
);

-- Brands

CREATE TABLE brands (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand varchar(255)
);

-- Cars' models

CREATE TABLE models (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand_id int NOT NULL,
  model varchar(255) NOT NULL,
  FOREIGN KEY (brand_id) REFERENCES brands(id)
);

-- Vehicle details

CREATE TABLE vehicle_details (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand int NOT NULL,
  model int NOT NULL,
  body_type varchar(255) NOT NULL,
  transmission varchar(255),
  number_of_doors int NOT NULL,
  FOREIGN KEY (brand) REFERENCES brands(id),
  FOREIGN KEY (model) REFERENCES models(id),
  FOREIGN KEY (body_type) REFERENCES body_types(body_type),
  FOREIGN KEY (transmission) REFERENCES transmissions(transmission)
);

CREATE TABLE cars (
  id int PRIMARY KEY AUTO_INCREMENT,
  year int NOT NULL,
  price_per_day int NOT NULL,
  vehicle_details int NOT NULL,
  FOREIGN KEY (vehicle_details) REFERENCES vehicle_details (id)
);

CREATE TABLE booking (
  customer_id int,
  car_id int,
  rent_start_time timestamp,
  rent_end_time timestamp,
  is_approved boolean,
  PRIMARY KEY (customer_id, car_id),
  FOREIGN KEY (customer_id) REFERENCES users (id),
  FOREIGN KEY (car_id) REFERENCES cars (id)
);
