-- Active: 1668737379931@@127.0.0.1@3306@jewellery
CREATE TABLE category(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    label varchar(50) NOT NULL
);

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) NOT NULL,
  `price` double NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0.00,
  `image` text NOT NULL,
  `categoryId` int(11) NOT NULL DEFAULT 100000,
   FOREIGN KEY(categoryId) REFERENCES category(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `product` AUTO_INCREMENT=100000;
ALTER TABLE `category` AUTO_INCREMENT=100000;
ALTER TABLE `category` AUTO_INCREMENT=100000;
INSERT INTO `category`(`label`) VALUES ('DEFAULT');

ALTER TABLE `product`
  MODIFY `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT;



SELECT P.*,C.label FROM product P JOIN category C ON P.`categoryId` = C.id; 

CREATE VIEW productsV
AS
SELECT P.*,C.label as category FROM product P JOIN category C ON P.`categoryId` = C.id;
SELECT * from productsv;

