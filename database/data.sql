-- Roles
INSERT INTO roles(role) VALUES ('Administrator');
INSERT INTO roles(role) VALUES ('Staff');
INSERT INTO roles(role) VALUES ('Customer');

-- Users
INSERT INTO users(login, password, role, email)
VALUES ('111', '111', (SELECT id FROM roles WHERE role = 'Administrator'), 'yib00005w5@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('222', '222', (SELECT id FROM roles WHERE role = 'Staff'), 'yib00005vj@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('333', '333', (SELECT id FROM roles WHERE role = 'Customer'), 'yib00005xs@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('444', '444', (SELECT id FROM roles WHERE role = 'Customer'), 'yib00005wj@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email, first_name, last_name, enabled)
VALUES ('555', '555', (SELECT id FROM roles WHERE role = 'Administrator'), 'myEmail', 'Bruce', 'Wayne', false);
INSERT INTO users(login, password, role, email)
VALUES ('example_user_1', 'example_user_1', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_1@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_2', 'example_user_2', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_2@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_3', 'example_user_3', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_3@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_4', 'example_user_4', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_4@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_5', 'example_user_5', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_5@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_6', 'example_user_6', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_6@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_7', 'example_user_7', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_7@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_8', 'example_user_8', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_8@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_9', 'example_user_9', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_9@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_10', 'example_user_10', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_10@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_11', 'example_user_11', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_11@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_12', 'example_user_12', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_12@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_13', 'example_user_13', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_13@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_14', 'example_user_14', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_14@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_15', 'example_user_15', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_15@aspire2student.ac.nz');
INSERT INTO users(login, password, role, email)
VALUES ('example_user_16', 'example_user_16', (SELECT id FROM roles WHERE role = 'Customer'), 'example_user_16@aspire2student.ac.nz');

-- Body types
INSERT INTO body_types(body_type) VALUES ('SUV');
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
INSERT INTO brands(brand) VALUES ('Tesla');

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
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Tesla'), 'Model S');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Tesla'), 'Model X');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Tesla'), 'Model 3');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Tesla'), 'Model Y');
INSERT INTO models(brand_id, model)
VALUES ((SELECT id FROM brands WHERE brand = 'Tesla'), 'Roadster');

-- Vehicles
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Tesla') and model = 'Model S'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Tesla') and model = 'Model Y'),
        'SUV', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Tesla') and model = 'Model X'),
        'SUV', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Tesla') and model = 'Model 3'),
        'HATCHBACK', 'automatic', 5);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Toyota') and model = 'Corolla'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Toyota') and model = 'Carina'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Toyota') and model = 'Camry'),
        'SEDAN', 'automatic', 4);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'LADA') and model = '2106'),
        'SEDAN', 'manual', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'LADA') and model = '2121'),
        'HATCHBACK', 'manual', 3);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'LADA') and model = '2107'),
        'SEDAN', 'manual', 4);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'BMW') and model = 'x6'),
        'SUV', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'BMW') and model = 'x5'),
        'SUV', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'BMW') and model = 'M3'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'BMW') and model = 'M4'),
        'COUPE', 'automatic', 2);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Honda') and model = 'CR-V'),
        'SUV', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Honda') and model = 'CR-V'),
        'SUV', 'manual', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Honda') and model = 'Accord'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Honda') and model = 'Capa'),
        'HATCHBACK', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Honda') and model = 'Concerto'),
        'SEDAN', 'manual', 4);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Nissan') and model = 'Sunny'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Nissan') and model = 'Skyline'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Nissan') and model = 'Pathfinder'),
        'UNIVERSAL', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Nissan') and model = 'Pathfinder'),
        'UNIVERSAL', 'manual', 5);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Bugatti') and model = 'CHIRON'),
        'COUPE', 'automatic', 2);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Bugatti') and model = 'CENTODIECI'),
        'COUPE', 'automatic', 2);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Bugatti') and model = 'VEYRON 16.4'),
        'COUPE', 'automatic', 2);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'TATA') and model = 'Nexon'),
        'SUV', 'manual', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'TATA') and model = 'Nano'),
        'HATCHBACK', 'manual', 4);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Mercedes-Benz') and model = 'BR470 X-Class'),
        'PICKUP', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Mercedes-Benz') and model = 'Mercedes-AMG One'),
        'COUPE', 'automatic', 2);

INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Infiniti') and model = 'QX60'),
        'SUV', 'automatic', 5);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Infiniti') and model = 'M56'),
        'SEDAN', 'automatic', 4);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Infiniti') and model = 'M56'),
        'COUPE', 'automatic', 2);
INSERT IGNORE INTO body_details(model_id, body_type, transmission, number_of_doors)
VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = 'Infiniti') and model = 'M56'),
        'CABRIOLET', 'automatic', 2);


-- Cars
INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (1, 2018, 200,
        'https://upload.wikimedia.org/wikipedia/commons/1/14/2018_Tesla_Model_S_75D.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (14, 2016, 200,
        'https://live.staticflickr.com/4485/37355258441_0428760a27_b.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (20, 2004, 127,
        'https://upload.wikimedia.org/wikipedia/commons/3/33/NISSAN_Sunny.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (9, 1987, 115,
        'https://live.staticflickr.com/7824/46702260864_28ebb7883a_b.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (16, 2003, 178,
        'https://upload.wikimedia.org/wikipedia/commons/8/84/02-04_Honda_CR-V_EX_.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (30, 2016, 250,
        'https://live.staticflickr.com/4736/27799178049_a167f9d2ae_b.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (22, 2007, 200,
        'https://upload.wikimedia.org/wikipedia/commons/f/f8/2005-2007_Nissan_Pathfinder_%28R51%29_ST-L_wagon_03.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (17, 2011, 189,
        'https://upload.wikimedia.org/wikipedia/commons/6/67/2008-2011_Honda_Accord_Euro_sedan_%282011-06-15%29_01.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (10, 2001, 180,
        'https://upload.wikimedia.org/wikipedia/commons/7/7b/Lada_2107_%28VAZ-2107%29_02.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (34, 2016, 200,
        'https://upload.wikimedia.org/wikipedia/commons/6/63/Infiniti_G37S_Convertible.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (15, 2010, 187,
        'https://upload.wikimedia.org/wikipedia/commons/a/ad/Honda_CR-V.JPG');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (8, 1995, 170,
        'https://upload.wikimedia.org/wikipedia/commons/1/10/White_Lada_2106_with_milk_and_honey_on_its_hood.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (3, 2018, 220,
        'https://live.staticflickr.com/1905/45154022981_b5fa86fbe6_b.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (19, 1993, 134,
        'https://upload.wikimedia.org/wikipedia/commons/8/87/Honda_Concerto_%2845263827685%29.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (24, 2018, 300,
        'https://images.pexels.com/photos/2082009/pexels-photo-2082009.jpeg?cs=srgb&dl=black-and-white-bugatti-bugattichiron-car-2082009.jpg&fm=jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (6, 1998, 120,
        'https://upload.wikimedia.org/wikipedia/commons/4/4c/1996-1998_Toyota_Carina.jpg');

INSERT IGNORE INTO cars(body_details, year, price_per_day, photoLink)
VALUES (11, 2011, 150,
        'https://live.staticflickr.com/8329/8407024885_f4865580ab_b.jpg');
