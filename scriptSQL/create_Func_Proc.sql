Drop Procedure If Exists sp_addAccount;
Drop Procedure If Exists sp_addCustomer;
Drop Function If Exists fc_login;




DELIMITER $$
Create Function fc_login(
	username varchar(30) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci, 
    pass varchar(255) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci
)
Returns varchar(30)
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
End;
$$



DELIMITER $$
Create Procedure sp_addAccount(
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
End;
$$




DELIMITER $$
Create Procedure sp_addCustomer(IN AccountID int(11), IN CustomerName varchar(50) CHARSET utf8 COLLATE utf8_unicode_ci, IN Sex bit(1), IN Phone varchar(12), IN Addr varchar(4096) CHARSET utf8 COLLATE utf8_unicode_ci)
Begin
	Set @isExist = Exists(Select 1 From `customers` Where `customers`.CustomerID = AccountID);
    If (@isExist = 0) Then
		Begin
			Insert Into customers Values(AccountID, CustomerName, Sex, Phone, Addr);
        End;
	End If;
End;
$$