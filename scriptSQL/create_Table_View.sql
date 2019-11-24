DELIMITER $$
CREATE DATABASE webhaisan;
$$



-- Create Table 'banner'
create table banner(
	id int auto_increment not null,
    path varchar(255),
    primary key(id)
);


-- Create Table 'permission' of account
CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL auto_increment,
  `name_permission` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- Create Table 'account'
CREATE TABLE `accounts` (
  `AccountID` int(11) NOT NULL auto_increment,
  `UserName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_permission` int(11) NOT NULL,
  PRIMARY KEY (`AccountID`),
  FOREIGN KEY (`id_permission`) REFERENCES `permission`(`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- Create table 'customer' information
CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sex` bit NOT NULL default 1,
  `Phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  primary key (`CustomerID`),
  foreign key (`CustomerID`) references `account`(`AccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- Create Table 'category'
CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




-- Create Table 'product'
CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `descript` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `importDate` date DEFAULT NULL,
  `count_view` int(11) DEFAULT NULL,
  `image_link` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `count_buy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




-- Create table 'order'
CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL auto_increment,
  `AccountID` int(11),
  `Address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrderDate` date NOT NULL,
  `Note` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Status` bit NOT NULL default 0,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB auto_increment=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




-- Create table 'order_detail' for table 'order'
CREATE TABLE `orders_detail` (
  `Order_detail_ID` int(11) NOT NULL auto_increment,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Amount` int(11) NOT NULL,
  PRIMARY KEY (`Order_detail_ID`),
  FOREIGN KEY (`OrderID`) REFERENCES `orders`(`OrderID`),
  FOREIGN KEY (`ProductID`) REFERENCES `product`(`id_product`)
) ENGINE=InnoDB auto_increment=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




-- Create View 'new_product'
Create Or Replace View new_products As
	Select p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit 
    From products As p, categories As c, origins As o, units As u 
    Where p.id_category = c.id_category And p.id_orgin = o.id And p.id_unit = u.id_unit Order By importDate DESC;

-- Create View 'selling_product'
Create Or Replace View selling_products As
	Select p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit 
    From products As p, categories As c, origins As o, units As u 
    Where p.id_category = c.id_category And p.id_orgin = o.id And p.id_unit = u.id_unit Order By count_buy DESC;