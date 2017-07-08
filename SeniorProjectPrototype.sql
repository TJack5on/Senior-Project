--Drop tables so running code will not load duplicate data
DROP TABLE Account, Owner, Vendor, GLCode, HowPurchased, Transaction, Admins;


--Creating table structure for Finance Database
CREATE TABLE Account (
	AccountNumber char(10) NOT NULL,
	SignatoryID char(3)
)ENGINE = InnoDB;

CREATE TABLE Owner (
	SignatoryID int NOT NULL AUTO_INCREMENT,
	SignatoryName varchar(50), 
	PRIMARY KEY(SignatoryID)
)ENGINE = InnoDB;

CREATE TABLE Vendor (
	VendorID int NOT NULL AUTO_INCREMENT,
	VendorName varchar(50),
	PRIMARY KEY(VendorID)
)ENGINE = InnoDB;

CREATE TABLE GLCode(
	GLCodeID char(5),
	GLDescript varchar(255)
)ENGINE = InnoDB;

CREATE TABLE HowPurchased(
	PurchaseCode varchar(3),
	PCDescript varchar(50)
)ENGINE = InnoDB;

CREATE TABLE Transaction(
	TransactionNum int NOT NULL AUTO_INCREMENT,
	AccountNumber char(10),
	SignatoryID char(3),
	DateOfPurchase DATE,
	VendorID char(3),
	PurchDescript varchar(255),
	RequestedBy varchar(50),
	PurchaseCode varchar(3),
	CCDescript char(10),
	GLCodeID char(5),
	Price decimal(8,2),
	PRIMARY KEY(TransactionNum)
)ENGINE = InnoDB;

-- Create Table to hold usernames and hashed passwords
CREATE TABLE Admins (
	id int NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	hashed_password varchar (60) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB;



-- Populate the tables with fake data (for prototype)

--Populate Account table
INSERT INTO Account VALUES('000000000A', '1');
INSERT INTO Account VALUES('123456789Z', '2');
INSERT INTO Account VALUES('111111111B', '3');
INSERT INTO Account VALUES('222222222C', '4');
INSERT INTO Account VALUES('333333333D', '5');
INSERT INTO Account VALUES('444444444E', '6');

--Populate Owner table
INSERT INTO Owner VALUES('','CS Department');
INSERT INTO Owner VALUES('','Carrie Long');
INSERT INTO Owner VALUES('','Dawn Wilkins');
INSERT INTO Owner VALUES('','Byunghyun Jang');
INSERT INTO Owner VALUES('','Kristin Davidson');
INSERT INTO Owner VALUES('','Yixin Chen');

--Populate Vendor table
INSERT INTO Vendor VALUES('','Amazon');
INSERT INTO Vendor VALUES('','LEGO');
INSERT INTO Vendor VALUES('','Wal-Mart');
INSERT INTO Vendor VALUES('','Apple');
INSERT INTO Vendor VALUES('','Microsoft');

--Populate GLCode table
INSERT INTO GLCode VALUES('40572', 'Sales - Food Catering');
INSERT INTO GLCode VALUES('40576', 'Sales - Food');
INSERT INTO GLCode VALUES('40592', 'Sales - Printing Supplies');
INSERT INTO GLCode VALUES('40604', 'Sales - Equipment');
INSERT INTO GLCode VALUES('40631', 'Sales - General');

--Populate HowPurchased table
INSERT INTO HowPurchased VALUES('PO', 'Purchase Order');
INSERT INTO HowPurchased VALUES('CC', 'Credit Card');
INSERT INTO HowPurchased VALUES('RFP', 'Request for Payment');
INSERT INTO HowPurchased VALUES('TFR', 'Transfer');

--Populate Transaction table
INSERT INTO Transaction VALUES('','444444444E', '6', '2016-01-27', '2', 'New lego sets', 'Himself', 'CC','1234567890', '40604', '345.00');
INSERT INTO Transaction VALUES('','123456789Z', '2', '2016-02-15', '1', 'Transfer to new account', 'Dr. Wilkins', 'TFR','N/A', '40631', '100.00');
INSERT INTO Transaction VALUES('','111111111B', '3', '2016-02-20', '3', 'Food for seminar', 'Carrie Long', 'CC','1324754344', '40576', '54.32');
INSERT INTO Transaction VALUES('','222222222C', '4', '2016-01-12', '4', 'New peripherals', 'Himself', 'PO','N/A', '40604', '324.54');
INSERT INTO Transaction VALUES('','333333333D', '5', '2016-03-03', '5', 'New laptops', 'Carrie Long', 'CC','8877665544', '40592', '1045.65');


/*--first query for milestone 3
--Displays all Transactions ordered by the date purchased in ascending order(shows newest date last)
SELECT * FROM Transaction ORDER BY DateOfPurchase ASC;

--second query for milestone 3
--Displays the price and account used with the transaction with the highest Price
SELECT AccountNumber, Price FROM Transaction WHERE Price = (SELECT MAX(Price) FROM Transaction);

--third query for milestone 3
--Displays all Account numbers associated with each vendor name
SELECT AccountNumber, VendorName FROM Transaction NATURAL JOIN Vendor;
*/