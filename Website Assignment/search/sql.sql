CREATE TABLE article (
	a_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	a_title varchar(256) not null,
	a_text text not null,
	a_date datetime not null,
	a_author varchar(256) not null
);

INSERT INTO article (a_title, a_text, a_date, a_author) VALUES ("50 great summer recipes", "There are many recipes you can create for the summer which involves grilling, boiling, frying, and toasting.", "2017-05-11 12:30:11", "Admin");
INSERT INTO article (a_title, a_text, a_date, a_author) VALUES ("A series of computer software", "In this article, you will learn about some of the software used on computers. This involve basic software and more advanced software used by developers.", "2017-12-21 12:30:11", "Daniel Nielsen");