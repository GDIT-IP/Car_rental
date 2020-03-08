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

INSERT INTO roles(role) VALUES ('Administrator');
INSERT INTO roles(role) VALUES ('Staff');
INSERT INTO roles(role) VALUES ('Customer');

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

INSERT INTO users(login, password, role, email, phone_number)
VALUES ('111', '111', 1, 'yib00005w5@aspire2student.ac.nz', '223322223322');
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('222', '222', 2, 'yib00005vj@aspire2student.ac.nz', '332233332233');
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('333', '333', 3, 'yib00005xs@aspire2student.ac.nz', '3434');
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('444', '444', 3, 'yib00005wj@aspire2student.ac.nz', '5555');
INSERT INTO users(login, password, role, email, phone_number, first_name, last_name, enabled)
VALUES ('555', '555', 1, 'myEmail', '89772707243', 'Bruce', 'Wayne', false);

-- Cars' body types

CREATE TABLE body_types (
  body_type varchar(255) PRIMARY KEY
);

INSERT INTO body_types(body_type) VALUES ('CUV');
INSERT INTO body_types(body_type) VALUES ('SEDAN');
INSERT INTO body_types(body_type) VALUES ('HATCHBACK');
INSERT INTO body_types(body_type) VALUES ('UNIVERSAL');
INSERT INTO body_types(body_type) VALUES ('COUPE');
INSERT INTO body_types(body_type) VALUES ('MINIVAN');
INSERT INTO body_types(body_type) VALUES ('CABRIOLET');
INSERT INTO body_types(body_type) VALUES ('PICKUP');

-- Transmission's types

CREATE TABLE transmissions (
  transmission varchar(255) PRIMARY KEY
);

INSERT INTO transmissions(transmission) VALUES ('automatic');
INSERT INTO transmissions(transmission) VALUES ('manual');

-- Brands

CREATE TABLE brands (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand varchar(255)
);

INSERT INTO brands(brand) VALUES ('Toyota');
INSERT INTO brands(brand) VALUES ('LADA');
INSERT INTO brands(brand) VALUES ('Bugatti');
INSERT INTO brands(brand) VALUES ('TATA');
INSERT INTO brands(brand) VALUES ('BMW');

-- Cars' models

CREATE TABLE models (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand_id int NOT NULL,
  model varchar(255) NOT NULL,
  FOREIGN KEY (brand_id) REFERENCES brands(id)
);

INSERT INTO models(brand_id, model) VALUES (1, 'Corolla');
INSERT INTO models(brand_id, model) VALUES (1, 'Corona');
INSERT INTO models(brand_id, model) VALUES (1, 'Carina');
INSERT INTO models(brand_id, model) VALUES (2, '2106');
INSERT INTO models(brand_id, model) VALUES (2, '2107');
INSERT INTO models(brand_id, model) VALUES (2, '2121');
INSERT INTO models(brand_id, model) VALUES (3, 'CHIRON');
INSERT INTO models(brand_id, model) VALUES (3, 'CENTODIECI');
INSERT INTO models(brand_id, model) VALUES (3, 'VEYRON 16.4');
INSERT INTO models(brand_id, model) VALUES (4, 'Nexon');
INSERT INTO models(brand_id, model) VALUES (4, 'Nano');
INSERT INTO models(brand_id, model) VALUES (5, 'x5');
INSERT INTO models(brand_id, model) VALUES (5, 'x6');

-- Vehicle details

CREATE TABLE vehicle_details (
  id int PRIMARY KEY AUTO_INCREMENT,
  brand int NOT NULL,
  model int NOT NULL,
  body_type varchar(255) NOT NULL,
  transmission varchar(255),
  FOREIGN KEY (brand) REFERENCES brands(id),
  FOREIGN KEY (model) REFERENCES models(id),
  FOREIGN KEY (body_type) REFERENCES body_types(body_type),
  FOREIGN KEY (transmission) REFERENCES transmissions(transmission)
);

CREATE TABLE cars (
  id int PRIMARY KEY AUTO_INCREMENT,
  year int NOT NULL,
  number_of_doors int NOT NULL,
  hour_cent_price int NOT NULL,
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
