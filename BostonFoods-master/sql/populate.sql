insert into CUSTOMERS (ID, FirstName, LastName, Phone, Email, Password, IsAdmin) values (1, 'Ben', 'Keene', '9168122142', 'bwkeene@yahoo.com', 'test', '0');

insert into DELIVERY_SCHEDULE (Date, LocationAddress, LocationName, Time) values ('08122016', '140 Commonwealth Ave', 'Boston College', 3:00);

insert into DELIVERY_LOCATIONS (LocationAddress, LocationName) values ('140 Commonwealth Ave', 'Boston COllege');

insert into BOXES (Boxname, FoodItems, Price) values ('Box', 'Pasta, Pizza, Eggs', '24.40');

insert into CURRENT_ORDERS (PickupDate, FirstName, LastName, CustID, BoxType, Quantity, Price, Delivery Locations) values (03162016, 'Ben', 'Keene', '01', 'Medium', 'Big', '82.14', 'Boston College');
