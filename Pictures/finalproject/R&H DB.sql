-- -----------------CUSTOMER TABLE--------------------------------
CREATE TABLE customer(
`id_customer` INT NOT NULL AUTO_INCREMENT UNIQUE,
`full_name` VARCHAR(255),
`address` VARCHAR(255),
`Email` VARCHAR(255),
`phone` INT,
`number_of_person`INT,
`operation_date` date,
 `customer_livreur`VARCHAR(255),
    PRIMARY KEY (`id_customer`),
    FOREIGN KEY (`customer_livreur`) REFERENCES Livreur (`livreur_number`)
);

-- LIVREUR foeign key

ALTER TABLE `customer`
ADD CONSTRAINT `livreur_number`
FOREIGN KEY (`livreur_number`)
REFERENCES `livreur`(`livreur_number`)
ON DELETE NO ACTION ON UPDATE NO ACTION;



-- ---------------------LIVREUR TABLE--------------------------------

CREATE TABLE Livreur(
`livreur_number` INT NOT NULL AUTO_INCREMENT UNIQUE,
`full_name` VARCHAR(255),
`phone` INT,
     PRIMARY KEY (`livreur_number`)
);

-- --------------------PRODUCTS TABLE--------------------------------

CREATE TABLE `products`(
`product_name` VARCHAR (255),
`price` FLOAT (10),
`type_name` VARCHAR (255),
PRIMARY KEY (`name`)

);

-- --------------------TYPES TABLE--------------------------------

CREATE TABLE `types`(
`type_name` VARCHAR (255),
`description` VARCHAR (255),
PRIMARY KEY (`type_name`)

);
-- TYPES foeign key


ALTER TABLE `products` 
ADD CONSTRAINT `type_name` 
FOREIGN KEY (`type_name`) 
REFERENCES `types`(`type_name`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;


-- --------------------TYPES TABLE--------------------------------


CREATE TABLE `Table`(
`table_number` INT NOT NULL UNIQUE,
    PRIMARY KEY(`table_number`)
);


-- --------------------RESERVATION TABLE--------------------------------

CREATE TABLE `Reservation` (
`id_customer` INT NOT NULL AUTO_INCREMENT UNIQUE,
`table_number` INT NOT NULL UNIQUE,
`reservation_date_time` datetime,
`reservation_number` INT,
	
    PRIMARY KEY (`reservation_number`)
);

-- customer foeign key 
ALTER TABLE `reservation` 
ADD CONSTRAINT `customer_Id` 
FOREIGN KEY (`id_customer`) 
REFERENCES `customer`(`id_customer`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- table foeign key

ALTER TABLE `reservation` 
ADD CONSTRAINT `table_number` 
FOREIGN KEY (`table_number`) 
REFERENCES `table`(`table_number`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --------------------ORDERS TABLE--------------------------------

CREATE TABLE `orders`(
`order_number` INT NOT NULL UNIQUE AUTO_INCREMENT,
`id_customer` INT NOT NULL AUTO_INCREMENT UNIQUE,
`product_name`VARCHAR (255),
`livreur_number` INT NOT NULL UNIQUE,
`Quantity` INT,
    PRIMARY KEY(`order_number`)
);

-- product foeign key

ALTER TABLE `orders` 
ADD CONSTRAINT `product_name` 
FOREIGN KEY (`product_name`) 
REFERENCES `products`(`product_name`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- customer foeign key

ALTER TABLE `orders` 
ADD CONSTRAINT `id_customer` 
FOREIGN KEY (`id_customer`) 
REFERENCES `customer`(`id_customer`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- livreur foeign key

ALTER TABLE `orders` 
ADD CONSTRAINT `livreur` 
FOREIGN KEY (`livreur_number`) 
REFERENCES `livreur`(`livreur_number`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;




