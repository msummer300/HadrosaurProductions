USE hadrosaur;

DROP TABLE IF EXISTS books;
CREATE TABLE books
(
	id int unsigned NOT NULL auto_increment PRIMARY KEY,
	title varchar(255) NOT NULL,
	author varchar(255) NOT NULL,
	genre varchar(255) NOT NULL,
	publication_date date NOT NULL,
	price decimal(10, 2) NOT NULL,
	description varchar(255) NOT NULL,
	type_of_book varchar(255) NOT NULL,
	paperback boolean DEFAULT 1,
	ebook boolean DEFAULT 0,
	audio boolean DEFAULT 0,
	quantity_in_stock int unsigned NOT NULL DEFAULT 0
);