USE hadrosaur;

DROP TABLE IF EXISTS books;
CREATE TABLE books
(
	id int unsigned NOT NULL auto_increment PRIMARY KEY,
	title varchar(255) NOT NULL,
	author varchar(255) NOT NULL,
	type_of_book varchar(255) NOT NULL, /*novel, anthology, audiobook*/
	format_of_book varchar(255) NOT NULL DEFAULT, "paperback", /*trade paperback, paperback, ebook*/
	price decimal(10, 2) NOT NULL,
	additional_links varchar(255),
	description varchar(255) NOT NULL,
	quantity_in_stock int unsigned NOT NULL DEFAULT 0
	genre varchar(255) NOT NULL,
	image varchar(255) NOT NULL
);

inventory = [[]];

