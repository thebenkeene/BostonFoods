DROP TABLE IF EXISTS CUSTOMERS;
DROP TABLE IF EXISTS DELIVERY_SCHEDULE;
DROP TABLE IF EXISTS DELIVERY_LOCATIONS;
DROP TABLE IF EXISTS BOXES;
DROP TABLE IF EXISTS CURRENT_ORDERS;


CREATE TABLE CUSTOMERS(
	ID	int not null auto_increment,
	FirstName	varchar(15) not null,
	LastName	varchar(15) not null,
	Phone           char(12) not null,	
	Email           varchar(20) not null,
	Password        varchar(50) not null,
	IsAdmin          int not null,
        primary key(ID)
);

CREATE TABLE DELIVERY_SCHEDULE(
	Date	bigint not null,
	Time	numeric	not null,
	LocationName	varchar(20)	not null,
	LocationAddress	varchar(30)	not null
);

CREATE TABLE DELIVERY_LOCATIONS(
	Location_Address	varchar(30)	not null,
	Location_Name	varchar(20)	not null
);

CREATE TABLE BOXES(
	BoxName		varchar(15)	not null,
	FoodItems	varchar(50) not null,
	Price	numeric	not null
);

CREATE TABLE CURRENT_ORDERS(
	PickupDate	bigint	not null,
	FirstName	varchar(15)	not null,
	LastName    varchar(15) not null,
	CustID	int not null,
	BoxType	varchar(15)	not null,
	Quantity	int 	not null,
	Price	numeric		not null,
	DeliveryLocation 	varchar(20)	not null
);