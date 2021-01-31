DROP TABLE category; 

CREATE TABLE category ( 
category_id SERIAL PRIMARY KEY
, category_name VARCHAR(45) NOT NULL
); 


DROP TABLE index; 

CREATE TABLE index ( 
index_id SERIAL PRIMARY KEY
, recipe_name VARCHAR(75) NOT NULL 
, category_id INT NOT NULL 
, FOREIGN KEY (category_id) 
REFERENCES category (category_id)
); 


DROP TABLE author; 

CREATE TABLE author (
author_id SERIAL PRIMARY KEY
, first_name VARCHAR(45) NOT NULL 
, last_name VARCHAR (45) NOT NULL 
, user_name VARCHAR (45) NOT NULL 
, password VARCHAR (8) NOT NULL 
); 


DROP TABLE ingredients; 

CREATE TABLE ingredients ( 
recipe_id SERIAL PRIMARY KEY
, recipe_name VARCHAR NOT NULL 
, index_id INT NOT NULL  
, category_id INT NOT NULL 
, recipe TEXT NOT NULL 
, directions TEXT NOT NULL 
, date_added DATE NOT NULL 
, author_id INT NOT NULL 
, FOREIGN KEY (category_id) 
REFERENCES category (category_id)
, FOREIGN KEY (index_id) 
REFERENCES index (index_id) 
, FOREIGN KEY (author_id) 
REFERENCES author (author_id)
);  
