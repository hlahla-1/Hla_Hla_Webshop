DROP DATABASE if EXISTS hlahlakitchen;
CREATE DATABASE hlahlakitchen;
USE hlahlakitchen;

CREATE TABLE admins(
    		    adminid int(11) not null,
		    firstname varchar(200) not null,
		    lastname varchar(200) not null,
		    email varchar(200) not null,
		    password varchar(200) not null);

ALTER TABLE admins ADD PRIMARY KEY (adminid);

ALTER TABLE admins MODIFY adminid int(11) not null
AUTO_INCREMENT, AUTO_INCREMENT = 1;

INSERT INTO admins (firstname, lastname, email, password) VALUES
            ('hlahla', 'thein', 'admin@gmail.com', 'admin');

CREATE TABLE users (
    		    userid int(11) not null,
		    firstname varchar(200) not null,
		    lastname varchar(200) not null,
		    email varchar(200) not null,
		    password varchar(200) not null,
		    mobile varchar(200) not null,
		    joindate date default(CURRENT_DATE) not null);

ALTER TABLE users ADD PRIMARY KEY (userid);

ALTER TABLE users MODIFY userid int(11) not null
AUTO_INCREMENT, AUTO_INCREMENT = 1;

INSERT INTO users (firstname, lastname, email, password,mobile) VALUES
            ('hlahla', 'thein', 'hla123@gmail.com', 'hla786','0686958436');

CREATE TABLE categories (
    		    categoryid int(11) not null,
		    name varchar(60) not null,
		    description text not null,
		    image varchar(200) not null,
		    createdate datetime Not null default current_timestamp());
		    

ALTER TABLE categories ADD PRIMARY KEY (categoryid);

ALTER TABLE categories MODIFY categoryid int(11) not null
AUTO_INCREMENT, AUTO_INCREMENT = 1;

ALTER TABLE categories ADD FULLTEXT(name, description);

INSERT INTO categories (name,description,image) VALUES
('Salad Kinds','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tempore quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.','images/greenpapaya.jpeg'),
('Noodles Kinds','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tempore quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.','images/coconutnoodle.jpeg'),
('Curries','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tempore quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.','images/ghostfriedcurry.jpeg'),
('Rice Kinds','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tempore quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.','images/chickendanpauk.jpeg'),
('Vegetables Kinds','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tempore quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.','images/aarlucheese.jpeg'),
('Sweets Kinds','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tempore quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.quia dolorem ratione quod numquam omnis sequi voluptatum nulla quis.','images/htoomote.jpeg');

CREATE TABLE menus (
    		    menuid int(11) not null,
		    name varchar(60) not null,			
		    specification varchar(200) not null,
		    price decimal(8,2) not null,
		    image varchar(200) not null,
		    categoryid int(11) not null);
		    

ALTER TABLE menus ADD PRIMARY KEY (menuid),
		ADD KEY categoryid (categoryid);

ALTER TABLE menus MODIFY menuid int(11) not null
AUTO_INCREMENT, AUTO_INCREMENT = 1;

ALTER TABLE menus
  ADD CONSTRAINT menus_ibfk_1 FOREIGN KEY (categoryid) REFERENCES categories (categoryid);
COMMIT;

ALTER TABLE menus ADD FULLTEXT(name, specification);

INSERT INTO menus (name,specification,price,image,categoryid) VALUES
('Prawn curry','Red chilli & prawn','30.00','images/prawncurry1.jpeg',3),
('Fried corn','Corn & onion ','30.00','images/pyaungphuukyaw.jpeg',5),
('Fried fish','Fish & chilli','30.00','images/machifried.jpeg',3),
('Fried vegetables','Potatoes,beans & carrot','30.00','images/tisonekyaw.jpeg',5),
('Fried rice','Chicken & Vegetables','30.00','images/tisonehtaminchickenfrie.jpeg',4),
('Eggplant curry','Eggplant & totmatoes','30.00','images/machikhayanti.jpeg',3),
('Sushi','Sushi flavors','30.00','images/sushi.jpeg',5),
('Coconut dessert','Coconut & suger','30.00','images/motelonekji.jpeg',6),
('Fried potatoes','Potatoes & masala','30.00','images/aalucheese.jpeg',5),
('Big noodle salad','Noodle & salad flavours','30.00','images/nankjitoke.jpeg',2),
('Chilli salad','Green chilli & onion','30.00','images/ngayotetihtaung.jpg',1),
('Vegetables fresh','Different vegetables','30.00','images/toesayarngapichat.jpeg',1);

CREATE TABLE blogs (
    		    blogid int(11) not null,
		    title varchar(60) not null,			
		    body varchar(200) not null,
		    blogdate date default(CURRENT_DATE) not null,
		    image varchar(200) not null);

ALTER TABLE blogs ADD PRIMARY KEY (blogid);

ALTER TABLE blogs MODIFY blogid int(11) not null
AUTO_INCREMENT, AUTO_INCREMENT = 1;

INSERT INTO blogs (title,body,blogdate,image) VALUES
('Lorem Ipsum','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam illo magnam, nihil nam odit exercitationem voluptatem laudantium suscipit deserunt eum.','2022-03-20','images/Blog1.jpg'),
('Lorem Ipsum','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam illo magnam, nihil nam odit exercitationem voluptatem laudantium suscipit deserunt eum.','2022-03-20','images/Blog2.jpg'),
('Lorem Ipsum','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam illo magnam, nihil nam odit exercitationem voluptatem laudantium suscipit deserunt eum.','2022-03-20','images/Blog3.jpg'),
('Lorem Ipsum','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam illo magnam, nihil nam odit exercitationem voluptatem laudantium suscipit deserunt eum.','2022-03-20','images/Blog4.jpg');

CREATE TABLE orderitems (
  id int(21) NOT NULL,
  orderId int(21) NOT NULL,
  menuid int(21) NOT NULL,
  itemquantity int(100) NOT NULL
);

ALTER TABLE orderitems
  ADD PRIMARY KEY (id);

ALTER TABLE orderitems
  MODIFY id int(21) NOT NULL AUTO_INCREMENT;

CREATE TABLE orders (
  orderid int(21) NOT NULL,
  userid int(21) NOT NULL,
  address1 varchar(200) not null,
  address2 varchar(200) not null,
  mobile bigint(21) NOT NULL,
  amount int(200) NOT NULL,
  paymentmode enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  orderstatus enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  orderdate datetime NOT NULL DEFAULT current_timestamp()
);

ALTER TABLE orders ADD PRIMARY KEY (orderid);

ALTER TABLE orders
  MODIFY orderid int(21) NOT NULL AUTO_INCREMENT;

CREATE TABLE viewcart (
  cartitemid int(11) NOT NULL,
  menuid int(11) NOT NULL,
  itemquantity int(100) NOT NULL,
  userid int(11) NOT NULL,
  addeddate datetime NOT NULL DEFAULT current_timestamp()
);
ALTER TABLE viewcart ADD PRIMARY KEY (cartitemid);

ALTER TABLE viewcart
  MODIFY cartitemid int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
