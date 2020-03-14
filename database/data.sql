-- Roles
INSERT INTO roles(role) VALUES ('Administrator');
INSERT INTO roles(role) VALUES ('Staff');
INSERT INTO roles(role) VALUES ('Customer');

-- Users
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('111', '111', (SELECT id FROM roles WHERE role = 'Administrator'), 'yib00005w5@aspire2student.ac.nz',
        '223322223322');
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('222', '222', (SELECT id FROM roles WHERE role = 'Staff'), 'yib00005vj@aspire2student.ac.nz', '332233332233');
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('333', '333', (SELECT id FROM roles WHERE role = 'Customer'), 'yib00005xs@aspire2student.ac.nz', '3434');
INSERT INTO users(login, password, role, email, phone_number)
VALUES ('444', '444', (SELECT id FROM roles WHERE role = 'Customer'), 'yib00005wj@aspire2student.ac.nz', '5555');
INSERT INTO users(login, password, role, email, phone_number, first_name, last_name, enabled)
VALUES ('555', '555', (SELECT id FROM roles WHERE role = 'Administrator'), 'myEmail', '89772707243', 'Bruce', 'Wayne',
        false);

-- Body types
INSERT INTO body_types(body_type) VALUES ('CUV');
INSERT INTO body_types(body_type) VALUES ('SEDAN');
INSERT INTO body_types(body_type) VALUES ('HATCHBACK');
INSERT INTO body_types(body_type) VALUES ('UNIVERSAL');
INSERT INTO body_types(body_type) VALUES ('COUPE');
INSERT INTO body_types(body_type) VALUES ('MINIVAN');
INSERT INTO body_types(body_type) VALUES ('CABRIOLET');
INSERT INTO body_types(body_type) VALUES ('PICKUP');

-- Transmissions
INSERT INTO transmissions(transmission) VALUES ('automatic');
INSERT INTO transmissions(transmission) VALUES ('manual');

-- Brands
INSERT INTO brands(brand) VALUES ('Toyota');
INSERT INTO brands(brand) VALUES ('LADA');
INSERT INTO brands(brand) VALUES ('Bugatti');
INSERT INTO brands(brand) VALUES ('TATA');
INSERT INTO brands(brand) VALUES ('BMW');
INSERT INTO brands(brand) VALUES ('Mercedes-Benz');
INSERT INTO brands(brand) VALUES ('Honda');
INSERT INTO brands(brand) VALUES ('Infiniti');
INSERT INTO brands(brand) VALUES ('Nissan');

-- Models
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Corolla');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Corona');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Carina');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Yaris');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Camry');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Supra');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Toyota'), 'Prius');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'LADA'), '2106');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'LADA'), '2107');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'LADA'), '2121');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Bugatti'), 'CHIRON');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Bugatti'), 'CENTODIECI');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Bugatti'), 'VEYRON 16.4');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'TATA'), 'Nexon');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'TATA'), 'Nano');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Accord');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Airwave');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Ascot');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Avancier');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Beat');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Capa');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'City');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Civic');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Concerto');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'CR-V');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Honda'), 'Integra');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'BMW'), 'x6');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'BMW'), 'x5');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'BMW'), 'M3');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'BMW'), 'M4');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Nissan'), 'Sunny');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Nissan'), 'Skyline');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Nissan'), 'Pathfinder');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Mercedes-Benz'), 'BR470 X-Class');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Mercedes-Benz'), 'Mercedes-AMG One');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Infiniti'), 'QX60');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Infiniti'), 'M56');