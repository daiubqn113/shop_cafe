DROP DATABASE `cafe_shop`;
CREATE DATABASE `cafe_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use cafe_shop;

CREATE TABLE IF NOT EXISTS `category` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL UNIQUE,
  status tinyint NULL DEFAULT '0'
);

INSERT INTO category(id, name, status) values 
('','Đồ uống','1'),
('','Đồ ăn','1'),
('','Đồ handmade','1');

CREATE TABLE IF NOT EXISTS `product`(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL UNIQUE,
	images VARCHAR(255) NULL,
	price INT NOT NULL,
	price_sale INT NULL DEFAULT '0',
	create_at timestamp DEFAULT CURRENT_TIMESTAMP,
	category_id INT NOT NULL,
	FOREIGN KEY (category_id) REFERENCES category(id)
);