-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema webhaisan
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema webhaisan
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webhaisan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `webhaisan` ;

-- -----------------------------------------------------
-- Table `webhaisan`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`permissions` (
  `id_permission` INT(11) NOT NULL AUTO_INCREMENT,
  `name_permission` VARCHAR(30) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  PRIMARY KEY (`id_permission`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`accounts` (
  `AccountID` INT(11) NOT NULL AUTO_INCREMENT,
  `UserName` VARCHAR(30) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `Password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `id_permission` INT(11) NOT NULL,
  `avatar` VARCHAR(1024) NULL DEFAULT NULL,
  PRIMARY KEY (`AccountID`),
  UNIQUE INDEX `UserName` (`UserName` ASC) VISIBLE,
  INDEX `id_permission` (`id_permission` ASC) VISIBLE,
  CONSTRAINT `accounts_ibfk_1`
    FOREIGN KEY (`id_permission`)
    REFERENCES `webhaisan`.`permissions` (`id_permission`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`banners`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`banners` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`categories` (
  `id_category` INT(11) NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(100) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`units`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`units` (
  `id_unit` INT(11) NOT NULL AUTO_INCREMENT,
  `name_unit` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id_unit`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`origins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`origins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name_origin` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`products` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `name_product` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `price` FLOAT NULL DEFAULT NULL,
  `descript` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `importDate` DATE NULL DEFAULT NULL,
  `count_view` INT(11) NULL DEFAULT NULL,
  `image_link` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `id_category` INT(11) NULL DEFAULT NULL,
  `discount` INT(11) NULL DEFAULT NULL,
  `count_buy` INT(11) NULL DEFAULT NULL,
  `id_origin` INT(11) NULL DEFAULT NULL,
  `size` VARCHAR(50) NULL DEFAULT NULL,
  `id_unit` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  INDEX `id_category` (`id_category` ASC) VISIBLE,
  INDEX `id_origin` (`id_origin` ASC) VISIBLE,
  INDEX `product_unit_idx` (`id_unit` ASC) VISIBLE,
  CONSTRAINT `product_unit`
    FOREIGN KEY (`id_unit`)
    REFERENCES `webhaisan`.`units` (`id_unit`),
  CONSTRAINT `products_ibfk_1`
    FOREIGN KEY (`id_category`)
    REFERENCES `webhaisan`.`categories` (`id_category`),
  CONSTRAINT `products_ibfk_2`
    FOREIGN KEY (`id_origin`)
    REFERENCES `webhaisan`.`origins` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 40
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`comments` (
  `id` INT(11) NOT NULL,
  `id_account` INT(11) NOT NULL,
  `id_product` INT(11) NOT NULL,
  `comment_time` VARCHAR(20) NULL DEFAULT '2000-01-01 00:00:00',
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_account_idx` (`id_account` ASC) VISIBLE,
  INDEX `id_product_idx` (`id_product` ASC) VISIBLE,
  CONSTRAINT `id_account`
    FOREIGN KEY (`id_account`)
    REFERENCES `webhaisan`.`accounts` (`AccountID`),
  CONSTRAINT `id_product`
    FOREIGN KEY (`id_product`)
    REFERENCES `webhaisan`.`products` (`id_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`customers` (
  `CustomerID` INT(11) NOT NULL,
  `CustomerName` VARCHAR(50) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `Sex` BIT(1) NOT NULL DEFAULT b'1',
  `Phone` VARCHAR(12) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `Address` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  PRIMARY KEY (`CustomerID`),
  CONSTRAINT `customers_ibfk_1`
    FOREIGN KEY (`CustomerID`)
    REFERENCES `webhaisan`.`accounts` (`AccountID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`orders` (
  `OrderID` INT(11) NOT NULL AUTO_INCREMENT,
  `AccountID` INT(11) NULL DEFAULT NULL,
  `Ward` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `District` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `Province` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `OrderDate` VARCHAR(20) NULL DEFAULT NULL,
  `Note` VARCHAR(250) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `Price` INT(11) NULL DEFAULT NULL,
  `Status` BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`OrderID`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `webhaisan`.`orders_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`orders_detail` (
  `Order_detail_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `OrderID` INT(11) NOT NULL,
  `ProductID` INT(11) NOT NULL,
  `Price` INT(11) NULL DEFAULT NULL,
  `Amount` INT(11) NOT NULL,
  PRIMARY KEY (`Order_detail_ID`),
  INDEX `OrderID` (`OrderID` ASC) VISIBLE,
  CONSTRAINT `orders_detail_ibfk_1`
    FOREIGN KEY (`OrderID`)
    REFERENCES `webhaisan`.`orders` (`OrderID`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

USE `webhaisan` ;

-- -----------------------------------------------------
-- Placeholder table for view `webhaisan`.`new_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`new_products` (`id_product` INT, `name_product` INT, `price` INT, `descript` INT, `importDate` INT, `count_view` INT, `DuongDan` INT, `name_category` INT, `discount` INT, `count_buy` INT, `name_origin` INT, `size` INT, `name_unit` INT);

-- -----------------------------------------------------
-- Placeholder table for view `webhaisan`.`selling_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webhaisan`.`selling_products` (`id_product` INT, `name_product` INT, `price` INT, `descript` INT, `importDate` INT, `count_view` INT, `DuongDan` INT, `name_category` INT, `discount` INT, `count_buy` INT, `name_origin` INT, `size` INT, `name_unit` INT);

-- -----------------------------------------------------
-- function fc_getProduct
-- -----------------------------------------------------

DELIMITER $$
USE `webhaisan`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fc_getProduct`(
	id_product int,
    `limit` int
) RETURNS varchar(30) CHARSET utf8mb4
    READS SQL DATA
    DETERMINISTIC
Begin
	Set @isExist = Exists(Select 1 From `accounts` Where `accounts`.UserName = UserName And `accounts`.`Password` = pass);
    If (@isExist = 0) Then
		Return '-1';
	Else
		Begin
			Select UserName From `accounts` Where `accounts`.UserName = UserName Into @Id;
            Return @Id;
        End;
	End If;
End$$

DELIMITER ;

-- -----------------------------------------------------
-- function fc_login
-- -----------------------------------------------------

DELIMITER $$
USE `webhaisan`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fc_login`(
	username varchar(30) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci, 
    pass varchar(255) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci
) RETURNS varchar(30) CHARSET utf8mb4
    READS SQL DATA
    DETERMINISTIC
Begin
	Set @isExist = Exists(Select 1 From `accounts` Where `accounts`.UserName = UserName And `accounts`.`Password` = pass);
    If (@isExist = 0) Then
		Return '-1';
	Else
		Begin
			Select AccountID From `accounts` Where `accounts`.UserName = UserName Into @Id;
            Return @Id;
        End;
	End If;
End$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sp_addAccount
-- -----------------------------------------------------

DELIMITER $$
USE `webhaisan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addAccount`(
	OUT id int(11), 
    IN UserName varchar(30) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci, 
    IN Pass varchar(255) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci, 
    IN id_permission int(11)
)
Begin
	Set @isExist = Exists(Select 1 From `accounts` Where `accounts`.UserName = UserName);
    If (@isExist = 0) Then
		Begin
			Insert Into accounts(UserName, Password, id_permission) Values(UserName, Pass, id_permission);
            Select AccountID From `accounts` Where `accounts`.UserName = UserName 
				Into id;
        End;
	else
		Begin
			Select AccountID From `accounts` Where `accounts`.UserName = UserName 
				Into id;
		End;
	End If;
End$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sp_addCategory
-- -----------------------------------------------------

DELIMITER $$
USE `webhaisan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addCategory`(OUT id int(11), IN name_category varchar(255) charset utf8)
Begin
	Set @isExist = Exists(Select 1 From `categories` Where `categories`.name_category = name_category);
    If (@isExist = 0) Then
		Begin
			Insert Into category(name_category) Values(name_category);
            Select id_category From category Where `categories`.name_category = name_category 
				Into id;
        End;
	else
		Begin
			Select id_category From category Where `categories`.name_category = name_category 
				Into id;
		End;
	End If;
End$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sp_addCustomer
-- -----------------------------------------------------

DELIMITER $$
USE `webhaisan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addCustomer`(IN AccountID int(11), IN CustomerName varchar(50), IN Sex bit(1), IN Phone varchar(12), IN Addr varchar(255))
Begin
	Set @isExist = Exists(Select 1 From `customers` Where `customers`.CustomerID = AccountID);
    If (@isExist = 0) Then
		Begin
			Insert Into customers Values(AccountID, CustomerName, Sex, Phone, Addr);
        End;
	End If;
End$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sp_addProduct
-- -----------------------------------------------------

DELIMITER $$
USE `webhaisan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addProduct`(
	OUT id_product int(11), 
    IN name_product varchar(100) charset utf8, 
    IN price float,
    IN descript text,
    IN importDate text,
    IN image_link varchar(250),
    IN name_category varchar(250)
)
Begin
	Set @isExist = Exists(Select 1 From `products` Where `products`.name_product = name_product);
    If (@isExist = 0) Then
		Begin
			Set @id_category = null;
            Call sp_addCategory(@id_category, name_category);
            If (@id_category Is Not Null) Then
				Begin
					Set @import_Date = str_to_date(importDate, '%d/%m/%Y');
					Insert Into `products`(name_product, price, descript, importDate, count_view, image_link, id_category, discount, count_buy) 
						Values(name_product, price, descript, @import_Date, 0, image_link, @id_category, 0, 0);
                    Select `p`.id_product From `products` As `p` Where `p`.name_product = name_product 
						Into id_product;  
                End;
			End If;
        End;
	End If;
End$$

DELIMITER ;

-- -----------------------------------------------------
-- View `webhaisan`.`new_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webhaisan`.`new_products`;
USE `webhaisan`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `webhaisan`.`new_products` AS select `p`.`id_product` AS `id_product`,`p`.`name_product` AS `name_product`,`p`.`price` AS `price`,`p`.`descript` AS `descript`,`p`.`importDate` AS `importDate`,`p`.`count_view` AS `count_view`,`p`.`image_link` AS `DuongDan`,`c`.`name_category` AS `name_category`,`p`.`discount` AS `discount`,`p`.`count_buy` AS `count_buy`,`o`.`name_origin` AS `name_origin`,`p`.`size` AS `size`,`u`.`name_unit` AS `name_unit` from (((`webhaisan`.`products` `p` join `webhaisan`.`categories` `c`) join `webhaisan`.`origins` `o`) join `webhaisan`.`units` `u`) where ((`p`.`id_category` = `c`.`id_category`) and (`p`.`id_origin` = `o`.`id`) and (`p`.`id_unit` = `u`.`id_unit`)) order by `p`.`importDate` desc;

-- -----------------------------------------------------
-- View `webhaisan`.`selling_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webhaisan`.`selling_products`;
USE `webhaisan`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `webhaisan`.`selling_products` AS select `p`.`id_product` AS `id_product`,`p`.`name_product` AS `name_product`,`p`.`price` AS `price`,`p`.`descript` AS `descript`,`p`.`importDate` AS `importDate`,`p`.`count_view` AS `count_view`,`p`.`image_link` AS `DuongDan`,`c`.`name_category` AS `name_category`,`p`.`discount` AS `discount`,`p`.`count_buy` AS `count_buy`,`o`.`name_origin` AS `name_origin`,`p`.`size` AS `size`,`u`.`name_unit` AS `name_unit` from (((`webhaisan`.`products` `p` join `webhaisan`.`categories` `c`) join `webhaisan`.`origins` `o`) join `webhaisan`.`units` `u`) where ((`p`.`id_category` = `c`.`id_category`) and (`p`.`id_origin` = `o`.`id`) and (`p`.`id_unit` = `u`.`id_unit`)) order by `p`.`count_buy` desc,`p`.`count_view` desc;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
