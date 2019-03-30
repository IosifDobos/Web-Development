--Create my database table for user--
CREATE TABLE User(
	Username VARCHAR(20),
	Password VARCHAR(20) NOT NULL,
	FirstName VARCHAR(20) NOT NULL,
	LastName VARCHAR(20) NOT NULL,
	EmailAdr VARCHAR(30) NOT NULL,
	AddressLine1 VARCHAR(30) NOT NULL,
	AddressLine2 VARCHAR(30) NOT NULL,
	City VARCHAR(20) NOT NULL,
	Telephone NUMBER(10) NOT NULL,
	MobilePhone NUMBER(10) NOT NULL, 
	CONSTRAINT Username_pk PRIMARY KEY(Username),
	CONSTRAINT EmailAdr_chk CHECK(email LIKE '%@%.%')
);

--Create the database for Categories including categoryID and CategoriDescription --
CREATE TABLE Categories(
	CategoryID NUMBER(3),
	CategoryDesc VARCHAR(30) NOT NULL,
	CONSTRAINT categoryID_pk PRIMARY KEY(categoryID)
);

--Create the database for book table
CREATE TABLE Books(
	ISBN VARCHAR(20),
	BookTitle VARCHAR(50),
	Author VARCHAR(50) ,
	Edition NUMBER(2) ,
	Year DATE , 
	CategoryID NUMBER(3) , 
	Reserved CHAR(1),
	CONSTRAINT ISBN_pk PRIMARY KEY(ISBN),
	CONSTRAINT CategoryID_fk FOREIGN KEY REFERENCES Categories(CategoryID)
); 

--Create database table for User book reservation --
CREATE TABLE Reservation(
	ReservationID MEDIUMINT AUTO_INCREMENT,
	ISBN VARCHAR(20),
	Username VARCHAR(20),
	ReservedDate DATE,
	CONSTRAINT ReservationID_pk PRIMARY KEY (ReservationID),
	CONSTRAINT ISBN_fk FOREIGN KEY REFERENCES Books(ISBN),
	CONSTRAINT Username_fk FOREIGN KEY REFERENCES User(Username)
);