Drop Procedure If Exists sp_addCategory;
Drop Procedure If Exists sp_addProduct;
Drop Procedure If Exists sp_addAccount;
Drop Procedure If Exists sp_addCustomer;


DELIMITER $$
Create Procedure sp_addAccount(OUT id int(11), IN UserName varchar(30), IN Pass text, IN id_permission int(11))
Begin
	Set @isExist = Exists(Select 1 From `account` Where `account`.UserName = UserName);
    If (@isExist = 0) Then
		Begin
			Insert Into account(UserName, Password, id_permission) Values(UserName, Pass, id_permission);
            Select AccountID From `account` Where `account`.UserName = UserName 
				Into id;
        End;
	else
		Begin
			Select AccountID From `account` Where `account`.UserName = UserName 
				Into id;
		End;
	End If;
End;
$$




DELIMITER $$
Create Procedure sp_addCustomer(IN AccountID int(11), IN CustomerName varchar(50), IN Sex bit(1), IN Phone varchar(12), IN Addr varchar(255))
Begin
	Set @isExist = Exists(Select 1 From `customers` Where `customers`.CustomerID = AccountID);
    If (@isExist = 0) Then
		Begin
			Insert Into customers Values(AccountID, CustomerName, Sex, Phone, Addr);
        End;
	End If;
End;
$$




DELIMITER $$
Create Procedure sp_addCategory(OUT id int(11), IN name_category varchar(255) charset utf8)
Begin
	Set @isExist = Exists(Select 1 From `category` Where `category`.name_category = name_category);
    If (@isExist = 0) Then
		Begin
			Insert Into category(name_category) Values(name_category);
            Select id_category From category Where `category`.name_category = name_category 
				Into id;
        End;
	else
		Begin
			Select id_category From category Where `category`.name_category = name_category 
				Into id;
		End;
	End If;
End;
$$




DELIMITER $$
Create Procedure sp_addProduct(
	OUT id_product int(11), 
    IN name_product varchar(100) charset utf8, 
    IN price float,
    IN descript text,
    IN importDate text,
    IN image_link varchar(250),
    IN name_category varchar(250)
)
Begin
	Set @isExist = Exists(Select 1 From `product` Where `product`.name_product = name_product);
    If (@isExist = 0) Then
		Begin
			Set @id_category = null;
            Call sp_addCategory(@id_category, name_category);
            If (@id_category Is Not Null) Then
				Begin
					Set @import_Date = str_to_date(importDate, '%d/%m/%Y');
					Insert Into `product`(name_product, price, descript, importDate, count_view, image_link, id_category, discount, count_buy) 
						Values(name_product, price, descript, @import_Date, 0, image_link, @id_category, 0, 0);
                    Select `p`.id_product From `product` As `p` Where `p`.name_product = name_product 
						Into id_product;  
                End;
			End If;
        End;
	End If;
End;
$$