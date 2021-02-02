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

-- Syntax for the category names 
INSERT INTO category (category_name) 
VALUES 
( 'Main Dishes')
, ('Appetizers and Sides')
, ('Breads')
, ('Salads')
, ('Desserts')
, ('Beverages'); 

-- adding an author 
INSERT INTO author (first_name, last_name, user_name, password) 
VALUES( 
'Wendy' 
, 'Randolph'
, 'WendyR'
, 'password'
); 

-- THis is the syntax for inserting into the index 
INSERT INTO index  (recipe_name, category_id)
VALUES 
('Cheesy Chicken and Rice Casserole'
, 1 ); 


--Syntax for inserting recipes into the database (There could be an easier way but not sure yet)
INSERT INTO ingredients (recipe_name, index_id, category_id, recipe, directions, date_added, author_id)
VALUES( 
 'Bowtie Chicken'
, (SELECT index_id FROM index WHERE recipe_name = 'Bowtie Chicken') 
, (SELECT category_id FROM category WHERE category_name = 'Main Dishes')
, '1 lb Bowtie Pasta 
   3 Boneless Chicken Breasts
   1 can Corn 
   1/2 - 3/4 bottle of Italian Salad Dressing'
, 'Cook pasta according to package. Cut up and cook 			
chicken in a fry pain.  When cooked add the corn, 			
Drain the pasta, and add noodles to the chicken in a 			
pot big enough to hold it, (probably the same pot
used to boil the pasta)  Pour the Italian dressing onto			
the food, and mix. Cook till heated thoroughly.' 
, CURRENT_DATE 
, (SELECT author_id FROM author WHERE first_name = 'Wendy')); 			
